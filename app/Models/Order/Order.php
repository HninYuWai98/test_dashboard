<?php

namespace App\Models\Order;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id'];

    public function customers()
    {
       return $this->belongsTo(Customer::class);
    }
}
