<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrafoDaya;

class TableDataTrafoDaya extends Model
{
    use HasFactory;

    protected $table = 'table_data_trafo_dayas';

    protected $fillable = [
        'id_trafo_daya',
        'bulan',
        'tahun',
        'amp_siang',
        'teg_siang',
        'mw_siang',
        'persen_siang',
        'amp_malam',
        'teg_malam',
        'mw_malam',
        'persen_malam',
    ];

    public function trafoDaya()
    {
        return $this->belongsTo(TrafoDaya::class, 'id_trafo_daya');
    }
}
