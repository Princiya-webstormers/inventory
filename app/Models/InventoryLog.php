<?php

namespace App\Models;

use App\Traits\ResolveRouteBinding;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryLog extends Model
{
    use HasFactory, SoftDeletes, ResolveRouteBinding;
    protected $fillable=[
        'user_id',
        'item_id',
        'action',
        'old_quantity',
        'new_quantity'
    ];
    public function inventory(){
        return $this->belongsTo(Inventory::class,'item_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
