<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    protected $table = "expense";
    protected $fillable = [
        'title',
        'created_at'
    ];
    public function item()
    {
        return $this->hasOne(BillableItems::class);
    }
}
