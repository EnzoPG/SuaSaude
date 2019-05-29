<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CombinacoesModel;
use App\CatModel;

class CombinacoesController extends Controller
{
    public function addCombin(CombinacoesModel $Combinacoes){
      $this->validate(request(), [
          'ingredientes' => 'required',
          'cat_comb' => 'required'
        ]);

        $combin_data = request()->all();

        //Adiciona todos os elementos selecionados em um array só
        $Ingredientes = [
          'ingredientes' => $combin_data['ingredientes']
        ];

        //Se o tamanho do array for maior que 1, adicionar vírgula
        if (count($Ingredientes['ingredientes']) > 1) {
          $Combinacoes->ingredientes = json_encode(implode(',', $Ingredientes['ingredientes']));
        }

        $Combinacoes->cat_comb = $combin_data['cat_comb'];
        $Combinacoes->save();

        return back()->withStatus(__('Combinação Adicionada com sucesso!'));
    }
}
