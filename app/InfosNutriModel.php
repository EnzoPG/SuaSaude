<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfosNutriModel extends Model
{
  public $table = "infos_nutri";
  protected $primaryKey = 'info_id';

  protected $fillable = [
      'info_nome', 'info_porcao', 'info_calorias'
  ];
}
