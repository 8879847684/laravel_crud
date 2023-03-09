@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Vendor detail</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('vendors.index') }}" class="btn btn-primary">Vendor List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Vendor Name</th>
                            <th>Pan Number</th>
                            <th>GST  Number</th>
                            <th>Description</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($vendor->count() > 0)
                            <tr>
                                <td>{{ $vendor->vendor_name }}</td>
                                <td>{{ $vendor->pan_number }}</td>
                                <td>{{ $vendor->gst_number}}</td>
                                <td>{{ $vendor->description }}</td>
                                <td class="text-end">
                                    <form method="post" action="{{ route('vendors.destroy', $vendor->id) }}" class="form-inline">
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
                            <td colspan="3">No vendor detail found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection