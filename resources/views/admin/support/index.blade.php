@extends('admin.layouts.app')

@section('title', 'Suportes')

@section('header')
  <h1>Listagem dos Suportes</h1>
@endsection

@section('content')
  <div class="py-6">

    <div class="flex justify-center">
      <a href="{{ route('support.create') }}">
        <button class="btn bg-green-500 text-white hover:bg-green-600">
          Criar Dúvida
        </button>
      </a>
    </div>

    <div class="overflow-x-auto px-10">
      <table class="table">
        <thead>
          <th>Assunto</th>
          <th>Status</th>
          <th>Descrição</th>
          <th></th>
        </thead>
        <tbody>
          @if (empty($supports))
            <tr>
              <td colspan="3">Nenhum suporte encontrado</td>
            </tr>
          @endif

          @foreach ($supports->items() as $support)
            <tr>
              <td>
                {{ $support->subject }}
              </td>
              <td>
                {{ getStatusSupport($support->status) }}
              </td>
              <td>
                {{ $support->body }}
              </td>
              <td>
                <div class="flex justify-center gap-4">
                  <a href="{{ route('support.show', $support->id) }}"><button
                      class="btn bg-blue-500 text-white hover:bg-blue-600">Detalhes</button> </a>
                  <a href="{{ route('support.edit', $support->id) }}"><button
                      class="btn bg-yellow-500 text-white hover:bg-yellow-600">Editar</button></a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <x-pagination :paginator="$supports" :appends="$filters" />
@endsection
