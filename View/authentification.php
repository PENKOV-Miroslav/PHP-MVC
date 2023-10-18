<div class="container">
        <?php if (isset($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php } ?>
        <form method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required>
                    <button type="button" class="btn btn-secondary" id="montrer_mot_de_passe">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <a href="?action=inscription">s'inscrire</a>
    </div>

    <script>
        const passwordInput = document.getElementById("mot_de_passe");
        const showPasswordButton = document.getElementById("montrer_mot_de_passe");

        showPasswordButton.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.innerHTML = '<i class="far fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                showPasswordButton.innerHTML = '<i class="far fa-eye"></i>';
            }
        });
    </script>