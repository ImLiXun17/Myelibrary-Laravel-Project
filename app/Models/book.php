<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = 'book'; 
    protected $primaryKey = 'bid';
    protected $fillable = ['book_name', 'book_author', 'book_isbn', 'year_published','quantity'];
}
