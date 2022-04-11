<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" href="Pagina Cadastro.css">
    <title>Cadastro de Produto</title>
</head>
<body>
    <div class="box">
        <img src="SIAM3.png"/>
        <br>

        <?php
        require './Conecta2.php';
        require './Adicionaproduto.php';
        
        $formCadprod = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 
        
        if(!empty($formCadprod['SendCadpro'])){                  
            $cadUser = new Produto();
            $cadUser->formCadprod = $formCadprod;
            $valor = $cadUser->cadastrar();
            if($valor){
                echo '<script language="javascript">alert("Produto cadastrado com sucesso!");</script>';
                   }else{
                echo '<script language="javascript">alert("Erro: Produto não cadastrado!");</script>';
                            }
        }
        ?>

        <FORM action="" name="Cadprod" METHOD="POST"> 
            <fieldset>
                <legend><b>Agendamento de visitas</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Nome" id="Nome" class="inputUser" required>
                    <label for="Nome" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="date" name="datai" id="datai" class="inputUser" required>
                    <label for="datai" class="labelInput2">Data</label>
                </div>
                <br><br>
                <div class="inputBox">
                <select name="Circuito" id="Circuito" class="inputUser2">
                    <option value="Circuito 1">Circuito 1</option>
                    <option value="Circuito 2">Circuito 2</option>
                     <option value="Circuito 3">Circuito 3</option>
                </select>
                <label for="Circuito" class="labelInput">Circuito</label>
                </div>
                <br><br>
                <div class="inputBox">
                <select name="Horario" id="Horario" class="inputUser2">
                    <option value="Horario 1">06:00</option>
                    <option value="Horario 2">06:30</option>
                    <option value="Hoario 3">07:00</option>
                </select>
                <label for="Circuito" class="labelInput">Horario</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="int" name="Numerop" id="Numerop" class="inputUser" required>
                    <label for="Numerop" class="labelInput">Número de pessoas</label>
                </div>
                <br><br>
                <button type="submit" value="Cadastrar" name="SendCadpro" id="submit">Cadastrar</button>
            </fieldset>
        </FORM>
    </div>
</body>
</html>