<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'mdl_user';
    public $timestamps = false;
    
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',//correo institucional
        'department',
        'city',
        'address',
        'skype',//skype 
        'msn',//facebbok
        'yahoo',//youtube
        'phone1',
        'phone2',
        'institution',
        'country',
        'description',
        'password',
        'lastnamephonetic',
        'firstnamephonetic',
        'middlename',
        'alternatename',
        'aim',
    ];


}




