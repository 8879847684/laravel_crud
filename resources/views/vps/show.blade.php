@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Vendor Payment System(VPS) detail</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('vps.index') }}" class="btn btn-primary">VPS List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                         <tr>
                            <th>Vendor Name</th>
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
                        @if($vp->count() > 0)
                            <tr>
                                <td>{{ $vp->vendor->vendor_name }}</td>
                                    <td>{{ $vp->vendor->pan_number }}</td>
                                    <td>{{ $vp->vendor->gst_number }}</td>
                                    <td>{{ $vp->bill_number }}</td>
                                    <td>{{ $vp->bill_date }}</td>
                                    <td>{{ $vp->bill_amount }}</td>
                                    <td>{{ $vp->bill_name }}</td>

                                <td>
                                    <form method="post" action="{{ route('vps.destroy', $vp->id) }}" class="form-inline">
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
                            <td colspan="3">No VPS detail found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection