@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Add Vendor Payment System (VPS)</strong></h3>
            </div>
            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('vps.index') }}" class="btn btn-primary">VPS List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if($vendors->count())
                    <form method="post" action="{{ route('vps.store') }}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="vendorName">Select Vendor</label>
                                <select id="vendorName" name="vendor_id" class="form-control">
                                    <option value="" selected="">Choose vendor</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ (old('vendor_id') == $vendor->id) ? 'selected': '' }}>{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_id')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="billNumber">Bill number</label>
                                <input type="text" name="bill_number" value="{{ old('bill_number') }}" class="form-control" id="billNumber" placeholder="Bill number">
                                @error('bill_number')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="billDate">Bill date</label>
                                <input type="text" name="bill_date" value="{{ old('bill_date') }}" class="form-control flatpickr" id="billDate" placeholder="Bill date">
                                @error('bill_date')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="billAmount">Bill amount</label>
                                <input type="number" step="any" name="bill_amount" value="{{ old('bill_amount') }}" class="form-control" id="billAmount" placeholder="Bill amount">
                                @error('bill_amount')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-4">
                                <label class="form-label" for="fileName">Browse File</label>
                                <input type="file" name="file_name" value="{{ old('file_name') }}" class="form-control" id="filename" placeholder="File Name">
                                @error('file_name')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-3">  
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                    </form>
                @else
                    <div class="text-center p-5">
                        <h1>No Vendor Found!</h1>
                        <p><a href="{{ route('vendors.create') }}" class="btn btn-primary">Create new vendor</a></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection