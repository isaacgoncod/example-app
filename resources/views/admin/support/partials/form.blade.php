<div>
  @csrf
  <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}">

  <textarea name="body" cols="30" rows="5" placeholder="Descrição">
        {{ $support->subject ?? old('body') }}
        </textarea>

  <button type="submit">Enviar</button>
</div>
