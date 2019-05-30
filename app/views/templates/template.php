<!DOCTYPE html>
<html>
    <head>
        <title>Billet simple pour l'Alaska</title>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" /> 
                 <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=vtp9yiedts4eltg5y08x28l3pzl948sspu4s0z7lwjntmehy"></script>
  		<script>tinymce.init({ forced_root_block : "",selector:'textarea' });</script>
    </head>
    
    <body>
        <header>
            <nav class="navbar navbar-expand-md bg-white">
                <div class="container">
                    <button class="navbar-toggler order-2 order-md-1" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar1 navbar2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse order-3 order-md-2" id="navbar1">
                        <ul class="navbar-nav mr-auto">
                              <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                              <li class="nav-item"><a class="nav-link" href="index.php?action=users.accessToAdmin">Connexion</a></li>
                        </ul>
                    </div>
                    <a class="navbar-brand mx-auto order-1 order-md-3" href="index.php">Rue des écoles</a>
                    <div class="collapse navbar-collapse order-4 order-md-4" id="navbar2">
                        <ul class="navbar-nav ml-auto">
                              <li class="nav-item dropdown active"><a class="nav-link" href="#">A propos</a></li>
                              <li class="nav-item dropdown active"><a class="nav-link" href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <div class="container">
                    <h1 class="display-4">Espace de partage</h1>
                </div>
            </div>
        </div>

        <?= $content ?>

        <div class="site-newsletter">
        <div class="container">
            <div class="text-center">
                <h3 class="h4 mb-2">Recevez la newsletter de la rue des écoles</h3>
                <p class="text-muted">Rejoignez notre communauté et ne manquez plus les dernières nouveautés.</p>

                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-5 ml-auto mr-auto">
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" placeholder="Adresse email" aria-label="Email address">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Souscrire</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous"></script>
    </body>
</html>