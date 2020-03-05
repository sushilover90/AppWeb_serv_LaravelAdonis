<?php

namespace App;

use http\Env\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getLaravelToken()
    {
        return $this->api_token;
    }

    public function getJWTToken()
    {
        return $this->jwt_token;
    }

    public function getShodanToken()
    {
        return $this->shodan_token;
    }

    public function setShodanToken($token)
    {
        $this->shodan_token = $token;
        if($this->save())
        {
            return response()->json(['message'=>'Exito','shodan_token'=>$this->getShodanToken()],200);
        }
        return response()->json(['message'=>'Error, intentelo de nuevo'],401);
    }

    public static function generateLaravelToken()
    {
        return Hash::make(Str::random(80));
    }

    public function setLaravelToken()
    {
        $new_token = User::generateLaravelToken();

        $old_token = $this->getLaravelToken();

        if($this->verifyLaravelTokenGeneration($this->getLaravelToken(),$new_token))
        {
            $this->api_token = $new_token;
            if($this->save())
            {
                return response()->json(['message'=>'Exito','old_token'=>$old_token,'new_token'=>$this->getLaravelToken()],200);
            }
        }
        return response()->json(['message'=>'Error, intentelo de nuevo'],401);
    }

    public function verifyLaravelTokenGeneration($old_token,$new_token)
    {
        if($old_token === $new_token)
        {
            return false;
        }
        return true;
    }

}
