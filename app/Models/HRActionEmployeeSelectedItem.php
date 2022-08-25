<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HRActionEmployeeSelectedItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'account_id',
        'description',
        'action_type_id',
        'action_id',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function type(){
        return $this->belongsTo(HRActionType::class, 'action_type_id', 'id');
    }
}
