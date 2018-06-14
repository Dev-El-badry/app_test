<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Employee;
use DB;
use Session;
class ReportControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show($id) {
        $report = Report::where('employee_id', $id)->get();
        return view('manage.reports.show')->withReport($report);
    }

    public function login_by_code(Request $request) {
        $this->validate($request, [
            'code' => 'required|min:5|max:5',
            'submit'=>'required'
        ]);
        

        $dataEmp = Employee::where('code', $request->code)->first(); //to get employee id

        if(empty($dataEmp)) {
            Session::flash('status', 'this is code not there in database, please check and try again');
            return redirect()->route('home');
        }        
        else {
           //datae employee not empty
          
            if($request->submit == 'Logout') {
                $res = $this->check_if_emp_is_login($request->code);
                if($res == TRUE) {
                    $report_id = $this->get_id_by_employee_id($dataEmp->id);
                    $report = Report::findOrFail($report_id);

                } else {
                    $report = new Report();
                }
            } else {
                $report = new Report();
            }
 
            $report->employee_id = $dataEmp->id;
           if ($request->submit == 'Login') {
                $report->login_time = time();
           } elseif ($request->submit == 'Logout') {
                $report->logout_time = time();
           }

           $report->save();
           Session::flash('status', 'thank you');
           return redirect()->route('home');
        }

       
       
    }

    private function get_employee_name_by_code($code) {
        if(!empty($code)) {
            $employee = Employee::where('code', $code);
            $emp_id = $employee->id;

            return $emp_id;
        }
    }

    private function check_if_emp_is_login($code) {
        $employee = Employee::where('code', $code)->first();
        $employee_id = $employee->id;

        if(is_numeric($employee_id)) {

            $report = Report::where('employee_id', $employee_id)->first();

            if(!empty($report->login_time)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    private function get_id_by_employee_id($emp_id) {
        if(is_numeric($emp_id)) {
            $report = Report::where('employee_id', $emp_id)->orderBy('id','desc')->first();
            $report_id = $report->id;
            return $report_id;
        }
    }
}
