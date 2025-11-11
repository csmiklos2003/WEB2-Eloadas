<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eredmeny extends Model
{
    protected $connection = 'f1';
    protected $table = 'eredmeny';
    protected $fillable = [
        'datum', 'pilota_id', 'gp_id', 'helyezes', 'hiba', 'csapat', 'auto', 'motor'
    ];

    public function pilota()
    {
        return $this->belongsTo(Pilota::class);
    }

    public function gp()
    {
        return $this->belongsTo(Gp::class);
    }
}
