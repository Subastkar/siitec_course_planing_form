<script>
  $(function() {
    $(".datepick" ).datepicker({
      dateFormat: "yy-mm-dd",
      beforeShowDay: $.datepicker.noWeekends,
    });
  });

  function addRow(tableID) {
    var table = document.getElementById(tableID);

    var units = $("#unidades").attr("value");

    for(var n = 1; n <= units; n++){

      var div = document.createElement("div");
      div.id = "div_"+n;
      table.appendChild(div);

      var element1 = document.createTextNode(n);
      document.getElementById('div_'+n).appendChild(element1);
  
      var element2 = document.createElement("input");
      element2.type = "text";
      element2.name = "nombre_"+n;
      document.getElementById('div_'+n).appendChild(element2);
  
      var element3 = document.createElement("input");
      element3.type = "text";
      element3.name = "contenido_"+n;
      document.getElementById('div_'+n).appendChild(element3);
  
      var element4 = document.createElement("input");
      element4.type = "text";
      element4.name = "semanas_"+n;
      document.getElementById('div_'+n).appendChild(element4);
    }

    
  }
</script>
<div id="datos_curso">
<br/><br/>
Dar de alta un nuevo ciclo escolar:
<form action='<?echo base_url();?>index.php/site/new_curso' method="post" class="admin_panel" id="admin_1"/>
    <p>D&iacute;a de inicio: <input type="text" class="datepick" name="fecha"/>  Ciclo escolar: <input type="text" name="ciclo" /><br />
       <input type="submit" value='Ingresar nuevo ciclo' /></p>
  </form>
</div>

<br/><br/>
Dar de alta los datos del curso:
<div id="datos_materia">
<form action='<?echo base_url();?>index.php/site/curso_data' method='post' class="admin_panel" id="admin_2"/>
  <p>Id de la materia: <input type="text" name="materia" id="materia" />
  N&uacute;mero de unidades: <input type="text" name="unidades" id="unidades"/>
  <input type="button" value="Generar tabla" onclick="javascript:addRow('table')"/></p>
  <div class="admin_table">
    <b>Unidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Nombre de la unidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Contenido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    No. de semanas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
  </div>
  
  <div class="admin_table" id="table">
  </div>

  <input type="submit" value="Agregar datos" />
</form>
</div>
