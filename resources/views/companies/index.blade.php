@extends('layouts.app')

@section('content')
<section class="content pt-3">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Companies</h1>
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
        </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table id="companies-table" class="table table-bordered table-striped table-hover mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                            <tr>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" height="40">
                                    @endif
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    @if ($company->website)
                                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('companies.show', $company) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No companies found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                {{ $companies->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#companies-table').DataTable({
            pageLength: 10
        });
    });
</script>
@endpush
