<!DOCTYPE html>
<html lang="en" class="scheme_orange">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Proyecto Web </title>

    <!-- Styles -->
    <link rel='stylesheet' href="{{ URL::asset('fontello/css/fontello.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/settings.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/style.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/shortcodes.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/skin.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/core.animation.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('js/core.customizer/front.customizer.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('js/core.messages/core.messages.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('js/magnific/magnific-popup.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('js/swiper/idangerous.swiper.min.css') }}" type='text/css' media='all' />
</head>
<body>
    <div id="app">
      <!-- start header -->
      <header class="top_panel_wrap top_panel_style_1 scheme_orange">
          <div class="top_panel_wrap_inner top_panel_inner_style_1 top_panel_position_above">
              <!-- top_panel_top -->
              <div class="top_panel_top">
                  <div class="content_wrap clearfix">
                      <div class="top_panel_top_user_area">
                          <ul id="menu_user" class="menu_user_nav">
                              <!-- menu_user_login -->
                              @if (Auth::guest())
                                <li class="menu_user_login">
                                    <a href="{{ url('/login') }}" class="popup_link popup_login_link">Login</a>
                                </li>
                              @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                              @endif
                              <!-- /menu_user_login -->
                          </ul>
                      </div>
                  </div>
              </div>
              <!-- /top_panel_top -->

              <!-- top_panel_middle -->
              <div class="top_panel_middle">
                  <div class="content_wrap">
                      <div class="columns_wrap columns_fluid">
                          <div class="contact_logo">
                              <div class="logo">
                                  <a href="{{ url('/home') }}">
                                      <div class="logo_text"><em>Proyecto</em> Web</div>
                                      <div class="cL"></div>
                                      <div class="logo_slogan">Intro.Desarrollo de aplicciones web</div>
                                  </a>
                              </div>
                          </div>
                          <div class="contact_field_all">
                              <div class="contact_field contact_address">
                                  <span class="contact_icon icon-location"></span>
                                  <span class="contact_label contact_address_1">Tecnologico de Costa Rica <em>Sede San Carlos</em></span>
                                  <div class="cL"></div>
                              </div>
                              <div class="contact_field contact_phone">
                                  <span class="contact_icon icon-phone"></span>
                                  <span class="contact_label contact_phone">506-8465-8742</span>
                                  <div class="cL"></div>
                              </div>
                              <div class="cL"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /top_panel_middle -->
              @yield('navbar')
          </div>
      </header>
      <!-- /end header -->
      </br>


      @yield('content')


      <!-- footer copyright and socials -->
      <div class="copyright_wrap copyright_style_socials">
          <div class="copyright_wrap_inner">
              <div class="content_wrap">
                  <div class="contact_field">
                      <div class="contact_address">
                          <span class="contact_icon icon-location"></span>
                          <span class="contact_label contact_address_1">Tecnologico de Costa Rica
                              <em>Sede San Carlos</em>
                          </span>
                      </div>
                      <div class="contact_phone">
                          <span class="contact_icon icon-phone">8465-8742</span>
                          <span class="contact_label contact_phone_text">2456-7893</span>
                      </div>
                      <div class="cL"></div>
                  </div>
                  <div class="copyright_text">
                      <p> <span class="textDark">Axiom</span>
                          © 2015 All Rights Reserved
                          <a href="#">Terms of Use</a> and
                          <a href="#">Privacy Policy</a>
                      </p>
                  </div>
                  <div class="cL"></div>
                  <div class="sc_socials sc_socials_type_icons sc_socials_size_tiny">
                      <div class="sc_socials_item">
                          <a href="#" target="_blank" class="social_facebook">
                              <span class="icon-facebook"></span>
                          </a>
                      </div>
                      <div class="sc_socials_item">
                          <a href="#" target="_blank" class="social_twitter">
                              <span class="icon-twitter"></span>
                          </a>
                      </div>
                      <div class="sc_socials_item">
                          <a href="#" target="_blank" class="social_instagramm">
                              <span class="icon-instagramm"></span>
                          </a>
                      </div>
                      <div class="sc_socials_item">
                          <a href="#" target="_blank" class="social_linkedin">
                              <span class="icon-linkedin"></span>
                          </a>
                      </div>
                      <div class="sc_socials_item">
                          <a href="#" target="_blank" class="social_gplus">
                              <span class="icon-gplus"></span>
                          </a>
                      </div>
                  </div>
                  <div class="cL"></div>
              </div>
          </div>
      </div>
      <!-- /footer copyright and socials -->
    </div>

    <!--  to_top button -->
        <a href="#" class="scroll_to_top icon-up show" title="Scroll to top"></a>
    <!--  /to_top button -->


    <!-- All Scripts -->
    <script type='text/javascript' src="{{ URL::asset('js/jquery/jquery.js') }}"></script>
    <script type='text/javascript' src="{{URL::asset('js/popup.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/packed.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/essential-grid/lightbox.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/essential-grid/jquery.themepunch.tools.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/essential-grid/jquery.themepunch.essential.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/skin.customizer.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/_main.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/jquery/jquery.slidemenu.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/core.utils.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/core.init.min.js')}}"></script>
    <!-- <script type="text/javascript" src="js/core.customizer/front.customizer.js"></script> -->
    <script type='text/javascript' src="{{URL::asset('js/shortcodes.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/magnific/jquery.magnific-popup.min.js')}}"></script>
    <script type='text/javascript' src="{{URL::asset('js/isotope.pkgd.min.js')}}"></script>
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?key=AIzaSyDn9UB2wvA0MzFebL3wLl2KeRys14X2GBw'></script>
    <script type='text/javascript' src='js/google-map/core.googlemap.min.js'></script>
    <!-- All Scripts -->
</body>
</html>
