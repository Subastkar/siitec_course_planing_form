<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Siitec</title>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ui-lightness/jquery-ui.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <script src="<?php echo base_url();?>assets/script/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/script/jquery-ui.js" type="text/javascript"></script>
  <script>
    function changeDate(id){
      var fecha = $("#final_"+id).attr("value");
      var date = fecha.split("-");
      var newDate = date[0]+"-"+date[1]+"-"+(Number(date[2])+1);
      $("#inicio_2").datepicker( "option", "defaultDate", "2012-02-07");
    } 
  </script>
</head>

<body>
<div id="div_content">
<div id="head_form">
  <table border = 1 id="tabla1">
    <tr>
      <td rowspan='3'><?php
            echo img('assets/images/logo-itc.png');
          ?>
      </td>
      <td rowspan='2'><p>Nombre del formato: Formato para la planeaci&oacute;n del Curso y Avance Program&aacute;tico</p></td>
      <td><p>C&oacute;digo: SNEST-AC-PO-004-01</p></td>
    </tr>
    <tr>
      <td><p>Revisi&oacute;n: 5</p></td>
    </tr>
    <tr>
      <td><p>Referencia a la Norma ISO 9001:2008 7.1, 7.2.1, 7.5.1, 7.6, 8.1, 8.2.4</p></td>
      <td><p>P&aacute;gina 1 de 1</p></td>
    </tr>
  </table>
</div>

