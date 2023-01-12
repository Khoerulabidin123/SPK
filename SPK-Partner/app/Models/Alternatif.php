<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    public function nilai(){
        return $this->hasOne('App\Models\Nilai');
    }


    protected $table = 'alternatif';

    protected $fillable = [
        'nama_alternatif', 'kode_alternatif'
    ];
}
