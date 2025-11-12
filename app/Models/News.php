<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['judul', 'ringkasan', 'gambar', 'isi', 'wartawan_id'];

    // Relasi ke wartawan (penulis)
    public function wartawan()
    {
        return $this->belongsTo(Wartawan::class, 'wartawan_id');
    }

    // Relasi ke komentar
    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'news_id');
    }
}
