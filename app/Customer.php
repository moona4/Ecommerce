<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;

class Customer extends Authenticable
{
    use HasMultiAuthApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
     * removing tokens
     * @param App\Customer
     * @return void
     */
    public function revokeTokens()
    {
        $this->tokens()->each(function ($token) {
            $token->delete();
        });
    }

    public function deliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
