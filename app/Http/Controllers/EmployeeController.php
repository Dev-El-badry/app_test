<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Session;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('manage.employees.index')->withEmployees($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_name'=> 'required|min:3',
            'code'=> 'required|min:5|max:5|unique:employees'
        ]);

        $employee = new Employee();
        $employee->employee_name = $request->employee_name;
        $employee->code = $request->code;

        $employee->save();

        
        return redirect()->route('employees.show', $employee->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('manage.employees.show')->withEmployee($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('manage.employees.edit')->withEmployee($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_name'=> 'required|min:3',
            'code'=> 'required|min:5|max:5|unique:employees,code,'.$id.',id'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->employee_name = $request->employee_name;
        $employee->code = $request->code;
        $employee->save();
        return redirect()->route('employees.show', $id);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
