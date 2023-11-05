<div class="container">
    <div class="card p-3 mb-3">
        <h2 class="card-title">Tableau des records</h2>
        <div class="tab-content" id="ongletsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <form class="form-inline">
                <select id="circuit" class="form-select mb-3 mr-sm-3">
                    <option value="1">Bol d'air</option>
                    <option value="2">Mini Bol d'air</option>
                </select>
                <select id="temps-type" class="form-select mb-3 mr-sm-3">
                    <option value="equipe">Temps d'équipe</option>
                    <option value="individuel">Temps individuel</option>
                </select>
                <select id="categorie" class="form-select mb-3 mr-sm-3">
                    <option value="">Sélectionner une catégorie</option>
                    <option value="1">Homme</option>
                    <option value="2">Femme</option>
                    <option value="3">Mixte</option>
                    <option value="4">VAE</option>
                </select>
            </form>
                <table id="results-table" class="table table-bordered">
                    <!-- Tableau pour l'onglet 1 -->
                    
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Temps</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    