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

                <a href="{{ route('vps.create') }}" class="btn btn-primary">Add VPS</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="120">Vendor Name</th>
                            <th>Pan Number</th>
                            <th>GST Number</th>
                            <th>Bill Number</th>
                            <th>Bill Date</th>
                            <th>Bill Amount</th>
                            <th>Bill Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($vps->count() > 0)
                            @foreach($vps as $key => $vp)
                                <tr>
                                	 <td>{{ $vps->firstItem() + $key }}</td>
                                	 <td>{{ $vp->vendor->vendor_name }}</td>
                                    <td>{{ $vp->vendor->pan_number }}</td>
                                    <td>{{ $vp->vendor->gst_number }}</td>
                                    <td>{{ $vp->bill_number }}</td>
                                    <td>{{ $vp->bill_date }}</td>
                                    <td>{{ $vp->bill_amount }}</td>
                                    <td>{{ $vp->bank_name }}</td>
                                    <td>{{ $vp->bill_name}}</td>
                                    <td>
                                        <form method="post" action="{{ route('vps.destroy', $vp->id) }}" class="form-inline">
                                            @csrf
                                            @method('delete')
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('vps.show', $vp->id) }}" class="btn btn-info btn-md">
                                                    View
                                                </a>
                                                <a href="{{ route('vps.edit', $vp->id) }}" class="btn btn-primary btn-md">
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
                {{ $vps->links() }}
            </div>
        </div>
    </div>
</main>
@endsection