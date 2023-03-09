@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Add New Vendor</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('vendors.index') }}" class="btn btn-primary">Vendor List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('vendors.store') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="vendorName">Vendor name</label>
                            <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" class="form-control" id="vendorName" placeholder="Vendor name">
                            @error('vendor_name')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                         <div class="mb-3 col-md-4">
                            <label class="form-label" for="pan_number">Pan Number</label>
                            <input type="text" name="pan_number" value="{{ old('pan_number') }}" class="form-control" id="pan_number" placeholder="Pan Number">
                            @error('pan_number')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                         <div class="mb-3 col-md-4">
                            <label class="form-label" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" value="{{ old('gst_number') }}" class="form-control" id="gst_number" placeholder="GST Number">
                            @error('gst_number')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                        <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Description" rows="2">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection