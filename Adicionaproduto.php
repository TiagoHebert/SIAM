<?php
	
	class Produto extends Conn 
	{
		public array $formCadprod;
		public object $ConnProd;
	
		public function listar(): array{
			$this->conn = $this->connect();
			$query_produtos = "SELECT Nome, datai, Circuito, Horario, Numerop
			 FROM cadastroacamp
			 ORDER BY Nome ASC 
			 LIMIT 40";
			$result_prod = $this->conn->prepare($query_produtos);
			$result_prod->execute();
			$retornopro = $result_prod->fetchAll();
			return $retornopro;
		}


		public function cadastrar(){
			$this->ConnProd = $this->connect();
			$query_produtos = "INSERT INTO cadastroacamp (Nome, datai, Circuito, Horario, Numerop) VALUES (:Nome, :datai, :Circuito, :Horario, :Numerop)";
			$cad_pro = $this->ConnProd->prepare($query_produtos);
	
			$cad_pro->bindParam(':Nome', $this->formCadprod['Nome']);
			$cad_pro->bindParam(':datai', $this->formCadprod['datai']);
			$cad_pro->bindParam(':Circuito', $this->formCadprod['Circuito']);
			$cad_pro->bindParam(':Horario', $this->formCadprod['Horario']);
			$cad_pro->bindParam(':Numerop', $this->formCadprod['Numerop']);
	
			$cad_pro->execute();
			if($cad_pro->rowCount()){
				return true;
				echo "<p Visita cadastrado com sucesso</p>";
				
			}else{
				return false;
				echo "<p Visita não cadastrado com sucesso</p>";
			}
		}
	}

	class Venda extends Conn
{
    public array $formDados;
    public object $conn;

    public function verivenda():array {
        $this->conn = $this->connect();
        $query_venda = "SELECT * 
        FROM cadastroacamp
        WHERE Nome= :Nome AND Quantidade >= :Quantidade";

        $result_veri = $this->conn->prepare($query_venda);
        $result_veri->bindParam(':Nome', $this->formDados['Nome']);
        $result_veri->bindParam(':Quantidade', $this->formDados['Quantidade']);
        $result_veri->execute();
        $retornos = $result_veri->fetchAll();
        return $retornos;
    }

	public function listar(): array {
        $this->conn = $this->connect();
        $query_vend = "SELECT *
                FROM venda
                ORDER BY id DESC
                LIMIT 40";
        $result_v = $this->conn->prepare($query_vend);
        $result_v->execute();
        $retorno = $result_v->fetchAll();
        return $retorno;
    }


    public function updatev():array {
        $this->conn = $this->connect();
        $query_update = "UPDATE cadastroproduto 
        SET Quantidade = Quantidade - :Quantidade
        WHERE Nome = :Nome";
        $result_update = $this->conn->prepare($query_update);
        $result_update->bindParam(':Nome', $this->formDados['Nome']);
        $result_update->bindParam(':Quantidade', $this->formDados['Quantidade']);
        $result_update->execute();
        $retornoss = $result_update->fetchAll();
        return $retornoss;
    }

	public function vendprod():array {
        $this->conn = $this->connect();
        $query_venda = "INSERT INTO vendas(Nome, Quantidade, Precodevenda, dVenda, total)
                        VALUES (:Nome, :Quantidade, (SELECT Precodevenda
                        FROM cadastroproduto 
                        WHERE Nome = :Nome), :dVenda,:Quantidade *
                        (SELECT Precodevenda
                        FROM cadastroproduto 
                        WHERE Nome = :Nome))";
        $vend_produto = $this->conn->prepare($query_venda);
        $vend_produto->bindParam(':Nome', $this->formDados['Nomeo']);
        $vend_produto->bindParam(':Quantidade', $this->formDados['Quantidade']);
        $vend_produto->bindParam(':dVenda', $this->formDados['dVenda']);

        $vend_produto->execute();
        if($vend_produto->rowCount()){
            return true;
        }else{
            return false;
        }
    }
}
?>