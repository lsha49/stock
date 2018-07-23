<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//use Jenssegers\Mongodb\Eloquent\HybridRelations;

class User extends Authenticatable
{

protected $connection = 'mysql';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }


    public function authorizeRoles($roles)
    {
      // print_r($roles);exit;
      // if (is_array($roles)) {
      //   return $this->hasAnyRole($roles) ||
      //         abort(401, 'This action is unauthorized.');
      //      }
      //      return $this->hasRole($roles) ||
      //         abort(401, 'This action is unauthorized.');
    }



    public function hasAnyRole($roles)
    {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }


    public function hasRole($role)
    {
      return null !== $this->roles()->where('name', $role)->first();
    }






}
