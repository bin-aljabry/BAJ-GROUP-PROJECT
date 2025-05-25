<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Models\user;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\company_branches;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        $data = User::where('company_id', Auth::user()->company_id)
             ->where('created_by', Auth::id())
             ->get();
             
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
      public function branchlist()
      {
        $companyId = Auth::user()->company_id;

        $data = company_branches::where('company_id', $companyId)->get();
              
          return view('admin.branch.index',compact('data'));
      }
 
      public function createbranch()
      {
          //
          return view('admin.branch.create');
      }

      public function assignBranch(Request $request)
      {

        $request->validate([
            'name'=>'required|max:255',
        ]);
     
        company_branches::create([
              'name' => $request->name,
              'company_id' => auth()->user()->company_id,
              'location' => $request->location
          ]);
          return redirect()->route('admin.branch.list')->with('success','Branch created successfully.');
        } 
        
        public function branchedit($branch)
        {
   
            $data = company_branches::where('id',decrypt($branch))->first();
            return view('admin.branch.edit',compact('data'));
        }
   
        /**
         * Update the specified resource in storage.
         */
        public function branchupdate(Request $request)
        {
            //
   
            $request->validate([
               'name'=>'required|max:255',
               'location'=>'required|max:255',

              
           ]);
         
           company_branches::where('id', $request->id)->update([
               'name' => $request->name,
               'company_id' => auth()->user()->company_id,
               'location' => $request->location
  
             
           ]);
           return redirect()->route('admin.branch.list')->with('info','Branch updated successfully.');
        }
   
        /**
         * Remove the specified resource from storage.
         */
        public function branchdestroy($id)
        {
            //
            company_branches::where('id',decrypt($id))->delete();
            return redirect()->route('admin.branch.list')->with('error','Branch deleted successfully.');
        }
        
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
             'name'=>$request->company_name,
             'address'=>$request->company_address,

             'phone'=>$request->company_phone,
             'email'=>$request->company_email,
             'slug'=>$uniqueSlug,

             'brand'=>$request->brand,
         ]);
         return redirect()->with('success','Company created successfully.');

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
            'slug'=>'required',
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
     /**
      * Summary of Cashier Company function
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
      */
     public function Cashierindex()
     {
        $user =Auth::user();

         return view('cashier.basic_setting.company.index');
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

         ]);
         $user =Auth::user();

         return redirect()->route('cashier.company.index')->with('success','Company created successfully.');

     }


     public function Cashieredit($id)
     {
        $data = company::where('id',decrypt($id))->first();
         return view('cashier.basic_setting.company.edit');
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


        ]);
        return redirect()->route('cashier.company.index')->with('info','Company updated successfully.');
     }

     public function Cashierdestroy($id)
     {
         //
         $user =Auth::user();

          company::where('id',decrypt($id))->delete();
         return redirect()->route('cashier.company.index')->with('error','Company deleted successfully.');
     }



}
