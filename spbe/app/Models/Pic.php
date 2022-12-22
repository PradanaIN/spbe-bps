<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;


    /* DATABASE RELATIONSHIP */

    // satu pic punya banyak perencanaan
    public function perencanaan() {
        return $this->hasMany(Perencanaan::class);
    }

    // satu pic punya banyak usulan
    public function usulan()
    {
        return $this->hasMany(Usulan::class);
    }

    // satu pic punya banyak pengelolaan
    public function pengelolaan()
    {
        return $this->hasMany(Pengelolaan::class);
    }

    // pic memiliki banyak user
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
