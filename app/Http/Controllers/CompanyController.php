<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\user;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
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
             'address'=>$request->address,
             'brand'=>$request->brand,
             'phone'=>$request->phone,
             'email'=>$request->email,
             'slug'=>$uniqueSlug,
             'userId'=>Auth::user()->id,
             'number'=>Helper::CompanyIDGenerator(new company ,'userId',10,  'BAJ'),
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
           'userId'=>$request->userId,

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
     /**
      * Summary of Cashier Company function
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
      */
     public function Cashierindex()
     {
        $user =Auth::user();
        $data=company::where('userId',$user->id)->orderBy('id','DESC')->get();
         return view('cashier.basic_setting.company.index',compact('data'));
     }

     public function Cashiercreate()
     {
         //
         return view('cashier.basic_setting.company.create');
     }


     public function Cashierstore(Request $request)
     {
         //

         $request->validate([
             'name'=>'required|max:255',

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
             'address'=>$request->address,
             'brand'=>$request->brand,
             'phone'=>$request->phone,
             'email'=>$request->email,
             'slug'=>$uniqueSlug,
             'userId'=>Auth::user()->id,
             'number'=>Helper::CompanyIDGenerator(new company ,'userId',10,  'BAJ'),
         ]);
         $user =Auth::user();
         $data=company::where('userId',$user->id)->orderBy('id','DESC')->get();
         return redirect()->route('cashier.company.index')->with('success','Company created successfully.');

     }


     public function Cashieredit($id)
     {
        $data = company::where('id',decrypt($id))->first();
         return view('cashier.basic_setting.company.edit',compact('data'));
     }

     /**
      * Update the specified resource in storage.
      */
     public function Cashierupdate(Request $request)
     {
         //

         $request->validate([
            'name'=>'required|max:255',
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
           'userId'=>$request->userId,

        ]);
        return redirect()->route('cashier.company.index')->with('info','Company updated successfully.');
     }

     public function Cashierdestroy($id)
     {
         //
         $user =Auth::user();
         $data=company::where('userId',$user->id)->orderBy('id','DESC')->get();
          company::where('id',decrypt($id))->delete();
         return redirect()->route('cashier.company.index')->with('error','Company deleted successfully.');
     }



}
