<?php

require_once ('Model/Participant.php');

class ParticipantDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer un participant
    public function createParticipant(Participant $participant) {
        try {
            $sql = "INSERT INTO participants (nom_participant, prenom_participant, date_naissance_participant, adresse_participant, code_postal_participant, ville_participant, telephone_participant, certificat_valider_participant, club_participant, id_rfid, email_participant, id_equipe, id_utilisateur) VALUES (:nom_participant, :prenom_participant, :date_naissance_participant, :adresse_participant, :code_postal_participant, :ville_participant, :telephone_participant, :certificat_valider_participant, :club_participant, :id_rfid, :email_participant, :id_equipe, :id_utilisateur)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
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
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir un participant par son ID
    public function getParticipantById($id) {
        try {
            $sql = "SELECT * FROM participants WHERE id_participant = :id_participant";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_participant', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour un participant
    public function updateParticipant(Participant $participant) {
        try {
            $sql = "UPDATE participants SET nom_participant = :nom_participant, prenom_participant = :prenom_participant, date_naissance_participant = :date_naissance_participant, adresse_participant = :adresse_participant, code_postal_participant = :code_postal_participant, ville_participant = :ville_participant, telephone_participant = :telephone_participant, certificat_valider_participant = :certificat_valider_participant, club_participant = :club_participant, id_rfid = :id_rfid, email_participant = :email_participant, id_equipe = :id_equipe, id_utilisateur = :id_utilisateur WHERE id_participant = :id_participant";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
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
            $stmt->bindParam(':id_participant', $participant->getId_participant());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un participant
    public function deleteParticipant($id) {
        try {
            $sql = "DELETE FROM participants WHERE id_participant = :id_participant";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_participant', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les participants
    public function findAllParticipants() {
        try {
            $sql = "SELECT * FROM participants";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de tous les participants : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
