@extends('vendor.layouts.main')
@push('title')
<title>Vendor Register</title>
@endpush

@section('content')
<section>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <img src="{{asset('dashboard/assets/img/vendor.jpg')}}" class="rounded-3 img-fluid">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        @session('msg')
                        <div class="alert alert-success">{{ session('msg') }}</div>
                        @endsession 
                        <div>
                            {{-- ✅ Signup Form --}}
                            <form action="{{ url('vendor/signup') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" placeholder="John Doe" value="{{ old('full_name') }}">
                                        @error("full_name")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone" placeholder="+91 " value="{{ old('phone') }}">
                                        @error("phone")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="john@gmail.com" value="{{ old('email') }}">
                                        @error("email")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="******">
                                        @error("password")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" placeholder="Enter your address" name="address" style="height: 100px">{{ old('address') }}</textarea>
                                        @error("address")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary text-light form-control form-control-lg">Signup</button>
                                    </div>

                                    <div class="text-center p-2">
                                        Have an account? <a href="{{ url('vendor/login') }}" class="text-decoration-none">Login</a>
                                    </div>
                                </div>
                            </form>
                            {{-- ✅ End Signup Form --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
