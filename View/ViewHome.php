<?php

class ViewHome extends View {
    //Attribut
    private string $message = "";
    private array $datas = [];
    
    //Constructeur

    //Getter and Setter
    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $newMessage): self {
        $this->message = $newMessage;
        return $this;
    }

    /**
     * Get the value of datas
     *
     * @return array
     */
    public function getDatas(): array {
        return $this->datas;
    }

    /**
     * Set the value of datas
     *
     * @param array $datas
     *
     * @return self
     */
    public function setDatas(array $newDatas): self {
        $this->datas = $newDatas;
        return $this;
    }

    //Méthod
    public function displayMain(): void {
        // Affichage de la liste des joueurs récupérée
        $playerList= "";
        foreach ($this->datas as $player) {
            $playerList.= "<li>".htmlspecialchars($player['pseudo'])." - Score : ".$player['score']." - Team : ".htmlspecialchars($player['team'])."</li>";
        }

        echo("
            <main>
            <h1>Inscription</h1>
                <form action='' method='POST'>
                    <fieldset>
                        <legend>Ajouter un joueur à Supergame</legend>
                        <label for='pseudo'>Pseudo</label>
                        <input type='text' name='pseudo' id='pseudo'>
                        <label for='score'>Score</label>
                        <input type='number' name='score' id='score' step='1'>
                        <label for='team'>Team</label>
                        <select name='team' id='team'>
                            <option value='1'>Aucune</option>
                            <option value='2'>TeamRocket</option>
                            <option value='3'>DreamTeam</option>
                        </select>
                        <input type='submit' name='submit' value='Inscription'>
                    </fieldset>
                    <p>".$this->getMessage()."</p>
                </form>
                <section>
                    <h2>Liste des joueurs</h2>
                    <ul>".$playerList."</ul>
                </section>
            </main>
        ");
    }

    public function displayAll(): void {
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}