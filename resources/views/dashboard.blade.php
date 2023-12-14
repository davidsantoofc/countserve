<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bem vindo(a)!') }}
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

                        $cardapiosCadastrados = App\Models\Cardapio::all();
                        $users = App\Models\User::paginate(6);

                        $refeicoesConfirmadas = Auth::User()->pessoa->agenda;

                        $perfil = Auth::user()->pessoa->perfil;

                    @endphp

                        @switch($perfil)
                            @case ('administrador')
                                <div class="row">
                                    <div class="col s6">
                                    <h2>Refeições Cadastradas</h2>
                                        <div class="carousel">
                                            @foreach ($cardapiosCadastrados as $cardapio)
                                                <a class="carousel-item" href="#"><img src="{{ $cardapio->getImageForImg() }}"></a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <h2>Usuários Cadastrados</h2>
                                        <br>
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Perfil</th>
                                                <th>Agendamentos</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users as $usuario)
                                            <tr>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                @if ($usuario->pessoa)
                                                    <td>{{ $usuario->pessoa->perfil }}</td>
                                                @else
                                                    <td>N/A</td> <!-- Ou qualquer valor padrão que você deseja exibir quando 'perfil' não está disponível -->
                                                @endif
                                                @if ($usuario->pessoa && $usuario->pessoa->agenda !== null)
                                                    <td>{{ $usuario->pessoa->agenda->count() }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="row center">
                                            {{ $users->links('custom.pagination') }}
                                        </div>

                                    </div>
                                </div>
                            <div class="row">
                                <div class="col s6">
                                    <h2>Refeições Confirmadas</h2>
                                        <div class="carousel">
                                        @foreach ($refeicoesConfirmadas as $agenda)
                                            @foreach ($agenda->cardapio as $cardapio)
                                            <a class="carousel-item" href="#one!"><img src="{{ $cardapio->getImageForImg() }}"></a>
                                            @endforeach
                                        @endforeach
                                        </div>
                                </div>
                            </div>
                            @break
                            @case('aluno')
                            @case('professor')
                                <h2>Refeições Confirmadas</h2>
                                <div class="carousel">
                                @foreach ($refeicoesConfirmadas as $agenda)
                                    @foreach ($agenda->cardapio as $cardapio)
                                    <a class="carousel-item" href="#one!"><img src="{{ $cardapio->getImageForImg() }}"></a>
                                    @endforeach
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
