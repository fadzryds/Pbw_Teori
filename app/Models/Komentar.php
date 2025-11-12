<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    // pastikan Laravel tahu nama tabel yang benar
    protected $table = 'komentar';

    protected $fillable = ['news_id', 'nama', 'isi'];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
