<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$employees = Employee::with('company')->paginate(10);
        $query = Employee::with('company');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        $employees = $query->paginate(10);

        $companies = Company::all(); // optional: for dropdown filter

        return view('employees.index', compact('employees', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load('company');
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');

    }
}
