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
            <div class="wrapper search_section_main">
                <div class="post_content">
                    <div class="sc_content content_wrap">
                        <div class="TabsPropertySearch sc_tabs_content">
                            <div class="sc_tabs_title_box">
                                  <div class="sc_property_search_box">
                                      <!-- RENT TAB -->
                                      <form method="get" action="#">
                                          <div class="sc_property_search_content">
                                                      <label class="sc_property_search_location" for="sc_property_search_location">
                                                      <span>Provincia</span><br>
                                                      <select id="sc_property_search_location" name="search_location">
                                                          <option value="-1">Any</option>
                                                          <option  value="Algo">Algo</option>
                                                          <option  value="Algo">Algo</option>
                                                          <option  value="Algo">Algo</option>
                                                          <option  value="Algo">Algo</option>
                                                      </select>
                                                      </label><label class="sc_property_search_location" for="sc_property_search_location">
                                                      <span>Provincia</span><br>
                                                      <select id="sc_property_search_location" name="search_location">
                                                          <option value="-1">Any</option>
                                                          <option  value="Algo">Algo</option>
                                                          <option  value="Algo">Algo</option>
                                                          <option  value="Algo">Algo</option>
                                                          <option  value="Algo">Algo</option>
                                                      </select>
                                                      </label><label class="sc_property_search_location" for="sc_property_search_location">
                                                          <span>Distrito</span><br>
                                                          <select id="sc_property_search_location" name="search_type_single">
                                                              <option value="-1">Algo</option>
                                                              <option  value="Algo">Algo</option>
                                                              <option  value="Algo">Algo</option>
                                                          </select>
                                                              </label>
                                                      <label class="sc_property_search_bedrooms" for="sc_property_search_bedrooms">
                                                          <span>Min bedrooms</span><br>
                                                          <select id="sc_property_search_bedrooms" name="search_bedrooms">
                                                              <option value="-1">Any</option>
                                                              <option  value="0">0</option>
                                                              <option  value="1">1</option>
                                                              <option  value="2">2</option>
                                                              <option  value="3">3</option>
                                                              <option  value="4">4</option>
                                                              <option  value="5">5</option>
                                                              <option  value="6">6</option>
                                                              <option  value="7">7</option>
                                                              <option  value="8">8</option>
                                                              <option  value="9">9</option>
                                                              <option  value="10">10</option>
                                                          </select>
                                                      </label><label class="sc_property_search_bathrooms" for="sc_property_search_bathroom">
                                                          <span>Min bathrooms</span><br>
                                                          <select id="sc_property_search_bathroom" name="search_bathrooms">
                                                              <option value="-1">Any</option>
                                                              <option  value="0">0</option>
                                                              <option  value="1">1</option>
                                                              <option  value="2">2</option>
                                                              <option  value="3">3</option>
                                                              <option  value="4">4</option>
                                                              <option  value="5">5</option>
                                                              <option  value="6">6</option>
                                                              <option  value="7">7</option>
                                                              <option  value="8">8</option>
                                                              <option  value="9">9</option>
                                                              <option  value="10">10</option>
                                                          </select>
                                                      </label><label class="sc_property_search_area_min" for="sc_property_search_area_min2">
                                                          <span>Min Area (Sq Ft)</span><br>
                                                          <input id="sc_property_search_area_min2" type="text" name="search_area_min" placeholder="Any" value="" ></label><label class="sc_property_search_area_max" for="sc_property_search_area_max2">
                                                          <span>Max Area (Sq Ft)</span><br>
                                                          <input id="sc_property_search_area_max2" type="text" name="search_area_max" placeholder="Any" value="" ></label><label class="sc_property_search_price_min" for="sc_property_search_price_min">
                                                          <span>Min Price</span><br>
                                                          <input id="sc_property_search_price_min" type="text" name="search_price_min" placeholder="Any" value="" ></label><label class="sc_property_search_price_max" for="sc_property_search_price_max2">
                                                          <span>Max Price</span><br>
                                                          <input id="sc_property_search_price_max2" type="text" name="search_price_max" placeholder="Any" value="" ></label>
                                          </div>
                                          <input type="submit" class="sc_button_size_medium" name="property_search" value="Search">
                                      </form>
                                      <!-- /RENT TAB -->
                                  </div>
                            </div>
                        </div>
                    </div>
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

            <!--div class="main_isotope isotope_wrap">
                <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                    <div class="post_item post_item_property post_item_property_3 post_format_standard odd">
                        <div class="post_featured">
                            <div class="post_thumb" data-image="http://placehold.it/370x180">
                                <a class="hover_icon hover_icon_link" href="#">
                                    <img alt="21301 Sw 376 St, Florida City FL" src="http://placehold.it/370x180">
                                </a>
                            </div>
                            <span class="property_status_list">Rent</span>
                        </div>

                        <div class="post_content isotope_item_content">
                            <div class="property_type_single">Apartment</div>
                            <div class="property_price">$1 473<span>per month</span></div>
                            <h4 class="post_title">
                                <a href="#">21301 Sw 376 St, Florida City FL</a>
                            </h4>
                            <div class="cL"></div>
                            <div class="post_descr">
                                <div class="property_area">102 057 Sq Ft</div>
                                <div class="property_meta">
                                    <span class="property-bedrooms">2</span>
                                    <span class="property-bathrooms">2</span>
                                    <span class="property-garages">3</span>
                                </div>
                                <div class="cL"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                    <div class="post_item post_item_property post_item_property_3 post_format_standard even">
                        <div class="post_featured">
                            <div class="post_thumb" data-image="http://placehold.it/370x180">
                                <a class="hover_icon hover_icon_link" href="#">
                                    <img alt="820 N Franklin Av # 820c, Homestead FL" src="http://placehold.it/370x180">
                                </a>
                            </div>
                            <span class="property_status_list">Sale</span>
                        </div>
                        <div class="post_content isotope_item_content">
                            <div class="property_type_single">Apartment</div>
                            <div class="property_price">$77 000</div>
                            <h4 class="post_title">
                                <a href="#">820 N Franklin Av # 820c, Homestead FL</a>
                            </h4>
                            <div class="cL"></div>
                            <div class="post_descr">
                                <div class="property_area">5 890 Sq Ft</div>
                                <div class="property_meta">
                                    <span class="property-bedrooms">2</span>
                                    <span class="property-bathrooms">2</span>
                                    <span class="property-garages">2</span>
                                </div>
                                <div class="cL"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                    <div class="post_item post_item_property post_item_property_3 post_format_standard odd">
                        <div class="post_featured">
                            <div class="post_thumb" data-image="http://placehold.it/370x180">
                                <a class="hover_icon hover_icon_link" href="#">
                                    <img alt="999 Hamilton Dr 999a, Homestead FL" src="http://placehold.it/370x180">
                                </a>
                            </div>
                            <span class="property_status_list">Rent</span>
                        </div>
                        <div class="post_content isotope_item_content">
                            <div class="property_type_single">Apartment</div>
                            <div class="property_price">$697<span>per month</span>
                        </div>
                        <h4 class="post_title">
                            <a href="#">999 Hamilton Dr 999a, Homestead FL</a>
                        </h4>
                            <div class="cL"></div>
                            <div class="post_descr">
                                <div class="property_area">1 195 Sq Ft</div>
                                <div class="property_meta">
                                    <span class="property-bedrooms">3</span>
                                    <span class="property-bathrooms">3</span>
                                    <span class="property-garages">5</span>
                                </div>
                                <div class="cL"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                    <div class="post_item post_item_property post_item_property_3 post_format_standard even">
                        <div class="post_featured">
                            <div class="post_thumb" data-image="http://placehold.it/370x180">
                                <a class="hover_icon hover_icon_link" href="#">
                                    <img alt="550 W 51 Te, Miami Beach FL" src="http://placehold.it/370x180">
                                </a>
                            </div>
                            <span class="property_status_list">Sale</span>
                        </div>
                        <div class="post_content isotope_item_content">
                            <div class="property_type_single">Apartment</div>
                            <div class="property_price">$1 200 000</div>
                            <h4 class="post_title">
                                <a href="#">550 W 51 Te, Miami Beach FL</a>
                            </h4>
                            <div class="cL"></div>
                            <div class="post_descr">
                                <div class="property_area">1 689 Sq Ft</div>
                                <div class="property_meta">
                                    <span class="property-bedrooms">3</span>
                                    <span class="property-bathrooms">2</span>
                                    <span class="property-garages">2</span>
                                </div>
                                <div class="cL"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                    <div class="post_item post_item_property post_item_property_3 post_format_standard odd">
                        <div class="post_featured">
                            <div class="post_thumb" data-image="http://placehold.it/370x180">
                                <a class="hover_icon hover_icon_link" href="#">
                                    <img alt="4060 El Prado Bl, Coconut Grove FL" src="http://placehold.it/370x180">
                                </a>
                            </div>
                            <span class="property_status_list">Sale</span>
                        </div>
                        <div class="post_content isotope_item_content">
                            <div class="property_type_single">Villa</div>
                            <div class="property_price">$1 287 000</div>
                            <h4 class="post_title">
                                <a href="#">4060 El Prado Bl, Coconut Grove FL</a>
                            </h4>
                            <div class="cL"></div>
                            <div class="post_descr">
                                <div class="property_area">3 060 Sq Ft</div>
                                <div class="property_meta">
                                    <span class="property-bedrooms">4</span>
                                    <span class="property-bathrooms">4</span>
                                    <span class="property-garages">2</span>
                                </div>
                                <div class="cL"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="isotope_item isotope_item_property isotope_item_property_3 isotope_column_3">
                    <div class="post_item post_item_property post_item_property_3 post_format_standard even last">
                        <div class="post_featured">
                            <div class="post_thumb" data-image="http://placehold.it/370x180">
                                <a class="hover_icon hover_icon_link" href="#">
                                    <img alt="10804 Sw 132, Miami FL" src="http://placehold.it/370x180">
                                </a>
                            </div>
                            <span class="property_status_list">Rent</span>
                        </div>
                        <div class="post_content isotope_item_content">
                            <div class="property_type_single">Shop</div>
                            <div class="property_price">$284 900<span>per week</span></div>
                            <h4 class="post_title"><a href="#">10804 Sw 132, Miami FL</a></h4>
                            <div class="cL"></div>
                            <div class="post_descr">
                                <div class="property_area">3 060 Sq Ft</div>
                                <div class="property_meta">
                                    <span class="property-bedrooms">4</span>
                                    <span class="property-bathrooms">4</span>
                                    <span class="property-garages">7</span>
                                </div>
                                <div class="cL"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
        </div>
    </div>
  </div>
@endsection
