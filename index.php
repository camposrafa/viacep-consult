<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <title>VIACEP</title>
</head>

<body>
  <div class="jumbotron">
    <div class="container">
      <center>
        <p>
        <h1>Bem vindo!</h1>
        <h4>Digite abaixo o seu CEP</h4>
        </p>
      </center>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="POST" action="findZipCode.php">
          <div class="form-group">
            <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="CEP" required="required"/>
          </div>
          <center><button type="submit" name="search" id="search" class="btn-outline-secondary">Pesquisar</button></center>
        </form>
          <?php
          if (isset($_SESSION['data']) | !is_null($_SESSION['data'])) {
          echo'
          <div class="card" id="card-data">
            <div class="card-body">
              <p class="card-text">Logradouro: ' . $_SESSION['data']['logradouro'].'</p>
              <p class="card-text">Bairro: ' . $_SESSION['data']['bairro'] .'</p>
              <p class="card-text">Localidade: ' . $_SESSION['data']['localidade'] .'</p>
              <p class="card-text">Uf: ' . $_SESSION['data']['uf'] .'</p>
              <p class="card-text">Ibge: ' . $_SESSION['data']['ibge'] .'</p>
              <p class="card-text">Gia: ' . $_SESSION['data']['gia'] .'</p>
              <p class="card-text">Ddd: ' . $_SESSION['data']['ddd'] .'</p>
              <p class="card-text">Siafi: ' . $_SESSION['data']['siafi'] .'</p>
            </div>
          </div>';
            }else{
              echo'
          <div class="card" id="card-data">
            <div class="card-body">
              <p class="card-text">Informações não encontradas. Por favor, verifique o CEP informado!</p>
            </div>
          </div>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php
session_destroy();
?>