<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: /crud_login/index.php");
}

    if(isset($_POST)){
        //Conexão com o banco de dados
        $db = new mysqli("localhost", "root", "", "colecao_livros");
        
        $titulo = htmlspecialchars($_POST['titulo']);
        $autor = htmlspecialchars($_POST['autor']);
        $ano = filter_var($_POST['ano'],FILTER_SANITIZE_NUMBER_INT);
        $id_pessoa = $_SESSION['id'];

        //Query de consulta
        $stmt = $db->prepare("insert into livros (titulo,autor,ano,id_pessoa) values (?,?,?,?)");

        $stmt->bind_param("ssii",$titulo,$autor,$ano,$id_pessoa);

        //Executa a consulta e armazena o resultado
        $stmt->execute();

        header("location:/crud_login/src/restrita_lista.php");
    }