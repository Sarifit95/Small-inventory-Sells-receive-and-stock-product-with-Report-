<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sells_detail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sell;
use App\helpers;

class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $sells = Sell::with('customers')->orderBy('id', 'DESC')->get();
        return view("admin.sells.index", ['action' => 'index', 'sells'=>$sells]);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::get();
        $products = Product::get();
        $invoicet = Sell::Select('invoice_no')->orderBy('id', 'DESC')->first();

        //for stock check

        if (empty($invoicet->invoice_no)){
            $invoice=0+1;
        }
        else{
            $invoice=$invoicet->invoice_no +1;
        }

        return view("admin.sells.index", ['invoice' => $invoice, 'customers' => $customers, 'products' => $products, 'action' => 'create']);





    }
    public function getproduct(Request $request)
    {
        $data2 = \DB::table('sells_details')->where('product_id', '=', $request->id)->sum('qty');
        $data1 = \DB::table('receive_details')->where('product_id', '=', $request->id)->sum('qty');
        $product=Product::find($request->id);

        return ['stock'=>$data1-$data2, 'price'=>$product->sales_price, 'quantity'=>$product->quantity];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
//        Sells_detail::create();


        foreach ($request->addmore as $key => $value) {


               Sells_detail::create(
                   [
                       'invoice_no' => $request->invoice_no,
                       'date' => $request->date,
                       'product_id' => $value['name'],
                       'qty' => $value['qty'],
                       'price' => $value['price'],
                       'total_price' => $value['total_price'],
                       'discount' =>0,

                   ]
               );



        }
        $total_price = \DB::table('sells_details')->where('invoice_no', '=', $request->invoice_no)->sum('total_price');


        Sell::create([
            'invoice_no' => $request->invoice_no,
            'customer_id' => $request->customer,
            'date' => $request->date,
            'total_price' =>$total_price,



        ]);
        session()->flash('message', 'Sells Created Successfully ');
        session()->flash('type', 'success');

        return redirect()->route('sells.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $sells = Sell::with('customers')->with('sellsdetails')->where('invoice_no', '=' ,$id)->first();

        return view("admin.sells.index", [ 'sells' => $sells,  'action' => 'details']);

    }

    public function voucher($id){

        $sells = Sell::with('customers')->with('sellsdetails')->where('invoice_no', '=' ,$id)->first();

        return view("admin.sells.index", [ 'sells' => $sells,  'action' => 'voucher']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
