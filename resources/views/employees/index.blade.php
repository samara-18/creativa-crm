@extends('layouts.app')

@section('content')
<section class="content pt-3">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Employees</h1>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>

        <form method="GET" class="mb-3">
            <div class="row g-2 align-items-end">
                <div class="col-md-4">
                    <label for="company_id" class="form-label">Filter by Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        <option value="">All Companies</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-secondary">Filter</button>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body table-responsive p-0 mt-10">
                <table id="employees-table"  class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No employees found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                {{ $employees->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#employees-table').DataTable({
            pageLength: 10
        });
    });
</script>
@endpush
