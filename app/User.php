<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{

    protected $table = 'users';


    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','avatar'
    ];

    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
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

       public function sendEmailVerificationNotification()
        {
           $this->notify(new VerifyEmail);
        }
}
