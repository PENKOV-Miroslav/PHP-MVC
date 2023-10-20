<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Authentification</div>
                    <div class="card-body">
                        <form method="POST" action="?action=authentification">
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="mot_de_passe" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" id="montrer_password"><i class="far fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                            <a href="?action=inscription">s'inscrire</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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