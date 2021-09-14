<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update = false;
        $insert = false;
        $customers = Customer::get();
        return view("admin.customers.index", ['insert' => $insert, 'customers' => $customers, 'update' => $update]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $update = false;
        $insert = true;

        return view("admin.customers.index", ['insert' => $insert, 'update' => $update]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regex = '/^(?:[1-9]\d*|0)?(?:\.\d+)?$/';

        $request->validate([
            'phone_number' => ['required','max:11','min:11',
                Rule::unique('customers')],
            'name' => ['required','max:100'] ,
            'address' => ['required','max:300'] ,



        ], [
            'name.required' => 'Customer name is required',
            'phone_number.unique' => 'phone_number already exit',
            'phone_number.required' => 'phone_number is required',
            'address.required' => 'address is required',


        ]);














        Customer::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,



        ]);


        session()->flash('message', 'Inserted Successfully ');
        session()->flash('type', 'success');
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = true;
        $insert = false;
        $customer = Customer::find($id);


        return view("admin.customers.index", ['insert' => $insert, 'customer' => $customer, 'update' => $update]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update=Customer::findOrfail($id);

        $request->validate([
            'phone_number' => ['required','max:11','min:11',
                Rule::unique('customers')->ignore($id)],
            'name' => ['required','max:100'] ,
            'address' => ['required','max:300'] ,



        ], [
            'name.required' => 'Customer name is required',
            'phone_number.unique' => 'phone_number already exit',
            'phone_number.required' => 'phone_number is required',
            'address.required' => 'address is required',


        ]);








        if ($update->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,





        ])){
            session()->flash('message', 'Updated Successfully ');
            session()->flash('type', 'success');
            return redirect()->route('customers.index');
        }






    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
