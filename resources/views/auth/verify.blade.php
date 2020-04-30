@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">
                            <h2 class="text-warning">Notice <span class="fa fa-exclamation"></span></h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Your email is needs to verified. Please check your email and click on the link to continue.
                            </p>
                            <div class="card-footer">
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link  p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
