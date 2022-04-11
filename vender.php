<?php
    require './Conecta2.php';
    require './Adicionaproduto.php';

    $formDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($formDados['SendVendProd']))
    {
        $verven = new Venda();
        $verven->formDados = $formDados;
        $verv = $verven->verivenda();
        if($verv){
            if(!empty($formDados['SendVendProd']))
            {
                $upven = new Venda();
                $upven->formdDados = $formDados;
                $upv = $upven->updatev();
                $vendpro = new Venda();
                $vendpro->formDados = $formDados;
                $valor = $vendpro->vendprod();
                if($valor){
                    echo '<script language="javascript">alert
                    ("Venda cadastrada com sucesso!");</script>';
                }else{
                   echo '<script language="javascript">alert
                    ("Erro: Venda nao cadastrada!");</script>';
                }
            }
        }else{
            echo '<script language="javascript">alert
                    ("Produto sem estoque");</script>';
        }
    }
    ?>
<html>
<form name="formDados" action="" method="POST" >

        <h1 for="name">VENDA DE PRODUTOS</h1>
        <label for="name">Produto/Preço:</label>
        <select id="inputProduto" name="Nome">
            <option selected>Escolher...</option>
            <?php
            $pdo = new Produto();
            $resultado = $pdo->listar();
            if(count($resultado)) {
                foreach ($resultado as $res) {
                    ?>
            <option value="<?php echo $res['Nome'];?>"><?php echo $res['Nome']; echo " / R$"; echo $res['Precodevenda'];
                }
            }
            ?>
            </option>
        </select>
        <label for="name">Quantidade</label>
        <input type="text" name="Quantidade" placeholder="Digite a quantidade" required>
        <label for="name">Data</label>
        <input type="date" name="dVenda" >


        <button type="submit" value="Vender" name="SendVendProd" class="sent-data">VENDER</button>

    </form>
    </html>