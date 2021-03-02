

<table class="table">
    <thead>
    <tr>
     <td>id</td>
     <td>id_usuario</td>
     <td>nome veiculo</td>
     <td>link</td>
     <td>ano</td>
     <td>combustivel</td>
     <td>portas</td>
     <td>quilometragem</td>
     <td>cambio</td>
     <td>cor</td>
     <td>ação</td>
    </tr>
     </thead>
    <tbody>
    @foreach($artigos as $artigo)
    <tr>
        <td>{{ $artigo->id }}</td>
        <td>{{ $artigo->id_usuario }}</td>
        <td>{{ $artigo->nome_veiculo }}</td>
        <td><a href="{{ $artigo->link }}" target="_blank" >link</a></td>
        <td>{{ $artigo->ano }}</td>
        <td>{{ $artigo->combustivel }}</td>
        <td>{{ $artigo->portas }}</td>
        <td>{{ $artigo->quilometragem }} km</td>
        <td>{{ $artigo->cambio }}</td>
        <td>{{ $artigo->cor }}</td>
        <td><button class="btn btn-outline-danger btn-sm" onclick="deleteArtigo(this)" data-id="{{ $artigo->id }}" data-route="{{route('deletar_carro')}}">Excluir</button></td>

    </tr>
      @endforeach
    </tbody>

</table>
