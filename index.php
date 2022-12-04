<?php
  include_once("templates/header.php");
  include_once("process/pizza.php");

  include_once("process/conn.php");

  if(isset($_SESSION['Logged'])!=1){
    header("Location: login.php");
  }

  // resgatando os sabores da pizza
  $saboresQuery = $conn->query("SELECT * FROM sabores;");

  $sabores = $saboresQuery->fetchAll(PDO::FETCH_ASSOC);

  $pedidos1Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 1;");

  $pedidos1 = $pedidos1Query->fetchAll();

  $pedidos2Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 2;");

  $pedidos2 = $pedidos2Query->fetchAll();

  $pedidos3Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 3;");

  $pedidos3 = $pedidos3Query->fetchAll();

  $pedidos4Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 4;");

  $pedidos4 = $pedidos4Query->fetchAll();

  $pedidos5Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 5;");

  $pedidos5 = $pedidos5Query->fetchAll();

  $pedidos6Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 6;");

  $pedidos6 = $pedidos6Query->fetchAll();

  $pedidos7Query = $conn->query("SELECT count(sabor_id) FROM pizza_sabor WHERE sabor_id = 7;");

  $pedidos7 = $pedidos7Query->fetchAll();
?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Sabores', 'Vendas', { role: 'style' }],
         ['<?php print_r($sabores[0]['nome'])?>',  <?php print_r($pedidos1[0]['count(sabor_id)'])?>, '#b87333'],
         ['<?php print_r($sabores[1]['nome'])?>',  <?php print_r($pedidos2[0]['count(sabor_id)'])?>, '#b87333'],            // RGB value
         ['<?php print_r($sabores[2]['nome'])?>',  <?php print_r($pedidos3[0]['count(sabor_id)'])?>, 'silver'],            // English color name
         ['<?php print_r($sabores[3]['nome'])?>',  <?php print_r($pedidos4[0]['count(sabor_id)'])?>, 'gold'],
         ['<?php print_r($sabores[4]['nome'])?>',  <?php print_r($pedidos5[0]['count(sabor_id)'])?>, 'color: #e5e4e2' ],
         ['<?php print_r($sabores[5]['nome'])?>',  <?php print_r($pedidos6[0]['count(sabor_id)'])?>, 'color: #e5e4e2' ],
         ['<?php print_r($sabores[6]['nome'])?>',  <?php print_r($pedidos7[0]['count(sabor_id)'])?>, 'color: #e5e4e2' ],
      ]);

        var options = {
          title: 'Índice de vendas por sabores:',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <!-- <div id="main-banner">
    <h1>Faça seu Pedido</h1>
  </div> -->
  <div id="main-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Monte sua pizza:</h2>
          <form action="process/pizza.php" method="POST" id="pizza-form">
            <div class="form-group">
              <label for="borda">Borda:</label>
              <select name="borda" id="borda" class="form-control">
                <option value="">Selecione a borda</option>
                <?php foreach($bordas as $borda): ?>
                  <option value="<?= $borda["id"] ?>"><?= $borda["tipo"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="massa">Massa:</label>
              <select name="massa" id="massa" class="form-control">
                <option value="">Selecione a massa</option>
                <?php foreach($massas as $massa): ?>
                  <option value="<?= $massa["id"] ?>"><?= $massa["tipo"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="sabores">Sabores: (Máximo 3)</label>
              <select multiple name="sabores[]" id="sabores" class="form-control">
                <?php foreach($sabores as $sabor): ?>
                  <option value="<?= $sabor["id"] ?>"><?= $sabor["nome"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn-pedido" value="Fazer Pedido!">
              <button class="btn-pedido-1"><a style="text-decoration: none; color: #FFF;" href="dashboard.php">Status do pedido</a></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="barchart_values" style="width: 900px; height: 300px;"></div>
  </div>
  
  </body>
<?php
  include_once("templates/footer.php");
?>