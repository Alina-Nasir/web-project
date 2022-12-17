<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'productId';
    //public $timestamps = 'false';


    protected $fillable = [
        'productId','productName','price','description','material','picture','userType','categoryId','created_at','updated_at'
    ];

    
}
