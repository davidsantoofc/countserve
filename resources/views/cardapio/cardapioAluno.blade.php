<x-app-layout>
    <x-slot name="header">
        <div class="row listarCardapioRow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight col s6">
                {{ __('Cardapio') }}
            </h2>
        </div>
    </x-slot>

    <section class="container">
        <section class="items">
        <form name="lista" action="{{route('cardapio.agendarCardapio')}}" method="post">
            @csrf
            
            @foreach($cardapios as $cardapio)
            <div class="item row card-panel hoverable">
                <div class="col s12 m6 l5">
                    <img class="responsive-img" width="300px" src="{{ $cardapio->getImageForImg() }}">
                </div>
                <div class="col s12 m6 l7">
                    <div class="row">
                        <h4 class="left-align col s12">{{ $cardapio['nome'] }}</h4>
                        <p class="col s12 left-align">{{ $cardapio['acompanhamento'] }}</p>
                        <p class="col s12 left-align">{{date_format(date_create($cardapio['data']),"d/m/Y")}}</p>
                        <div class="row s12 left-align">
                            
                                
                                <p>
                                    <label>
                                        <input name="{{$cardapio['id']}}" type="radio" value="confirmado"/>
                                        <span>Confirmar</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input name="{{$cardapio['id']}}" type="radio" value="cancelado"/>
                                        <span>Cancelar</span>
                                    </label>
                                </p>
                                
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <button type="submit" class="waves-effect waves-light btn-small">
                <i class="material-symbols-outlined left">
                    send
                </i>
                Enviar
            </button>
            </form>
        </section>
    </section>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>M.AutoInit();</script>

</x-app-layout>
