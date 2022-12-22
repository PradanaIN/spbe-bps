<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    /* DATABASE RELATIONSHIP */

        // satu kabkota punya banyak perencanaan
        public function perencanaan() {
            return $this->belongsToMany(Perencanaan::class);
        }

        // satu kabkota punya banyak usulan
        public function usulan()
        {
            return $this->hasMany(Usulan::class);
        }

        // satu kabkota punya banyak pengelolaan
        public function pengelolaan()
        {
            return $this->hasMany(Pengelolaan::class);
        }

        // satu kabkota punya banyak area
        public function area()
        {
            return $this->hasMany(Area::class);
        }

        // satu kabkota punya satu provinsi
        public function provinsi()
        {
            return $this->belongsTo(Provinsi::class);
        }
}
