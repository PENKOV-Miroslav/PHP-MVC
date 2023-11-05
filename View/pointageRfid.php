<br>
<div class="container">
    <form method="POST" action="?action=rfid">
        <div class="mb-3 d-flex align-items-center">
            <input type="text" id="rfidInput" name="rfid" placeholder="Entrez le code RFID" class="form-control" required>
            <select class="form-control" name="option" id="options" required>
                <option value="" disabled selected>--- Epreuve bol'air ---</option>
                <option value="1">Course à pieds</option>
                <option value="2">Canoe</option>
                <option value="3">VTT</option>
                <option value="" disabled>--- Epreuve mini bol'air ---</option>
                <option value="4">Course à pieds</option>
                <option value="5">Canoe</option>
                <option value="6">VTT</option>
            </select>
            <button id="sendRFID" onclick="getRFID()" class="btn btn-primary">Envoyer</button>
        </div>
        <div id="result"></div>
    </form>
</div>
