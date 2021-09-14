@extends('layouts.admin')
@section('content')

    <div class="container">


                @if($update==false && $insert==false)
                    <div class="card-header">

                        <div class="row">
                                    <div class="col-sm-2"> <a href="{{route('customers.create')}}" class="btn btn-success">Add New</a>
                                    </div>
                            <div class="col-sm-8"> @if(session()->has('message'))
                                    <p class="text-center mb-0 font-weight-bold  alert-{{session('type')}}">
                                        {{session('message')}}
                                    </p>
                                @endif
                            </div>

                        </div>
                        <h3>Customer List</h3>



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
                                    </th>   <th>
                                        phone number
                                    </th>
                                    <th>
                                        Address
                                    </th>




                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $num= 1; ?>
                                @foreach($customers as $customer)
                                    <tr data-entry-id="{{ $customer->id }}">
                                        <td>
                                            {{ $num }}

                                        </td>


                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>{{ $customer->address }}</td>





                                        <td>


                                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-xs btn-info">Edit</a>






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

                    @elseif($insert==true || $update==true)

            <h3>@if($insert==true) Create Customer @elseif($update==true)Edit Customer @endif</h3>

                    <form class="form-horizontal"  action="@if($insert==true){{ route('customers.store') }} @elseif($update==true) {{route('customers.update', $customer->id)}} @endif" method="POST" enctype="multipart/form-data">

                        @csrf
                        @if($update==true) @method('PUT')
                        @endif

                            <div class="form-group row">

                                <label class="control-label col-sm-2" for="name">Customer Name*</label>


                                <div class="col-sm-4">
                                <input  type="text" id="name" name="name"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       value="{{$customer->name ?? old('name') }}">
                                @if($errors->has('name'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                                </div>


                                <label class="control-label col-sm-2" for="phone_number" >phone_number*</label>
                                <div class="col-sm-4">
                                    <input type="number" step="any" id="phone_number" name="phone_number"
                                           class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                           value="{{$customer->phone_number?? old('phone_number')}}">

                                    @if($errors->has('phone_number'))
                                        <em class="invalid-feedback" role="alert">
                                            {{ $errors->first('phone_number') }}
                                        </em>
                                    @endif
                                </div>




                            </div>


                        <div class="form-group row">


                            <label class="control-label col-sm-2" for="address">address</label>
                            <div class="col-sm-4">
                                <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address">
                                    {{$customer->address ??  old('address')}}</textarea>


                                @if($errors->has('address'))
                                    <em class="invalid-feedback" role="alert">
                                        {{ $errors->first('address') }}
                                    </em>
                                @endif
                            </div>





                        </div>







{{--                        <div class="form-group row">--}}
{{--                            <label class="control-label col-sm-2" for="qty">Qty*</label>--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <input type="number" id="qty" name="qty"--}}
{{--                                       class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}"--}}
{{--                                       value="{{$customer->qty??''}}">--}}

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
                                <a href="{{route('customers.index')}}" class="btn btn-info">Reset</a>

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





