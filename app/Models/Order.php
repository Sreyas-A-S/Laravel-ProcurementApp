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
            'supplier_id',
            'order_date',
            'item_total',
            'discount',
            'net_amount',
        ];
    
     
        public function supplier()
        {
            return $this->belongsTo(Supplier::class);
        }
    
  
        public function poItems()
        {
            return $this->hasMany(POItem::class, 'po_id');
        }
}
