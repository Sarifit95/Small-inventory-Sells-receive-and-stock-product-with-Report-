@extends('layouts.admin')
@section('content')

    <div class="container">

                @if($update==false && $insert==false)
                    <div class="card-header">

                        <div class="row">
                                    <div class="col-sm-2"> <a href="{{route('products.create')}}" class="btn btn-success">Add New</a>
                                    </div>
                            <div class="col-sm-8"> @if(session()->has('message'))
                                    <p class="text-center mb-0 font-weight-bold  alert-{{session('type')}}">
                                        {{session('message')}}
                                    </p>
                                @endif
                            </div>

                        </div>
                        <h3>Product List</h3>



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
                                        Name
                                    </th>
                                    <th>
                                        Qty
                                    </th>




                                    <th>
                                        P price
                                    </th>
                                    <th>s price</th>
                                    <th>description</th>


                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $num= 1; ?>
                                @foreach($products as $product)
                                    <tr data-entry-id="{{ $product->id }}">
                                        <td>
                                            {{ $num }}

                                        </td>


                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->purchase_price }}</td>

                                        <td>{{ $product->sales_price}}</td>


                                        <td>{{ $product->description }}</td>




                                        <td>


                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-info">Edit</a>






{{--                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">--}}
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

                    @elseif($insert==true || $update==true)

            <h3>@if($insert==true) Create Product @elseif($update==true)Edit Product @endif</h3>

                    <form class="form-horizontal"  action="@if($insert==true){{ route('products.store') }} @elseif($update==true) {{route('products.update', $product->id)}} @endif" method="POST" enctype="multipart/form-data">

                        @csrf
                        @if($update==true) @method('PUT')
                        @endif

                            <div class="form-group row">

                                <label class="control-label col-sm-2" for="name">Product Name*</label>


                                <div class="col-sm-4">
                                <input  type="text" id="name" name="name"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       value="{{$product->name ?? old('name') }}">
                                @if($errors->has('name'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                                </div>


                                <label class="control-label col-sm-2" for="quantity">quantity*</label>
                                <div class="col-sm-4">
                                    <input type="number" step="any" id="quantity" name="quantity"
                                           class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                           value="{{$product->quantity?? old('quantity')}}">

                                    @if($errors->has('quantity'))
                                        <em class="invalid-feedback" role="alert">
                                            {{ $errors->first('quantity') }}
                                        </em>
                                    @endif
                                </div>




                            </div>
                        <div class="form-group row">




                            <label class="control-label col-sm-2" for="purchase_price"> purchase price*</label>
                            <div class="col-sm-4">
                                <input type="number" step="any" id="purchase_price" name="purchase_price"
                                       class="form-control{{ $errors->has('purchase_price') ? ' is-invalid' : '' }}"
                                       value="{{$product->purchase_price?? old('purchase_price')}}">
                                @if($errors->has('purchase_price'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('purchase_price') }}
                                    </em>
                                @endif
                            </div>


                            <label class="control-label col-sm-2" for="sales_price">sales_price*</label>
                            <div class="col-sm-4">
                                <input type="number" step="any" id="sales_price" name="sales_price"
                                       class="form-control{{ $errors->has('sales_price') ? ' is-invalid' : '' }}"
                                       value="{{$product->sales_price?? old('sales_price')}}">

                                @if($errors->has('sales_price'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('sales_price') }}
                                    </em>
                                @endif
                            </div>




                        </div>

                        <div class="form-group row">


                            <label class="control-label col-sm-2" for="description">description*</label>
                            <div class="col-sm-4">
                                <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description">
                                    {{$product->description ??  old('description')}}</textarea>


                                @if($errors->has('description'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('description') }}
                                    </em>
                                @endif
                            </div>


                            <label class="control-label col-sm-2" for="image"> Image*</label>
                            <div class="col-sm-4">
                                <input type="file" id="image" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                                @if($errors->has('image'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('image') }}
                                    </em>
                                @endif




                                @if($update==true && !empty($product->image) && file_exists(public_path('../storage/app/public/images/products/'.$product->image)) )

                                    <img style="height: 200px; width: 200px;" src="{{asset('../storage/app/public/images/products/'.$product->image)}}">
                                @endif
                            </div>


                        </div>







{{--                        <div class="form-group row">--}}
{{--                            <label class="control-label col-sm-2" for="qty">Qty*</label>--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <input type="number" id="qty" name="qty"--}}
{{--                                       class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}"--}}
{{--                                       value="{{$product->qty??''}}">--}}

{{--                                @if($errors->has('qty'))--}}
{{--                                    <em class="invalid-feedback" role="alert">--}}
{{--                                        {{ $errors->first('qty') }}--}}
{{--                                    </em>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            --}}




{{--                        </div>--}}




                        <div class="form-group row">
                            <div class="offset-sm-2">
                                <a href="{{route('products.index')}}" class="btn btn-info">Reset</a>

                            @if($insert==true)
                                    <input class="btn  btn-success" type="submit" name="save" value="Save" >

                                @elseif($update==true)
                                    <input class="btn  btn-success" type="submit" name="save" value="Update" >

                                @endif

                            </div>

                        </div>



                    </form>








                @endif





    </div>


@section('scripts')
    @parent
    <script>
        $(function () {
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





