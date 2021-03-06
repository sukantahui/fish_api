<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $visible = ['id',
        'person_name',
        'email',
        'mobile1',
        'mobile2',
        'person_type_id',
        'customer_category_id',
        'address1',
        'address2',
        'state',
        'city',
        'po',
        'area',
        'pin'];
    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'inforced' => 'boolean','email_verified_at' => 'datetime',
    ];
    private $person_name;
    private $email;
    private $password;
    private $person_type_id;
    private $customer_category_id;
    private $mobile1;
    private $mobile2;
    private $address1;
    private $address2;
    private $state;
    private $po;
    private $area;
    private $city;
    private $pin;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
    public function purchases() {
        return $this->hasMany('App\Model\PurchaseMaster', 'vendor_id');
    }



}
