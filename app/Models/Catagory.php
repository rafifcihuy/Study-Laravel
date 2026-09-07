<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    /** @use HasFactory<\Database\Factories\CatagoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
