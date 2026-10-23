<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'judul',
        'isi',
        'img',
        'tanggalterbit',
    ];

    protected $casts = [
        'tanggalterbit' => 'date',
    ];
}
