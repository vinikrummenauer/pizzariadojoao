<?php
include 'process/conn.php';
if(isset($_GET['type'])){
    if($_GET['type'] == 'regist'){
        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $request = $conn->query("SELECT * FROM usuarios WHERE email = '$email';");
            $resposta = $request->rowCount();
            if($resposta >= 1){
                session_destroy();
                header("Location: registro.php?code=exist");
                exit();
            }else{
                $request = $conn->query("INSERT INTO usuarios(email, senha) VALUE('$email', md5('$senha'))");
                header("Location: login.php?code='successfull'");
                exit();
            }

        }else{
            header("Location: registro.php?code=noInf");
            exit();
        }
    }else if($_GET['type'] == 'log'){
        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $request = $conn->query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha';");
            $resposta = $request->rowCount();
            if($resposta == 1){
                $dados = $request->fetch(PDO::FETCH_ASSOC);
                $_SESSION['Logged'] = 1;
                $_SESSION['id'] = $dados['id']; 
                header("Location: index.php");
            }else{
                session_destroy();
                header("Location: login.php?code=noExist");
                exit();
            }
        }else{
            header("Location: login.php?code=noInf");
            exit();
        }
    }
}
