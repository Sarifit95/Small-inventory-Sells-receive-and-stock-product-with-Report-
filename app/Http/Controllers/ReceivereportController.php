<?php

namespace App\Http\Controllers;

use App\Models\Receive;
use App\Models\Receive_detail;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database;

class ReceivereportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::get();
        return view("admin.report.receive", ['action' => 'index', 'vendors'=>$vendors]);

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



                $wo = Receive::with('vendor')->select('invoice_no','date','vendor_id','total_price')->where(function($wo) use ( $request, $date){

                        if($request->input('from') ) {
                            $wo->whereBetween('date', [$request->input('from'),$date]);;
                        }
                        if($request->input('from')&& $request->input('to') ) {
                            $wo->whereBetween('date', [$request->input('from'),$request->input('to')]);
                        }

                        if($request->input('vendor_name')) {
                            $wo->where('vendor_id', $request->input('vendor_name'));


                        }


                    })
                    ->orderBy('invoice_no' )


                    ->get();




                return view('admin.report.receive', ['receives'=>$wo,'action'=>'report']);







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


                $wo = DB::table('receive_details')
                    ->Join('products', 'receive_details.product_id','=','products.id')
                    ->Join('receive', 'receive_details.invoice_no','=','receive.invoice_no')
                    ->Join('vendors', 'receive.vendor_id','=','vendors.id')
//                    ->leftJoin('vendors', 'receive.vendor_id','=','vendors.id')
                    ->select('receive_details.invoice_no','receive_details.id','receive_details.date','vendors.name',
                        'products.name as pname','receive_details.qty','receive_details.price','receive_details.total_price')

                    ->where(function($wo) use ( $request, $date){

                    if($request->input('from') ) {
                        $wo->whereBetween('receive_details.date', [$request->input('from'),$date]);;
                    }
                    if($request->input('from')&& $request->input('to') ) {
                        $wo->whereBetween('receive_details.date', [$request->input('from'),$request->input('to')]);
                    }

                    if($request->input('vendor_name')) {
                        $wo->where('receive.vendor_id', $request->input('vendor_name'));


                    }


                })
                    ->orderBy('invoice_no' )


                    ->get();


                return view('admin.report.receive', ['receive_details'=>$wo,'action'=>'advance']);

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
