<form method="post" action="index.php?action=register" class="form">
    <div class="form-group mb-3">
        <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
    </div>

    <div class="form-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
    </div>

    <div class="form-group mb-3">
        <select name="role" class="form-control">
            <option value="1">Admin</option>
            <option value="2">Secretaire</option>
            <option value="3">Pointeur</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
