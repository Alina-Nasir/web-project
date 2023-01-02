<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'home';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'type', 'description', 'image','categoryId'
   ];
}
