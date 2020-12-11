<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $timestamps = false;
    protected $table = 'titles';
    // ******************************************
    // Joan van Duren
    // 04-12-2020
    // Foutmelding doordat waardes niet NULL mogen zijn.
    // Foutmelding:
    // ==========================================
    // Foutmelding:
    // Illuminate \ Database \ QueryException (42S22)
    // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'id' in 'where clause' (SQL: select * from `titles` where `id` = PC1035 limit 1)
    // Previous exceptions
    // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'id' in 'where clause' (42S22)
    // Andere kolom als primary key gedeinieerd en string type gedefinieerd
    // ==========================================
    // ******************************************
    protected $casts = ['title_id' => 'string'];
    protected $primaryKey = 'title_id';
}
