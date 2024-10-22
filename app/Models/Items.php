<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        "item_name",
        "inventory_location",
        "brand",
        "category",
        "supplier_id",
        "stock-unit",
        "unit_price",
        "item_images",
        "status",
    ];

    protected $casts = [
        "item_images" => 'array' ,
    ];

    public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

}

