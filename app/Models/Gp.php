<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gp extends Model
{
    protected $connection = 'f1';
    protected $table = 'gp';
    protected $fillable = ['datum', 'nev', 'orszag'];

    public function eredmenyek()
    {
        return $this->hasMany(Eredmeny::class, 'gp_id');
    }
}
