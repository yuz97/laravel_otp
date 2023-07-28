@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Email Verifcation OTP</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verification') }}" novalidate>
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">OTP</label>

                                <div class="col-md-6">
                                    <input id="otp" type="text" class="form-control" name="otp"
                                        value="{{ old('otp') }}" required autofocus>

                                    @error('otp')
                                        <span>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Verfication
                                    </button>
                                    <a href="javascript:void(0)" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" class="mx-2 text-decoration-none">Resend OTP</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- modal resend otp  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resend OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="masukkan email anda">
                        <small class="text-muted">we'll never share youre email with anyone else.</small>
                    </div>
                    <button type="button" class="btn btn-primary float-end">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
