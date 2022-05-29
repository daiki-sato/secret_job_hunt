<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'email_verified',
        'email_verify_token',
        'first_name',
        'last_name',
        'first_name_ruby',
        'last_name_ruby',
        'phone_number',
        'nickname',
        'sex',
        'role_id',
        'company',
        'department',
        'working_period',
        // 'remembe_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function wallets()
    {
        return $this->hasOne('App\Models\Wallet');
    }


    public function cashes()
    {
        return $this->hasMany('App\Models\Cash');
    }


    public function interviews()
    {
        return $this->hasMany('App\Models\Interview');
    }

    public function threads()
    {
        return $this->hasMany('App\Models\Thread');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function calls()
    {
        return $this->hasMany('App\Models\Call');
    }

    public function hasRole(string $role)
    {
        return $this->role->id === Role::getAdminId() || $this->role->name === $role;
    }
}
