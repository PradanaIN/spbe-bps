<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelolaan_Kabkota extends Model
{
    use HasFactory;

    protected $table = 'kabkota_perencanaan';

    protected $guarded = ['id'];


    /* DATABASE RELATIONSHIP */

    // pengelolaan 1 perencanaan
    public function perencanaan()
    {
        return $this->belongsTo(Perencanaan::class);
    }

    public function usulan()
    {
        return $this->belongsTo(Usulan::class);
    }

    // Satu pengelolaan punya 1 area perubahan
    public function area() {
        return $this->belongsTo(Area::class);
    }

    // Satu pengelolaan punya 1 pic
    public function pic() {
        return $this->belongsTo(Pic::class);
    }

    // Satu pengelolaan punya 1 Kabkota
    public function kabkota() {
        return $this->belongsTo(Kabkota::class);
    }

    // Satu pengelolaan punya 1 user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Satu pengelolaan punya banyak progress
    public function progress() {
        return $this->hasMany(Progress::class);
    }

    // Satu pengelolaan punya banyak progress
    public function laporan() {
        return $this->hasMany(Laporan::class);
    }

    // Satu pengelolaan punya 1 role
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
