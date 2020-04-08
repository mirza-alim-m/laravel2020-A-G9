<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Peminjaman as Authenticatable;
use Illuminate\Notifications\Notifiable;

class peminjaman extends Model
{
    use Notifiable;

    public function buku()
    {
        return $this->belongsTo('App\Buku');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'nim', 'nama', 'prodi', 'tanggal',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
