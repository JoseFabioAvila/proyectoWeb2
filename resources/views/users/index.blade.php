<div>
  <h2>Comentarios</h2>
  @foreach ($comentarios as $comentario)
    @if($bien->id == $comentario->bien)
      <div class="media">
        <div class="media-left">
          <a href="#">
            <img class="media-object" src="http://www.internetcommerce.org/wp-content/uploads/2016/06/member-profile-richard-lau-60x60.jpg" alt="...">
          </a>
        </div>
        <div class="media-body">
          @foreach ($users as $user)
            @if($user->id == $comentario->user)
              <h4 class="media-heading">{{ $user->username }}</h4>
            @endif
          @endforeach
          <p>{{ $comentario->comentario }}</p>
        </div>
      </div>
    @endif
  @endforeach
</div>
