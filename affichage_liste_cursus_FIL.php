<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <img border="0" src="logo-utt.jpg" width="120" height="60">
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Liste des cursus</a></li>
                        <li><a href="form_etu.html">Nouveau profil</a></li>
                        <li><a href="#">Règlement des études</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">

                </div>
                <div class="col-sm-8 text-left"> 
                    <h1>Votre cursus en filière de branche</h1>
                    <hr>
                </div>

            </div>
        </div>
        <?php
        // connect to the base donnees
        $databasehost = "localhost";
        $databasename = "projet_lo07";
        $databaseusername = "root";
        $databasepassword = "123456";

        $conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
        if ($conn->connect_error) {
            die("La connexion a échoué " . $conn->connect_error);
        } else {
            echo "Connection à BD réussie<br>";
        }
        ?>
        <div class="container">
            <h2>Filiere</h2>
            <p>The .table-bordered class adds borders to a table:</p>            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Firstname</th>
                        <th colspan="2">Lastname</th>
                        <th colspan="2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </body>
</html>

