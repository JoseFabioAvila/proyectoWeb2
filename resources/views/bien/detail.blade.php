@extends('layouts.app')

@section('navbar')
<div class="top_panel_bottom">
    <div class="content_wrap clearfix">
        <a href="#" class="menu_main_responsive_button icon-down">Home</a>
          <!--responsive_main_menu -->
          <nav class="menu_main_nav_area">
              <ul id="menu_main" class="menu_main_nav">
                  <li class="current-menu-item">
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
                    <li class="menu-item dropdown">
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

  <div class="page_content_wrap page_paddings_no">
      <div class="content_wrap">
          <div class="content">
             <div class="singlePropertyTitile">
                  <div class="singlePropertyStatusList">{{ $bien->venta_alquiler }}</div>
                  <div class="singlePropertyTitileId">
                      <h1>{{ $bien->provincia }}, {{ $bien->canton }}, {{ $bien->distrito }}</h1>
                      <!--div class="singlePropertyId"><h2>{{ $bien->entidad }}</h2></div-->
                  </div>
                  <div class="cL"></div>
              </div>

              <div class="column-5_7 main_content_single">
                  <div class="sc_property_info_box">
                      <div class="sc_property_info_box_price">Precio: $ {{$bien->precio}}<span></span></div>
                      <div class="sc_property_info_area_meta">
                          <div class="sc_property_info_item_area">Area: {{$bien->tamano}} m2</div>
                          <div class="sc_property_item_meta">
                              <span class="bedrooms">{{$bien->cuartos}} Habitaciones</span>
                              <span class="bathrooms">{{$bien->banos}} Baños</span>
                          </div>
                      </div>
                      <div class="cL"></div>
                  </div>
                  <h5 class="sc_title sc_title_regular descriptions">Descripcion</h5>
                  <div class="sc_line sc_line_style_solid"></div>
                  <figure class="sc_image alignleft sc_image_shape_square image_element">
                      <img src="http://placehold.it/270x180" alt="">
                  </figure>
                  <div class="text_column content_element ">
                      <div class="wrapper">
                          <p>{{$bien->descripcion}}</p>
                      </div>
                  </div>
                   <div class="cL"></div>

                  <h5 class="sc_title sc_title_regular property_map">property map</h5>
                  <div class="sc_line sc_line_style_solid"></div>
                  <div id="sc_googlemap_1" class="sc_googlemap sc_googlemap22 inited" data-zoom="16" data-style="default" style="position: relative; overflow: hidden;">
                    <div id="sc_googlemap_2" class="sc_googlemap_marker" data-title="" data-description="" data-address="Quesada, San Carlos, Costa Rica" data-latlng="10.348668,-84.433179" data-point="images/map_marker.png">
                    </div>
                    <div style="height: 100%; width: 100%; position: absolute; background-color: rgb(229, 227, 223);">
                      <div class="gm-err-container">
                        <div class="gm-err-content">
                          <div class="gm-err-icon">
                            <img src="http://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" draggable="false" style="user-select: none;">
                          </div>
                          <div class="gm-err-title">Se ha producido un error.</div>
                          <div class="gm-err-message">Esta página no ha cargado Google Maps correctamente. Descubre los detalles técnicos del problema en la consola de JavaScript.</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="comments_wrap">
                		<div id="comments" class="comments_list_wrap">
                			<h2 class="section_title comments_list_title">Commentarios</h2>
                			<ul class="comments_list">
                        @foreach ($comentarios as $comentario )
                          @if($bien->id == $comentario->bien)
                            @if(Auth::user()->esAdmin == 'true')
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
                                        @if(Auth::user()->esAdmin == 'true')
                                          <?php
                                            $mensaje = "";
                                            if ($comentario->habilitado == "true"):
                                            $mensaje = "Deshabilitar";?>
                                          <?php else:
                                            $mensaje = "Habilitar";?>
                                          <?php endif; ?>
                                          <form class="btn" action="{{ URL::route('comentario.destroy',$comentario['id']) }}" method="POST">
                                            <div class="comment_reply">
                                              <input type="hidden" name="_method" value="DELETE">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <button class="comment-reply-link" aria-label="{{$mensaje}}">
                                                {{$mensaje}}
                                              </button>
                                            </div>
                                          </form>
                                        @endif
                          						</div>
                                    @endif
                                  @endforeach
                      					</div>
                      				</li>
                            @elseif(Auth::user()->esAdmin == 'false')

                              @foreach ($users as $user)
                                @if($user->id == $comentario->user && $comentario->habilitado != "false")
                                  <li id="comment-3" class="comment even thread-even depth-1 comment_item">
                                    <div class="comment_item_bg">
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
                                      </div>
                                    </div>
                                  </li>
                                @endif
                              @endforeach
                            @endif
                          @endif
                        @endforeach
                			</ul>
                			<div class="comments_pagination"></div>
                		</div>


                		<div class="comments_form_wrap">
                			<h2 class="section_title comments_form_title">Agregar Comentario</h2>
                			<div class="comments_form">
                				<div id="respond" class="comment-respond">
                					<form action="{{ url('/comentario') }}" method="post" id="commentform" class="comment-form">
                						<div class="comments_field comments_message">
                							<label for="comentario" class="required">Comentario</label>
                							<textarea id="comment" name="comentario" placeholder="Comentario" aria-required="true"></textarea>
                						</div>
                						<div class="columns_wrap">
                							<div class="comments_field comments_author">
                								<label for="author" class="required">Name</label>
                								<input id="author" name="author" type="text" placeholder="Name *" value="{{Auth::user()->name}}" size="30" aria-required="true" readonly>
                							</div>
                							<div class="comments_field comments_email">
                								<label for="email" class="required">Email</label>
                								<input id="email" name="email" type="text" placeholder="Email *" value="{{Auth::user()->email}}" size="30" aria-required="true" readonly>
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
              </div>

              <div class="column-3_11 sidebar_new">
                  <div class="wrapper">
                      <a href="contact-us.html" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium aligncenter">
                          Contact Us
                      </a>
                      <div class="sc_team_wrap">
                          <div class="sc_team sc_team_style_team-3 sc_slider_nopagination contact_info_sidebar">
                              <h2 class="sc_team_title sc_item_title">Propiedad de {{$bien->entidad}}</h2>
                              <div class="sc_team_item sc_team_item_1 odd first">
                                  <div class="cL"></div>
                                  <div class="post_team_contact_info">
                                      <strong>Correo:</strong> {{$bien->contacto_email}}
                                  </div>
                              </div>
                          </div>
                          <!-- /.sc_team -->
                      </div>
                      <!-- /.sc_team_wrap -->
                  </div>
              </div>
          </div>
      </div>
  </div>



@endsection
