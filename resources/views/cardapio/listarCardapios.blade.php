<x-app-layout>
    @php
        $perfil = Auth::user()->pessoa->perfil;
    @endphp
    @if ($perfil != 'administrador')
        @php
            Auth::guard('web')->logout();
            abort(redirect('/login'));
        @endphp
    @else
        <x-slot name="header">
            <div class="row listarCardapioRow">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight col s6">
                    {{ __('Cardapio') }}
                </h2>
                <div class="col s6 center-align">
                    <a class="waves-effect waves-light btn modal-trigger"  href="#modalCadastrar">
                        <i class="material-symbols-outlined left">
                            menu_book
                        </i>
                        Cadastrar Cardápio
                    </a>
                </div>
            </div>
        </x-slot>

        <section class="container">
            <!-- Modal Cadastrar -->

            <div id="modalCadastrar" class="modal">
                <div class="modal-content">
                    @include('cardapio.formCadastrar')
                </div>
                <div class="modal-footer">
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
                            <p class="col s12 left-align">{{date_format(date_create($cardapio['data']),"d/m/Y")}}</p>
                            <div class="row s12 left-align">

                                <a class="col s2 left-align waves-effect waves-light btn modal-trigger" width="50px" href="#modalEditar{{$cardapio['id']}}">
                                    <i class="material-symbols-outlined left">
                                        edit
                                    </i>
                                        Editar
                                </a>
                                <a class="col s2 left-align waves-effect waves-light btn modal-trigger" width="50px" href="#modalExcluir{{$cardapio['id']}}">
                                    <i class="material-symbols-outlined left">
                                        delete
                                    </i>
                                        Excluir
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
                                <h2>Tem certeza que deseja excluir o cardapio <span class="green-text">{{ $cardapio['nome']}}</span> ?</h2>
                                <div class="modal-footer">
                                    <button class="waves-effect waves-green btn">Excluir</button>
                                    <a onclick="fecharModalExcluir()" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="modalEditar{{$cardapio['id']}}" class="modal">
                        <div class="modal-content">
                            @include('cardapio.formEditar')
                        </div>
                        <div class="modal-footer">
                            <a onclick="fecharModalCadastrar()" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </div>
                    </div>

                </div>

                @endforeach
            </section>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>M.AutoInit();</script>
    @endif
</x-app-layout>
