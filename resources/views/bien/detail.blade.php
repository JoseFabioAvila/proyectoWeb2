@extends('layouts.app')

@section('navbar')
<div class="top_panel_bottom">
    <div class="content_wrap clearfix">
        <a href="#" class="menu_main_responsive_button icon-down">Home</a>
          <!--responsive_main_menu -->
          <nav class="menu_main_nav_area">
              <ul id="menu_main" class="menu_main_nav">
                  <li class=current-"menu-item">
                      <a href="{{ url('/home') }}">
                          Home
                      </a>
                  </li>
                  <li class="menu-item">
                      <a href="{{ url('/contact') }}">
                          Contact Us
                      </a>
                  </li>

                  @if(Auth::user()->esAdmin == 'true')
                    <li class="current-menu-item dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Opciones de Administrador <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/bien/create') }}"> Crear Bien </a></li>
                            <li><a href="{{ url('#') }}">Administrar Bienes </a></li>
                            <li><a href="{{ url('#') }}">Administrar Usuarios </a></li>
                        </ul>
                    </li>
                  @endif
              </ul>
          </nav>
          <!--/responsive_main_menu -->
    </div>
</div>
@endsection

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


  <div class="comments_wrap">
		<div id="comments" class="comments_list_wrap">
			<h2 class="section_title comments_list_title">Commentarios</h2>
			<ul class="comments_list">
        @foreach ($comentarios as $comentario)
          @if($bien->id == $comentario->bien)
    				<li id="comment-3" class="comment even thread-even depth-1 comment_item">
    					<div class="comment_item_bg">
                @foreach ($users as $user)
                  @if($user->id == $comentario->user)
        						<div class="comment_author_avatar">
        							<img alt="" src="http://www.internetcommerce.org/wp-content/uploads/2016/06/member-profile-richard-lau-60x60.jpg" class="avatar avatar-75 photo">
        						</div>
        						<div class="comment_content">
        							<div class="comment_info">
        								<span class="comment_author">{{ $user->name }}</span>
        							</div>
        							<div class="comment_text_wrap">
        								<div class="comment_text">
        									<p>{{ $comentario->comentario }}</p>
        								</div>
        							</div>
        							<div class="comment_reply">
                        @if($comentario->habilitado == "true")
          								<a class="comment-reply-link" href="#" aria-label="Reply to Mike Newton">
          									Deshabilitar
          								</a>
                        @else
                          <a class="comment-reply-link" href="#" aria-label="Reply to Mike Newton">
                            Habilitar
                          </a>
                        @endif
        							</div>
        						</div>
                  @endif
                @endforeach
    					</div>
    				</li>
          @endif
        @endforeach
			</ul>
			<div class="comments_pagination"></div>
		</div>


		<div class="comments_form_wrap">
			<h2 class="section_title comments_form_title">Agregar Comentario</h2>
			<div class="comments_form">
				<div id="respond" class="comment-respond">
					<form action="{{ url('/bien/comment') }}" method="post" id="commentform" class="comment-form">
						<div class="comments_field comments_message">
							<label for="comentario" class="required">Comentario</label>
							<textarea id="comment" name="comentario" placeholder="Comentario" aria-required="true"></textarea>
						</div>
						<div class="columns_wrap">
							<div class="comments_field comments_author">
								<label for="author" class="required">Name</label>
								<input id="author" name="author" type="text" placeholder="Name *" value="{{Auth::user()->name}}" size="30" aria-required="true">
							</div>
							<div class="comments_field comments_email">
								<label for="email" class="required">Email</label>
								<input id="email" name="email" type="text" placeholder="Email *" value="{{Auth::user()->email}}" size="30" aria-required="true">
                <!--input type="hidden" name="id_user" value="{{ Auth::user()->id }}"-->
                <input type="hidden" name="id_bien" value="{{ $bien->id }}">
							</div>
						</div>
						<div class="cL"></div>
						<p class="form-submit">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input name="submit" type="submit" id="send_comment" class="submit" value="Post Comment">
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
