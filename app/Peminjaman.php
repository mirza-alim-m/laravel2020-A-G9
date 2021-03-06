<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Peminjaman as Authenticatable;
use Illuminate\Notifications\Notifiable;

class peminjaman extends Model
{
    use Sortable;
    use Notifiable;

    public function buku()
    {
        return $this->belongsTo('App\Buku');
    }

    public $sortable = [
        'buku_id', 'nim', 'nama', 'prodi', 'tanggal','foto','pdf','created_at','updated_at'
    ];

    protected $table = 'peminjamen';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'buku_id', 'nim', 'nama', 'prodi', 'tanggal','foto','pdf',
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
