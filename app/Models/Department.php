<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'faculty_id'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function university()
    {
        return $this->faculty->university();
    }
}
