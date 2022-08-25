<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HRActionEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_date',
        'to_date',
        'employee_id',
        'account_id',
        'comments',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function items(){
        return $this->hasMany(HRActionEmployeeSelectedItem::class, 'action_id', 'id');
    }
}
