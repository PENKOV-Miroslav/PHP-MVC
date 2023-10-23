<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="Contenu/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body onload="init()">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- Logo de l'organisation (dans la barre de navigation) -->
                <a class="navbar-brand" href="?action=accueil">
                    <img src="Contenu/images/logo.png" alt="Logo de l'organisation" class="img-fluid" style="max-width: 100px;">
                </a>

                <!-- Liens de navigation -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="?action=authentification">Connexion au compte</a></li>
                    <li class="nav-item active"><a class="nav-link" href="?action=rfid">rfid</a></li>
                </ul>
            </nav>

    </header>

            <main class="container mt-4"> <!-- Ajout de l'espace -->
                <div class="row">
                    <div class="col-md-8">
                    <h1 class="text-center"><?php echo $pageTitle; ?></h1>
                        <?php include $contentFile; ?>
                    </div>
                </div>
            </main>

            <!-- Chargement des fichiers JavaScript ici -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- Charger votre propre fichier JavaScript ici -->
    <script src="Contenu/js/script.js"></script>

    <footer class="bg-dark text-light py-3 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> CKC Site Web</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="#">Politique de confidentialité</a> | <a href="#">Mentions légales</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
