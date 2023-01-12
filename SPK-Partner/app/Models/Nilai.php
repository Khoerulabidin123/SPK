<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public function kriteria(){
        return $this->belongsTo('App\Models\Kriteria');
    }

    public function subkriteria(){
        return $this->belongsTo('App\Models\Subkriteria');
    }
    
    public function Alternatif(){
        return $this->belongsTo('App\Models\Alternatif');
    }
    
    protected $table = 'nilai';

    protected $fillable = [
        'kriteria_id', 'subkriteria_id', 'alternatif_id'
    ];
}
