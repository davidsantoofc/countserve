<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-flash-message>
                    </x-flash-message>
                    <div class="row"></div>
                    @php

                        $cardapiosCadastrados = \App\Models\Cardapio::all();

                        $refeicoesConfirmadas = Auth::User()->pessoa->agenda->cardapio;

                        dd($refeicoesConfirmadas)
                        $perfil = Auth::user()->pessoa->perfil;

                    @endphp

                        @switch($perfil)
                            @case ('administrador')
                                <h1>Refeições Cadastradas</h1>
                                <div class="carousel">
                                @foreach ($cardapiosCadastrados as $cardapio)
                                    <a class="carousel-item" href="#"><img src="{{ $cardapio->getImageForImg() }}"></a>
                                @endforeach
                                </div>
                                <h1>Refeições Confirmadas</h1>
                                <div class="carousel">
                                @foreach ($refeicoesConfirmadas as $refeicoes)
                                    <a class="carousel-item" href="#one!"><img src="{{ $refeicoes->getImageForImg() }}"></a>
                                @endforeach
                                </div>
                            @break
                            @case('aluno')
                            @case('professor')
                                <h1>Refeições Confirmadas</h1>
                                <div class="carousel">
                                @foreach ($refeicoesConfirmadas as $refeicoes)
                                    <a class="carousel-item" href="#one!"><img src="{{ $refeicoes->getImageForImg() }}"></a>
                                @endforeach
                                </div>
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
