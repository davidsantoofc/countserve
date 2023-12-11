<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pessoa;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('registro.registro');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'dt_nasc' => ['required', 'date'],
        //     'tur_num' => ['integer'],
        //     'perfil' => ['required', 'string'],
        // ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $pessoa = Pessoa::create([
            'nome' => $request->name,
            'dt_nasc' => $request->dt_nasc,
            'tur_num' => $request->turm_num,
            'perfil' => $request->perfil,
            'user_id' => $user->id, // Certifique-se de ter uma coluna 'user_id' em sua tabela 'pessoas'
        ]);

        event(new Registered($user));

        return redirect('/dashboard');
        // $perfil = Auth::user()->pessoa->perfil;

        // switch ($perfil) {
        //     case 'administrador':
        //         return redirect('/cardapio');

        //     case 'professor':
        //     case 'aluno':
        //         return redirect('/cardapio-aluno');

        //     default:
        //         return redirect('/');
        // }
    }
}
