<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usulan extends Model
{
    use HasFactory;
    use Sluggable;


    protected $guarded = ['id'];

    // model sellau menggunakan kolom di database selain id
    public function getRouteKeyName()
    {
        return 'slug_usulan';
    }

    // auto slug
    public function sluggable(): array
    {
        return [
            'slug_usulan' => [
                'source' => 'nama_usulan'
            ]
        ];
    }


        /*
    DATABASE RELATIONSHIP
    */

    // Satu usulan punya 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // usulan 1 pengelolaan
    public function pengelolaan()
    {
        return $this->belongsTo(Pengelolaan::class);
    }
}
