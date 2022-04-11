<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <LINK rel="stylesheet" href="Pagina Cadastro.css">
    <title>Formulario | GN</title>
</head>
<body>
    <div class="box">
    
        <img src="SIAM3.png"/>
        <br>

        <?php
        require './Conecta2.php';
        require './Adicionacadastro.php';
        
        $formuCad = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 
        
        if(!empty($formuCad['SendCaduser'])){                  
            $cadUser = new usuario();
            $cadUser->formuCad = $formuCad;
            $valor = $cadUser->cadastrar();
            if($valor){
                echo '<script language="javascript">alert("Usuário cadastrado com sucesso!");</script>';
                   }else{
                echo '<script language="javascript">alert("Erro: Usuário não cadastrado!");</script>';
                            }
        }
        ?>
        
        <FORM name ="Caduser" action="" METHOD="POST">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Nome" id="Nome" class="inputUser" required>
                    <label for="Nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="CPF" id="CPF" class="inputUser" required>
                    <label for="CPF" class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="Telefone" id="Telefone" class="inputUser" required>
                    <label for="Telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Nomeusuario" id="Nomeusuario" class="inputUser" required>
                    <label for="Nome de usuario" class="labelInput">Nome de Usuario</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="Email" id="Email" class="inputUser" required>
                    <label for="Email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="Senha" id="Senha" class="inputUser" required>
                    <label for="Senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <br><br>
                <button type="submit" value="Cadastrar" name="SendCaduser" id="submit">Cadastrar</button>
            </fieldset>
        </form>
    </div>
    </div>
</body>
</html>