@extends('layouts.app')

@section('header')
<!-- top_panel_bottom -->
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
                  <li class="current-menu-item">
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
  <!-- .page_content_wrap> -->
  <div class="wrapper">
      <div id="sc_googlemap_1" class="sc_googlemap" data-zoom="16" data-style="default">
          <div id="sc_googlemap_2" class="sc_googlemap_marker" data-title="" data-description="" data-address="1, Central Road, Chicago" data-latlng="" data-point="images/map_marker.png">
          </div>
      </div>
  </div>

	<div class="wrapper contact_form_main">
    <div class="sc_content content_wrap">
        <h1 class="sc_title sc_title_regular sc_align_center contact_text" >Contact Us</h1>
          <div class="sc_contact_form sc_contact_form_standard sc_contact_form_style_1">
              <form id="sc_contact_form_1" data-formtype="contact" method="post" action="include/sendmail.php">
                  <div class="sc_contact_form_info">
                      <div class="sc_contact_form_item sc_contact_form_field label_over">
                      	<label class="required" for="sc_contact_form_username">Name</label>
                      	<input id="sc_contact_form_username" type="text" name="username" placeholder="Name *">
                      </div>
                      <div class="sc_contact_form_item sc_contact_form_field label_over">
                      	<label class="required" for="sc_contact_form_email">E-mail</label>
                      	<input id="sc_contact_form_email" type="text" name="email" placeholder="E-mail *">
                      </div>
                      <div class="sc_contact_form_item sc_contact_form_field label_over">
                      	<label class="required" for="sc_contact_form_subj">Subject</label>
                      	<input id="sc_contact_form_subj" type="text" name="subject" placeholder="Subject">
                      </div>
                  </div>
                  <div class="sc_contact_form_item sc_contact_form_message label_over">
                  	<label class="required" for="sc_contact_form_message">Message</label>
                  	<textarea id="sc_contact_form_message" name="message" placeholder="Message"></textarea>
                      <div class="sc_contact_form_item sc_contact_form_button">
                      	<button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium">
                      		Send Message
                      	</button>
                      </div>
                  </div>
                  <div class=cL></div>
                  <div class="result sc_infobox"></div>
              </form>
          </div>
    </div>
</div>
<!-- </.page_content_wrap> -->
<footer class="contacts_wrap scheme_orange">
		<div class="contacts_wrap_inner">
        <div class="contacts_wrap_left">
            <div class="logo">
                <a href="index.html">
                    <div class="logo_text"><em>Examen</em> Web</div>
                    <div class="cL"></div>
                    <div class="logo_slogan">Intro.Desarrollo de Aplicaciones Web </div>
                    <div class="cL"></div>
                </a>
            </div>
        </div>
        <div class="contacts_wrap_right">
            <div class="contacts_address">
                <address class="address">
					San Carlos / Santa Clara<br> Telefono: 506-8465-8742<br> Fax: 888-765-4321
				</address>
            </div>
        </div>
        <div class="cL"></div>
    </div>
</footer>

@endsection