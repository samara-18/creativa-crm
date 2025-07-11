@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Company Details</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @if ($company->logo)
                        <p><strong>Logo:</strong><br><img src="{{ asset('storage/' . $company->logo) }}" height="80"></p>
                    @endif
                    <p><strong>Name:</strong> {{ $company->name }}</p>
                    <p><strong>Email:</strong> {{ $company->email }}</p>
                    <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
