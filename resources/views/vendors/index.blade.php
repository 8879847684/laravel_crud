@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Vendor(s) List</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('vendors.create') }}" class="btn btn-primary">Add Vendor</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                           <th>Vendor Name</th>
                            <th>Pan Number</th>
                            <th>GST  Number</th>
                            <th>Description</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($vendors->count() > 0)
                            @foreach($vendors as $key => $vendor)
                                <tr>
                                    <td>{{ $vendors->firstItem() + $key }}</td>
                                    <td>{{ $vendor->vendor_name }}</td>
                                     <td>{{ $vendor->pan_number }}</td>
                                     <td>{{ $vendor->gst_number}}</td>
                                    <td>{{ $vendor->description }}</td>
                                    <td>
                                        <form method="post" action="{{ route('vendors.destroy', $vendor->id) }}" class="form-inline">
                                            @csrf
                                            @method('delete')
                                            <div class="d-flex gap-1 justify-content-end">
                                                <a href="{{ route('vendors.show', $vendor->id) }}" class="btn btn-info btn-md">
                                                    View
                                                </a>
                                                <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-primary btn-md">
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
                                <td colspan="4">No Vendor(s) Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $vendors->links() }}
            </div>
        </div>
    </div>
</main>
@endsection