<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActionRequest;
use App\Http\Resources\ActionCategoryResource;
use App\Http\Resources\ActionEmployeeResource;
use App\Http\Resources\EmployeeResource;
use App\Models\HRActionCategory;
use App\Models\HRActionEmployee;
use App\Models\HRActionEmployeeSelectedItem;
use App\Events\ActionCreated;

class HRActionController extends Controller
{
    public function index(){
        $employee = request()->session()->get('employee');
        return inertia('Actions/Index', [
            'employee' => new EmployeeResource($employee),
            'hractions' => ActionEmployeeResource::collection(HRActionEmployee::where('employee_id', $employee->id)->orderBy('id', 'desc')->get())
        ]);
    }

    public function create(){
        $employee = request()->session()->get('employee');
        return inertia('Actions/Create', [
            'employee' => new EmployeeResource($employee),
            'categories' => ActionCategoryResource::collection(HRActionCategory::all())
        ]);
    }

    public function edit($id){
        $actionEmployee = HRActionEmployee::with('items')->find($id);
        return inertia('Actions/Edit', [
            'employee' => new EmployeeResource($actionEmployee->employee),
            'action' => new ActionEmployeeResource($actionEmployee),
            'categories' => ActionCategoryResource::collection(HRActionCategory::all())
        ]);
    }

    public function store(StoreActionRequest $request){
        $validated = $request->validated();
        $employee = request()->session()->get('employee');
        $validated['account_id'] = isset($employee) ? $employee->account_id : 1;
        $action = HRActionEmployee::create($validated);
        if($request->file('images')){
            $files = [];
            foreach($request->file('images') as $image){
                $publicName = public_path('uploads/actions');
                $fileName = $action->id . '-' . $image->getClientOriginalName();
                $image->move($publicName, $fileName);
                $files[] = url('uploads/actions/' . $fileName); 
            }
            $action->images = implode(',', $files);
            $action->save();
        }
        foreach($request->selectedTypes as $key => $selectedType){
            if(isset($selectedType['selected'])){
                
                HRActionEmployeeSelectedItem::create([
                    'employee_id' => $action->employee_id,
                    'account_id' => $action->account_id,
                    'action_id' => $action->id,
                    'description' => isset($selectedType['comments']) ? $selectedType['comments'] : '',
                    'action_type_id' => $key,
                ]);
            }
        }
        ActionCreated::dispatch($action);
        return redirect()->route('actions.index');
    }
}
