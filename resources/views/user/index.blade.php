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
                            <li class="current-menu-item"><a href="{{ url('/user') }}">Administrar Usuarios </a></li>
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
    <h5 class="sc_title sc_title_regular">Table</h5>
    <div class="sc_line sc_line_style_solid"></div>
        <div class="text_column content_element ">
            <table class="table_shortcodes">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="align_left">Description</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td class="item"><span class="textDark">1</span></td>
                        <td class="item"><a href="#"><em>Item #1</em></a></td>
                        <td>Lorem ipsum dolor sit amet, consectetur</td>
                        <td class="item"><span class="textDark"><em>$10</em></span></td>
                    </tr>
                    <tr>
                        <td class="item"><span class="textDark">2</span></td>
                        <td class="item"><a href="#"><em>Item #2</em></a></td>
                        <td>Ut enim ad minim veniam</td>
                        <td class="item"><span class="textDark"><em>$20</em></span></td>
                    </tr>
                    <tr>
                        <td class="item"><span class="textDark">3</span></td>
                        <td class="item"><a href="#"><em>Item #3</em></a></td>
                        <td>eiusmod tempor incididunt</td>
                        <td class="item"><span class="textDark"><em>$70</em></span></td>
                    </tr>
                    <tr>
                        <td class="item"><span class="textDark">4</span></td>
                        <td class="item"><a href="#"><em>Item #4</em></a></td>
                        <td>Lorem ipsum dolor sit amet, consectetur</td>
                        <td class="item"><span class="textDark"><em>$100</em></span></td>
                    </tr>
                    <tr>
                        <td class="item"><span class="textDark">5</span></td>
                        <td class="item"><a href="#"><em>Item #5</em></a></td>
                        <td>Ut enim ad minim veniam</td>
                        <td class="item"><span class="textDark"><em>$350</em></span></td>
                    </tr>
                    <tr>
                        <td class="p1e" colspan="3">
                        	<span class="textDark">
                        		<strong>TOTAL</strong>
                        	</span>
                        </td>
                        <td class="p1e item">
                        	<span class="accent1"><em>$1000</em></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
