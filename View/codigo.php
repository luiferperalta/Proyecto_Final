<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Proyecto Final Ingeria Software</title>

     <!-- Estilos -->
    <style>
      body{
          background-color: #F7FAFC;
      }

      .container {
          width: 50% !important;
          height: 80vh;
          background-color: #FFFFFF;
          border-radius: 0.9rem;
      }
    </style>

  </head>
  <body>

  <?php echo isset($_GET['cod'])?  "<div class='alert alert-danger' role='alert'>        Verificar codigo en el correo       </div> " : ''?>

    <div class="container mt-5 d-flex justify-content-center align-items-center text-center">

        <form action="./ruteador.php?controller=Mail&action=verificacionCodAlet" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 ">CODIGO DE RECUPERACION</h4>

            <input class="form-control mb-3" type="text" name="codigo" placeholder="Codigo" required>
                    
            <input type="hidden" name="cod" value="<?php echo $_GET['cod'] ?>">
            
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

            <input class="btn btn-primary " name="btnCodigo" type="submit" value="Recuperar Password" id="submit" > 
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>