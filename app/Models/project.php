<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = ['nim','name','major'];
    protected $table= 'project';
    public $timestamps = false;

    protected $primarykey = 'nim';
}
