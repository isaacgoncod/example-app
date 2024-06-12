<div>
  <h1>Detalhes da dúvida {{ $support->id }}</h1>
  <a href="{{ route('support.index') }}">Voltar</a>
  <ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
  </ul>

  <form action="{{ route('support.destroy', $support->id)}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Excluir</button>
  </form>
</div>
