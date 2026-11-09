<?php

class ControllerHome extends Controller {

    public function displayPlayers(): void {
        // Récupération des données depuis le modèle et transmission à la vue
        $players = $this->getModel()->findAll();
        $this->getView()->setDatas($players);
    }

    public function registerPlayer(): void {
        // 1) Vérifier que l'on reçoive bien le formulaire d'ajout de joueur
        if (isset($_POST['submit'])) {

            // 2) Vérifier que tous les champs sont remplis
            if (!empty($_POST['pseudo']) && !empty($_POST['score']) && !empty($_POST['team'])) {
                
                // 3) Vérifier le format de mes données 
                if (filter_var($_POST['score'], FILTER_VALIDATE_INT)) {
                        
                    // 4) Nettoyage des données avec sanitize()
                    $pseudo = sanitize($_POST['pseudo']);
                    $score = sanitize($_POST['score']);
                    $team = sanitize($_POST['team']);

                    // 5) Vérifier si le pseudo existe déjà
                    $data = $this->getModel()->findByPseudo($pseudo);

                    if (empty($data)) {
                        // Lancement de l'insertion
                        $this->getModel()->add($pseudo, $score, $team);

                        switch ($team) {
                            case 1:
                                $teamName = 'Aucune';
                                break;
                            case 2:
                                $teamName = 'TeamRocket';
                                break;
                            case 3:
                                $teamName = 'DreamTeam';
                                break;
                            default:
                                $teamName = 'Inconnu';
                                break;
                        }

                        $this->getView()->setMessage("Le joueur a été enregistré : {$pseudo}, {$score} points dans la team : {$teamName}");
                    } else {
                        $this->getView()->setMessage("Ce pseudo est déjà utilisé par un autre compte.");
                    }
                } else {
                    $this->getView()->setMessage("Veuillez renseigner un entier numérique pour le score.");
                }
            } else {
                $this->getView()->setMessage("Veuillez remplir tous les champs du formulaire.");
            }
        }
    }
}