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
                            <form action="#">
                                <input type="hidden" value="{{ $cardapio['id'] }}">
                                <p>
                                    <label>
                                        <input name="status" type="radio"/>
                                        <span>Confirmar</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input name="status" type="radio"/>
                                        <span>Cancelar</span>
                                    </label>
                                </p>
                                <a class="waves-effect waves-light btn-small">
                                    <i class="material-symbols-outlined left">
                                        send
                                    </i>
                                    Enviar
                                </a>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- Modal Excluir-->
                <div id="modalExcluir{{$cardapio['id']}}" class="modal">
                    <div class="modal-content">
                        <form action="{{ route('cardapio.destroy', ['id' => $cardapio['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <h2>Tem certeza que deseja confirmar o cardapio <span class="green-text">{{ $cardapio['nome']}}</span> ?</h2>
                            <div class="modal-footer">
                                <button class="waves-effect waves-green btn">Excluir</button>
                                <a onclick="fecharModalExcluir()" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            @endforeach
        </section>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>M.AutoInit();</script>

</x-app-layout>
