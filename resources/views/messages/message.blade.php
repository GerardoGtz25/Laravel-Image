<img class="img-thumbnail" src="{{ $message->image }}">
<p class="card-text">
  <b>Escrito por: <a href="/{{$message->user->username}}">{{ $message->user->name }}</a></b>
  <small class="text-muted">{{ $message->created_at }}</small>
</p>
<p class="card-text">
  {{ $message->content }}
  <a href="/messages/{{ $message->id}}">Leer más</a>
</p>

