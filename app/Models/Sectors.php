<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectors extends Model
{
    use HasFactory;
    protected $table = "sectors";
    protected $fillable = [
        'sector_title',
        //Sector Title
    ];
    public function customers(){
        return $this->hasMany(User::class,'sector_id');
    }
}
