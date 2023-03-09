@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Vendor Payment System(VPS)</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
               <a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payments</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="120">Vendor Name</th>
                            <th>Bank Name</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($payment->count() > 0)
                            @foreach($payment as $key => $pay)
                                <tr>
                                     <td>{{ $payment->firstItem() + $key }}</td>
                                     <td>{{ $pay->vendor->vendor_name }}</td>
                                    <td>{{ $pay->bank_name }}</td>
                                    <td>{{ $pay->payment_date }}</td>
                                    <td>{{ $pay->amount }}</td>
                                 <td>
                                        <form method="post" action="{{ route('payments.destroy', $pay->id) }}" class="form-inline">
                                            @csrf
                                            @method('delete')
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('payments.show', $pay->id) }}" class="btn btn-info btn-md">
                                                    View
                                                </a>
                                                <a href="{{ route('payments.edit', $pay->id) }}" class="btn btn-primary btn-md">
                                                    Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-md">
                                                    Delete
                                                </button>
                                            </div>
                                            
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">No VPS Vendor(s) Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $payment->links() }}
            </div>
        </div>
    </div>
</main>
@endsection