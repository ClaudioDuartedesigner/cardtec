<?php

class Card extends Conn {

	public $conn;
    
    /********* CLASSE CARDS *******/
    
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
    
    public function listCardId2(){

    	$id_card = $_GET['id_card'];
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM card WHERE id='$id_card'";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

	public function createCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
			$ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING);
            $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            $logo = $_FILES['logo']['name'];
            $icon = $_FILES['icon']['name'];
            $img_destaque = $_FILES['img_destaque']['name'];
            $icon = $_FILES['icon']['name'];
            $card = $_FILES['card']['name'];
            		
			$sql = $this->connect->prepare("INSERT INTO card (cliente, empresa, logo, icon, img_destaque, card, subdominio, ativo) VALUES (:cliente,:empresa, :logo, :icon, :img_destaque, :card, :subdominio, :ativo)");

			$sql->bindValue(":cliente",$cliente);
			$sql->bindValue(":empresa",$empresa);
			$sql->bindValue(":logo",$logo);
			$sql->bindValue(":icon",$icon);
			$sql->bindValue(":img_destaque",$img_destaque);
			$sql->bindValue(":card",$card);
			$sql->bindValue(":subdominio",$subdominio);
			$sql->bindValue(":ativo",$ativo);
		            
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
            $ativo = addslashes($_POST['ativo']);

					
			$sql = $this->connect->prepare("UPDATE card SET id = :id, cliente = :cliente, empresa = :empresa, subdominio = :subdominio, ativo = :ativo WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":cliente",$cliente);
			$sql->bindValue(":empresa",$empresa);
			$sql->bindValue(":subdominio",$subdominio);
			$sql->bindValue(":ativo",$ativo);
				
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
				
            $sql->execute(); 
                
            header ("location: ../home.php");
			return true;
            
		}
	}
    
    public function updateCardIcon(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);
        
		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		    $icon = $_FILES['icon']['name'];
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            		
			$sql = $this->connect->prepare("UPDATE card SET id = :id, icon = :icon WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":icon",$icon);
				
            $sql->execute(); 
                
            header ("location: ../home.php");
			return true;
            
		}
	}
    
    public function updateCardCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);
        
		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		    $card = $_FILES['card']['name'];
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            		
			$sql = $this->connect->prepare("UPDATE card SET id = :id, card = :card WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":card",$card);
				
            $sql->execute(); 
                
            header ("location: ../home.php");
			return true;
            
		}
	}
    
    public function updateCardCapa(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);
        
		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		    $img_destaque = $_FILES['img_destaque']['name'];
            $subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
            		
			$sql = $this->connect->prepare("UPDATE card SET id = :id, img_destaque = :img_destaque WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":img_destaque",$img_destaque);
				
            $sql->execute(); 
                
            header ("location: ../home.php");
			return true;
            
		}
	}
    
    /************************************************************
    /***  BLOCK CARD **/
    /*************************************************************/   
    
	public function createBlockCard(){
        
        

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO blocos (id_cliente, titulo, descricao) VALUES (:id_cliente,:titulo, :descricao)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->execute();
        }
			     header ("location: ./CreateBlockCard.php?id=$id_cliente");
			     return true;
	}
    
    public function updateBlockCard(){
        
        

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {
            
            $id = filter_var($_POST['id2'], FILTER_SANITIZE_NUMBER_INT);
			$id_cliente = filter_input(INPUT_POST, 'id_cliente2', FILTER_SANITIZE_STRING);
			$titulo = filter_input(INPUT_POST, 'titulo2', FILTER_SANITIZE_STRING);
            $descricao = filter_input(INPUT_POST, 'descricao2', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("UPDATE blocos SET id = :id, id_cliente = :id_cliente, titulo = :titulo, descricao = :descricao WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->execute();
        }
			     header ("location: ./CreateBlockCard.php?id=$id_cliente");
			     return true;
	}
    
    public function listBlockCardId(){
        
        $this->conn = $this->connect();
         
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM blocos WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

    /************************************************************
    /***  LINK CARD **/
    /*************************************************************/
    
	public function createlinkCard(){
        
		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO links (id_cliente, nome, link) VALUES (:id_cliente, :nome, :link)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":nome",$nome);
			$sql->bindValue(":link",$link);
			$sql->execute();
        }
			     header ("location: ./ListLinkCard.php?id=$id_cliente");
			     return true;
	}
    
    public function listLinkCardId(){
        
        $this->conn = $this->connect();
         
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM links WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    /************************************************************
    /***  LINK WHATSAPP **/
    /*************************************************************/   
    
    public function createlinkWhatsapp(){
        
		$this->conn = $this->connect();
		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

        if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$img = filter_input(INPUT_POST, 'img_whatsapp', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_POST, 'link_whatsapp', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO whatsapp (id_cliente, img, link) VALUES (:id_cliente, :img, :link)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":img",$img);
			$sql->bindValue(":link",$link);
			$sql->execute();
         }
			     header ("location: ./ListLinkCard.php?id=$id_cliente");
			     return true;
	    }
      
    public function listLinkWhatsappId(){
        
        $this->conn = $this->connect();
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM whatsapp WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    /************************************************************
    /***  LINK INSTAGRAM **/
    /*************************************************************/   
 
    public function createlinkInstagram(){
        
		$this->conn = $this->connect();
		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

        if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$img = filter_input(INPUT_POST, 'img_instagram', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_POST, 'link_instagram', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO instagram (id_cliente, img, link) VALUES (:id_cliente,:img, :link)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":img",$img);
			$sql->bindValue(":link",$link);
			$sql->execute();
         }
			     header ("location: ./ListLinkCard.php?id=$id_cliente");
			     return true;
	    }
      
    public function listLinkInstagramId(){
        
        $this->conn = $this->connect();
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM instagram WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    /************************************************************
    /***  LINK INSTAGRAM **/
    /*************************************************************/   
 
    public function createlinkFacebook(){
        
		$this->conn = $this->connect();
		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

        if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$img = filter_input(INPUT_POST, 'img_facebook', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_POST, 'link_facebook', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO facebook (id_cliente, img, link) VALUES (:id_cliente,:img, :link)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":img",$img);
			$sql->bindValue(":link",$link);
			$sql->execute();
         }
			     header ("location: ./ListLinkCard.php?id=$id_cliente");
			     return true;
	    }
      
    public function listLinkFacebookId(){
        
        $this->conn = $this->connect();
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM facebook WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    public function createlinkMaps(){
        
		$this->conn = $this->connect();
		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

        if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$img = filter_input(INPUT_POST, 'img_maps', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_POST, 'link_maps', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO maps (id_cliente, img, link) VALUES (:id_cliente,:img, :link)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":img",$img);
			$sql->bindValue(":link",$link);
			$sql->execute();
         }
			     header ("location: ./ListLinkCard.php?id=$id_cliente");
			     return true;
	    }
      
    public function listLinkMapsId(){
        
        $this->conn = $this->connect();
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM maps WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    public function createlinkSite(){
        
		$this->conn = $this->connect();
		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

        if($salvar) {

			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$img = filter_input(INPUT_POST, 'img_site', FILTER_SANITIZE_STRING);
            $link = filter_input(INPUT_POST, 'link_site', FILTER_SANITIZE_STRING);
                      		
			$sql = $this->connect->prepare("INSERT INTO site (id_cliente, img, link) VALUES (:id_cliente,:img, :link)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":img",$img);
			$sql->bindValue(":link",$link);
			$sql->execute();
         }
			     header ("location: ./ListLinkCard.php?id=$id_cliente");
			     return true;
	    }
      
    public function listLinkSiteId(){
        
        $this->conn = $this->connect();
        $get_id = $_GET['id'];
        
        $query = "SELECT * FROM site WHERE id_cliente = $get_id";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    public function createImgCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
			$orientacao = filter_input(INPUT_POST, 'orientacao', FILTER_SANITIZE_STRING);
			$ordem = filter_input(INPUT_POST, 'ordem', FILTER_SANITIZE_STRING);
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$img = $_FILES['img']['name'];
            
            $sql = $this->connect->prepare("INSERT INTO imagem (id_cliente, img, titulo, ordem, orientacao) VALUES (:id_cliente, :img, :titulo, :ordem, :orientacao)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":img",$img);
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":ordem",$ordem);
			$sql->bindValue(":orientacao",$orientacao);
					            
            if ($sql->execute()) {

                $diretorio = "../img/" . $subdominio . "/" ;
                
                mkdir($diretorio, 0755);
                  
                if(move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$img)){
                    
			    header ("location: ./CreateImageCard.php?id=$id_cliente");
			     return true;
                
                }
		}
        
        }}
    
     public function updateImgCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
			$id_cliente = filter_var($_POST['id_cliente'], FILTER_SANITIZE_NUMBER_INT);
			$subdominio = filter_var($_POST['subdominio'], FILTER_SANITIZE_NUMBER_INT);
			$titulo = addslashes($_POST['titulo']);
			$orientacao = addslashes($_POST['orientacao']);
			$ordem = addslashes($_POST['ordem']);
            					
			$sql = $this->connect->prepare("UPDATE imagem SET id = :id, titulo = :titulo, orientacao = :orientacao, ordem = :ordem  WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":orientacao",$orientacao);
			$sql->bindValue(":ordem",$ordem);
				
            $sql->execute();

			 header ("location: ./CreateImageCard.php?id=$id_cliente");
			return true;

		}
	}
    
    public function listImgCardId(){
       
        $id_get = $_GET['id'];
      
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM imagem WHERE id_cliente ='$id_get' ORDER BY ordem ASC";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
      public function listImgCardId2(){
       
        $id_get = $_GET['id'];
      
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM imagem WHERE id ='$id_get'";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
    public function listImgCardIdOrdem(){
        $id_get = $_GET['id'];
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM imagem WHERE id_cliente ='$id_get' ORDER BY ordem ASC";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
    
     public function listImgCardIdPaisagem(){
       
        $id_get = $_GET['id'];
      
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM imagem WHERE id_cliente ='$id_get' AND orientacao ='0' ORDER BY ordem ASC";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
    
      public function listImgCardIdRetrato(){
       
        $id_get = $_GET['id'];
      
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM imagem WHERE id_cliente ='$id_get' AND orientacao ='1' ORDER BY ordem ASC";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
    /**CLASSE CATÁLOGO*******************************
    ************************************************/
    
     public function listItemCatalogoCardId2(){
        $id_get = $_GET['id'];
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM item_catalogo WHERE id ='$id_get'";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
    public function listItemCatalogoCardId(){
    
        $id_get = $_GET['id'];
        
        $this->conn = $this->connect();
        
        $query = "SELECT * FROM item_catalogo WHERE id_cliente ='$id_get'";
        $result = $this->connect->prepare($query);
        $result->execute();
        return $result->fetchAll();
    
        }
    
    
     public function createItemCatalogoCard(){

		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$subdominio = filter_input(INPUT_POST, 'subdominio', FILTER_SANITIZE_STRING);
			$id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_STRING);
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $whatsapp = filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING);
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
            $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
			$img = $_FILES['img']['name'];
            
            $sql = $this->connect->prepare("INSERT INTO item_catalogo (id_cliente, titulo, descricao, whatsapp, mensagem, codigo, valor, img) VALUES (:id_cliente, :titulo, :descricao, :whatsapp, :mensagem, :codigo, :valor, :img)");

			$sql->bindValue(":id_cliente",$id_cliente);
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->bindValue(":whatsapp",$whatsapp);
			$sql->bindValue(":mensagem",$mensagem);
			$sql->bindValue(":codigo",$codigo);
			$sql->bindValue(":valor",$valor);
			$sql->bindValue(":img",$img);
					            
            if ($sql->execute()) {

                $diretorio = "../img/" . $subdominio . "/" ;
                
                mkdir($diretorio, 0755);
                  
                if(move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$img)){
                    
			    header ("location: ./CreateItemCatalogoCard.php?id=$id_cliente");
			     return true;
                
                }
		}
        
        }}


 public function UpdateItemCatalogoCard(){

     
        $id_item_catalogo = $_GET['id'];
        $id_card = $_GET['id_card'];
        
     
		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		if($salvar) {

			$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		/*	$id_cliente = addslashes($_POST['id_cliente']);*/
            $titulo = addslashes($_POST['titulo']);
            $descricao = addslashes($_POST['descricao']);
            $whatsapp = addslashes($_POST['whatsapp']);
            $mensagem = addslashes($_POST['mensagem']);
            $codigo = addslashes($_POST['codigo']);
            $valor = addslashes($_POST['valor']);
			
           
        
            $sql = $this->connect->prepare("UPDATE item_catalogo SET id = :id, titulo = :titulo, descricao = :descricao, whatsapp = whatsapp, mensagem = :mensagem, codigo = :codigo, valor = :valor WHERE (id = :id)");

			$sql->bindValue(":id",$id);
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->bindValue(":whatsapp",$whatsapp);
			$sql->bindValue(":mensagem",$mensagem);
			$sql->bindValue(":codigo",$codigo);
			$sql->bindValue(":valor",$valor);
			
            $sql->execute();
		
			header ("location: ./UpdateItemCatalogoCard.php?id=$id_item_catalogo&id_card=$id_card");
			return true;
                
                }
		}

        public function UpdateImagemItemCatalogo(){

            $this->conn = $this->connect();

            $id=$_GET['id'];
            $id_card=$_GET['id_card'];
    
            $salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);
            
            if($salvar) {
    
                $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                $img = $_FILES['img']['name'];
                                       
                $sql = $this->connect->prepare("UPDATE item_catalogo SET id = :id, img = :img WHERE (id = :id)");
    
                $sql->bindValue(":id",$id);
                $sql->bindValue(":img",$img);
                    
                $sql->execute(); 
                    
                header ("location: ./UpdateItemCatalogoCard.php?id=$id&id_card=$id_card");
                return true;
                
            }
        }
        
    }


?>

