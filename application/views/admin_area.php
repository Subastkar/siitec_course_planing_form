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

      var rowCount = table.rows.length;
      var row = table.insertRow(rowCount);
  
      var cell1 = row.insertCell(0);
      cell1.innerHTML = n;
  
      var cell2 = row.insertCell(1);
      var element2 = document.createElement("input");
      element2.type = "text";
      element2.name = "nombre_"+n;
      cell2.appendChild(element2);
  
      var cell3 = row.insertCell(2);
      var element3 = document.createElement("textarea");
      element3.name = "contenido_"+n;
      element3.className = "contenido";
      cell3.appendChild(element3);
  
      var cell4 = row.insertCell(3);
      var element4 = document.createElement("input");
      element4.type = "text";
      element4.name = "semanas_"+n;
      cell4.appendChild(element4);
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
  <p>Id de la materia: <input type="text" name="materia" />
  N&uacute;mero de unidades: <input type="text" name="unidades" id="unidades"/>
  <input type="button" value="Generar tabla" onclick="javascript:addRow('admin_table')"/></p>
  <table border ="1" id="admin_table">
  <tr>
    <th>Unidad</th>
    <th>Nombre de la unidad</th>
    <th>Contenido</th>
    <th>No. de semanas</th>
  </tr>
  </table>
  <input type="submit" value="Agregar datos" />
</form>
</div>