<div id="content_form">
  <span>
    <h4 style="text-align: center;">Instituto Tecnol&oacute;gico de Colima</h4>
    <h4 style="text-align: center;">Subdirecci&oacute;n acad&eacute;mica</h4>
    <?php
      echo '<h4 style="text-align: center;"> Departamento _____ </h4>';
      echo '<h4 style="text-align: center;"> Planeaci&oacute;n del curso y avance program&aacute;tico del periodo ' . $periodo . ' </h4>';
    ?>
  </span>

  <span>
    <?php
      echo '<p><b>Materia:</b>   ' .'<k>'. $formulario->nombre_materia . '</k>' . '   <b>HT</b>   '.'<k>' . $formulario->horas_teoricas .'</k>'. '   <b>HP</b>   ' .'<k>'. $formulario->horas_practicas.'</k>' . '   <b>CR</b>   ' .'<k>'. $formulario->creditos .'</k>'. '   <b>No. de Unidades</b> ' .'<k>'. $formulario->unidades.'</k>' . '</p>';
      echo '<blockquote>Objetivo de la matera:  ' .'<k>'. $formulario->objetivo .'</k>'. '</blockquote>';
      echo '<p><b>Grupo:</b>   ' .'<k>'. $formulario->grupo .'</k>'. '   <b>Carrera:</b>   ' .'<k>'. $formulario->carrera .'</k>'. '   <b>Aula:</b>   ' .'<k>'. $formulario->aula .'</k>'. '   <b>Horario:</b>   ' .'<k>'. $formulario->hora_inicio .'</k>'. ' - ' .'<k>'. $formulario->hora_fin .'</k>'. '   <b>Profesor:</b>   ' .'<k>'. $nombre->nombre .'</k>'. ' ' .'<k>'. $nombre->apellidop .'</k>'. ' ' .'<k>'. $nombre->apellidom .'</k>'. '</p>';
  ?>
  </span>

  <form action="<?echo base_url();?>index.php/site/save/TWM-0703" method="post">
  <table border ='1' align='center' id='t_data'>
    <tr>
      <th rowspan='2'>Unidad Tem&aacute;tica</th>
      <th rowspan='2'>Subtemas</th>
      <th colspan='2'>Fechas(Periodo)</th>
      <th colspan='2'>Evaluaci&oacute;n</th>
      <th rowspan='2'>Porcentaje de aprobaci&oacute;</th>
      <th rowspan='2'>Firma del docente</th>
      <th rowspan='2'>Firma del Jefe Acad&eacute;mico</th>
      <th rowspan='2'>Observaciones</th>
    </tr>
    <tr>
      <th>Programado</th>
      <th>Real</th>
      <th>Programada</th>
      <th>Real</th>
    </tr>
    <?php
      list($ano_inicio, $mes_inicio, $dia_inicio) = explode("-", $inicio);
      for($uni = 1; $uni <= $formulario->unidades; $uni++){
        if($contenido[$uni]!= null){
          echo '<tr>';
          echo '<td id="nombre_u"><textarea name="nombre_'.$uni.'">' . $contenido[$uni]->nombre . '</textarea></td>';
          echo '<td id="contenido"><textarea class="contenido" name="contenido_'.$uni.'">' . $contenido[$uni]->contenido . '</textarea></td>';
          $control = 0;
          switch($mes_inicio)
          {
          	case 1:$control = 31;break;
          	case 2:$control = 29;break;
          	case 3:$control = 31;break;
          	case 4:$control = 30;break;
          	case 5:$control = 31;break;
          	case 6:$control = 30;break;
          	case 7:$control = 31;break;
          	case 8:$control = 31;break;
          	case 9:$control = 30;break;
          	case 10:$control = 31;break;
         	case 11:$control = 30;break;
          	case 12:$control = 31;break;
          }
          if($dia_inicio > $control)
          {
            $dia_inicio = $dia_inicio - $control;
            $mes_inicio++;
          }
          $data = array($dia_inicio => ''); 
          $date = $ano_inicio.'-'.$mes_inicio .'-'.$dia_inicio; 
	        $dia2 = $dia_inicio;
          $dia2 = ($contenido[$uni]->tiempo * 7) + ($dia2-3);
          switch($mes_inicio)
          {
          	case 1:$control = 31;break;
          	case 2:$control = 29;break;
          	case 3:$control = 31;break;
          	case 4:$control = 30;break;
          	case 5:$control = 31;break;
          	case 6:$control = 30;break;
          	case 7:$control = 31;break;
          	case 8:$control = 31;break;
          	case 9:$control = 30;break;
          	case 10:$control = 31;break;
         	case 11:$control = 30;break;
          	case 12:$control = 31;break;
          }
          if($dia2 > $control)
          {
            $dia2 = $dia2 - $control;
            $mes_inicio++;
          }
          $date2 = $ano_inicio.'-'.$mes_inicio .'-'.($dia2); 
          $dia_inicio = $dia2 + 3;

          echo '<script>
            $(function() {
              $(".datepick" ).datepicker({
                dateFormat: "yy-mm-dd",
                defaultDate: "'.$date.'", 
                beforeShowDay: $.datepicker.noWeekends,
                onClose: function(dateText, inst){
                    var num = $(this).attr("id");
                    var id = num.split("_");
                    if(id[0] == "final"){
                      changeDate(id[1]);
                    }
                }
                });
              });
            </script>';

          echo '<input type="hidden" name="unidades" value="'.$formulario->unidades.'">';
          echo '<script>$("#final_'.$uni.'" ).datepicker( "option", "defaultDate", "'.$date2.'" )</script>';
          echo '<td id="fecha_p">Del <input type="text" class="datepick" id="inicio_' . $uni .'" name="inicio_' . $uni .'" value="'.$date.'"><br />Al <input type="text" 			class="datepick" id="final_' . $uni . '" name="final_' . $uni .'" value="'.$date2.'"></td>';
          echo '<td id="fecha_r"></td>';
      	  echo '<td id="evaluacion_p"><input type="text" class="datepick" class="datepick" id="examen_' . $uni .'" value="'.$date2.'"></td>';
      	  echo '<td id="evaluacion_r"></td>';
      	  echo '<td id="porcentaje"></td>';
      	  echo '<td id="firma_d"></td>';
      	  echo '<td id="firma_ja"></td>';
      	  echo '<td id="observaciones"></td>';
          echo '</tr>';
        }
      }
    ?>
    <tr>
    <tr>
    </tr>
      <td colspan='2' align='center'>Fecha de entrega de programaci&oacute;n</td>
      <td colspan='6' align='center'>Periodo programado para 1er, 2do y 3er. Seguimiento</td>
      <td colspan='2' align='center'>Periodo de entrega de reporte final</td>
    </tr>
    <tr>
      <td colspan='2' align='center'>Antes de inicio de clases</td>
      <td colspan='2' align='center'> ( semana 5 ) </td>
      <td colspan='2' align='center'> ( semana 9 ) </td>
      <td colspan='2' align='center'> ( semana 13 ) </td>
      <td colspan='2' align='center'> ( semana 16 o 17 ) </td>
    </tr>
  </table>
  <div id="foot_form">
    <p>Vo.Bo. del Jefe de Departamento: </p>
  </div>
  <input type="submit" value="Guardar cambios" />
  </form>
</div>
</div>

</body>
</html>
