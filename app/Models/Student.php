<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student'; 
    protected $primaryKey = 'sid';
    protected $fillable = ['sid','student_name', 'corporate_email', 'college_id', 'address','date_add'];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
}
