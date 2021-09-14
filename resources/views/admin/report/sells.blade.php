@extends('layouts.admin')
@section('content')


    @if($action=='index')
















        <div class="card-header">


            <h3>Sells Report</h3>



        </div>

        <div class="card-body">


            <form action="{{route('sellsreport.store')}}" method="post">
                @csrf

                <div   class="container"   >
                    <div class="w-25 float-left " style="padding-top: 5%; padding-left: 7%; " >
                        <h4>Select Report</h4>

                        <div class="radio">
                            <label><input type="radio" name="report" value="report" >Sells Report</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio"  name="report" value="advance_report" checked>Advance Sells Report</label>
                        </div>

                    </div>


                    <div class=" float-right " style="padding: 3% 3%  5%; width: 65%">




                        <div class="form-group row">
                            <label for="from" class="col-sm-3 col-form-label">From</label>
                            <div class="col-sm-8">
                                <input type="text"  name="from" class="form-control date" id="from" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="to" class="col-sm-3 col-form-label">To</label>
                            <div class="col-sm-8">
                                <input type="text" name="to" class="form-control date" id="to" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-3 col-form-label">Customer Name</label>
                            <div  class="col-sm-8">
                                <select  class="form-control" name="customer_name" id="customer_name">
                                    <option disabled  selected value="">---Select Customer Name----</option>

                                    @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}" >{{$vendor->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>


                        <div class="form-group row">

                            <input type="submit" formtarget="_blank" class="col-sm-3 btn btn-primary" value="Report">



                        </div>



                    </div>

                </div>
            </form>

        </div>











    @elseif($action=='report')


        <div class="card-header">

            <div class="row">
                <div class="col-sm-2">
                    {{--                    <a href="{{route('receive.voucher', $receive->invoice_no)}}" class="btn btn-success">Print</a>--}}
                </div>
                <div class="col-sm-8"> @if(session()->has('message'))
                        <p class="text-center mb-0 font-weight-bold  alert-{{session('type')}}">
                            {{session('message')}}
                        </p>
                    @endif
                </div>

            </div>
            <h3>Receive Reports </h3>

            {{--            <p><strong>invoice number: {{ $receive->invoice_no }}</strong></p>--}}
            {{--            <p><strong>Vendor Name: {{ $receive->vendor->name }}</strong></p>--}}
            {{--            <p><strong>phone number: {{ $receive->vendor->phone_number }}</strong></p>--}}



        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">
                            SL.No
                        </th>

                        <th>
                            Date
                        </th>
                        <th>
                            invoice_no
                        </th>
                        <th>
                            Customer Name
                        </th>

                        <th>
                            Total Price
                        </th>





                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $num= 1; ?>
                    @foreach($receives as $receive)
                        <tr data-entry-id="{{ $receive->id }}">
                            <td>
                                {{ $num }}

                            </td>


                            <td>{{ $receive->date }}</td>
                            <td>{{ $receive->invoice_no }}</td>
                            <td>{{ $receive->customers->name }}</td>

                            <td>{{ $receive->total_price }}</td>





                            <td>


                                {{--                            <a href="{{ route('sells.show', $sell->invoice_no) }}" class="btn btn-xs btn-info">Details sells</a>--}}






                                {{--                                            <form action="{{ route('products.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">--}}
                                {{--                                                <input type="hidden" name="_method" value="DELETE">--}}
                                {{--                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                {{--                                                <input type="submit" class="btn btn-xs btn-danger" name='delete' value="Delete">--}}
                                {{--                                            </form>--}}


                            </td>

                        </tr>
                        <?php $num++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>






    @elseif($action=='advance')

        <div class="card-header">

            <div class="row">
                <div class="col-sm-2">
                    {{--                    <a href="{{route('receive.voucher', $receive->invoice_no)}}" class="btn btn-success">Print</a>--}}
                </div>
                <div class="col-sm-8"> @if(session()->has('message'))
                        <p class="text-center mb-0 font-weight-bold  alert-{{session('type')}}">
                            {{session('message')}}
                        </p>
                    @endif
                </div>

            </div>
            <h3>Advance Sells Report </h3>

            {{--            <p><strong>invoice number: {{ $receive->invoice_no }}</strong></p>--}}
            {{--            <p><strong>Vendor Name: {{ $receive->vendor->name }}</strong></p>--}}
            {{--            <p><strong>phone number: {{ $receive->vendor->phone_number }}</strong></p>--}}



        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">
                            SL.No
                        </th>

                        <th>
                            Date
                        </th>
                        <th>
                            invoice_no
                        </th>
                        <th>
                            Customer Name
                        </th> <th>
                            Product Name
                        </th>

                        <th>
                            Price
                        </th>
                        <th>
                            Qty
                        </th>
                        <th>
                            Total Price
                        </th>





                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $num= 1; ?>
                    @foreach($receive_details as $receive)
                        <tr data-entry-id="{{ $receive->id }}">
                            <td>
                                {{ $num }}

                            </td>


                            <td>{{ $receive->date }}</td>
                            <td>{{ $receive->invoice_no }}</td>
                            <td>{{ $receive->name }}</td>
                            <td>{{ $receive->pname }}</td>
                            <td>{{ $receive->price }}</td>
                            <td>{{ $receive->qty }}</td>
                            <td>{{ $receive->total_price }}</td>





                            <td>


                                {{--                            <a href="{{ route('sells.show', $sell->invoice_no) }}" class="btn btn-xs btn-info">Details sells</a>--}}






                                {{--                                            <form action="{{ route('products.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">--}}
                                {{--                                                <input type="hidden" name="_method" value="DELETE">--}}
                                {{--                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                {{--                                                <input type="submit" class="btn btn-xs btn-danger" name='delete' value="Delete">--}}
                                {{--                                            </form>--}}


                            </td>

                        </tr>
                        <?php $num++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @elseif($action=='voucher')
        <style type="text/css">
            td, td, th{
                font:bold 11px "Trebuchet MS" ,Tahoma ; color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none

            }
            th{
                border: 1px solid;

            }
            .br-r{
                border-right: 1px solid;
            }
            .heig{
                height: 30px;
            !important;
            }
            @media print {
                /*.print, .main-footer{*/
                /*    display:none;*/
                /*}   */
                .print{
                    display:none;
                }
                /*@page { margin: 0 0 10 0; }*/
                /*body { margin: 1.6cm; }*/


            }

            <!--

        </style>
        <div style="background-color: white;  padding-bottom: 100px " class=" w-100;">
            <p class="btn btn-info print" style="margin-left: 40%; width: 100px;" onclick="print()">Print</p>
            <h3 style="padding-top: 10%; padding-left: 30%; text-align: center; "><u>Bill_________________</u></h3>

            <div style="margin-top:30px; padding-left: 10px">
                <table style=" width: 50%;  float: left">
                    <tr style=" text-align: center">
                        <td >Name   :</td>
                        <td>{{$receive->vendor->name}}</td>
                    </tr>
                    <tr style="text-align: center">
                        <td >Address:</td>
                        <td>{{$receive->vendor->address}}</td>
                    </tr>

                </table>
                <table style=" width: 49%">
                    <tr style="text-align: center">
                        <td style="">VP NO  :</td>
                        <td>{{ $receive->invoice_no }}</td>
                    </tr>
                    <tr style="text-align: center">
                        <td style="">Date    :</td>
                        <td>{{ $receive->date }}</td>
                    </tr>
                </table>

            </div>
            <div style="margin-top: 60px; padding: 0 10px; ">
                <table class="" style="border: 1px solid; width: 100%; height: 50%; ">

                    <tr style="text-align: center" class="heig">
                        <th>SL#</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th> Price</th>

                        <th> Total Price In TK</th>
                    </tr>


                    <?php $sl=1; $sum=0;?>
                    @foreach($receive->revicedetails as $receive_item)
                        <tr style="text-align: center;" class="heig">
                            <td class="br-r">{{$sl}}</td>
                            <td class="br-r">{{ $receive_item->product->name}}</td>

                            <td class="br-r">{{ $receive_item->qty}}</td>
                            <td class="br-r">{{ $receive_item->price}}</td>
                            <td class="br-r">{{ $receive_item->total_price}}</td>

                        </tr>

                        <?php  $sl++; ?>

                    @endforeach
                    <tr >
                        <td class="br-r"></td>
                        <td class="br-r"></td>
                        <td class="br-r"></td>
                        <td class="br-r"></td>

                        <td class="br-r"></td>

                    </tr>

                    <tr style="border: 1px solid" class="heig">
                        <td colspan="4" class="br-r heig">Total</td>
                        <td style="text-align: center">{{number_format($receive->total_price,2)?? 0}}Tk</td>
                    </tr>


                </table>


            </div>

            <div style="position: absolute; bottom: 50px; left: 25%;">
                <h6 style="opacity: 0.9">Customer's Signature
                    with seal</h6>

            </div>
            <div style="position: absolute; bottom: 50px; right: 50px;">
                <h3 style="opacity: 0.5">Eicra Soft Limited</h3>

            </div>





        </div>

    @endif



@section('scripts')
    @parent
    <script>
        $(function () {
            @if($action=='create')

            $(document).on("keyup mouseup", ".qty", function(arg){

                var id=$(this).attr('id');

                var number=id.split('qty')[1];
                if( $('#name'+number).val()==null ) {
                    alert("Select Product");


                }
                else {
                    var qty=$('#qty'+number).val();
                    var price=$('#price'+number).val();
                    if(qty=='' || isNaN(qty)  ||  price=='' || isNaN(price) ){
                        $('#total_price'+number).val(0);

                    }
                    else {
                        var total=Number(price) * Number(qty);
                        $('#total_price'+number).val(parseFloat(total).toFixed(2));

                    }

                }





            });


            $(document).on("keyup mouseup", ".price", function(arg){

                var id=$(this).attr('id');

                var number=id.split('price')[1];
                if( $('#name'+number).val()==null ) {
                    alert("Select Product");


                }
                else {
                    var qty=$('#qty'+number).val();
                    var price=$('#price'+number).val();
                    if(qty=='' || isNaN(qty)  ||  price=='' || isNaN(price) ){
                        $('#total_price'+number).val(0);

                    }
                    else {
                        var total=Number(price) * Number(qty);
                        $('#total_price'+number).val(parseFloat(total).toFixed(2));

                    }

                }





            });

            $(document).ready(function(){
                $('.name').select2();

                $('.name').change(function(){
                    var id=$(this).attr('id');
                    var id=id.split('name')[1];


                    var selectproduct = $(this).children("option:selected").val();

                    $.ajax({
                        url: "{{ route('receive.getproduct') }}",
                        type: "POST",
                        data: {
                            id: selectproduct,
                            "_token": "{{ csrf_token() }}",
                        },


                        success: function (data) {

                            var stock =(data.stock);

                            var price =(data.price);
                            var quantity =(data.quantity);
                            $('#stock'+id).val(stock);
                            $('#qty'+id).val(1);
                            var oneprice=parseFloat(price/quantity).toFixed(2);

                            $('#price'+id).val(oneprice);
                            var total_pr=1*Number(oneprice);
                            $('#total_price'+id).val(total_pr);






                        },
                        error: function(error)
                        {
                            alert('failed');
                            console.log(error);
                        }
                    });




                });


                var i = 0;
                $('#add_new').click(function(){

                    ++i;
                    $('#mainbody').append('<tr><td>' +
                        ' <select class="name form-control " id="name'+i+'" name="addmore['+i+'][name]" style="" required>'+
                        ' <option selected disabled value="">Select Product</option>'+
                        '@foreach($products as $product)'+
                        '<option value="{{ $product->id }}">{{ $product->name}} </option>'+
                        ' @endforeach'+
                        '</select></td>' +
                        '</td>' +
                        '<td><input readonly class="stock col-sm col-form-label" type="number" step="any" name="addmore['+i+'][stock]" id="stock'+i+'" required ></td>' +
                        '<td><input class="qty col-sm col-form-label" type="number" step="any"  name="addmore['+i+'][qty]" id="qty'+i+'" value="" required></td>' +
                        '<td><input class="price col-sm col-form-label" type="number" step="any" name="addmore['+i+'][price]" id="price'+i+'" value="" required></td>' +
                        '<td><input class="total_price col-sm col-form-label" type="number" step="any" name="addmore['+i+'][total_price]" id="total_price'+i+'" value="" required></td>' +
                        '<td><button type="button" name="remove" id="remove" value="remove" class="btn btn-sm btn-danger">-</button></td></tr>');

                    $('#name'+i).select2();

                    $('.name').change(function(){
                        var id=$(this).attr('id');
                        var id=id.split('name')[1];


                        var selectproduct = $(this).children("option:selected").val();

                        $.ajax({
                            url: "{{ route('receive.getproduct') }}",
                            type: "POST",
                            data: {
                                id: selectproduct,
                                "_token": "{{ csrf_token() }}",
                            },


                            success: function (data) {

                                var stock =(data.stock);

                                var price =(data.price);
                                var quantity =(data.quantity);
                                $('#stock'+id).val(stock);
                                $('#qty'+id).val(1);
                                var oneprice=parseFloat(price/quantity).toFixed(2);

                                $('#price'+id).val(oneprice);
                                var total_pr=1*Number(oneprice);
                                $('#total_price'+id).val(total_pr);




                            },
                            error: function(error)
                            {
                                alert('failed');
                                console.log(error);
                            }
                        });




                    });


                    $('#mainbody').on('click', '#remove', function(){
                        $(this).closest('tr').remove();
                    });

                });







            });


            @endif
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                {{--url: "{{ route('admin.permissions.massDestroy') }}",--}}
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('permission_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({buttons: dtButtons})
        })


        // for data insert azax submit


    </script>
@endsection

@endsection





