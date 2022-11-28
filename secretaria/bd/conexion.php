<?php
error_reporting(0);

class conexion {

    protected $servidor;
    protected $usuario;
    protected $password;
    protected $database;
	public $mysqli;

    public function __construct() {
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->password = '';
        $this->database = 'radenf';
    }

    public function conectar() {

		$this->mysqli = new mysqli($this->servidor, $this->usuario, $this->password, $this->database);
		if (mysqli_connect_errno()) {
			$error["error"][] = array("texto" => mysqli_connect_error());
			print_r(json_encode($error));
			exit();
		}

		$this->mysqli->query("SET NAMES 'utf8'");
		$this->mysqli->query("SET CHARACTER SET utf8");
    }

    public function desconectar() {
        mysqli_close($this->mysqli);
    }

}
?>
