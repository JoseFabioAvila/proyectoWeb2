@extends('layouts.app')


@section('content')
  <div class="content_wrap">
      <div class="content">
          <form class="form-horizontal" role="form" action="{{ url('/bien') }}" method="post">

            <div class="form-group">
                <label for="provincia" class="col-md-4 control-label">Provincia</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="provincia" value="">
                  {{ ($errors->has('provincia')) ? $errors->first('provincia') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="canton" class="col-md-4 control-label">Canton</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="canton" value="">
                  {{ ($errors->has('canton')) ? $errors->first('canton') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="distrito" class="col-md-4 control-label">Distrito</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="distrito" value="">
                  {{ ($errors->has('distrito')) ? $errors->first('distrito') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="localizacion" class="col-md-4 control-label">Localizacion</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="localizacion" value="">
                  {{ ($errors->has('localizacion')) ? $errors->first('localizacion') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="descripcion" value="">
                  {{ ($errors->has('descripcion')) ? $errors->first('descripcion') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="tamano" class="col-md-4 control-label">Tamaño</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="tamano" value="">
                  {{ ($errors->has('tamano')) ? $errors->first('tamano') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="cuartos" class="col-md-4 control-label">Cuartos</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="cuartos" value="">
                  {{ ($errors->has('cuartos')) ? $errors->first('cuartos') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="banos" class="col-md-4 control-label">Baños</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="banos" value="">
                  {{ ($errors->has('banos')) ? $errors->first('banos') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="precio" class="col-md-4 control-label">Precio</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="precio" value="">
                  {{ ($errors->has('precio')) ? $errors->first('precio') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="entidad" class="col-md-4 control-label">Entidad</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="entidad" value="">
                  {{ ($errors->has('entidad')) ? $errors->first('entidad') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="contacto_email" class="col-md-4 control-label">Contacto Email</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="contacto_email" value="">
                  {{ ($errors->has('contacto_email')) ? $errors->first('contacto_email') : '' }}
                </div>
            </div>

            <div class="form-group">
                <label for="venta_alquiler" class="col-md-4 control-label">Venta Alquiler</label>

                <div class="col-md-6">
                  <input class="form-control" type="text" name="venta_alquiler" value="">
                  {{ ($errors->has('venta_alquiler')) ? $errors->first('venta_alquiler') : '' }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="btn btn-primary btn-block" type="submit" name="name" value="Crear">
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection
