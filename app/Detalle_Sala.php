<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Detalle_Sala extends Model
{
  protected $guarded=['id'];
  protected $table = 'detalle_sala';
  protected $primaryKey = 'id';
  public $timestamps=false;
  protected $fillable = [
      'id_usuario', 'goles_equipo1','goles_equipo2',
  ];
  protected $hidden = [
    
  ];
}
