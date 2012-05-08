<?= $nombre->nombre . " " . $nombre->apellidop; ?>
<?= anchor('site/log_out', 'Log out'); ?>

<table border = 1>
  <th> Grupo </th>
  <th> Id Materia </th>
  <th> Materia </th>
  <th> Planeaci&oacute;n del curso</th>
  <?php
    foreach($grupos as $row)
    {
      echo "<tr>";
        echo"<td> " . $row->idgrupo . "</td>";
        echo"<td> " . $row->idmateria . "</td>";
        echo"<td> " . $row->materia . "</td>";
        echo"<td> " . anchor("site/course/". $row->idmateria,'Editar') . "</td>";
      echo "</tr>";
}
  ?>
</table> 

