<?php
session_start();

// Initialisez des variables pour stocker les valeurs de session
$id_role = null;

if (isset($_SESSION['id_role'])) {
    $id_role = $_SESSION['id_role'];
}

if ($id_role === 1) {
    // L'utilisateur est authentifié en tant qu'administrateur, affichez le formulaire d'inscription.
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                            <div class="alert alert-danger">
                                <?php echo htmlspecialchars($_SESSION['error']); ?>
                            </div>
                            <?php unset($_SESSION['error']); // Effacez le message d'erreur après l'avoir affiché ?>
                        <?php endif; ?>

                        <form method="post" action="?action=inscription">
                        <input type="hidden" name="id_roleHidden" value="<?php echo $_SESSION['id_role']; ?>">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="login" id="login" placeholder="Entrez votre nom d'utilisateur" required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Entrez votre mot de passe" required>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control mb-3" id="id_role" name="id_role" required>
                                    <option value="" disabled selected>Choisissez un rôle</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Secrétaire</option>
                                    <option value="3">Bénévole</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    // L'utilisateur n'est pas authentifié en tant qu'administrateur, affichez un message d'erreur ou redirigez-le vers une autre page.
    echo "Vous n'êtes pas autorisé à accéder à cette page en tant qu'administrateur.";
    // Ou redirigez l'utilisateur :
    // header("Location: ?action=authentification");
}
