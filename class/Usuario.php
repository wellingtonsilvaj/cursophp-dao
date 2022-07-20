<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $desenha;
    private $dtcadstro;

    public function getIdusuario(){

        return $this->idusuario;

    }

    public function setIdusuario($value){

        $this->idusuario = $value;

    }

    public function getDeslogin(){

        return $this->deslogin;

    }

    public function setDeslogin($value){

        $this->deslogin = $value;

    }

    public function getDesenha(){

        return $this->desenha;

    }

    public function setDesenha($value){

        $this->desenha = $value;

    }

    public function getDtcadstro(){

        return $this->dtcadstro;

    }

    public function setDtcadstro($value){

        $this->dtcadstro = $value;

    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(

            ":ID"=>$id

        ));

        if (count($results) > 0) {

            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDesenha($row['desenha']);
            $this->setDtcadstro(new DateTime($row['dtcadstro']));

        }

    }
    public static function getList(){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }
    public static function search($login){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE  :SEARCH ORDER BY deslogin", array( 
            ':SEARCH' => "%".$login."%"));
    }

    public function login($login, $password){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND desenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));

        if (count($results) > 0) {

            $row = $results[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDesenha($row['desenha']);
            $this->setDtcadstro(new DateTime($row['dtcadstro']));

        }else{

            throw new Exception("login e/ou senha invalidos");
        }

    }
    public function __toString(){

        return json_encode(array(

            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDesenha(),
            "dtcadastro"=>$this->getDtcadstro()->format("d/m/Y H:i:s")

        ));

    }

}

?>