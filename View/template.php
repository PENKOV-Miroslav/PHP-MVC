<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="Contenu/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script scr="Contenu/js/script.js"></script>
</head>
<body class="container">
    <header>
        <h1 class="text-center"><?php echo $pageTitle; ?></h1>
    </header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- Logo de l'organisation (dans la barre de navigation) -->
                <a class="navbar-brand" href="?action=accueil">
                    <img src="Contenu/images/logo.png" alt="Logo de l'organisation" class="img-fluid" style="max-width: 100px;">
                </a>

                <!-- Liens de navigation -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="?action=bulletin_inscription">S'inscrire au raid</a></li>
                    <li class="nav-item active"><a class="nav-link" href="?action=authentification">Connexion au compte</a></li>
                    <li class="nav-item active"><a class="nav-link" href="?action=rfid">rfid</a></li>
                </ul>
            </nav>

            <main class="container mt-4"> <!-- Ajout de mt-4 pour l'espace -->
                <div class="row">
                    <div class="col-md-8">
                        <?php include $contentFile; ?>
                    </div>
                </div>
            </main>

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
