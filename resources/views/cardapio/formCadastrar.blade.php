<!-- resources/views/cardapio/formCadastrar.blade.php -->

<form method="POST" action="#">
    @csrf

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" required>
    <br><br><br>
    <!-- Campos do formulário vão aqui -->
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="acompanhamentos">Acompanhamentos:</label>
    <input name="text" id="acompanhamentos" required>

    <!-- Botão para submeter o formulário -->
    <!-- <button type="submit" class="waves-effect waves-green btn">Cadastrar</button> -->
</form>