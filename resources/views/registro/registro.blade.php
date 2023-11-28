<x-guest-layout>
   <div class="row">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                    <label for="first_name">Nome</label>
                    <input id="first_name" type="text" class="validate" name="name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password">Password</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s12">
                    <label for="dt_nasc">Data de Nascimento</label>
                    <input type="date" class="validate" name="dt_nasc" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="turm_num" type="number" class="validate" name="turm_num">
                    <label for="turm_num">Turma</label>
                    </div>
                </div>
                <div class="input-field col s12">
                <select name="perfil" required>
                    <option value="" disabled selected>Selecione um perfil</option>
                    <option value="administrador">Administrador</option>
                    <option value="professor">Professor</option>
                    <option value="aluno">Aluno</option>
                </select>
                <label>Perfil</label>
                </div>
                <div class="row center-align">
                    <button class="waves-effect waves-light btn" name="action">
                        Cadastrar
                        <i class="material-icons left">send</i>
                    </button>
                </div>
            </form>
        </div>
</x-guest-layout>
