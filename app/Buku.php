<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
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
    use Sortable;
    use Notifiable;
    public $sortable = [
        'id','category_id','judul', 'penerbit', 'penulis', 'jumlah','foto','pdf','created_at','updated_at'
    ];
    protected $table = 'buku';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'judul', 'penerbit', 'penulis', 'jumlah','foto','pdf',
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
