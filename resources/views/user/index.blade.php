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
    <h5 class="sc_title sc_title_regular">Administar Usuarios</h5>
    <div class="sc_line sc_line_style_solid"></div>
        <div class="text_column content_element ">
            <table class="table_shortcodes">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>esAdmin</th>
                        <th>Habilitado</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td class="item">{{ $user->name }}</td>
                            <td class="item">{{ $user->email }}</td>
                            <td class="item">{{ $user->esAdmin }}</td>
                            <td class="item">{{ $user->habilitado }}</td>
                            <td>
                              @if(Auth::user()->name != $user->name)
                                <div class="columns_wrap sc_columns_count_3">
                                  <div class="column-1_3 ">
                                    </div>
                                    <div class="column-1_3 ">
                                      <form class="" action="/user/{{ $user->id }}" method="post">
                                          <input type="hidden" name="_method" value="delete">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input class="sc_button sc_button_square sc_button_style_filled sc_button_size_small small" type="submit" name="name" value="Deshabilitar">
                                      </form>
                                    </div>
                                    <div class="column-1_3 ">
                                    </div>
                                </div>
                              @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
