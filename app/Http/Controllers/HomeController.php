<?php

namespace App\Http\Controllers;

use App\User;
use App\CatModel;
use App\ReceitasModel;
use App\AlimentosModel;
use App\LembretesModel;
use App\CombinacoesModel;
use App\TiposAlimentosModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        //traz todos os usuários
        $user = User::all();
        //traz todos os alimentos
        $Alimentos = AlimentosModel::all();
        //traz todas as receitas
        $Receitas = ReceitasModel::all();
        //traz todas as CombinacoesModel
        $Combinacoes = CombinacoesModel::all();
        //traz todas os tipos de alimentos
        $TiposAlimentos = TiposAlimentosModel::all();
        //traz todos os lembretes atuais
        $Lembretes = LembretesModel::all();
        //traz todas as Categorias
        $Categorias = CatModel::all();
        //traz a quantidade total de usuários
        $qtd_users = User::all()->count();
        //traz a quantidade total de alimentos cadastrados no banco
        $qtd_alim = AlimentosModel::all()->count();
        //traz a quantidade de lembretes
        $qtd_lembretes = LembretesModel::all()->count();

        return view('dashboard')->with([
          'user' => json_encode($user, true),
          'Alimentos' => json_encode($Alimentos, true),
          'qtd_users' => json_encode($qtd_users, true),
          'qtd_alim' => json_encode($qtd_alim, true),
          'TiposAlimentos' => json_encode($TiposAlimentos, true),
          'Receitas' => json_encode($Receitas, true),
          'Combinacoes' => json_encode($Combinacoes, true),
          'Lembretes' => json_encode($Lembretes, true),
          'Categorias' => json_encode($Categorias, true),
          'qtd_lembretes' => json_encode($qtd_lembretes, true)
        ]);
    }
}
