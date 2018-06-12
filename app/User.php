<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Almacen;
use App\Pais;
use App\Moneda;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable,
        Authorizable,
        CanResetPassword,
        EntrustUserTrait // add this trait to your user model
        {
            EntrustUserTrait ::can insteadof Authorizable; //add insteadof avoid php trait conflict resolution
        }
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'last_name', 'user_name', 'country', 'profile_pic', 'estado'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function get_full_name()
    {
        $name = ucfirst ($this->name);
        $last_name = ucfirst ($this->last_name);

        return $name . " " . $last_name;
    }

    public function get_moneda()
    {
      return Moneda::where('pais', '=', $this->country);
    }

    public function get_pais_name()
    {
      return Pais::where('id', $this->pais);
    }

    public function get_almacenes()
    {
        return Almacen::where('responsable_id', '=', $this->id);
    }

    public function get_otras_almacenes()
    {
        return Almacen::where('pais', '<>', $this->id);
    }

}
