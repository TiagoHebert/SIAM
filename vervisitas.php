<html>
    <h1>Visitas cadastradas</h1>
<table>
    <thead>
    <tr>

        <th>Nome</th>
        <th>Data da visita</th>
        <th>Circuito</th>
        <th>Horário da visita</th>
        <th>Número de pessoas</th>
    </tr>
    </thead>
    <tbody>
    <tr>

<?php
    require './Conecta2.php';
    require './Adicionaproduto.php';

    $listprod = new Produto();
    $list_produto = $listprod->listar();

    foreach ($list_produto as $row_produto) {
        extract($row_produto);
        ?>

<td><?php echo "" . $Nome. "<br>";?></td>
<td><?php echo "" . $datai . "<br>";?></td>
<td><?php echo "" . $Circuito . "<br>";?></td>
<td><?php echo "" . $Horario . "<br>";?></td>
<td><?php echo "" . $Numerop . "<br>";?></td>
</tr>
<tr>
    <?php  }  ?>
</tbody>
</table>
</html>