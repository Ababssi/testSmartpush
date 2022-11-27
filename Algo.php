#!/usr/bin/env php
<?php

require_once "Database.php";
//use Database;

// Algorithmie
// Etant donné un tableau de n éléments composés de trois champs :
// lastname, firstname, age.
// Proposez un algorithme pour classer les éléments en fonction d’un des trois critères par ordre décroissant ou croissant.
// Exemple :

$tabs =array(
	["lastname"=>"elKassim", "firstname"=>"Ababssi", "age"=>14],
  	["lastname"=>"nacera", "firstname"=>"Ababssi", "age"=>36],
  	["lastname"=>"papa", "firstname"=>"Ababssi", "age"=>39],
  	["lastname"=>"soundousse", "firstname"=>"Ababssi", "age"=>10],
  	["lastname"=>"zeyneb", "firstname"=>"Ababssi", "age"=>6],
  	["lastname"=>"jean", "firstname"=>"valjean", "age"=>99]
);

$tabs2 =array(
	["lastname"=>"Sophie", "firstname"=>"Ababssi", "age"=>14, "address"=>"rue de la paix", "city"=>"Paris"],
  	["lastname"=>"nacera", "firstname"=>"Ababssi", "age"=>36, "address"=>"rue de la guer", "city"=>"Lyon"],
  	["lastname"=>"Nathan", "firstname"=>"Ababssi", "age"=>39, "address"=>"rue de la joie", "city"=>"Nice"],
  	["lastname"=>"Flavie", "firstname"=>"Ababssi", "age"=>12, "address"=>"rue de la tris", "city"=>"Lyon"],
    ["lastname"=>"Wellan", "firstname"=>"Ababssi", "age"=>35, "address"=>"rue de la carr", "city"=>"Marseille"],
  	["lastname"=>"zeyneb", "firstname"=>"Ababssi", "age"=>10, "address"=>"rue de la paix", "city"=>"Nice"],
  	["lastname"=>"Aubrey", "firstname"=>"Valjean", "age"=>97, "address"=>"rue de la bell", "city"=>"Paris"],
  	["lastname"=>"Aubrey", "firstname"=>"Valjean", "age"=>81, "address"=>"rue de la zaza", "city"=>"Marseille"]  
);

function sortArrayByKey(array $tabs, $key){
    $tabKey = [];
      if(count($tabs) > 0){
            foreach ($tabs as $tab){
              $tabKey[] = $tab[$key];
          }
      }
    asort($tabKey);
    $tabsSorted = [];
    foreach( $tabKey as $key => $value){
        $tabsSorted[]=$tabs[$key];
    }
    return $tabsSorted;
  }

  sortArrayByKey($tabs, "lastname");

// On ajoute les champs “address” et “city” aux éléments du tableau. Proposez un algorithme permettant d’obtenir un tableau indexé sur les noms de villes contenant les n éléments classés par ville.

function restructureArrayByCity(array $tabs, $key){
    $tabCity = [];
    sortArrayByKey($tabs, $key);
    if(count($tabs) > 0){
      foreach ($tabs as $tab){
        $tabCity[$tab[$key]][] = $tab;
      }
    }
    return $tabCity;
  }

  print_r(json_encode( restructureArrayByCity($tabs2, 'city')));

  $db = new Database("data");
  $db->initialize();





