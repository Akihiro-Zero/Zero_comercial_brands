<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
