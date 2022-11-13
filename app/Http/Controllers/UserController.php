<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  /**
   * Affiche la page d'accueil
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  function accueil() {
    return view("accueil");
  }

  /**
   * Affiche la vue du profil
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  function vueCompte() {
    return view("compte.profil");
  }

  /**
   * Change le mot de passe de l'utilisateur connecté
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  function changePassword(Request $request) {
    $credentials = $request->validate([
      'password'       => 'required',
      'password_verif' => 'required|same:password',
    ]);

    Auth::user()->password = bcrypt($request->input("password"));

    if (Auth::user()->save()) {
      return back()->with("success", "ok");
    }

    return back()->withErrors([
      'save' => 'Erreur sur la sauvegarde du mot de passe',
    ]);
  }
}
