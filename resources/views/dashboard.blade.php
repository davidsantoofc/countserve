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
                        $perfil = Auth::user()->pessoa->perfil;

                        switch ($perfil) {
                            case 'administrador':
                                echo '
                                <h1>Refeições Cadastradas</h1>
                                <div class="carousel">
                                    <a class="carousel-item" href="#one!"><img src="img/background1.png"></a>
                                    <a class="carousel-item" href="#two!"><img src="img/bannerHome.jpg"></a>
                                    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                                    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                                    <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
                                </div>';
                                break;
                            case 'aluno':
                            case 'professor':
                                echo '
                                <h1>Refeições Confirmadas</h1>
                                <div class="carousel">
                                    <a class="carousel-item" href="#one!"><img src="img/background1.png"></a>
                                    <a class="carousel-item" href="#two!"><img src="img/bannerHome.jpg"></a>
                                    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                                    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                                    <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
                                </div>';
                            break;
                        }
                    @endphp

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>