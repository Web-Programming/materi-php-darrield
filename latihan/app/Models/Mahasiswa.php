<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";

    public function prodi(): HasOneOrMany{
        return $this->belongTo(Prodi::class);
    }
}
