<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatModel extends Model
{
  public $table = "categorias";
  protected $primaryKey = 'cat_id';

  protected $fillable = [
      'cat_nome'
  ];
}
