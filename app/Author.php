<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $casts = ['au_id' => 'string'];
    protected $primaryKey = 'au_id';
}
