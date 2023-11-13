<!-- resources/views/cardapio/formCadastrar.blade.php -->

<form method="POST" action="{{ route('cardapio.store')}}" enctype="multipart/form-data">
    @csrf

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" accept="image/png, image/jpeg" required>
    <br><br><br>
    <!-- Campos do formulário vão aqui -->
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="acompanhamento">Acompanhamentos:</label>
    <input type="text "name="acompanhamento" id="acompanhamento" required>

    <!-- Botão para submeter o formulário -->
    <button class="waves-effect waves-green btn">Cadastrar</button>
</form>
