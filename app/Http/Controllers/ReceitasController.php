<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReceitasModel;

class ReceitasController extends Controller
{
  //Adiciona novas receitas
  public function addReceitas(ReceitasModel $Receitas){
    $this->validate(request(), [
      'ingredientes' => 'required',
      'modo_preparo' => 'required',
      'temp_preparo' => 'required',
      'receita_rend' => 'required'
    ]);

    $receitas_data = request()->all();

    //Adiciona todos os elementos selecionados em um array só
    $Ingredientes = [
      'ingredientes' => $receitas_data['ingredientes']
    ];

    //Se o tamanho do array for maior que 1, adicionar vírgula
    if (count($Ingredientes['ingredientes']) > 1) {
      $Receitas->ingredientes = implode(',', $Ingredientes['ingredientes']);
    }

    $Receitas->modo_preparo = $receitas_data['modo_preparo'];
    $Receitas->temp_preparo = $receitas_data['temp_preparo'];
    $Receitas->receita_rend = $receitas_data['receita_rend'];
    $Receitas->save();

    return back()->withStatus(__('Receita Adicionada com sucesso!'));
  }

  public function editReceitas(ReceitasModel $Receitas){
    return view('pages.Receitas.editReceitas')->with('Receitas', json_encode($Receitas));
  }

  public function attRec(ReceitasModel $Receitas){

    $receitas_data = request()->all();

    //Adiciona todos os elementos selecionados em um array só
    $Ingredientes = [
      'ingredientes' => $receitas_data['ingredientes']
    ];

    //Se o tamanho do array for maior que 1, adicionar vírgula
    if (count($Ingredientes['ingredientes']) > 1) {
      $Receitas->ingredientes = implode(',', $Ingredientes['ingredientes']);
    }

    $Receitas->modo_preparo = $receitas_data['modo_preparo'];
    $Receitas->temp_preparo = $receitas_data['temp_preparo'];
    $Receitas->receita_rend = $receitas_data['receita_rend'];
    $Receitas->save();

    return back()->withStatus(__('Receita Atualizada com sucesso!'));
  }

  public function deleta_Rec(ReceitasModel $Receitas){
    $Receitas->delete();
    return back()->withStatus(__('Receita Deletada com sucesso!'));
  }
}
