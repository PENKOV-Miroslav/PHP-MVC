<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Inscription</div>
                <div class="card-body">
                    <form method="POST" action="?action=inscription">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login" required>
                        </div>
                        <div class="form-group">
                            <label for="mot_de_passe">Mot de passe</label>
                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                        </div>
                        <div class="form-group">
                            <label for="id_role">Rôle</label>
                            <select class="form-control" id="id_role" name="id_role">
                                <!-- Remplacez ceci par les options de rôle que vous souhaitez -->
                                <option value="1">Rôle 1</option>
                                <option value="2">Rôle 2</option>
                                <option value="3">Rôle 3</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
