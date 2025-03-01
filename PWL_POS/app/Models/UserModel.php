<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';       //Mendefinikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; // Mendefinikan primary key dari tabel yang digunakan
}