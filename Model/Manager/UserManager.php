<?php

class UserManager extends DbManager
{
    public function connect($username)
    {
        $query = $this->bdd->prepare('SELECT * FROM utilisateur WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        return $query->fetch();
    }
}



