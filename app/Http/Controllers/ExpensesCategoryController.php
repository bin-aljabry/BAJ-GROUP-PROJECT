<?php

namespace App\Http\Controllers;

use App\Models\expenses_category;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =Auth::user();
        $data=expenses_category::where('userId',$user->name)->orderBy('id','DESC')->get();

        return view('cashier.accounting.expenses.expenses_category_index',compact('data'));
    }

    public function create()
    {
        return view('cashier.accounting.expenses.expenses_category_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category'=>'required|max:255',
            'name'=>'required',


        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (expenses_category::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        expenses_category::create([
            'category'=>$request->category,
            'name'=>$request->name,
            'number'=>Helper::CategoryExpIDGenerator(new expenses_category ,'number',3, 'BAJ-EXP-CAT'),
            'slug'=>$uniqueSlug,
            'userId'=>Auth::user()->name,

        ]);
        return redirect()->route('cashier.expenses_category.index')->with('success','Expenses created successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = expenses_category::where('id',decrypt($id))->first();
        return view('cashier.accounting.expenses.expenses_category_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
          //
          $request->validate([
            'category'=>'required|max:255',
            'name'=>'required',


        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
       
        while (expenses_category::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        expenses_category::where('id', $request->id)->update([

            'category'=>$request->category,
            'name'=>$request->name,
            'number'=>Helper::CategoryExpIDGenerator(new expenses_category ,'number',3, 'BAJ-EXP-CAT'),
            'slug'=>$uniqueSlug,
            'userId'=>Auth::user()->name,

        ]);
        return redirect()->route('cashier.expenses_category.index')->with('success','Expenses created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        expenses_category::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.expenses_category.index')->with('error','Company deleted successfully.');
    }
}
