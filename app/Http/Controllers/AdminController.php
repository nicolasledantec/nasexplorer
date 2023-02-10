<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\Request;

class AdminController extends Controller {

  function vueAdmin() {
    return view("admin.accueil");
  }

  function vueDirectory() {
    return view("admin.listDirectory", ["list_directories" => Directory::all()]);
  }

  function postDirectory(Request $request) {
    $id = $request->input("id");

    if ($id) {
      $directory = Directory::find($id);

      if ($directory->update($request->all())) {
        return json_encode(array("type" => "success", "message" => "Modification effectuée"));
      }

      return json_encode(array("type" => "error", "message" => "Echec de la modification"));
    }

    $directory = new Directory();
    $directory->path = $request->post("path");
    $directory->right = $request->post("right");

    if ($directory->save()) {
      return json_encode(array("type" => "success", "message" => "Enregistrement effectuée"));
    }

    return json_encode(array("type" => "error", "message" => "Echec de l'enregistrement"));
  }
}
