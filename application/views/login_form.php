<div id="login_form">
  <h1>Iniciar Sesi&oacute;n</h1>

  <?php

  echo form_open('login/validate_credentials');
  echo form_input('username','Usuario');
  echo form_password('password','Contrase&ntilde;a');
  echo form_submit('submit','Entrar');
  echo anchor('login/signup','Crear cuenta');

  ?>

</div>
