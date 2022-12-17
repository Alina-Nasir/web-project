<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'orderItems';
    protected $primaryKey = 'orderItemId';
    public $timestamps = false;

    protected $fillable = [
        'orderId', 'productId', 'quantity', 'price','size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
