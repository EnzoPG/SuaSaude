<?php

namespace App\Http\Controllers;

use App\CatModel;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    public function editaCat(CatModel $Categoria){
      return view('pages.Categorias.Categoriasedit')->with('Categoria', $Categoria);
    }

    public function attCat(CatModel $Categoria){
      $this->validate(request(), [
          'cat_nome' => 'required'
        ]);

        $categoria_data = request()->all();

        $Categoria->cat_nome = $categoria_data['cat_nome'];
        $Categoria->save();

        return redirect('../home');
    }

    public function deleteCat(CatModel $Categoria){
      $Categoria->delete();
      session()->flash('success', 'Categoria removida com sucesso!');
      return redirect('/home');
    }
}
