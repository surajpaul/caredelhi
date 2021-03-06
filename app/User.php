<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'phone_number'
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

    /**
     * Relationship between users and roles table.
     *
     * @return \App\Models\Role
     */
    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Find out if the user has given role or not.
     *
     * @param  array $role
     * @return boolean
     */
    public function hasRole($role) {
        if(in_array($this->role->label, $role))
            return true;
        else
            return false;
    }
}
