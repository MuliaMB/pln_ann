<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyulang extends Model
{
    use HasFactory;

    protected $table = 'penyulangs';
    protected $guarded = ['id'];

    public function trafo(){
        return $this->hasOne(TrafoDaya::class,'id','id_trafo_daya');
    }
}
