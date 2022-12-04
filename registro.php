<?php
session_start();
if(isset($_SESSION['Logged']) == 1){
  header("Location: index.php");
}

?>
<link rel="stylesheet" src=".css/styleLogin.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <img src="./imagens/pizzaLoginRegistro.png"></img>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1"><?php
        if(isset($_GET['code'])){
            if($_GET['code'] == 'noInf'){
                echo "Digite corretamente nos campos abaixo";
            }else if($_GET['code'] == 'exist'){
                echo "Usuario já existênte!";
            }
        }
        ?>
        <form action='./registroLogin.php?type=regist' method='post'>
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" name="email" required class="form-control form-control-lg"
              placeholder="Seu email" />
            <label class="form-label" for="form3Example3">Digite seu email no campo acima!</label>
          </div>

          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="senha" required class="form-control form-control-lg"
              placeholder="Sua senha" />
            <label class="form-label" for="form3Example4">Digite sua senha no campo acima!</label>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar!</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Já possui uma conta?<a href="login.php"
                class="link-danger"> Entre!</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <div class="text-white mb-3 mb-md-0">

    </div>

  </div>
</section>