<?php

namespace App\Models;

use App\Models\Catagory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang berhubungan dengan model ini.
     */
    protected $table = 'blogs';

    /**
     * Kolom yang boleh diisi lewat mass assignment (create/update).
     */
    protected $fillable = [
        'title',
        'author_id',
        'category_id',
        'slug',
        'body',
    ];

   public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Catagory::class, 'category_id');
    }
}