
@extends('layouts.master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-1">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>VPS Vendor Payment System</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('vps.index') }}" class="btn btn-primary">VPS List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <form method="post" action="{{ route('payments.update', $pay->id) }}">
                           @csrf
                    @method('PATCH')
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="vendorName">Select Vendor</label>
                                <select id="vendorName" name="vendor_id" class="form-control">
                                    <option value="" selected="">Choose vendor</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ ((old('vendor_id') == $vendor->id) || ($vendor->id == $pay->vendor->id)) ? 'selected': '' }}>{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_id')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="bank_name">Bank Name</label>
                                <input type="text" name="bank_name" value="{{ old('bank_name') ? old('bank_name') : $pay->bank_name }}" class="form-control" id="billNumber" placeholder="Bill number">
                                @error('bank_name')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="payment_date">Payment Date</label>
                                <input type="text" name="payment_date" value="{{ old('payment_date') ? old('payment_date') : $pay->payment_date}}" class="form-control" id="billDate" placeholder="Payment Date">
                                @error('payment_date')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="Amount">Amount</label>
                                <input type="number" step="any" name="amount" value="{{ old('amount') ? old('amount') : $pay->amount}}" class="form-control" id="Amount" placeholder="Amount">
                                @error('amount')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           
                        <div class="row">
                          <div class="mb-3 col-md-3">  
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                    </form>
            </div>
        </div>
    </div>
</main>
@endsection