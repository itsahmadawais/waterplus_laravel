<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = "purchases";
    protected $fillable =[
        'user_id',
        'quantity',
        'per_unit_price',
        'total_bill',
        'paid_amount',
        'type',
        'created_at'
    ];
    public function customer()
    {
        return $this->hasOne(User::class);
    }
}
