<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends  Model {

    protected $guarded=['idusuario'];
    protected $table = 'usuario';
    protected $primaryKey = 'idusuario';
    public $timestamps=false;
    protected $fillable = [
        'nombre', 'apellidos','email','password','fecha_nacimiento','pais_idpais','monedas',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

}