<?php

namespace App\Http\Controllers;

use App\InfosNutriModel;
use Illuminate\Http\Request;

class InfosNutriController extends Controller
{
    public function index(){
      $path = storage_path() . "/json/alimentos_3.json";
      $json_arc = json_decode(file_get_contents($path), true);

      return view('pages.table_nutri')->with([
       'json_arc' => $json_arc
      ]);
    }
}
