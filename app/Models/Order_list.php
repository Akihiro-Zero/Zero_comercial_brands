<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    use HasFactory;
    protected $table  = "order_list";
    protected $guarded = ["id"];

    public function order()
    {
        return $this->belongsTo(Orders::class,'user_id','id');
    }
}
