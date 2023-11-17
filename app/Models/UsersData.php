<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersData extends Model
{
    protected $table = 'usersData';
    public $timestamps = false; // Disable timestamps
    use HasFactory;
}
