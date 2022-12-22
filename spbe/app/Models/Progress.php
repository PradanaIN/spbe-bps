<?php

namespace App\Models;

use App\Models\Pic;
use App\Models\Area;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Pengelolaan;
use App\Models\Pengelolaan_Kabkota;
use App\Models\Perencanaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;
    protected $table = 'progress';
    protected $guarded = ['id'];

    /* DATABASE RELATIONSHIP */

    // progress memiliki 1 pengelolaan
    public function pengelolaan() {
        return $this->belongsTo(Pengelolaan::class);
    }
    public function pengelolaan_kabkota() {
        return $this->belongsTo(Pengelolaan_Kabkota::class);
    }
    public function perencanaan() {
        return $this->belongsTo(Perencanaan::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function provinsi() {
        return $this->belongsTo(Provinsi::class);
    }
    public function area() {
        return $this->belongsTo(Area::class);
    }
    public function pic() {
        return $this->belongsTo(Pic::class);
    }

}
