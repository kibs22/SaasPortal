<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
    	"subscription_id",
    	"product_id",
    	"user_id",
    	"subscription_date",
    	"status",
		"product_name",
        "product_description",
        "number_of_users",
        "cancelled_date",

    ];
}
