<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeNumberRequest;
use App\Http\Resources\ActionEmployeeResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\HRActionEmployee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    public function validateEmployee(EmployeeNumberRequest $request){
        $employee = Employee::where('id_number', $request->id_number)->first();
        request()->session()->put('employee', $employee);
        return redirect()->route('actions.index');
    }

    public function logoutEmployee(Request $request){
        request()->session()->forget('employee');
        return redirect('/');
    }

}
