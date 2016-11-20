@extends('layouts.app')

@section('content')
<div class="wrapper contact_form_main">
  <div class="sc_content content_wrap">
      <h1 class="sc_title sc_title_regular sc_align_center contact_text" >Crear Bien</h1>
        <div class="sc_contact_form sc_contact_form_standard sc_contact_form_style_1">
            <form class="form-horizontal" role="form" action="{{ url('/bien') }}" method="post">
              <!-- Column 1 -->
              <div class="sc_contact_form_info">
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="provincia">Provincia</label>
                  <input type="text" name="provincia" placeholder="Provincia">
                </div>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="canton">Canton</label>
                  <input id="sc_contact_form_email" type="text" name="canton" placeholder="Canton">
                </div>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="distrito">Distrito</label>
                  <input id="sc_contact_form_subj" type="text" name="distrito" placeholder="Distrito">
                </div>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="localizacion">Localizacion</label>
                  <input id="" type="text" name="localizacion" placeholder="Localizacion">
                </div>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="descripcion">Descripcion</label>
                  <input id="" type="text" name="descripcion" placeholder="Descripcion">
                </div>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="tamano">Tamaño</label>
                  <input id="" type="text" name="tamano" placeholder="Tamaño">
                </div></br>
              </div>
              <!-- Column 2 -->
              <div class="sc_contact_form_item sc_contact_form_message label_over">
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="cuartos">Cuartos</label>
                  <input id="" type="text" name="cuartos" placeholder="Cuartos">
                </div></br>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="banos">Baños</label>
                  <input id="" type="text" name="banos" placeholder="Baños">
                </div></br>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="precio">Precio</label>
                  <input id="" type="text" name="precio" placeholder="Precio">
                </div></br>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="entidad">Entidad</label>
                  <input id="" type="text" name="entidad" placeholder="Entidad">
                </div></br>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="contacto_email">Contacto</label>
                  <input id="" type="text" name="contacto_email" placeholder="Contacto">
                </div></br>
                <div class="sc_contact_form_item sc_contact_form_field label_over">
                  <label class="required" for="venta_alquiler">Venta Alquiler</label>
                  <input id="" type="text" name="venta_alquiler" placeholder="Venta Alquiler">
                </div></br>
              </div>


              <div class="sc_contact_form_item sc_contact_form_button">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium">
                  Crear
                </button>
              </div>
            </form>
        </div>
  </div>
</div>
@endsection
