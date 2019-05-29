<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CombinacoesModel extends Model
{
  public $table = "combinacoes";
  protected $primaryKey = 'id_combinacao';

  protected $fillable = [
      'ingredientes', 'cat_comb'
    ];
}
