<x-app-layout>
    <x-slot name="header">
        <div class="row listarCardapioRow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight col s6">
                {{ __('Agendamentos') }}
            </h2>

        </div>
    </x-slot>

        <section class="white container" id="confirmados_id">
            <div class="row">
                <div class="col s12">
                <form action="{{ route('cardapio.agendamentos') }}">
                    <label for="data">Data</label>
                    <input type="date" name="data">
                    <button class="btn">Buscar cardápio da data acima</button>
                </form>
                </div>
                
            </div>
            <div class="row">
            <div class="col s12">
                    <h1>{{date_format(date_create($data),"d/m/Y") }}</h1>
                </div>
            </div>
            
            <div class="row">
            <div class="col s12 m7">
            <div class="card center-align">
                @if (isset($cardapio))
                <div class="card-image" width="100px">
                <img width="100px" src="{{ $cardapio->getImageForImg() }}">
                <span class="card-title">{{ $cardapio['nome'] }}</span>
                </div>
                <div class="card-content">
                <p>Acompanhamentos: {{ $cardapio['acompanhamento'] }}</p>
                </div>
                <div class="card-action">
                <p>{{ $confirmados }} Pessoas confirmadas.</p>
                </div>
                @else
                    <p>Não existe nenhuma refeição na data específica.</p>
                @endif

            </div>
            </div>
            </div>
        </section>

</x-app-layout>
