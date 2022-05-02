<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function scopeIsActive($query)
    {
        $query->where('status', 'active');
    }

    public function scopeIsInative($query)
    {
        $query->where('status', 'inative');
    }

}
