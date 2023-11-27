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
                    <div class="row"></div>
                    @php
                        $perfil = Auth::user()->pessoa->perfil;

                        switch ($perfil) {
                            case 'administrador':
                                echo '
                                    <div class="col s6 m6">
                                        <div class="card blue-grey darken-1">
                                            <div class="card-content white-text">
                                                <span class="card-title">Cadastro de Cardápios</span>
                                                <p>Cadastre as refeições da semana.</p>
                                            </div>
                                            <div class="card-action">
                                                <a href="/cardapio">Clique aqui!</a>
                                            </div>
                                        </div>
                                    </div>';
                                break;
                            case 'aluno':
                            case 'professor':
                                echo '
                                    <div class="col s6 m6">
                                        <div class="card blue-grey darken-1">
                                            <div class="card-content white-text">
                                                <span class="card-title">Agenda de Refeições</span>
                                                <p>Agende as refeições da semana.</p>
                                            </div>
                                            <div class="card-action">
                                                <a href="/cardapio-aluno">Clique aqui!</a>
                                            </div>
                                        </div>
                                    </div>';
                            break;
                        }
                    @endphp

                                    <div class="col s6 m6">
                                        <div class="card blue-grey darken-1">
                                            <div class="card-content white-text">
                                                <span class="card-title">Pessoas Confirmadas</span>
                                                <p>Visualize quantas pessoas confirmaram de acordo com a data especificada.</p>
                                            </div>
                                            <div class="card-action">
                                                <a href="/agendamentos">Clique aqui!</a>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>