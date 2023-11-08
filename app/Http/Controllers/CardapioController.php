<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cardapio;

class CardapioController extends Controller
{
    public function show(): View
    {
        $cardapios = Cardapio::all();

        return view('cardapio.show', ['cardapios' => $cardapios]);
    }
}
