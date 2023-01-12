<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    public function kriteria(){
        return $this->belongsTo('App\Models\Kriteria');
    }
    
    public function nilai(){
        return $this->hasOne('App\Models\Nilai');
    }
    
    protected $table = 'subkriteria';

    protected $fillable = [
        'nama_subkriteria', 'nilai', 'kriteria_id'
    ];
}
