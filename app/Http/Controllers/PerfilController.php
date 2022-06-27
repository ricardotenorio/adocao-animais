<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Mostra o perfil de um usuário
     *
     * @param \App\Models\User $user 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('perfil.show', [
            'user' => $user
        ]);
    }
}
