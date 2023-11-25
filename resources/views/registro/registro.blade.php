<x-guest-layout>
    <div class="row">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                <label for="first_name">Name</label>
                <input id="first_name" type="text" class="validate" name="name">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="input-field col s12">
                <label for="dt_nasc">Data de Nascimento</label>
                <input type="date" class="validate" name="dt_nasc">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="turm_num" type="number" class="validate" name="turm_num">
                <label for="turm_num">Turma</label>
                </div>
            </div>
            <div class="input-field col s12">
            <select name="perfil">
                <option value="" disabled selected>Selecione um perfil</option>
                <option value="administrador">Administrador</option>
                <option value="professor">Professor</option>
                <option value="aluno">Aluno</option>
            </select>
            <label>Perfil</label>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light #4caf50 green" type="submit" name="action">
                    <i class="material-icons left">send</i>
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
