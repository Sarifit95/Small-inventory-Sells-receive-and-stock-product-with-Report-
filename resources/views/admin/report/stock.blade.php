@extends('layouts.admin')
@section('content')



























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
            <h3>Stock Reports </h3>

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
                           Product Name
                        </th>
                        <th>
                        Receive Qty
                        </th>
                        <th>
                          Sells Qty
                        </th>
    <th>
                           Receive Price
                        </th>
                        <th>
                            Sells Price
                        </th> <th>
                            Stock Qty
                        </th> <th>
                            Stock Price
                        </th>





                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $num= 1; ?>
                    @foreach($stocks as $stock)
                        <tr data-entry-id="{{ $stock->id }}">
                            <td>
                                {{ $num }}

                            </td>


                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->r_qty  }}</td>
                            <td>{{ $stock->s_qty  }}</td>


                            <td>{{ $stock->r_total_price }}</td>
                            <td>{{ $stock->s_total_price }}</td>
                            <td>{{ $stock->r_qty - $stock->s_qty }}</td>
                            <td>{{ $stock->r_total_price - $stock->s_total_price }}</td>





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





