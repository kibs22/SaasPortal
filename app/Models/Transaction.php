<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

     protected $fillable = [
        'subscription_id',
        'product_id',
        'order_id',
        'email',
        'user_id',
   		'total_amount',
        'number_of_users',
        "product_name",
        "product_description",
    ];

 public function subscription($value='')
 {
     return $this->hasOne(Subscription::class,'subscription_id','subscription_id');
 }

 public function user()
 {
    return $this->belongsTo(User::class);
 }
}
