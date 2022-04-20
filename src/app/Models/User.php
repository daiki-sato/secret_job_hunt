<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company',
        'role_id',
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
    
    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet');
    }
    
    public function interviews()
    {
        return $this->hasMany('App\Models\Interview');
    }
    
    public function thread()
    {
        return $this->hasOne('App\Models\Thread');
    }

    public function delivery_addresses()
    {
        return $this->hasMany('App\Models\DeliveryAddress');
    }

    public function hasRole(string $role)
    {
        return $this->role->id === Role::getAdminId() || $this->role->name === $role;
    }
}