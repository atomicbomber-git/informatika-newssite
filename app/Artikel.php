<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Artikel extends Model implements HasMedia
{
    use HasMediaTrait;

    public $fillable = [
        "judul", "deskripsi", "isi"
    ];

    protected $perPage = 5;

    CONST GAMBAR_UTAMA_IMAGE = "gambar_utama";

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection(self::GAMBAR_UTAMA_IMAGE)
            ->singleFile();
    }
}
