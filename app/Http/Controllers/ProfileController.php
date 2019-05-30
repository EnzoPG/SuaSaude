<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $User)
    {
        $User_alt = auth()->user()->usu_altura;
        $User_peso = auth()->user()->usu_peso;
        $User_imc = $User_peso / (($User_alt) * 2);

        $path = storage_path() . "/json/imc.json";
        $json_arc = json_decode(file_get_contents($path), true);

        return view('profile.edit')->with([
          'User' => $User,
          'json_arc' => $json_arc,
          'User_alt' => $User_alt,
          'User_peso' => $User_peso,
          'User_imc' => number_format($User_imc, 2, '.', ' ')
        ]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Perfil atualizado com sucesso!'));
    }

    /**
     * Update the profile data IMC
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateData(User $User)
    {
      $perfil_data = request()->all();

      $User->usu_peso = $perfil_data['peso'];
      $User->usu_altura = $perfil_data['altura'];
      $User->password = Hash::make('@Enzo1001');

      $User->save();
      // dd($perfil_data);

      return back()->withStatus(__('Informações Atualizadas com sucesso!'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Senha atualizada com sucesso!'));
    }
}
