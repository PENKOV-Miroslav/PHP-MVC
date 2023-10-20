<div class="p-3"></div>
<div class="container">
    <div style="min-height: 100vh;">
        <form action="traitement_formulaire.php" method="POST">
            <div class="card p-3 mb-3">
                <h2 class="card-title">Informations du Capitaine</h2>

                <div class="mb-3">
                    <select id="categorie_formule" name="categorie_formule" class="form-select">
                        <option value="" disabled selected>Sélectionner un circuit</option>
                        <option value="bol_air">BOL D'AIR (50 €)</option>
                        <option value="mini_bol_air">MINI BOL D'AIR (40 €)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <select id="categorie" name="categorie" class="form-select">
                        <option value="" disabled selected>Sélectionner une catégorie</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="autre">Mixte</option>
                        <option value="vae">V.A.E</option>
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
                    <input type="tel" id="tel_equipier" name="tel_equipier" class="form-control" placeholder="N° de tél. Équipier" required>
                </div>

                <p>Joindre les certificats médicaux et votre règlement à l'ordre de CKC SAINT-VICTURNIEN à votre Bulletin d'inscription,
                    à retourner à : M. Bouby - 2 rue des Étangs - La Chapelle Blanche - 87420 St Victurnien</p>

                <h2>Renseignements</h2>
                <p>06 35 92 52 77 - 06 82 92 77 84</p>
                <p><a href="www.ckc-saintvicturnien.fr">www.ckc-saintvicturnien.fr</a> - <a href="mailto:contact@ckc-saintvicturnien.fr">contact@ckc-saintvicturnien.fr</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>
