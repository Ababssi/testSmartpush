#!/usr/bin/env php
<?php
require_once "Database.php";


//tableau test 1
$tabs = array(
  ["lastname" => "elKassim", "firstname" => "Ababssi", "age" => 14],
  ["lastname" => "nacera", "firstname" => "Ababssi", "age" => 36],
  ["lastname" => "papa", "firstname" => "Ababssi", "age" => 39],
  ["lastname" => "soundousse", "firstname" => "Ababssi", "age" => 10],
  ["lastname" => "zeyneb", "firstname" => "Ababssi", "age" => 6],
  ["lastname" => "jean", "firstname" => "valjean", "age" => 99]
);

//tableau test 2
$tabs2 = array(
  ["lastname" => "Sophie", "firstname" => "Ababssi", "age" => 14, "address" => "rue de la paix", "city" => "Paris"],
  ["lastname" => "nacera", "firstname" => "Ababssi", "age" => 36, "address" => "rue de la guer", "city" => "Lyon"],
  ["lastname" => "Nathan", "firstname" => "Ababssi", "age" => 39, "address" => "rue de la joie", "city" => "Nice"],
  ["lastname" => "Flavie", "firstname" => "Ababssi", "age" => 12, "address" => "rue de la tris", "city" => "Lyon"],
  ["lastname" => "Wellan", "firstname" => "Ababssi", "age" => 35, "address" => "rue de la carr", "city" => "Marseille"],
  ["lastname" => "zeyneb", "firstname" => "Ababssi", "age" => 10, "address" => "rue de la paix", "city" => "Nice"],
  ["lastname" => "Aubrey", "firstname" => "Valjean", "age" => 97, "address" => "rue de la bell", "city" => "Paris"],
  ["lastname" => "Aubrey", "firstname" => "Valjean", "age" => 81, "address" => "rue de la zaza", "city" => "Marseille"]
);

// fonction de tri générique dans laquelle on choisit le critère de tri et de sens.
// $key doit correspondre à une des clés des sous-tableaux.
// $sens doit être "asc" ou autre chose pour un tri décroissant.
function sortArrayByKey(array $tabs, $key, $ordre = "ASC")
{
  $tabKey = [];
  if (count($tabs) > 0) {
    foreach ($tabs as $tab) {
      $tabKey[] = $tab[$key];
    }
  }
  if ($ordre == "ASC") {
    asort($tabKey);
  } else {
    arsort($tabKey);
  }
  $tabsSorted = [];
  foreach ($tabKey as $key => $value) {
    $tabsSorted[] = $tabs[$key];
  }
  return $tabsSorted;
}

// Fonction de restructuration générique du tableau
// $key doit correspondre à une des clés des sous-tableaux
// les valeurs de la clé $key deviennent les clés du tableau
// chaque valeur de la $key est unique et liste tous les lignes du sous-tableau
function restructureArrayByKey(array $tabs, $key)
{
  $tabCity = [];
  sortArrayByKey($tabs, $key);
  if (count($tabs) > 0) {
    foreach ($tabs as $tab) {
      $tabCity[$tab[$key]][] = $tab;
    }
  }
  return $tabCity;
}

// Exemple d'utilisation avec le tableau test 1 et le critère de tri "age" et le sens du tri "asc"
print_r(sortArrayByKey($tabs, "age", "DESC"));

// Exemple d'utilisation avec le tableau test 2 et le critère de tri "city" et le sens du tri "asc"
print_r(restructureArrayByKey($tabs2, 'city'));

// Initialisation de la base de données et insertion des données exemple.
$db = new Database("data.sqlite");
$db->initialize();
