@extends('layouts.app')

@section('content')
  <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
      <div class="post_item post_item_property post_item_property_3 post_format_standard even">
          <div class="post_featured">
              <div class="post_thumb" data-image="http://placehold.it/370x180">
                  <img alt="{{ $bien->localizacion }}" src="http://placehold.it/370x180">
              </div>
              <span class="property_status_list">{{ $bien->venta_alquiler }}</span>
          </div>

          <div class="post_content isotope_item_content">
              <div class="property_type_single">{{ $bien->entidad }}</div>
              <div class="property_price">${{ $bien->precio }}</div>
              <h4 class="post_title">
                  <a href="#">{{ $bien->provincia }}, {{ $bien->canton }}, {{ $bien->distrito }}</a>
              </h4>
              <div class="cL"></div>
              <div class="post_descr">
                  <div class="property_area">{{ $bien->tamano }} m2</div>
                  <div class="property_meta">
                      <span class="property-bedrooms">{{ $bien->banos }}</span>
                      <span class="property-bathrooms">{{ $bien->cuartos }}</span>
                  </div>
                  <div class="cL"></div>
              </div>
          </div>
      </div>
  </div>

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
  <div>
    <form>

    </form>
  </div>
@endsection
