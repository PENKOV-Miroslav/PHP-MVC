    
<div class="container">
    <div style="min-height: 100vh;">       
        <form action="traitement_formulaire.php" method="POST">
            <h2>Informations du Capitaine </h2>

            <div class="mb-3">
                <label for="categorie_formule" class="form-label">Circuit :</label>
                <select id="categorie_formule" name="categorie_formule" class="form-select">
                    <option>Séléctionner un circuit</option>
                    <option value="bol_air">BOL D'AIR (50 €)</option>
                    <option value="mini_bol_air">MINI BOL D'AIR (40 €)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie :</label>
                <select id="categorie" name="categorie" class="form-select">
                    <option>Séléctionner une catégorie</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Mixte</option>
                    <option value="vae">V.A.E</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse :</label>
                <input type="text" id="adresse" name="adresse" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club" class="form-label">Club :</label>
                <input type="text" id="club" name="club" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse mail :</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <h2>Informations de l'Équipier</h2>

            <div class="mb-3">
                <label for="nom_equipier" class="form-label">Nom :</label>
                <input type="text" id="nom_equipier" name="nom_equipier" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prenom_equipier" class="form-label">Prénom :</label>
                <input type="text" id="prenom_equipier" name="prenom_equipier" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_naissance_equipier" class="form-label">Date de naissance :</label>
                <input type="date" id="date_naissance_equipier" name="date_naissance_equipier" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="adresse_equipier" class="form-label">Adresse :</label>
                <input type="text" id="adresse_equipier" name="adresse_equipier" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club_equipier" class="form-label">Club :</label>
                <input type="text" id="club_equipier" name="club_equipier" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email_equipier" class="form-label">Adresse mail :</label>
                <input type="email" id="email_equipier" name="email_equipier" class="form-control" required>
            </div>

            <h2>Coordonnées</h2>

            <div class="mb-3">
                <label for="tel_capitaine" class="form-label">N° de tél. Capitaine :</label>
                <input type="tel" id="tel_capitaine" name="tel_capitaine" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tel_equipier" class="form-label">N° de tél. Équipier :</label>
                <input type="tel" id="tel_equipier" name="tel_equipier" class="form-control" required>
            </div>

            <p>Joindre les certificats médicaux et votre règlement à l'ordre de CKC SAINT-VICTURNIEN à votre Bulletin d'inscription,
            à retourner à : M. Bouby - 2 rue des Étangs - La Chapelle Blanche - 87420 St Victurnien</p>

            <h2>Renseignements</h2>
            <p>06 35 92 52 77 - 06 82 92 77 84</p>
            <p><a href="www.ckc-saintvicturnien.fr">www.ckc-saintvicturnien.fr</a> - <a href="mailto:contact@ckc-saintvicturnien.fr">contact@ckc-saintvicturnien.fr</a></p>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>