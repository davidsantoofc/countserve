<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cardapio;

class CardapioController extends Controller
{
    public function listarCardapios(): View
    {
        $cardapios = Cardapio::all();

        return view('cardapio.listarCardapios', ['cardapios' => $cardapios]);
    }

    public function store(Request $request){
        //dd(file_get_contents($request['foto']->path()));
        // $dados =  $request->all();
        // $dados['foto'] = file_get_contents($dados['foto']->path());
        // dd($dados['foto']);

        if ($request->hasFile('imagem')) {
        Cardapio::create($request->all());

        return redirect('/cardapio')->with(['sucesso'=> 'Cardapio cadastrado com sucesso!']);
        }
    }   
}
