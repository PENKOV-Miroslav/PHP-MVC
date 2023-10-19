<?php
class ParticipantDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterParticipant(Participant $participant) {
        $sql = "INSERT INTO participant (nom_participant, prenom_participant, date_naissance_participant, adresse_participant, code_postal_participant, ville_participant, telephone_participant, certificat_valider_participant, club_participant, id_rfid, email_participant, id_equipe, id_utilisateur) VALUES (:nom_participant, :prenom_participant, :date_naissance_participant, :adresse_participant, :code_postal_participant, :ville_participant, :telephone_participant, :certificat_valider_participant, :club_participant, :id_rfid, :email_participant, :id_equipe, :id_utilisateur)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':nom_participant', $participant->getNom_participant());
        $stmt->bindParam(':prenom_participant', $participant->getPrenom_participant());
        $stmt->bindParam(':date_naissance_participant', $participant->getDate_naissance_participant());
        $stmt->bindParam(':adresse_participant', $participant->getAdresse_participant());
        $stmt->bindParam(':code_postal_participant', $participant->getCode_postal_participant());
        $stmt->bindParam(':ville_participant', $participant->getVille_participant());
        $stmt->bindParam(':telephone_participant', $participant->getTelephone_participant());
        $stmt->bindParam(':certificat_valider_participant', $participant->getCertificat_valider_participant());
        $stmt->bindParam(':club_participant', $participant->getClub_participant());
        $stmt->bindParam(':id_rfid', $participant->getId_rfid());
        $stmt->bindParam(':email_participant', $participant->getEmail_participant());
        $stmt->bindParam(':id_equipe', $participant->getId_equipe());
        $stmt->bindParam(':id_utilisateur', $participant->getId_utilisateur());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierParticipant(Participant $participant) {
        $sql = "UPDATE participant SET nom_participant = :nom_participant, prenom_participant = :prenom_participant, date_naissance_participant = :date_naissance_participant, adresse_participant = :adresse_participant, code_postal_participant = :code_postal_participant, ville_participant = :ville_participant, telephone_participant = :telephone_participant, certificat_valider_participant = :certificat_valider_participant, club_participant = :club_participant, id_rfid = :id_rfid, email_participant = :email_participant, id_equipe = :id_equipe, id_utilisateur = :id_utilisateur WHERE id_participant = :id_participant";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_participant', $participant->getId_participant());
        $stmt->bindParam(':nom_participant', $participant->getNom_participant());
        $stmt->bindParam(':prenom_participant', $participant->getPrenom_participant());
        $stmt->bindParam(':date_naissance_participant', $participant->getDate_naissance_participant());
        $stmt->bindParam(':adresse_participant', $participant->getAdresse_participant());
        $stmt->bindParam(':code_postal_participant', $participant->getCode_postal_participant());
        $stmt->bindParam(':ville_participant', $participant->getVille_participant());
        $stmt->bindParam(':telephone_participant', $participant->getTelephone_participant());
        $stmt->bindParam(':certificat_valider_participant', $participant->getCertificat_valider_participant());
        $stmt->bindParam(':club_participant', $participant->getClub_participant());
        $stmt->bindParam(':id_rfid', $participant->getId_rfid());
        $stmt->bindParam(':email_participant', $participant->getEmail_participant());
        $stmt->bindParam(':id_equipe', $participant->getId_equipe());
        $stmt->bindParam(':id_utilisateur', $participant->getId_utilisateur());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerParticipant($id_participant) {
        $sql = "DELETE FROM participant WHERE id_participant = :id_participant";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_participant', $id_participant);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getParticipantParId($id_participant) {
        $sql = "SELECT * FROM participant WHERE id_participant = :id_participant";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_participant', $id_participant);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllParticipants() {
        $sql = "SELECT * FROM participant";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
