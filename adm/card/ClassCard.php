<?php

require_once '../Conn.php';

class Card extends Conn {

	public $conn;
    
    
    public function listCard(){
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM card";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }


    public function listCardId(){

    	$id_get = $_GET['id'];
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM card WHERE id='$id_get'";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }


	public function createCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
            $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            $logo = $_FILES['logo']['name'];
            $icon = $_FILES['icon']['name'];
            $img_destaque = $_FILES['img_destaque']['name'];
            $icon = $_FILES['icon']['name'];
            $card = $_FILES['card']['name'];
					
			$sql = $this->connect->prepare("INSERT INTO card (cliente, empresa, logo, icon, img_destaque, card, subdominio) VALUES (:cliente,:empresa, :logo, :icon, :img_destaque, :card, :subdominio)");

			$sql->bindValue(":cliente",$cliente);
			$sql->bindValue(":empresa",$empresa);
			$sql->bindValue(":logo",$logo);
			$sql->bindValue(":icon",$icon);
			$sql->bindValue(":img_destaque",$img_destaque);
			$sql->bindValue(":card",$card);
			$sql->bindValue(":subdominio",$subdominio);
		            
            if ($sql->execute()) {

                $diretorio_logo = "../img/" . $subdominio . "/" ;
                $diretorio_icon = "../img/" . $subdominio . "/" ;
                $diretorio_img_destaque = "../img/" . $subdominio . "/" ;
                $diretorio_card = "../img/" . $subdominio . "/" ;
                
                mkdir($diretorio_logo, 0755);
               
                  
                if(move_uploaded_file($_FILES['logo']['tmp_name'], $diretorio_logo.$logo)){
                    
                    move_uploaded_file($_FILES['icon']['tmp_name'], $diretorio_icon.$icon);
                    move_uploaded_file($_FILES['img_destaque']['tmp_name'], $diretorio_img_destaque.$img_destaque);
                    move_uploaded_file($_FILES['card']['tmp_name'], $diretorio_card.$card);
                
              
			     header ("location: ../home.php");
			     return true;
                }
                
                }

		}
	}

	public function updateCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
			$cliente = addslashes($_POST['cliente']);
            $empresa = addslashes($_POST['empresa']);
            $subdominio = addslashes($_POST['subdominio']);

					
			$sql = $this->connect->prepare("UPDATE card SET id = :id, cliente = :cliente, empresa = :empresa, subdominio = :subdominio WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":cliente",$cliente);
			$sql->bindValue(":empresa",$empresa);
			$sql->bindValue(":subdominio",$subdominio);
				
            $sql->execute();

			header ("location: ../home.php");
			return true;

		}
	}
    
    public function updateCardLogo(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);
        

		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		    $logo = $_FILES['logo']['name'];
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            
        			
			$sql = $this->connect->prepare("UPDATE card SET id = :id, logo = :logo WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":logo",$logo);
				
            if ($sql->execute()) {

                $diretorio_logo = "../img/" . $subdominio . "/" ;
                
                  
                if(move_uploaded_file($_FILES['logo']['tmp_name'], $diretorio_logo.$logo)){
                    
                header ("location: ../home.php");
			     return true;
                }
                
                }

		}
	}
    
    
      public function updateCardIcon(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);
        

		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		    $logo = $_FILES['icon']['name'];
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            
        			
			$sql = $this->connect->prepare("UPDATE card SET id = :id, icon = :icon WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":icon",$logo);
				
            if ($sql->execute()) {

                $diretorio_icon = "../img/" . $subdominio . "/" ;
                
                  
                if(move_uploaded_file($_FILES['icon']['tmp_name'], $diretorio_icon.$icon)){
                    
                header ("location: ../home.php");
			     return true;
                }
                
                }

		}
	}
}

?>

