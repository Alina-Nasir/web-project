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
        'productId','productName','price','description','material','pic2','pic3','pic4','picture','userType','categoryId','created_at','updated_at'
    ];

    
}
