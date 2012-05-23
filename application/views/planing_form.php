<div id="head_form">
  <table border = 1>
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
      <td><p>P&aacute;gina 1 de 3</p></td>
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
      echo '<p><b>Materia:</b>   ' . $formulario->nombre_materia . '   <b>HT</b>   ' . $formulario->horas_teoricas . '   <b>HP</b>   ' . $formulario->horas_practicas . '   <b>CR</b>   ' . $formulario->creditos . '   <b>No. de Unidades</b> ' . $formulario->unidades . '</p>';
      echo '<blockquote>Objetivo de la matera:  ' . $formulario->objetivo . '</blockquote>';
      echo '<p><b>Grupo:</b>   ' . $formulario->grupo . '   <b>Carrera:</b>   ' . $formulario->carrera . '   <b>Aula:</b>   ' . $formulario->aula . '   <b>Horario:</b>   ' . $formulario->hora_inicio . ' - ' . $formulario->hora_fin . '   <b>Profesor:</b>   ' . $nombre->nombre . ' ' . $nombre->apellidop . ' ' . $nombre->apellidom . '</p>';
  ?>
  </span>

  <table border ='1' align='center'>
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
      for($uni = 1; $uni <= $formulario->unidades; $uni++){
        if($contenido[$uni]!= null){
          echo '<form>';
          echo '<tr>';
          echo '<td>' . $contenido[$uni]->nombre . '</td>';
          echo '<td>' . $contenido[$uni]->contenido . '</td>';
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
          $data = array(
             $dia_inicio => ''
             ); 
          echo '<td>' . $this->calendar->generate($ano_inicio, $mes_inicio, $data) . '</td>';
          $dia_inicio = ($contenido[$uni]->tiempo * 7) + $dia_inicio;
          echo '</tr>';
          echo '</form>';
        }
      }
    ?>
    <tr>
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
</div>

<div id="foot_form">
  <p>Vo.Bo. del Jefe de Departamento: </p>
  
</div>
