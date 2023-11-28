@if(session('sucesso'))
    <p style="color: green;">{{session('sucesso')}}</p>
@elseif (session('error'))
    <p style="color: red;">{{session('error')}}</p>
@endif