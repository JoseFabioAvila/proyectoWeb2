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
                    <li class="dropdown">
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
  <div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap">
        <div class="content">

          <div class="wrapper search_section_main TabsPropertySearch sc_tabs_content">
            <div class="sc_tabs_title_box sc_property_search_box">
              <form method="get" action="">
                <div class="sc_property_search_content">
                  <div class="columns_wrap sc_columns">
                    <div class="column-1_3 sc_column_item">
                      <label for="canton" class="col-md-4 control-label">Canton</label></br>
                      <input id="canton" type="text" class="form-control" name="canton" value="" required autofocus>
                    </div>
                    <div class="column-1_3 sc_column_item">
                      <label for="provincia" class="col-md-4 control-label">Provincia</label></br>
                      <input id="provincia" type="text" class="form-control" name="provincia" required autofocus>
                    </div>
                    <div class="column-1_3 sc_column_item">
                      <label for="distrito" class="col-md-4 control-label">Distrito</label></br>
                      <input id="distrito" type="text" class="form-control" name="distrito" required autofocus>
                    </div>
                    <div class="column-1_4 sc_column_item">
                      <label for="cantidad_banos" class="col-md-4 control-label">Cantidad de baños</label></br>
                      <input id="cantidad_banos" type="text" class="form-control" name="cantidad_banos" required autofocus>
                    </div>
                    <div class="column-1_4 sc_column_item">
                      <label for="cantidad_cuartos" class="col-md-4 control-label">Cantidad de Cuartos</label></br>
                      <input id="cantidad_cuartos" type="text" class="form-control" name="cantidad_cuartos" required autofocus>
                    </div>
                    <div class="column-1_4 sc_column_item">
                      <label for="precio_minimo" class="col-md-4 control-label">Precio Minimo</label></br>
                      <input id="precio_minimo" type="text" class="form-control" name="precio_minimo" required autofocus>
                    </div>
                    <div class="column-1_4 sc_column_item">
                      <label for="precio_maximo" class="col-md-4 control-label">Precio Maximo</label></br>
                      <input id="precio_maximo" type="text" class="form-control" name="precio_maximo" required autofocus>
                    </div>
                  </div>
                </div>
                <input type="submit" class="sc_button_size_medium" name="property_search" value="Search">
              </form>
            </div>
          </div>

            <div class="main_isotope isotope_wrap">


            @foreach ($bienes as $bien)
              @if($bien->habilitado == "habilitado")
            <!--div class="main_isotope isotope_wrap"-->
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
            <!--/div-->
              @endif
            @endforeach
            </div>
        </div>
    </div>
  </div>
@endsection
