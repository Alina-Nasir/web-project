<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;

    protected $table = 'termcondition';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'id','text1','text2','text3','text4'
    ];
}
