<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceitasModel extends Model
{
  public $table = "receitas";
  protected $primaryKey = 'id_receita';

  protected $fillable = [
      'ingredientes', 'modo_preparo', 'temp_preparo', 'receita_rend'
  ];
}
