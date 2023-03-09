@extends('layouts.master')
@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Sign in to your account to continue</h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{ asset('public/images/avatar.jpg') }}" alt="Avatar" class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <form method="post" action="{{ route('login.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                        @error('email')
                                            <div class="small text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                        @error('password')
                                            <div class="small text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="remember" checked>
                                            <span class="form-check-label">
                                                Remember me next time
                                            </span>
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex align-content-center flex-wrap">
                                            <div class="flex-grow-1 bd-highlight">
                                                <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                        @if(session()->has('error'))
                                            <div class="shadow-lg p-3 mt-2 bg-body rounded">
                                                <div class="text-danger">
                                                    {{ session()->get('error') }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection