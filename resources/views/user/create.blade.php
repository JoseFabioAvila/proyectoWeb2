<h1>Crear usuario</h1>
<form class="" action="/user" method="post">
    <input type="text" name="username" value="" placeholder="Nombre de usuario"><br>
    {{ ($errors->has('username')) ? $errors->first('username') : '' }} <br>

    <input type="email" name="email" value="" placeholder="Email"><br>
    {{ ($errors->has('email')) ? $errors->first('email') : '' }} <br>

    <input type="password" name="password" value="" placeholder="Password"><br>
    {{ ($errors->has('password')) ? $errors->first('password') : '' }} <br>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="post">
</form>
