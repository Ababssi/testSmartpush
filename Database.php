<?php

class Database
{
    // On souhaite créer la base de données qui va accueillir les éléments stockés dans le tableau précédent.
    // 1. Proposez une suite de requêtes SQL pour initialiser la base et remplir les éléments.
    // 2. Ajouter une table “city” qui soit en relation avec la table précédente.

    private SQLite3 $db;

    public function __construct(string $dbPath)
    {
        $this->db = new SQLite3($dbPath);
    }

    public function initialize()
    {
        // Create table user if not exists with id, firstname, lastname, age and foreign key city_id
        $this->db->exec("CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            firstname TEXT NOT NULL,
            lastname TEXT NOT NULL,
            age INTEGER NOT NULL,
            address TEXT NOT NULL,    
            city_nom INTEGER NOT NULL,
            FOREIGN KEY (city_nom) REFERENCES city(nom)
        )");

        // creer une deuxieme table city avec id, name
        $this->db->exec("CREATE TABLE IF NOT EXISTS city (
            nom TEXT PRIMARY KEY
        )");

        // Insert example data plus de 10 villes
        $this->db->exec("INSERT INTO city (nom) VALUES ('Paris')");
        $this->db->exec("INSERT INTO city (nom) VALUES ('Lyon')");
        $this->db->exec("INSERT INTO city (nom) VALUES ('Nice')");
        $this->db->exec("INSERT INTO city (nom) VALUES ('Marseille')");

        $this->db->exec("INSERT INTO `user` (`id`, `lastname`, `firstname`, `age`, `address`, `city_nom`) VALUES
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
