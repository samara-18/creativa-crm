@extends('layouts.app')

@section('content')
<section class="content pt-3">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Employee Details</h1>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                <p><strong>Company:</strong> {{ $employee->company->name ?? '-' }}</p>
            </div>
        </div>

    </div>
</section>
@endsection
