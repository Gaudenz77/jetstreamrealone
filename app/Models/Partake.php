<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partake extends Model
{
    use HasFactory;

    protected $table = 'gifts'; // Specify the table name

    protected $fillable = [
        'user_id',
        'title',
        'lead',
        'content',
        'tags',
    ];
}