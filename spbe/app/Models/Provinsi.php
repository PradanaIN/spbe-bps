<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /* DATABASE RELATIONSHIP */

        // satu provinsi punya banyak perencanaan
        public function perencanaan() {
            return $this->belongsToMany(Perencanaan::class);
        }

        // satu provinsi punya banyak usulan
        public function usulan()
        {
            return $this->hasMany(Usulan::class);
        }

        // satu provinsi punya banyak pengelolaan
        public function pengelolaan()
        {
            return $this->hasMany(Pengelolaan::class);
        }

        // satu provinsi punya banyak area
        public function area()
        {
            return $this->hasMany(Area::class);
        }

        // satu provinsi punya banyak kabkota
        public function kabkota()
        {
            return $this->hasMany(Kabkota::class);
        }

}
