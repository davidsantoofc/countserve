<x-app-layout>
    <x-slot name="header">
        <div class="row listarCardapioRow">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight col s6">
                {{ __('Cardapio') }}
            </h2>
            <div class="col s6 center-align">
                <button class="waves-effect waves-light btn modal-trigger" onclick="abrirModalCadastrar()">
                    <i class="material-symbols-outlined left">
                        menu_book
                    </i>
                    Cadastrar Cardápio
                </button>
            </div>
        </div>
    </x-slot>
    <section class="container">

        <!-- Overlay (fundo escuro) -->
        <div id="overlay"></div>

        <!-- Modal Cadastrar -->
        <div id="modalCadastrar" class="modal">
            <div class="modal-content">
                @include('cardapio.formCadastrar')
            </div>
            <div class="modal-footer">
                <a onclick="" class="waves-effect waves-green btn">Cadastrar</a>
                <a onclick="fecharModalCadastrar()" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
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
                        <p class="col s12 left-align">{{ $cardapio['acompanhamento'] }}</p>
                        <div class="row s12 left-align">

                            <button class="col s2 left-align waves-effect waves-light btn" width="50px">
                                <i class="material-symbols-outlined left">
                                    edit
                                </i>
                                    Editar
                            </button>
                                <button class="col s2 left-align waves-effect waves-light btn" width="50px" onclick="abrirModalExcluir()">
                                <i class="material-symbols-outlined left">
                                    delete
                                </i>
                                    Excluir
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal Excluir-->
            <div id="modalExcluir" class="modal">
                <div class="modal-content">
                    <form action="{{ route('cardapio.destroy', ['id' => $cardapio['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <h2>Tem certeza que deseja excluir o cardapio <span class="green-text">{{ $cardapio['nome']}}</span> ?</h2>
                        <div class="modal-footer">
                            <button class="waves-effect waves-green btn">Excluir</button>
                            <a onclick="fecharModalExcluir()" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

            @endforeach
        </section>
    </section>

    <script>
        function abrirModalCadastrar(){
            document.getElementById("modalCadastrar").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function abrirModalExcluir(){
            document.getElementById("modalExcluir").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function fecharModalCadastrar(){
            document.getElementById("modalCadastrar").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        function fecharModalExcluir(){
            document.getElementById("modalExcluir").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

    <script src="js/materialize.min.js"></script>

</x-app-layout>
