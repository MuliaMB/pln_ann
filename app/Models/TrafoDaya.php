<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafoDaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gardu_induk',
        'nama',
        'kap',
        'setting_rele'
    ];

    public function penyulangs()
    {
        return $this->hasMany(Penyulang::class, 'id_trafo_daya');
    }

    public function gardu(){
        return $this->hasOne(GarduInduk::class,'id','id_gardu_induk');
    }
}
