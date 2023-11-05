<br>
<div class="container">
    <form method="POST" action="?action=rfid">
        <div class="mb-3 d-flex align-items-center">
            <input type="text" id="rfidInput" name="rfid" placeholder="Entrez le code RFID" class="form-control" required>
            <button id="sendRFID" onclick="getRFID()" class="btn btn-primary">Envoyer</button>
        </div>
        <div id="result"></div>
    </form>
</div>
