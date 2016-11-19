@extends('layouts.app')

@section('header')
<!-- top_panel_bottom -->
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
                  <li class="menu-item-has-children">
                      <a href="#">
                          Features
                      </a>
                      <ul class="sub-menu">
                          <li class="menu-item">
                              <a href="search-results.html">
                                  Search Results
                              </a>
                          </li>
                          <li class="menu-item">
                              <a href="appointment.html">
                                  Appointment
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="menu-item">
                      <a href="{{ url('/contact') }}">
                          Contact Us
                      </a>
                  </li>
              </ul>
          </nav>
          <!--/responsive_main_menu -->
    </div>
</div>
<!-- /top_panel_bottom -->
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
