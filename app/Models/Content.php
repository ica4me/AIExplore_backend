<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Content extends Model
{

  //  public $timestamps = false;

    use HasFactory;
    protected $fillable =[
        'name', 'desc', 'logo_path', 'link', 'id_users'
    ];


    public function user()
    {
        // 'id_users' adalah foreign key yang merujuk ke 'id' pada tabel users
        return $this->belongsTo(User::class, 'id_users');
    }

}