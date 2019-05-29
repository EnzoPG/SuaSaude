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
        $User_imc = $User_peso / (($User_alt / 100) * 2);

        return view('profile.edit')->with([
          'User' => $User,
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
      $this->validate(request(), [
        'usu_peso' => 'required',
        'usu_altura' => 'required'
      ]);

      $perfil_data = request()->all();

      $User->tit_lemb = $perfil_data['usu_peso'];
      $User->desc_lemb = $perfil_data['usu_altura'];

      $User->save();

      return back()->withStatus(__('Perfil atualizado com sucesso!'));
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
