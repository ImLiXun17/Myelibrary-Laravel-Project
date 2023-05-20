<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrow';
    protected $primaryKey = 'borrow_id';
    protected $fillable = ['student_id', 'coll_id', 'book_isbn', 'time_borrow', 'time_return', 'fines', 'action'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'sid');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'coll_id', 'id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_isbn', 'book_isbn');
    }
}