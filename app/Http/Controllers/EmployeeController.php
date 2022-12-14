<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Employeedetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::withTrashed()->orderBy('id','desc')->get();
        return view('backend.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('backend.employee.createform',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|min:5',
            'phoneno' => 'required|min:7|max:11',
            'profile' => 'required|mimes:jpg,bmp,png',
            'address' => 'required',
            'email' => 'required|unique:employees,email',
            'nrc' => 'required|unique:employeedetails,nrc',
            'salary' => 'required',
            'position' => 'required',
        ]);

        // file upload
        
        DB::transaction(function () use($request) {
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phoneno = $request->phoneno;
            $employee->position_id = $request->position;
            $employee->save();

            $employeeDetail = new Employeedetail;
            $employeeDetail->address = $request->address;
            $employeeDetail->nrc = $request->nrc;
            $employeeDetail->salary = $request->salary;
            $employeeDetail->employee_id = $employee->id;
            $employeeDetail->save();
        });

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('backend.employee.detail',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
