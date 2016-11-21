
@extends('layouts.app')
@section('navbar')
<div class="top_panel_bottom">
    <div class="content_wrap clearfix">
        <a href="#" class="menu_main_responsive_button icon-down">Home</a>
          <!--responsive_main_menu -->
          <nav class="menu_main_nav_area">
              <ul id="menu_main" class="menu_main_nav">
                  <li class="menu-item">
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
                            <li><a href="{{ url('/bien') }}">Administrar Bienes </a></li>
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
<div class="wrapper">
  <div class="content_wrap main_isotope">

    @foreach ($bienes as $bien)
      <div id="sc_tabs_7" class="sc_tabs sc_tabs_style_1 ui-tabs ui-widget ui-widget-content ui-corner-all" data-active="0">
        <ul class="sc_tabs_titles ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
            <li class="sc_tabs_title first ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="sc_tab_1_70" aria-selected="true" aria-expanded="true">
              	<a href="#sc_tab_1_70_1" class="template_button ui-tabs-anchor" id="sc_tab_1_tab" tabindex="-1">
               		<span>Vista</span>
               	</a>
            </li>
            <li class="sc_tabs_title ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="sc_tab_2_18" aria-selected="false" aria-expanded="false">
              	<a href="#sc_tab_2_18_1" class="template_button ui-tabs-anchor" id="sc_tab_11_tab" tabindex="-1">
               		<span>Editar</span>
               	</a>
            </li>
            <li class="sc_tabs_title last ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-selected="false" aria-expanded="false">
              	<a href="#sc_tab_6_1" class="template_button ui-tabs-anchor" id="sc_tab_22_tab" tabindex="-1">
               		<span>Desabilidar</span>
               	</a>
            </li>
        </ul>
        <div class="sc_tabs_title_box">
            <div id="sc_tab_1_70_1" class=" isotope_wrap sc_tabs_content odd first ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="false">
              <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                  <div class="post_item post_item_property post_item_property_3 post_format_standard even">
                      <div class="post_featured">
                          <div class="post_thumb" data-image="http://placehold.it/370x180">
                              <a class="hover_icon hover_icon_link" href="/bien/{{$bien->id}}">
                                  <img alt="{{ $bien->localizacion }}" src="http://placehold.it/370x180">
                              </a>
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
            </div>
            <div id="sc_tab_2_18_1" class="sc_tabs_content even ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="true">
              <form class="form-horizontal" role="form" action="/bien/{{$bien->id}}" method="post">
                {{ csrf_field() }}
                <div class="columns_wrap sc_columns">
                  <div class="column-1_3 sc_column_item">
                    <div>
                        <label for="canton" class="col-md-4 control-label">Canton</label></br>
                        <input id="canton" type="text" class="form-control" name="canton" value="{{$bien->canton}}" required autofocus>
                    </div>
                    <div>
                        <label for="provincia" class="col-md-4 control-label">Provincia</label></br>
                        <input id="provincia" type="text" class="form-control" name="provincia" value="{{$bien->provincia}}" required autofocus>
                    </div>
                    <div>
                        <label for="distrito" class="col-md-4 control-label">Distrito</label></br>
                        <input id="distrito" type="text" class="form-control" name="distrito" value="{{$bien->distrito}}" required autofocus>
                    </div>
                    <div>
                        <label for="localizacion" class="col-md-4 control-label">Localización</label></br>
                        <input id="localizacion" type="text" class="form-control" name="localizacion" value="{{$bien->localizacion}}" required autofocus>
                    </div>
                    <div>
                        <label for="descripcion" class="col-md-4 control-label">Descripción</label></br>
                        <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{$bien->descripcion}}" required autofocus>
                    </div>
                  </div>
                  <div class="column-1_3 sc_column_item">
                    <div>
                        <label for="tamano" class="col-md-4 control-label">Tamaño</label></br>
                        <input id="tamano" type="text" class="form-control" name="tamano" value="{{$bien->tamano}}" required autofocus>
                    </div>
                    <div>
                        <label for="cuartos" class="col-md-4 control-label">Cuartos</label></br>
                        <input id="cuartos" type="text" class="form-control" name="cuartos" value="{{$bien->cuartos}}" required autofocus>
                    </div>
                    <div>
                        <label for="banos" class="col-md-4 control-label">Baños</label></br>
                        <input id="banos" type="text" class="form-control" name="banos" value="{{$bien->banos}}" required autofocus>
                    </div>
                    <div>
                        <label for="precio" class="col-md-4 control-label">Precio</label></br>
                        <input id="precio" type="text" class="form-control" name="precio" value="{{$bien->precio}}" required autofocus>
                    </div>
                    <div>
                        <label for="entidad" class="col-md-4 control-label">Entidad</label></br>
                        <input id="entidad" type="text" class="form-control" name="entidad" value="{{$bien->entidad}}" required autofocus>
                    </div>
                  </div>
                  <div class="column-1_3 sc_column_item">
                    <div>
                        <label for="contacto" class="col-md-4 control-label">Contacto</label></br>
                        <input id="contacto" type="text" class="form-control" name="contacto" value="{{$bien->contacto_email}}" required autofocus>
                    </div>
                    <div>
                        <label for="venta_alquiler" class="col-md-4 control-label">Venta/Alquiler</label></br>
                        <input id="venta_alquiler" type="text" class="form-control" name="venta_alquiler" value="{{$bien->venta_alquiler}}" required autofocus>
                    </div>
                    <div>
                        <label for="estado" class="col-md-4 control-label">Estado(Habilitado)</label></br>
                        <input id="estado" type="text" class="form-control" name="estado" value="{{$bien->habilitado}}"  readonly>
                    </div>
                    </br>
                    <div class="">
                      <input type="hidden" name="_method" value="put">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" name="name" value="Guardar Cambios" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div id="sc_tab_6_1" class="sc_tabs_content odd ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="true">
              <div class="columns_wrap sc_columns">
              <div class="column-1_3 sc_column_item"></div>
              <div class="column-1_3 sc_column_item">
                <?php
                  $mensaje = "";
                  $nuevoEstado = "";
                  if ($bien->habilitado == "habilitado"):
                  $mensaje = "deshabilitar";
                  $nuevoEstado = "deshabilitado"?>
                <?php else:
                  $mensaje = "habilitar";
                  $nuevoEstado = "habilitado"?>
                <?php endif; ?>
                <h1>
                  Este bien se encuentra {{$bien->habilitado}}, desea {{$mensaje}} el bien?
                </h1>
                <form class="btn" action="{{ URL::route('bien.destroy',$bien['id']) }}" method="POST">
						        <input type="hidden" name="_method" value="DELETE">
						        <input type="hidden" name="_token" value="{{ csrf_token() }}">
						        <button class="btn sc_button sc_button_square sc_button_style_filled sc_button_size_large">
						        	{{$mensaje}}
						        </button>
						    </form>
              </div>
              <div class="column-1_3 sc_column_item"></div>
            </div>
            </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
