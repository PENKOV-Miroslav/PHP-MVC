<?php
session_start();

// Initialisez des variables pour stocker les valeurs de session
$id_role = null;

if (isset($_SESSION['id_role'])) {
    $id_role = $_SESSION['id_role'];
}

if ($id_role === 2) {
    // L'utilisateur est authentifié, affichez le formulaire d'inscription.
    ?>
<div class="p-3"></div>
<div class="container">
    <div style="min-height: 100vh;">
        <form method="POST" action="?action=bulletin_inscription">
            <div class="card p-3 mb-3">
                <h2 class="card-title">Informations du Capitaine</h2>
                <input type="hidden" name="id_roleHidden" value="<?php echo $_SESSION['id_role']; ?>">

                <div class="mb-3">
                    <select id="categorie_formule" name="categorie_formule" class="form-select">
                        <option value="" disabled selected>Sélectionner un circuit</option>
                        <option value="1">BOL D'AIR (50 €)</option>
                        <option value="2">MINI BOL D'AIR (40 €)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <select id="categorie" name="categorie" class="form-select">
                        <option value="" disabled selected>Sélectionner une catégorie</option>
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                        <option value="3">Mixte</option>
                        <option value="4">V.A.E</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required>
                </div>

                <div class="mb-3">
                    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" required>
                </div>

                <div class="mb-3">
                    <input type="date" id="date_naissance" name="date_naissance" class="form-control" placeholder="Date de naissance" required>
                </div>

                <div class="mb-3">
                    <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Adresse">
                </div>

                <div class="mb-3">
                    <input type="text" id="club" name="club" class="form-control" placeholder="Club">
                </div>

                <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Adresse mail" required>
                </div>
            </div>
            <div class="p-3"></div>
            <div class="card p-3 mb-3">
                <h2 class="card-title">Informations de l'Équipier</h2>

                <div class="mb-3">
                    <input type="text" id="nom_equipier" name="nom_equipier" class="form-control" placeholder="Nom" required>
                </div>

                <div class="mb-3">
                    <input type="text" id="prenom_equipier" name="prenom_equipier" class="form-control" placeholder="Prénom" required>
                </div>

                <div class="mb-3">
                    <input type="date" id="date_naissance_equipier" name="date_naissance_equipier" class="form-control" placeholder="Date de naissance" required>
                </div>

                <div class="mb-3">
                    <input type="text" id="adresse_equipier" name="adresse_equipier" class="form-control" placeholder="Adresse">
                </div>

                <div class="mb-3">
                    <input type="text" id="club_equipier" name="club_equipier" class="form-control" placeholder="Club">
                </div>

                <div class="mb-3">
                    <input type="email" id="email_equipier" name="email_equipier" class="form-control" placeholder="Adresse mail" required>
                </div>
            </div>
            <div class="p-3"></div>
            <div class="card p-3 mb-3">
                <h2 class="card-title">Coordonnées</h2>

                <div class="mb-3">
                    <input type="tel" id="tel_capitaine" name="tel_capitaine" class="form-control" placeholder="N° de tél. Capitaine" required>
                </div>
                <div class="mb-3">
                    <input type="text" id="ville_capitaine" name="ville_capitaine" class="form-control" placeholder="Ville du Capitaine" required>
                </div>
                <div class="mb-3">
                    <input type="text" id="cp_capitaine" name="cp_capitaine" class="form-control" placeholder="Code Postale de la Ville du Capitaine" required>
                </div>
                <div class="p-3"></div>
                <div class="mb-3">
                    <input type="tel" id="tel_equipier" name="tel_equipier" class="form-control" placeholder="N° de tél. Équipier" required>
                </div>

                <div class="mb-3">
                    <input type="text" id="ville_equipier" name="ville_equipier" class="form-control" placeholder="Ville de l' équipier" required>
                </div>
                <div class="mb-3">
                    <input type="text" id="cp_equipier" name="cp_equipier" class="form-control" placeholder="Code Postale de la Ville de l' équipier" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>
<?php
} else {
    // L'utilisateur n'est pas authentifié en tant qu'administrateur, affichez un message d'erreur ou redirigez-le vers une autre page.
    echo "Vous n'êtes pas autorisé à accéder à cette page";
    // Ou redirigez l'utilisateur :
    // header("Location: ?action=authentification");
}
