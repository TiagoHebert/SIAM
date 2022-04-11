<?php
        require './Conecta2.php';
        require './Adicionaproduto.php';

        $listprod = new Venda();
        $list_produto = $listprod->listar();

        foreach ($list_produto as $row_produto) {
        extract($row_produto);
        ?>

        <th scope="row"><?php echo "" . $ID . "<br>";?></th>
        <td><?php echo "" . $Nome . "<br>";?></td>
        <td><?php echo "" . $Precodevenda . "<br>";?></td>
        <td><?php echo "" . $Quantidade . "<br>";?></td>
        <td><?php echo "" .date('d/m/Y' , strtotime($dVenda)) . "<br>";?></td>
        <td><?php echo "" . $total . "<br>";?></td>
    </tr>
    <tr>
<?php  }  ?>