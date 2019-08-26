<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'phone_number'
    // ];

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


    public function orders()
    {
        return $this->hadMany(Order::class);
    }

    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
        // $addresses = $addresses->map(function($address){
        //     return [
        //         'id' => $address->id,
        //         'state' => $address->state->name,
        //         'district' => $address->district->name,
        //         'street' => $address->street,
        //         'addressable_id' => $address->addressable_id,
        //         'addressable_type' => $address->addressable_type,
        //         'created_at' => $address->created_at,
        //         'updated_at' => $address->updated_at,
        //     ];
        // });
        // return $addresses;
    }

    public function likes()
    {
        // return $this->morphMany(Like::class, 'likeable');
        return $this->hasMany(Like::class);

    }

    public function comments()
    {
        // return $this->morphMany(Comment::class, 'commentable');
        return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function carts()
    {
        return $this->hasOne(Cart::class);
    }

}
