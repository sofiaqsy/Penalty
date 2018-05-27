<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class comentario extends  Model {



    protected $guarded=['idcomentario'];
    protected $table = 'comentario';
    protected $primaryKey = 'idcomentario';
    public $timestamps=false;
    protected $fillable = [
        'comentario', 'usuario_idusuario','sala_idsala',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

}