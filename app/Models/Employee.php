<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phoneno',
        'email',
        'position_id',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function employeedetail()
    {
        return $this->hasOne(Employeedetail::class);
    }
}
