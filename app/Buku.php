<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Buku as Authenticatable;
use Illuminate\Notifications\Notifiable;

class buku extends Model
{
    use Sortable;
    public function peminjam()
    {
        return $this->hasOne('App\Peminjam');
    }
    public $sortable = [
        'category','judul', 'penerbit', 'penulis', 'jumlah','created_at','updated_at'
    ];
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category','judul', 'penerbit', 'penulis', 'jumlah',
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
