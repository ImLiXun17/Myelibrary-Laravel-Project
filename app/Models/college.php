<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    protected $table = 'college'; 
    protected $fillable = ['id','college_name'];

    public function students()
{
    return $this->hasMany(Student::class, 'college_id', 'id');
}
}
