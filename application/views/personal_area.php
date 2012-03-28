<?= $nombre . " " . $apellido; ?>

<table border = 1>
  <th> Grupo </th>
  <th> Materia </th>
  <th> Planeaci&oacute;n del curso</th>
  <?php
    foreach($row)
    {
      echo "<tr>";
        echo"<td> " . $row->idgrupo . "</td>";
      echo "</tr>";
}
  ?>
</table> 

