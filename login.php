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
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <?php
        if(isset($_GET['code'])){
            if($_GET['code'] == 'noInf'){
                echo "Digite corretamente nos campos abaixo";
            }else if($_GET['code'] == 'noExist'){
                echo "Usuario não existênte!";
            }else if($_GET['code'] == 'noAccess'){
              echo "Você não pode acessar este local!";
            }
        }
        
        ?>
        <form method="post" action='registroLogin.php?type=log'>
          <div class="form-outline mb-4">
            <input type="email" name="email" required id="form3Example3" class="form-control form-control-lg"
              placeholder="Seu email" />
            <label class="form-label" for="form3Example3">Digite seu email no campo acima!</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="senha" required id="form3Example4" class="form-control form-control-lg"
              placeholder="Sua Senha" />
            <label class="form-label" for="form3Example4">Digite sua senha no campo acima!</label>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Não tem uma conta?<a href="registro.php"
                class="link-danger"> Se registre!</a></p>
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