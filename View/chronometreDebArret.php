  <div class="container">
    <div class="row mt-5">
      <div class="col-12 text-center">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Chronomètre</h2>
            <div class="card-text">
              <div class="text-center">
                <div id="chronometre" class="display-3">00:00:00</div>
              </div>
              <div class="text-center mt-3">
                <button id="demarrer" class="btn btn-primary mr-2">Démarrer</button>
                <button id="pause" class="btn btn-secondary mr-2">Pause</button>
                <button id="reinitialiser" class="btn btn-danger">Réinitialiser</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    let timer;
    let temps = 0;
    let enCours = false;

    const chronometre = document.getElementById("chronometre");
    const boutonDemarrer = document.getElementById("demarrer");
    const boutonPause = document.getElementById("pause");
    const boutonReinitialiser = document.getElementById("reinitialiser");

    function demarrerChronometre() {
      if (!enCours) {
        enCours = true;
        timer = setInterval(function() {
          temps++;
          afficherTemps();
        }, 1000);
      }
    }

    function mettreEnPause() {
      if (enCours) {
        enCours = false;
        clearInterval(timer);
      }
    }

    function reinitialiserChronometre() {
      enCours = false;
      clearInterval(timer);
      temps = 0;
      afficherTemps();
    }

    function afficherTemps() {
      const heures = Math.floor(temps / 3600);
      const minutes = Math.floor((temps % 3600) / 60);
      const secondes = temps % 60;
      chronometre.textContent = `${heures.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secondes.toString().padStart(2, '0')}`;
    }

    boutonDemarrer.addEventListener("click", demarrerChronometre);
    boutonPause.addEventListener("click", mettreEnPause);
    boutonReinitialiser.addEventListener("click", reinitialiserChronometre);

    afficherTemps();
  </script>