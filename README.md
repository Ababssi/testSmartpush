# Smartpush Algo et Base de données

## Présentation

j'ai choisi le PHP pour réaliser le test d'Algo.
et SQLite pour la base de données.

## Installation

installer l'extension VSCode SQLite pour exécuter la le script

## Test

les fonctions sont génériques mais les tests repondent bien aux questions posées.

## Exécution

lancer le script avec la commande `php algo.php`

vous exécuterez :

```
// Exemple d'utilisation avec le tableau test 1 et le critère de tri "age" et le sens du tri "asc"
print_r(sortArrayByKey($tabs, "age", "DESC"));

// Exemple d'utilisation avec le tableau test 2 et le critère de tri "city" et le sens du tri "asc"
print_r(restructureArrayByKey($tabs2, 'city'));
```

et aussi l'execution de l'initialisation de la base de données

avec la creation d'un fichier data.sqlite qui contiendra les tables contenant des données de test.
