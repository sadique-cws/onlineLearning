<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

   public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_category_table', 'id', 'category_id');
    }

    public function setCatSlugAttribute($value)
{
    $this->attributes['cat_slug'] = Str::slug($value);
}
}
