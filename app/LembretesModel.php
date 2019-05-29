<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LembretesModel extends Model
{
  public $table = "lembretes";
  protected $primaryKey = 'id_lemb';

  protected $fillable = [
    'tit_lemb', 'desc_lemb', 'data_lemb', 'realizado'
  ];
}
