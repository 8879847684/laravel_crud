@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Vendor Payment System(VPS) detail</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('payments.index') }}" class="btn btn-primary">Payment List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                         <tr>
                           <th width="120">Vendor Name</th>
                            <th>Bank Name</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            <th>Actions</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @if($pay->count() > 0)
                            <tr>
                                <td>{{ $pay->vendor->vendor_name }}</td>
                                    <td>{{ $pay->bank_name }}</td>
                                    <td>{{ $pay->payment_date }}</td>
                                    <td>{{ $pay->amount }}</td>
                                <td>
                                    <form method="post" action="{{ route('payments.destroy', $pay->id) }}" class="form-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-md">
                                            Delete
                                        </button>
                                </form>
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td colspan="3">No Payment detail found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection