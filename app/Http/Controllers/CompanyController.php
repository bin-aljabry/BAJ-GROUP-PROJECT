<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $data = company::orderBy('id','DESC')->get();
         return view('admin.company.index',compact('data'));
     }

     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         //
         return view('admin.company.create');
     }

     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         //
         $request->validate([
             'name'=>'required|max:255',
             'number'=>'required',
             'brand'=>'required',
             'phone'=>'required',
             'email'=>'required',
            'address'=>'required',
         ]);
         $baseSlug = Str::slug($request->name);
         $uniqueSlug = $baseSlug;
         $counter = 1;
         while (company::where('slug', $uniqueSlug)->exists()) {
             $uniqueSlug = $baseSlug . '-' . $counter;
             $counter++;
         }
         company::create([
             'name'=>$request->name,
             'number'=>$request->number,
             'address'=>$request->address,
             'brand'=>$request->brand,
             'phone'=>$request->phone,
             'email'=>$request->email,
             'slug'=>$uniqueSlug,

         ]);
         return redirect()->route('admin.company.index')->with('success','Company created successfully.');

     }

     /**
      * Display the specified resource.
      */
     public function show(company $company)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit($company)
     {

         $data = company::where('id',decrypt($company))->first();
         return view('admin.company.edit',compact('data'));
     }

     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request)
     {
         //

         $request->validate([
            'name'=>'required|max:255',
            'number'=>'required',
            'brand'=>'required',
            'phone'=>'required',
            'email'=>'required',
           'address'=>'required',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (company::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }

        company::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => $uniqueSlug,
            'number'=>$request->number,
            'brand'=>$request->brand,
            'phone'=>$request->phone,
            'email'=>$request->email,
           'address'=>$request->address,
        ]);
        return redirect()->route('admin.company.index')->with('info','Company updated successfully.');
     }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         //
         company::where('id',decrypt($id))->delete();
         return redirect()->route('admin.company.index')->with('error','Company deleted successfully.');
     }
}
