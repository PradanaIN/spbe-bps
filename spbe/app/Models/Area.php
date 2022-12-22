<?php

namespace App\Models;

use App\Models\Usulan;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use App\Models\Perencanaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /* DATABASE RELATIONSHIP */

    // satu area punya banyak perencanaan
    public function perencanaan() {
        return $this->belongsTo(Perencanaan::class);
    }

    // satu area punya banyak pengelolaan
    public function pengelolaan()
    {
        return $this->hasMany(Pengelolaan::class);
    }

    // satu area punya banyak pengelolaan
    public function pengelolaan_kabkota()
    {
        return $this->hasMany(Pengelolaan_Kabkota::class);
    }

    // satu area punya 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // satu area punya 1 kabkota
    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }

    // satu area punya 1 provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
