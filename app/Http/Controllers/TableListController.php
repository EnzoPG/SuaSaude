<?php

namespace App\Http\Controllers;

use App\CatModel;
use App\ReceitasModel;
use App\AlimentosModel;
use App\CombinacoesModel;
use App\TiposAlimentosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableListController extends Controller
{
  public function index ()
  {
      //traz todos os alimentos
      $Alimentos = AlimentosModel::all();
      //traz todas as infos das receitas
      $Receitas = ReceitasModel::all();
      //traz todas as CombinacoesModel
      $Combinacoes = CombinacoesModel::all();
      //traz todas as categorias
      $Categorias = CatModel::all();
      //traz todas os tipos de alimentos
      $TiposAlimentos = TiposAlimentosModel::all();
      //traz os ingredientes da receita
      $Ingredientes = DB::select("SELECT * FROM receitas INNER JOIN alimentos ON receitas.ingredientes = alimentos.alim_id WHERE alimentos.alim_id IN (receitas.ingredientes)");
      //DB::select("SELECT * FROM receitas INNER JOIN alimentos ON receitas.ingredientes = alimentos.alim_id WHERE alimentos.alim_id IN (receitas.ingredientes)");

      // dd(json_decode($Ingredientes[0]->ingredientes));

      return view('pages.table_list')->with([
        'Alimentos' => json_encode($Alimentos, true),
        'TiposAlimentos' => json_encode($TiposAlimentos, true),
        'Receitas' => json_encode($Receitas, true),
        'Combinacoes' => json_encode($Combinacoes, true),
        'Categorias' => json_encode($Categorias, true),
        'Ingredientes' => json_encode($Ingredientes, true)
      ]);
  }
}
