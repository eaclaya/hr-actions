<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeNumberRequest;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    public function validateEmployee(EmployeeNumberRequest $request){
        $employee = Employee::select('id', 'id_number', 'account_id')
                            ->where('id_number', $request->id_number)
                            ->first();
        request()->session()->put('employee', $employee);
        return redirect()->route('actions.index');
    }

    public function logoutEmployee(Request $request){
        request()->session()->forget('employee');
        return redirect('/');
    }

}
