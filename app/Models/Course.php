<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(): HasOne
     {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getDiscountPercentage(){
         $discount = $this->attributes['fees'] - $this->attributes['discount_fees'];
         return round(($discount / $this->attributes['fees']) * 100);
    }
}
