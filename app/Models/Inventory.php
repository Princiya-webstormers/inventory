<?php

namespace App\Models;

use App\Traits\ResolveRouteBinding;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes, ResolveRouteBinding;
    protected $fillable=[
        'name',
        'description',
        'quantity',
        'low_quantity',
        'price'
    ];
    public function inventoryLog(){
        return $this->hasMany(InventoryLog::class);
    }
}
