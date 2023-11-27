<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cardapio;
use App\Models\Agenda;

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

    public function update(Request $request, $id){
    $cardapio = Cardapio::find($id);

        if(!isset($request->foto)) {
            $data = [
                'nome' => $request->nome,
                'acompanhamento' => $request->acompanhamento,
                'foto' => $cardapio->foto,
                'data' => $cardapio->data,
            ];
            Cardapio::where('id', $id)->update($data);
            return redirect('/cardapio')->with('sucesso', "Cardapio alterada com sucesso");

        } else {

            if ($request->hasFile('foto')) {
                $dado = $request->all();
                $dado['foto'] = file_get_contents($request->file('foto')->path());


                    $data = [
                        'nome' => $request->nome,
                        'acompanhamento' => $request->acompanhamento,
                        'foto' => $dado['foto'],
                        'data' => $request->data,
                    ];
                    Cardapio::where('id', $id)->update($data);
                    return redirect('/cardapio')->with('sucesso', "Cardapio alterada com sucesso");
            }
        }
    }

    public function cardapioAluno(): View
    {
        $cardapios = Cardapio::all();
        return view('cardapio.cardapioAluno', ['cardapios' => $cardapios]);
    }

    public function agendarCardapio(Request $request){

        $agendamentos = $request->input();
        dd($agendamentos);
        if (is_array($agendamentos)){
            try {
                foreach($agendamentos as $key => $agendamento){
                    if($key!="_token"){
                        $ag = new Agenda();
                        $ag->cardapio_id = $key;
                        $ag->pessoa_id = Auth->pessoa_id;
                        $ag->status = $agendamento;
                        Agenda::create($ag);
                    }

                }
            } catch (\Exception $e) {
                dd($e->getMessage()); // Exibe a mensagem de erro do banco de dados
            }

        }

    }

    public function agendamentos(): View
    {
        return view('cardapio.agendamentos');
    }

}
