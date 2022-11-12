<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Classe contenant les actions d'authentification
 */
class AuthController extends Controller
{

  /**
   * Affiche la vue de connexion
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  function vueConnexion() {
    return view("login");
  }

  /**
   * Connexion de l'utilisateur
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  function connexion(Request $request) {
    //Vérification des données reçues
    $credentials = $request->validate([
      'login'    => 'required',
      'password' => 'required',
    ]);

    //Authentification de l'utilisateur dans la BDD et création de la session
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    }

    return back()->withErrors([
      'login' => 'Erreur sur le login ou le mot de passe saisi',
    ])->onlyInput('login');
  }
}
