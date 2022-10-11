<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id'];

    public function item()
    {
        return $this->HasMany(Items::class);
    }
}

