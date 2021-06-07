<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    use HasFactory;


     protected $fillable = [
    	"subscription_id",
    	"from_product_id",
    	"from_number_of_users",
		"to_product_id",
        "to_number_of_users",
        'action',
        'action_date',
    ];

}
