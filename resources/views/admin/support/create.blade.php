<div>
  <h1>Nova Dúvida</h1>

  <x-alert />

  <form action="{{ route('support.store') }}" method="POST">
    @include('admin.support.partials.form')
  </form>

</div>
