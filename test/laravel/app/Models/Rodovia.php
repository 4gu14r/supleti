<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rodovia extends Model
{
    use HasFactory;
    protected $table = 'rodovias';

    public function trechos()
    {
        return $this->hasMany(Trecho::class, 'rodovia_id');
    }

}
