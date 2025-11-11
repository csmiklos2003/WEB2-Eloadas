<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilota extends Model
{
    protected $connection = 'f1'; // fontos, külön adatbázis
    protected $table = 'pilota';
    protected $fillable = ['nev', 'nem', 'szuletett', 'nemzetiseg'];

    public function eredmenyek()
    {
        return $this->hasMany(Eredmeny::class, 'pilota_id');
    }
}
