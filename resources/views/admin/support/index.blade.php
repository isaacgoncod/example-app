<div>
  <h1>Listagem dos Suportes</h1>

  <a href="{{ route('support.create') }}">Criar dúvida</a>

  <table>
    <thead>
      <th>Assunto</th>
      <th>Status</th>
      <th>Descrição</th>
      <th></th>
      <th></th>
    </thead>
  </table>
  <tbody>
    @if (empty($supports))
      <tr>
        <td colspan="3">Nenhum suporte encontrado</td>
      </tr>
    @endif

    @foreach ($supports as $support)
      <tr>
        <td>
          {{ $support['subject'] }}
        </td>
        <td>
          {{ $support['status'] }}
        </td>
        <td>
          {{ $support['body'] }}
        </td>
        <td>
            <a href="{{ route('support.show', $support['id']) }}">Saiba mais</a>
        </td>
        <td>
            <a href="{{ route('support.edit', $support['id']) }}">Editar</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</div>
