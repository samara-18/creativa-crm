@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Edit Company</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Company Details</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $company->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Company Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $company->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" class="form-control @error('website') is-invalid @enderror"
                               value="{{ old('website', $company->website) }}" placeholder="https://example.com">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo (min 100x100)</label><br>
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" width="100" class="mb-2" alt="Logo">
                        @endif
                        <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror">
                        @error('logo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Company</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
