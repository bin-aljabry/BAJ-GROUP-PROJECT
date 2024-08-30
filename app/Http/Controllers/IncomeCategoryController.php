<?php

namespace App\Http\Controllers;

use App\Models\income_category;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =Auth::user();
        $income_category=income_category::where('userId',$user->name)->orderBy('id','DESC')->get();
        return view('cashier.accounting.income.income_category_index',compact('income_category','user'));

    }

    public function create()
    {
        return view('cashier.accounting.income.income_category_create');
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
        while (income_category::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        income_category::create([
            'category'=>$request->category,
            'name'=>$request->name,
            'number'=>Helper::CategoryIncomeIDGenerator(new income_category ,'number',3, 'BAJ-EXP-CAT'),
            'slug'=>$uniqueSlug,
            'userId'=>Auth::user()->name,

        ]);
        return redirect()->route('cashier.income_category.index')->with('success','Expenses created successfully.');

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
        $data = income_category::where('id',decrypt($id))->first();
        return view('cashier.accounting.income.income_category_edit',compact('data'));
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

        while (income_category::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        income_category::where('id', $request->id)->update([

            'category'=>$request->category,
            'name'=>$request->name,
            'number'=>Helper::CategoryExpIDGenerator(new income_category ,'number',3, 'BAJ-INC-CAT'),
            'slug'=>$uniqueSlug,
            'userId'=>Auth::user()->name,

        ]);
        return redirect()->route('cashier.income_category.index')->with('success','Expenses created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        income_category::where('id',decrypt($id))->delete();
        return redirect()->route('cashier.income_category.index')->with('error','Company deleted successfully.');
    }
}
