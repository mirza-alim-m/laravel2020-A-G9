<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Member as Authenticatable;
use Illuminate\Notifications\Notifiable;

class member extends Model
{
    use Notifiable;

    protected $table = 'member';
    use Sortable;
    public $sortable = [
        'nim', 'nama', 'jk', 'prodi','foto','pdf',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim', 'nama', 'jk', 'prodi','foto','pdf',
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
