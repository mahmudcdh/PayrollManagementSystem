<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'code', 'details', 'days','remarks'
    ];

    public function leaveRequests(){
        return $this->hasMany(LeaveRequest::class);
    }

    public function leaveBalances(){
        return $this->hasMany(LeaveBalance::class);
    }

}
