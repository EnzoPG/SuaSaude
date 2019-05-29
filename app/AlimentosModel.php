<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentosModel extends Model
{

  public $table = "alimentos";
  protected $primaryKey = 'alim_id';

  protected $fillable = [
      'alim_nome', 'alim_tipo'
  ];

}
