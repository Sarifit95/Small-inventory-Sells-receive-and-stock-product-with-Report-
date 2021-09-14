<?php

namespace App\Http\Controllers;

use App\Models\Receive;
use App\Models\Receive_detail;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;

class ReceiveController extends Controller
{


    public function index()
    {

    $receives= Receive::with('vendor')->orderBy('id', 'DESC')->get();
    return view("admin.receive.index", ['action' => 'index', 'receives'=>$receives]);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::get();
        $products = Product::get();
        $invoicet = Receive::Select('invoice_no')->orderBy('id', 'DESC')->first();

        //for stock check

        if (empty($invoicet->invoice_no)){
            $invoice=0+1;
        }
        else{
            $invoice=$invoicet->invoice_no +1;
        }

        return view("admin.receive.index", ['invoice' => $invoice, 'vendors' => $vendors, 'products' => $products, 'action' => 'create']);





    }
    public function getproduct(Request $request)
    {
        $data2 = \DB::table('sells_details')->where('product_id', '=', $request->id)->sum('qty');
        $data1 = \DB::table('receive_details')->where('product_id', '=', $request->id)->sum('qty');
        $product=Product::find($request->id);

        return ['stock'=>$data1-$data2, 'price'=>$product->purchase_price, 'quantity'=>$product->quantity];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
//        return  $request->all();
//        exit();



        foreach ($request->addmore as $key => $value) {


            Receive_detail::create(
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
        $total_price = \DB::table('receive_details')->where('invoice_no', '=', $request->invoice_no)->sum('total_price');


        Receive::create([
            'invoice_no' => $request->invoice_no,
            'vendor_id' => $request->vendor,
            'date' => $request->date,
            'total_price' =>$total_price,



        ]);
        session()->flash('message', 'Receive Created Successfully ');
        session()->flash('type', 'success');

        return redirect()->route('receive.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $receive = Receive::with('vendor')->with('revicedetails')->where('invoice_no', '=' ,$id)->first();

        return view("admin.receive.index", [ 'receive' => $receive,  'action' => 'details']);

    }

    public function voucher($id){

        $receive = Receive::with('vendor')->with('revicedetails')->where('invoice_no', '=' ,$id)->first();

        return view("admin.receive.index", [ 'receive' => $receive,  'action' => 'voucher']);

    }
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
