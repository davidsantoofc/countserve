<x-app-layout>
    <x-slot name="header">
        <div class="row listarCardapioRow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight col s6">
            {{ __('Cardapio') }}
        </h2>
        <div class="col s6 center-align">
            <a class="waves-effect waves-light btn modal-trigger" onclick="abrirModal()"/>
                <i class="material-symbols-outlined left">
                    menu_book
                </i>
                Cadastrar Cardápio
            </a>
        </div>
        </div>
    </x-slot>
    <section class="container">

        <!-- Overlay (fundo escuro) -->
        <div id="overlay"></div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                @include('cardapio.formCadastrar')
            </div>
            <div class="modal-footer">
                <a onclick="" class="waves-effect waves-green btn">Cadastrar</a>
                <a onclick="fecharModal()" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
            </div>
        </div>

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

           
            @endforeach
        </section>
    </section>

    <hr>

    <script>
        function abrirModal(){
            document.getElementById("modal1").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function fecharModal(){
            document.getElementById("modal1").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
    <script src="js/materialize.min.js"></script>
</x-app-layout>
