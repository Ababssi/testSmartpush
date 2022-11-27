<?php

class Database{

    private SQLite3 $db;

    public function __construct(string $dbPath){
        $this->db = new SQLite3($dbPath);
    }

    public function initialize(){
        // Create table users if not exists with id, firstname, lastname, age and foreign key city_id
        $this->db->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            firstname TEXT NOT NULL,
            lastname TEXT NOT NULL,
            age INTEGER NOT NULL,
            address TEXT NOT NULL,    
            cities_name INTEGER NOT NULL,
            FOREIGN KEY (cities_name) REFERENCES cities(name)
        )");

          // creer une deuxieme table cities avec id, name
        $this->db->exec("CREATE TABLE IF NOT EXISTS cities (
            name TEXT PRIMARY KEY,
        )");

        // Insert example data plus de 10 villes
        $this->db->exec("INSERT INTO cities (name) VALUES ('Paris','Marseille','Lyon','Nice','Toulouse','Nantes','Strasbourg','Montpellier','Bordeaux','Lille','Rennes','Reims','Le Havre','Saint-Étienne','Toulon','Grenoble','Dijon','Angers','Villeurbanne','Nîmes','Aix-en-Provence','Brest')");

        $this->db->exec("INSERT INTO `users` (`id`, `lastname`, `firstname`, `age`, `address`, `city`) VALUES
        (1, 'elKassim', 'Ababssi', 14, 'rue de la paix', 'Paris'),
        (2, 'nacera', 'Ababssi', 36, 'rue de la guer', 'Lyon'),
        (3, 'Nathan', 'Ababssi', 39, 'rue de la joie', 'Nice'),
        (4, 'Flavie', 'Ababssi', 12, 'rue de la tris', 'Lyon'),
        (5, 'Wellan', 'Ababssi', 35, 'rue de la carr', 'Marseille'),
        (6, 'zeyneb', 'Ababssi', 10, 'rue de la paix', 'Nice'),
        (7, 'Aubrey', 'Valjean', 97, 'rue de la bell', 'Paris'),
        (8, 'Aubrey', 'Valjean', 81, 'rue de la zaza', 'Marseille');
        ");
    }

}
