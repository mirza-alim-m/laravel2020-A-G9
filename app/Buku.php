<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Buku as Authenticatable;
use Illuminate\Notifications\Notifiable;

class buku extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function peminjam()
    {
        return $this->hasOne('App\Peminjaman');
    }
    use Notifiable;
    protected $table = 'buku';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'judul', 'penerbit', 'penulis', 'jumlah',
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
