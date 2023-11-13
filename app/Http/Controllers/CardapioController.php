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

        if ($request->hasFile('foto')) {
            $dados = $request->all();
            $dados['foto'] = file_get_contents($request->file('foto')->path());

            try {
                Cardapio::create($dados);
            } catch (\Exception $e) {
                dd($e->getMessage()); // Exibe a mensagem de erro do banco de dados
            }
        return redirect('/cardapio')->with(['sucesso'=> 'Cardapio cadastrado com sucesso!']);
        }
    }

    public function destroy($id){
        $cardapio = Cardapio::find($id);
        $cardapio->delete();

        $cardapios = Cardapio::all();

        return redirect('/cardapio')->with('sucesso', '');
    }
}
