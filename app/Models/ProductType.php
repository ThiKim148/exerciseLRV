<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'type_products';
    public function products() {
        return $this->hasMany('App\Product','id_type', 'id');
    }
}
