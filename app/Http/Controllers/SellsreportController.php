<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sell;
use App\Models\Sells_detail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database;

class SellsreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Customer::get();
        return view("admin.report.sells", ['action' => 'index', 'vendors'=>$vendors]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

//        switch ($report) {
//            case "report":
//
//
//                $datetime = Carbon::now()->setTimezone('Asia/Dhaka');
//                $date=$datetime->toDateString();
//                $wo = Receive::with('vendor')->select('invoice_no','vendor_id',  Receive::raw("(sum(total_price)) as total_click"))->where(function($wo) use ( $request, $date){
//
//                    if($request->input('from') ) {
//                        $wo->whereBetween('date', [$request->input('from'),$date]);;
//                    }
//                    if($request->input('from')&& $request->input('to') ) {
//                        $wo->whereBetween('date', [$request->input('from'),$request->input('to')]);
//                    }
//
//                    if($request->input('vendor_name')) {
//                        $wo->where('vendor_id', $request->input('vendor_name'));
//
//
//                    }
//
//
//                })
//                    ->orderBy('invoice_no' )
//                    ->groupBy('invoice_no')
//
//
//
//                    ->get();
//
//
//
//                return view('admin.report.receive', ['wo'=>$wo,'action'=>'report']);

        $datetime = Carbon::now()->setTimezone('Asia/Dhaka');
        $date=$datetime->toDateString();

        $report=$request->input('report');


        switch ($report) {
            case "report":



                $wo = Sell::with('customers')->select('invoice_no','date','customer_id','total_price')->where(function($wo) use ( $request, $date){

                    if($request->input('from') ) {
                        $wo->whereBetween('date', [$request->input('from'),$date]);;
                    }
                    if($request->input('from')&& $request->input('to') ) {
                        $wo->whereBetween('date', [$request->input('from'),$request->input('to')]);
                    }

                    if($request->input('customer_name')) {
                        $wo->where('customer_id', $request->input('customer_name'));


                    }


                })
                    ->orderBy('invoice_no' )


                    ->get();




                return view('admin.report.sells', ['receives'=>$wo,'action'=>'report']);







                break;
            case "advance_report":


//                $wo = Receive_detail::with('product')->with('receive')->where(function($wo) use ( $request, $date){
//
//                    if($request->input('from') ) {
//                        $wo->whereBetween('date', [$request->input('from'),$date]);;
//                    }
//                    if($request->input('from')&& $request->input('to') ) {
//                        $wo->whereBetween('date', [$request->input('from'),$request->input('to')]);
//                    }
//
//                    if($request->input('vendor_name')) {
//                        $wo->where('3[vendor_id]', $request->input('vendor_name'));
//
//
//                    }
//
//
//                })
//                    ->orderBy('invoice_no' )
//
//
//                    ->get();

//                DB::enableQueryLog();
//                dd(DB::getQueryLog());


                $wo = DB::table('sells_details')
                    ->Join('products', 'sells_details.product_id','=','products.id')
                    ->Join('sells', 'sells_details.invoice_no','=','sells.invoice_no')
                    ->Join('customers', 'sells.customer_id','=','customers.id')
//                    ->leftJoin('vendors', 'receive.vendor_id','=','vendors.id')
                    ->select('sells_details.invoice_no','sells_details.id','sells_details.date','customers.name',
                        'products.name as pname','sells_details.qty','sells_details.price','sells_details.total_price')

                    ->where(function($wo) use ( $request, $date){

                        if($request->input('from') ) {
                            $wo->whereBetween('sells_details.date', [$request->input('from'),$date]);;
                        }
                        if($request->input('from')&& $request->input('to') ) {
                            $wo->whereBetween('sells_details.date', [$request->input('from'),$request->input('to')]);
                        }

                        if($request->input('customer_name')) {
                            $wo->where('sells.customer_id', $request->input('customer_name'));


                        }


                    })
                    ->orderBy('invoice_no' )


                    ->get();


                return view('admin.report.sells', ['receive_details'=>$wo,'action'=>'advance']);

                break;

            default:
                echo "Empty!";
        }
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
