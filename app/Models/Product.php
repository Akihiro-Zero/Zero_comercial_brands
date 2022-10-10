<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Categories::class,'cate_id','id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class,'seller_id','id');
    }

}

