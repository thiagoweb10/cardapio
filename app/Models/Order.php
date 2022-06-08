<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','type_payment_id','date','delivery','description'];

    protected $casts = [
        'date' => 'date',
        'delivery' => 'boolean'
    ];

    public function client()
    {
        return $this->belongsTo(TypePayment::class);
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_order',
            'order_id',
            'product_id'
        )->withPivot('quantity');
    }

    public function getDeliveryAttribute()
    {
        return $this->attributes['delivery'] ? 'Sim' : 'Não';
    }

    public function getTotalAttribute()
    {
        return "R$ ".number_format($this->products->sum(fn($item) => $item->price * $item->pivot->quantity), 2,',','.');
        
    }
}
