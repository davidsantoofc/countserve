<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cardapio') }}
        </h2>
    </x-slot>
    <section class="container">

        <!--CONTEÚDO-->

        <section class="items">
            @foreach($cardapios as $cardapio)
            <div class="item row card-panel hoverable">
                <div class="col s12 m6 l5">
                    <img class="responsive-img" width="300px" src="{{ $cardapio->getImageForImg() }}">
                </div>
                <div class="col s12 m6 l7">
                    <div class="row">
                        <h4 class="left-align col s12">{{ $cardapio['nome'] }}</h4>
                        <!-- <p class="col s12">{{ $cardapio['descricao'] }}</p> -->
                        <div class="col s12">
                            <button class="center-align" width="50px"> <a href="feijoada.html">Cadastrar</a></button>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            @endforeach
        </section>
    </section>

    <hr>

    <script src="js/materialize.min.js"></script>
</x-app-layout>
