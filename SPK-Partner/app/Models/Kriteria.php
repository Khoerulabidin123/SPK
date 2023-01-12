<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public function subkriteria(){
        return $this->hasOne('App\Models\SubKriteria');
    }

    public function nilai(){
        return $this->hasOne('App\Models\Nilai');
    }


    protected $table = 'kriteria';

    protected $fillable = [
        'nama_kriteria', 'bobot', 'slug_kriteria'
    ];
}
