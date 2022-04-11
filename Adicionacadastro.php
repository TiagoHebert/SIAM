<?php
	
    class usuario extends Conn
{
    public array $formuCad;
    public object $conn;

	public function cadastrar(){
        $this->conn = $this->connect();
        $query_usuario = "INSERT INTO cadastrouser (Nome, CPF, Telefone, Nomeusuario, Email, Senha) VALUES (:Nome, :CPF, :Telefone, :Nomeusuario, :Email, :Senha)";
        $cad_user = $this->conn->prepare($query_usuario);

        $cad_user->bindParam(':Nome', $this->formuCad['Nome']);
        $cad_user->bindParam(':CPF', $this->formuCad['CPF']);
        $cad_user->bindParam(':Telefone', $this->formuCad['Telefone']);
        $cad_user->bindParam(':Nomeusuario', $this->formuCad['Nomeusuario']);
        $cad_user->bindParam(':Email', $this->formuCad['Email']);
        $cad_user->bindParam(':Senha', $this->formuCad['Senha']);

        $cad_user->execute();
        if($cad_user->rowCount()){
            return true;
        }else{
            return false;
        }
    }
}

?>

