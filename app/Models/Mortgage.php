<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    protected $fillable = ['title','rate','maximum_term','minimum_down_payment'];
    use HasFactory;
}
