<!-- resources/views/cardapio/formCadastrar.blade.php -->

<form method="POST" action="{{ route('cardapio.update', ['id' => $cardapio->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <input type="hidden" name="id" id="id" value="{{$cardapio->id}}">
        <!-- Campos do formulário vão aqui -->
        <div class="row">
            <div class="input-field col s12">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{$cardapio->nome}}" required>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <label for="acompanhamento">Acompanhamentos:</label>
                <input type="text" name="acompanhamento" id="acompanhamento" value="{{$cardapio->acompanhamento}}" required>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col s6">
                <label for="foto">Foto:</label>
                <img src="{{$cardapio->getImageForImg()}}" width="100px" alt="Foto da refeição" id="preview-img">
            </div>
            <div class="input-field col s12">
                <input type="file" name="foto" id="foto" accept="image/png, image/jpeg" onchange="previewImage()">
            </div>
        </div>

        <div class="row">
            <button class="waves-effect waves-green btn">Alterar</button>
        </div>
    </div>
</form>

<script>
        function previewImage() {
            var input = document.getElementById('foto');
            var preview = document.getElementById('preview-img');
            
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
</script>
