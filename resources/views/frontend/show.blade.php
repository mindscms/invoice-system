@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>{{ __('Frontend/frontend.invoice', ['invoice_number' => $invoice->invoice_number]) }}</h2>
                    <a href="{{ route('invoice.index') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i> {{ __('Frontend/frontend.back_to_invoice') }}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>{{ __('Frontend/frontend.customer_name') }}</th>
                                <td>{{ $invoice->customer_name }}</td>
                                <th>{{ __('Frontend/frontend.customer_email') }}</th>
                                <td>{{ $invoice->customer_email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Frontend/frontend.customer_mobile') }}</th>
                                <td>{{ $invoice->customer_mobile }}</td>
                                <th>{{ __('Frontend/frontend.company_name') }}</th>
                                <td>{{ $invoice->company_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Frontend/frontend.invoice_number') }}</th>
                                <td>{{ $invoice->invoice_number }}</td>
                                <th>{{ __('Frontend/frontend.invoice_date') }}</th>
                                <td>{{ $invoice->invoice_date }}</td>
                            </tr>
                        </table>

                        <h3>{{ __('Frontend/frontend.invoice_details') }}</h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('Frontend/frontend.product_name') }}</th>
                                <th>{{ __('Frontend/frontend.unit') }}</th>
                                <th>{{ __('Frontend/frontend.quantity') }}</th>
                                <th>{{ __('Frontend/frontend.unit_price') }}</th>
                                <th>{{ __('Frontend/frontend.product_subtotal') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->unitText() }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.sub_total') }}</th>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.discount') }}</th>
                                <td>{{ $invoice->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.vat') }}</th>
                                <td>{{ $invoice->vat_value }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.shipping') }}</th>
                                <td>{{ $invoice->shippint }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.total_due') }}</th>
                                <td>{{ $invoice->total_due }}</td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('invoice.print', $invoice->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i> {{ __('Frontend/frontend.print') }}</a>
                            <a href="{{ route('invoice.pdf', $invoice->id) }}" class="btn btn-secondary btn-sm ml-auto"><i class="fa fa-file-pdf"></i> {{ __('Frontend/frontend.export_pdf') }}</a>
                            <a href="{{ route('invoice.send_to_email', $invoice->id) }}" class="btn btn-success btn-sm ml-auto"><i class="fa fa-envelope"></i> {{ __('Frontend/frontend.send_to_email') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
