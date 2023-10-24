<div class="container">
        <h1>Tableau des record</h1>
        <ul class="nav nav-tabs" id="onglets" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Bol d'air</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Mini Bol d'air</a>
            </li>
        </ul>
        <div class="tab-content" id="ongletsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <table class="table table-bordered">
                    <!-- Tableau pour l'onglet 1 -->
                    
                    <thead>
                        <tr>
                            <th>Equipe</th>
                            <th>Temps</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');

                        // Requête pour les temps par équipe
                        $sql = $connexion->connect()->prepare(
                            'SELECT
                            P.ID_EQUIPE,
                            MAX(TMP.TempsCumule) AS TempsCumuleMax
                            FROM TempsMinParticipantCircuit1 TMP
                            INNER JOIN PARTICIPANT P ON TMP.ID_PARTICIPANT = P.ID_PARTICIPANT
                            GROUP BY P.ID_EQUIPE
                            ORDER BY TempsCumuleMax;'
                        
                        );

                        try {
                            $sql->execute();
                            $resultats =  $sql->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($resultats as $resultat) {
                                echo '<tr>';
                                echo '<td>' . $resultat['ID_EQUIPE'] . '</td>';
                                echo '<td>' . $resultat['TempsCumuleMax'] . '</td>';
                                echo '</tr>';
                            }
                        } catch (PDOException $e) {
                            echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <table class="table table-bordered">
                    <!-- Tableau pour l'onglet 2 -->
                    <thead>
                        <tr>
                            <th>Participant</th>
                            <th>Temps</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');

                        // Requête pour les temps par équipe
                        $sql = $connexion->connect()->prepare(
                            'SELECT * FROM tempsminparticipantcircuit1
                            ORDER BY TempsCumule;'
                        );

                        try {
                            $sql->execute();
                            $resultats =  $sql->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($resultats as $resultat) {
                                echo '<tr>';
                                echo '<td>' . $resultat['ID_PARTICIPANT'] . '</td>';
                                echo '<td>' . $resultat['TempsCumule'] . '</td>';
                                echo '</tr>';
                            }
                        } catch (PDOException $e) {
                            echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>