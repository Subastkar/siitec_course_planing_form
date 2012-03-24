<h1>Crear cuenta </h1>

<fieldset>
  <legend>Informaci&oacute;n personal</legend>

  <?php
    echo form_open('login/create_personal');
    echo form_input('nombre', set_value('nombre', 'Nombre(s): '));
    echo form_input('apellidop', set_value('apellidop', 'Apellido paterno: '));
    echo form_input('apellidom', set_value('apellidom', 'Apellido materno: '));
  ?>
</fieldset>

<fieldset>
  <legend>Informaci&oacute;n de sesi&oacute;n</legend>

  <?php
    echo form_input('curp', set_value('curp', 'CURP'));
    echo form_input('clave', set_value('clave', 'Contrasena'));
    echo form_input('clave2', set_value('clave2', 'Confirmacion'));

    echo form_submit('submit', 'Crear cuenta');

  ?>

  <?php echo validation_errors("<p class='error'")?>
</fieldset>
