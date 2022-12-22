<?php

namespace App\Models;

use App\Models\Pic;
use App\Models\Area;
use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perencanaan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'perencanaans';
    protected $guarded = ['id'];

    // model sellau menggunakan kolom di database selain id
    public function getRouteKeyName()
    {
        return 'slug_kegiatan';
    }

        // auto slug
        public function sluggable(): array
        {
            return [
                'slug_kegiatan' => [
                    'source' => 'nama_kegiatan'
                ]
            ];
        }


    /*
    DATABASE RELATIONSHIP
    */

    // Satu perencanaan punya 1 area perubahan
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // Satu perencanaan punya 1 pic
    public function pic()
    {
        return $this->belongsTo(Pic::class);
    }

    // Satu perencanaan punya 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // perencanaan 1 pengelolaan
    public function pengelolaan()
    {
        return $this->belongsTo(Pengelolaan::class);
    }

    // Satu perencanaan punya banyak provinsi
    public function provinsi()
    {
        return $this->belongsToMany(Provinsi::class);
    }

    // Satu perencanaan punya banyak kabkota
    public function kabkota()
    {
        return $this->belongsToMany(Kabkota::class);
    }
    
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

}
