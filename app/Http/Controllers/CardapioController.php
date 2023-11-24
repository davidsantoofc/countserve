<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cardapio;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;

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

        return redirect('/cardapio')->with('sucesso', 'Cardapio removido com sucesso!');
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
        //dd($agendamentos);
        if (is_array($agendamentos)){
            try {
                foreach($agendamentos as $key => $agendamento){
                    if($key!="_token"){
                        $ag = new Agenda();

                        Agenda::create(["cardapio_id"=>$key,
                        "pessoa_id" => Auth::User()->pessoa->id,
                        "status" => $agendamento]);
                    }
                }
                return redirect('/dashboard')->with('sucesso', "Refeição confirmada com sucesso");
            } catch (\Exception $e) {
                //dd($e->getMessage()); // Exibe a mensagem de erro do banco de dados
                return redirect('/dashboard')->with('error', "Não foi possível ou você já confirmou suas refeições anteriormente!");
            }
        }
    }

    public function agendamentos(Request $request): View
    {
        $dt = date('Y-m-d');
        if(isset($request['data'])){
            $dt = $request['data'];
        }

        //CRIANDO A DATA DE HOJE

        $c = self::getConfirmados($dt);
        $cardapio = Cardapio::where('data',$dt)->first();
        return view('cardapio.agendamentos',['cardapio'=>$cardapio, 'confirmados'=>$c, 'data'=>$dt]);
    }

    public function getConfirmados($data){
        //$dt = explode('-', $data);
        //dd($dt);

        $sql = "Select count(*) as conf from cardapio as c join agenda a
        on c.id = a.cardapio_id where data='".$data."' and status='confirmado';";
        $confirmados = \DB::select($sql);
        return $confirmados[0]->conf;
    }

}
