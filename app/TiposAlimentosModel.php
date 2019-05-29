<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposAlimentosModel extends Model
{
  public $table = "tipos";
  protected $primaryKey = 'id_tipo';

  protected $fillable = [
      'tipo_nome'
  ];
}
