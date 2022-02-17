<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillableItems extends Model
{
    use HasFactory;
    protected $table = "billable_items";
    protected $fillable = [
        'expense_id',
        'title',
        'price',
        'created_at'
    ];
}
