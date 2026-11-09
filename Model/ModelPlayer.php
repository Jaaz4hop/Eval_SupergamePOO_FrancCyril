<?php

class ModelPlayer extends Model{
    //Attribut
    private int $id;
    private string $pseudo;
    private int $score;
    private string $team;
    private int $idTeam;

    //Constructeur

    //Getter and Setter
    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return string
     */
    public function getPseudo(): string {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param string $pseudo
     *
     * @return self
     */
    public function setPseudo(string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of score
     *
     * @return int
     */
    public function getScore(): int {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param int $score
     *
     * @return self
     */
    public function setScore(int $score): self {
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of team
     *
     * @return string
     */
    public function getTeam(): string {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @param string $team
     *
     * @return self
     */
    public function setTeam(string $team): self {
        $this->team = $team;
        return $this;
    }

    /**
     * Get the value of idTeam
     *
     * @return int
     */
    public function getIdTeam(): int {
        return $this->idTeam;
    }

    /**
     * Set the value of idTeam
     *
     * @param int $idTeam
     *
     * @return self
     */
    public function setIdTeam(int $idTeam): self {
        $this->idTeam = $idTeam;
        return $this;
    }

    //Method
    public function findAll():array{
        try{
            //1) Préparer la requête SELECT pour récupérer le nom des players et leur teams
            $request = $this->getBdd()->prepare('SELECT p.id_player, p.pseudo, p.score, p.id_team, t.team FROM player p INNER JOIN team t ON p.id_team = t.id_team;');

            //3) Envoyer la requête à la BDD
            $request->execute();

            //4) Récupérer la réponse de la BDD
            // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }   

    public function findByPseudo(string $pseudo):array{
        try{
            $request = $this->getBdd()->prepare('SELECT p.id_player, p.pseudo, p.score, p.id_team, t.team FROM player p JOIN team t ON p.id_team = t.id_team WHERE pseudo = ?');
    
            $request->bindparam(1,$pseudo,PDO::PARAM_STR);
    
            $request->execute();
    
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function add(string $pseudo, int $score, int $idTeam):void{
        try{
            $request = $this->getBdd()->prepare('INSERT INTO player (pseudo, score, id_team) VALUES (?, ?, ?)');
    
            $request->bindparam(1,$pseudo,PDO::PARAM_STR);
            $request->bindparam(2,$score,PDO::PARAM_INT);
            $request->bindparam(3,$idTeam,PDO::PARAM_INT);
    
            $request->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function delete(int $id):void{
        try{
            $request = $this->getBdd()->prepare('DELETE FROM player WHERE id_player = ?');
    
            $request->bindparam(1,$id,PDO::PARAM_INT);
    
            $request->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
    
    public function update(int $id, string $pseudo, int $score, int $idTeam):void{
        try{
            $request = $this->getBdd()->prepare("UPDATE player SET pseudo = ?, score = ?, id_team = ? WHERE id_player = ? ");
    
            $request->bindparam(1,$pseudo,PDO::PARAM_STR);
            $request->bindparam(2,$score,PDO::PARAM_INT);
            $request->bindparam(3,$idTeam,PDO::PARAM_INT);
            $request->bindparam(4,$id,PDO::PARAM_INT);
    
            $request->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

}