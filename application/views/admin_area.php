<script>
  $(function() {
    $(".datepick" ).datepicker({
      dateFormat: "yy-mm-dd",
      beforeShowDay: $.datepicker.noWeekends,
    });
  });
</script>
<div id="datos_curso">
<form action='<?echo base_url();?>index.php/site/new_curso' method="post"/>
    <p>Dia de inicio: <input type="text" class="datepick" name="fecha"/>  Ciclo escolar: <input type="text" name="ciclo" /><br />
       <input type="submit" value='Ingresar nuevo ciclo' /></p>
  </form>
</div>

<div id="datos_materia">
</div>
