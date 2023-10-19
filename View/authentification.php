<div class="container">
        <?php if (isset($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php } ?>
        <form method="post" action="index.php?action=login">
            <div class="mb-3">
                <input type="text" class="form-control" id="login" name="login" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                    <button type="button" class="btn btn-secondary" id="montrer_password">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <a href="?action=inscription">s'inscrire</a>
    </div>

    <script>
        const passwordInput = document.getElementById("password");
        const showPasswordButton = document.getElementById("montrer_password");

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