<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <?php if (isset($errorMessage) && !empty($errorMessage)) : ?>
                <div class="alert alert-danger">
                    <?php echo $errorMessage; ?>
                </div>
                <?php endif; ?>
                
                <form method="post" action="">
                    <div class="form-group">
                        <label for="login">Nom d'utilisateur:</label>
                        <input type="text" class="form-control" name="login" id="login" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="mot_de_passe">Mot de passe:</label>
                        <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
        </div>
    </div>