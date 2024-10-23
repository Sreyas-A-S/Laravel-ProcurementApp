<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    //

        use HasFactory;
 
        protected $table = 'orders';
    
        protected $fillable = [
            'order_date',
            'supplier_id',
            'item_total',
            'discount',
            'net_amount',
            'items', 
        ];

        protected $casts = [
            'items' => 'json',
        ];
    
     
        public function supplier()
        {
            return $this->belongsTo(Supplier::class);
        }
    
  

}
