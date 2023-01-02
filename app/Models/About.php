<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'aboutus';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'id','text1','text2','text3'
    ];

}
