<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'penulis', 'isi', 'category_id', 'gambar'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
