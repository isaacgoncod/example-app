<div>
  <h1>Dúvida: {{ $support->id }} </h1>

  <x-alert />

  <form action="{{ route('support.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.support.partials.form', ['support' => $support])
  </form>
</div>
