@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-3 ">
                        {{ __('messages.welcome') }}
                    </h3>
                    <p class="card-text lead">
                        {{ __('messages.intro') }}
                    </p>
                </div>
            </div>

            <div class="text-right mt-3">
                <small class="text-muted">
                    {{ __("You're logged in!") }}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
