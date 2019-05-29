<?php

namespace App\Http\Controllers;

use App\CatModel;
use App\ReceitasModel;
use App\AlimentosModel;
use App\CombinacoesModel;
use App\TiposAlimentosModel;
use Illuminate\Http\Request;

class AlimentosController extends Controller
{
    public function index(TiposAlimentosModel $TiposAlimentos, AlimentosModel $Alimentos){

      $TiposAlimentos = TiposAlimentosModel::all();
      $Alimentos = AlimentosModel::all();
      $Categorias = CatModel::all();

      return view('pages.cadastro_alimento')->with([
        'TiposAlimentos' => json_encode($TiposAlimentos, true),
        'Alimentos' => json_encode($Alimentos, true),
        'Categorias' => json_encode($Categorias, true)
      ]);
    }

    //Adiciona novo Alimento
    public function addAlimento(AlimentosModel $Alimentos){
      $this->validate(request(), [
          'alim_nome' => 'required',
          'alim_tipo' => 'required'
        ]);

        $alimentos_data = request()->all();

        $Alimentos->alim_nome = $alimentos_data['alim_nome'];
        $Alimentos->alim_tipo = $alimentos_data['alim_tipo'];
        $Alimentos->save();

        return back()->withStatus(__('Alimento Adicionado com sucesso!'));
    }

    //Adiciona novo tipo de alimento
    public function addAlimentoType(TiposAlimentosModel $TiposAlimentos){
      $this->validate(request(), [
          'tipo_nome' => 'required'
        ]);

        $tipos_data = request()->all();

        $TiposAlimentos->tipo_nome = $tipos_data['tipo_nome'];
        $TiposAlimentos->save();

        return back()->withStatus(__('Tipo de Alimento Adicionado com sucesso!'));
    }

    public function editaAli(AlimentosModel $Alimentos, TiposAlimentosModel $TiposAlimentos){
      return view('pages.Alimentos.AlimentosEdit')->with([
        'Alimentos' => $Alimentos,
        'TiposAlimentos' => $TiposAlimentos::all()
      ]);
    }

    public function editaAliType(TiposAlimentosModel $TiposAlimentos){
      return view('pages.Alimentos.TypeAliEdit')->with([
        'TiposAlimentos' => $TiposAlimentos
      ]);
    }

    public function attAli(AlimentosModel $Alimentos, TiposAlimentosModel $TiposAlimentos){
      $this->validate(request(), [
          'alim_nome' => 'required'
        ]);

        $alimentos_data = request()->all();

        $Alimentos->alim_nome = $alimentos_data['alim_nome'];
        $Alimentos->alim_tipo = $alimentos_data['alim_tipo'];
        $Alimentos->save();

        return back()->withStatus(__('Alimento Atualizado com sucesso!'));
    }

    public function attAliType(TiposAlimentosModel $TiposAlimentos){
      $this->validate(request(), [
          'tipo_nome' => 'required'
        ]);

        $type_data = request()->all();

        $TiposAlimentos->tipo_nome = $type_data['tipo_nome'];
        $TiposAlimentos->save();

        return back()->withStatus(__('Tipo de Alimento Atualizado com sucesso!'));
    }

    public function deleteAli(AlimentosModel $Alimentos){
        $Alimentos->delete();
        return back()->withStatus(__('Alimento excluído com sucesso!'));
    }

    public function deleteAliType(TiposAlimentosModel $TiposAlimentos){
        $TiposAlimentos->delete();
        return back()->withStatus(__('Tipo de Alimento excluído com sucesso!'));
    }

}
