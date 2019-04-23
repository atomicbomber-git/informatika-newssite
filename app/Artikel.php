<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public $fillable = [
        "judul", "deskripsi", "isi"
    ];

    protected $perPage = 5;
}
