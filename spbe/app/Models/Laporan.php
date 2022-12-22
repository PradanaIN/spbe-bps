<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    public function pengelolaan() {
        return $this->belongsTo(Pengelolaan::class);
    }

    public function perencanaan() {
        return $this->belongsTo(Perencanaan::class);
    }
}
