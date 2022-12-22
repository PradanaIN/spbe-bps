<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

        public function area()
        {
            return $this->hasMany(Area::class);
        }

        public function provinsi()
        {
            return $this->hasMany(Provinsi::class);
        }

        public function kabkota()
        {
            return $this->hasMany(Kabkota::class);
        }

        // role punya banyak user
        public function users()
        {
            return $this->hasMany(User::class);
        }
}
