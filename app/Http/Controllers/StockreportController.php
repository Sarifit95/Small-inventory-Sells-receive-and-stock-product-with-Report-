<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database;

class StockreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $vendors = Customer::get();
//        DB::enableQueryLog();


        $stock = DB::table('products as p')
            ->leftjoin('receive_details as r', 'p.id','=','r.product_id')
            ->select( DB::raw('p.id,p.name, sum(r.total_price) as r_total_price, sum(r.qty) as r_qty,
             (select sum(a.total_price) from sells_details as a where p.id=a.product_id) as s_total_price,
             (select sum(b.qty) from sells_details as b where p.id=b.product_id) as s_qty') )

            ->groupBy('p.id' )
            ->orderBy('p.id' )


            ->get();

//                dd(DB::getQueryLog());


        return view("admin.report.stock", ['stocks' => $stock]);
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
    public function store(Request $request)
    {
        //
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
