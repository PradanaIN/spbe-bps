<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug_user';
    }

        // auto slug
        public function sluggable(): array
        {
            return [
                'slug_user' => [
                    'source' => 'nama_user'
                ]
            ];
        }



    /* DATABASE RELATIONSHIP */

    // satu user punya satu pic
    public function pic()
    {
        return $this->belongsTo(Pic::class);
    }

    // satu user punya satu provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    // satu user punya satu kabkota
    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }

    // satu user punya satu area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // user punya banyak usulan
    public function usulan()
    {
        return $this->hasMany(Usulan::class);
    }

        // user punya banyak perencanaan
        public function perencanaan()
        {
            return $this->hasMany(Perencanaan::class);
        }

    // user punya satu role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
