<?php
use App\ReceitasModel;


Route::get('/', function () {
  return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

  //ADICIONAR ALIMENTOS, RECEITAS E COMBINAÇÕES
  Route::post('Cadastrar_receita', 'ReceitasController@addReceitas');
  Route::post('Cadastrar_combin', 'CombinacoesController@addCombin');
  Route::post('Cadastrar_alimento', 'AlimentosController@addAlimento');
  Route::post('Cadastrar_Type_Alimento', 'AlimentosController@addAlimentoType');

  //EDITAR ALIMENTOS
  Route::get('Edita_ali/{Alimentos}/editaAli', 'AlimentosController@editaAli');
  Route::post('/AttAli/{Alimentos}/attAli', 'AlimentosController@attAli');

  //EDITAR TIPO ALIMENTOS
  Route::get('Edita_ali_type/{TiposAlimentos}/editaAliType', 'AlimentosController@editaAliType');
  Route::post('/AttAliType/{TiposAlimentos}/attAliType', 'AlimentosController@attAliType');

  //EDITAR CATEGORIAS
  Route::get('Edita_cat/{Categoria}/editaCat', 'CategoriasController@editaCat');
  Route::post('/AttCat/{Categoria}/attCat', 'CategoriasController@attCat');

  //EDITAR RECEITAS
  Route::get('Editar_Rec/{Receitas}/editRec', 'ReceitasController@editReceitas');
  Route::post('/AttRec/{Receitas}/attRec', 'ReceitasController@attRec');

  //DELETAR ALIMENTOS
  Route::get('Deleta_ali/{Alimentos}/deleteAli', 'AlimentosController@deleteAli');
  Route::get('Deleta_Ali_Type/{TiposAlimentos}/deleteAliType', 'AlimentosController@deleteAliType');

  //DELETAR CATEGORIAS
  Route::get('Deleta_cat/{Categoria}/deleteCat', 'CategoriasController@deleteCat');

  //DELETAR RECEITAS
  Route::get('Deleta_Rec/{Receitas}/deleteRec', 'ReceitasController@deleta_Rec');

  //LISTAGEM DE ITENS
  Route::get('cadastro_alimento', 'AlimentosController@index');
  Route::get('table_list', 'TableListController@index');
  Route::get('table_nutri', 'InfosNutriController@index');

  //VER LEMBRETES
  Route::get('Lembretes', 'LembretesController@index')->name('lembretes');
  Route::get('Etask/{Etask}', 'LembretesController@show');

  //INSERIR LEMBRETES
  Route::post('CriaLembrete', 'LembretesController@CriaLembrete');

  //EDITAR LEMBRETES
  Route::get('editLembrete/{Lembrete}/editLembrete', 'LembretesController@editLembrete');
  Route::post('Etask/{Etask}/AttEtask', 'LembretesController@AttEtask');

  //DELETAR ETASKS
  Route::get('Etask/{Etask}/DeletaEtask', 'LembretesController@DeletaEtask');

  Route::get('icons', function () {
    return view('pages.icons');
  })->name('icons');

  Route::get('map', function () {
    return view('pages.map');
  })->name('map');

  Route::get('notifications', function () {
    return view('pages.notifications');
  })->name('notifications');

  Route::get('upgrade', function () {
    return view('pages.upgrade');
  })->name('upgrade');

  //ATUALIZA IMC
  Route::post('update_data/{User}/updateData', 'ProfileController@updateData');

});

Route::group(['middleware' => 'auth'], function () {
  Route::resource('user', 'UserController', ['except' => ['show']]);
  Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
  Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
  Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
