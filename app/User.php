<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
      {
          return $this->hasMany('App\Group');
      }

      public function role() {
          return $this->role;
      }

      /**
       * Send the password reset notification.
       *
       * @param  string  $token
       * @return void
       */

       public function sendPasswordResetNotification($token)
       {
           $this->notify(new ResetPasswordNotification($token));
       }
}
