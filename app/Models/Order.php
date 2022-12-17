<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'orderId';
    public $timestamps = false;

    protected $fillable = [
        'userId', 'paymentStatus', 'grandTotal','itemCount'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
