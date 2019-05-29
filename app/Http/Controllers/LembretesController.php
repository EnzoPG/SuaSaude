<?php

namespace App\Http\Controllers;

use MaddHatter\LaravelFullcalendar\Event;
use Illuminate\Http\Request;
use App\LembretesModel;
use Calendar;

class LembretesController extends Controller
{
  //VER ETASKS
  public function index(LembretesModel $Lembrete)
  {
    $events = [];
    $data = LembretesModel::all();

    if ($data->count()) {
      foreach ($data as $key => $value) {
        $events[] = Calendar::event(
          $value->tit_lemb,
          true,
          new \DateTime($value->data_lemb),
          new \DateTime($value->created_at.' +1 day'),
          null,
          [
            'color' => '#58e85c'
          ]
        );
      }
    }

    $calendar = Calendar::addEvents($events)->setOptions([
      'first_day' => 1
    ]);

    return view('pages.lembretes.lembretes', compact('calendar'));
  }

  public function show(LembretesModel $lembretes)
  {
    return view('pages.lembretes.lembretes', compact('calendar'));
  }

  public function CriaLembrete()
  {
    $this->validate(request(), [
      'tit_lemb' => 'required',
      'desc_lemb' => 'required',
      'data_lemb' => 'required'
    ]);

    $lembretes_data = request()->all();

    $lembretes = new LembretesModel();
    $lembretes->tit_lemb = $lembretes_data['tit_lemb'];
    $lembretes->desc_lemb = $lembretes_data['desc_lemb'];
    $lembretes->data_lemb = $lembretes_data['data_lemb'];
    $lembretes->realizado = (!isset($lembretes_data['realizado']))? 0 : 1;
    $lembretes->save();

    session()->flash('success', 'Lembrete foi criado com sucesso!');

    return back()->withStatus(__('Lembrete Criado com Sucesso!'));
  }

  //EDITAR ETASKS
  public function editLembrete(LembretesModel $Lembrete)
  {
    return view('pages.lembretes.lembretesedit')->with('Lembrete', $Lembrete);
  }

  public function AttEtask(LembretesModel $lembretes)
  {
    $this->validate(request(), [
      'tit_lemb' => 'required',
      'desc_lemb' => 'required',
      'data_lemb' => 'required'
    ]);

    $lembretes_data = request()->all();

    $lembretes = new LembretesModel();
    $lembretes->tit_lemb = $lembretes_data['tit_lemb'];
    $lembretes->desc_lemb = $lembretes_data['desc_lemb'];
    $lembretes->data_lemb = $lembretes_data['data_lemb'];
    $lembretes->realizado = (!isset($lembretes_data['realizado'])) ? 0 : 1;
    $lembretes->save();

    session()->flash('success', 'Lembrete foi atualizado com sucesso!');

    return back()->withStatus(__('Lembrete Criado com Sucesso!'));
  }

  public function DeletaEtask(LembretesModel $lembretes)
  {
    $lembretes->delete();
    session()->flash('success', 'Lembrete removido com sucesso!');
    return view('pages.lembretes.lembretes');
  }
}
