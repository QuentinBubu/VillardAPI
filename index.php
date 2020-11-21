<?php

header('Content-type: application/json');

// 0 = ferme; 1 = ouvert; 2 = en prev; 3 = ERREUR
$pistes = [
    "Vertes" => [
        "Lilas" => 3,
        "Marguerite bas" => 3,
        "Violette" => 3,
        "Daim" => 3,
        "Marmotte" => 3,
        "Marmotton bas" => 3,
        "Marmotton haut" => 3,
        "Salamandre bas" => 3,
        "Salamandre haut" => 3,
        "Piste aux etoiles" => 3,
        "Clots" => 3,
     "La traverse" => 3
    ],

    "Bleues" => [
        "Marguerite" => 3,
        "Narcisse bas" => 3,
        "Narcisse milieu" => 3,
        "Perce neige" => 3,
        "Cerf bleu" => 3,
        "Chevreuil bas" => 3,
        "Chevreuil haut" => 3,
        "Bourgon" => 3,
        "Bouquetin" => 3,
        "Eterlou" => 3,
        "Perdrix Bl bas" => 3,
        "Perdrix Bl haut" => 3
    ],

    "Rouges" => [
        "Edelweiss" => 3,
        "Edelweiss 2" => 3,
        "Narcisse Rouge" => 3,
        "Cerf Rouge" => 3,
        "Canyon bas" => 3,
        "Canyon haut" => 3,
        "Coq 2 bas" => 3,
        "Coq bas" => 3,
        "Coq 2 haut" => 3,
        "Coq milieu" => 3,
        "Coq haut" => 3,
        "Loup" => 3,
        "Epervier" => 3,
        "Loup bas" => 3,
        "Loup haut" => 3,
        "Loup milieu" => 3
    ],

    "Noirs" =>[
        "Choucas" => 3,
        "Grand couloir" => 3,
        "Rhodo bas" => 3,
        "Rhodo haut" => 3,
        "Carolle Montillet" => 3,
        "Chamois" => 3,
        "Emile Allais" => 3,
        "Escalier" => 3,
        "Livere Blanc" => 3,
        "Lievre Blanc bas" => 3
    ],

    "Liaisons" => [
        "Retour village" => 3,
        "Villard Correncon" => 3
    ]
];


//$donnes = file_get_contents("https://www.villarddelans.com/hiver/pistes.html#.XgdWu0dKhPY");
$donnes = file_get_contents("liste_pistes.txt");

$donnes = file_get_contents("https://web.archive.org/web/20180203002330if_/https://www.villarddelans.com/hiver/pistes.html#.WnUBDGj7RPY");

$donnes = utf8_encode($donnes);

file_put_contents('liste_pistes2.txt', $donnes);

$donnes2 = str_replace("<", "@", $donnes);
$text_final = $donnes2;

for ($i = -1; $i != 15; $i++) {
    $donnes_trait = $text_final;
    $donnes_trait2 = @explode(strtoupper(array_keys($pistes['Vertes'])[$i]), $donnes_trait);
    $donnes_trait2 = @explode("@/li>", $donnes_trait2[1]);
    if (strpos($donnes_trait2[0], "Ouvert")) {
        $pistes['Vertes'][array_keys($pistes['Vertes'])[$i]] = 1;
    } elseif (strpos($donnes_trait2[0], "Fermé")) {
        $pistes['Vertes'][array_keys($pistes['Vertes'])[$i]] = 0;
    } elseif (strpos($donnes_trait2[0], "En prévision")) {
        $pistes['Vertes'][array_keys($pistes['Vertes'])[$i]] = 2;
    }
}

for ($i = -1; $i != 12; $i++) {
    $donnes_trait = $text_final;
    $donnes_trait2 = @explode(strtoupper(array_keys($pistes['Bleues'])[$i]), $donnes_trait);
    $donnes_trait2 = @explode("@/li>", $donnes_trait2[1]);
    if (strpos($donnes_trait2[0], "Ouvert")) {
        $pistes['Bleues'][array_keys($pistes['Bleues'])[$i]] = 1;
    } elseif (strpos($donnes_trait2[0], "Fermé")) {
        $pistes['Bleues'][array_keys($pistes['Bleues'])[$i]] = 0;
    } elseif (strpos($donnes_trait2[0], "En prévision")) {
        $pistes['Bleues'][array_keys($pistes['Bleues'])[$i]] = 2;
    }
}

for ($i = -1; $i != 16; $i++) {
    $donnes_trait = $text_final;
    $donnes_trait2 = @explode(strtoupper(array_keys($pistes['Rouges'])[$i]), $donnes_trait);
    $donnes_trait2 = @explode("@/li>", $donnes_trait2[1]);
    if (strpos($donnes_trait2[0], "Ouvert")) {
        $pistes['Rouges'][array_keys($pistes['Rouges'])[$i]] = 1;
    } elseif (strpos($donnes_trait2[0], "Fermé")) {
        $pistes['Rouges'][array_keys($pistes['Rouges'])[$i]] = 0;
    } elseif (strpos($donnes_trait2[0], "En prévision")) {
        $pistes['Rouges'][array_keys($pistes['Rouges'])[$i]] = 2;
    }
}

for ($i = -1; $i != 10; $i++) {
    $donnes_trait = $text_final;
    $donnes_trait2 = @explode(strtoupper(array_keys($pistes['Noirs'])[$i]), $donnes_trait);
    $donnes_trait2 = @explode("@/li>", $donnes_trait2[1]);
    if (strpos($donnes_trait2[0], "Ouvert")) {
        $pistes['Noirs'][array_keys($pistes['Noirs'])[$i]] = 1;
    } elseif (strpos($donnes_trait2[0], "Fermé")) {
        $pistes['Noirs'][array_keys($pistes['Noirs'])[$i]] = 0;
    } elseif (strpos($donnes_trait2[0], "En prévision")) {
        $pistes['Noirs'][array_keys($pistes['Noirs'])[$i]] = 2;
    }
}

for ($i = -1; $i != 2; $i++) {
    $donnes_trait = $text_final;
    $donnes_trait2 = @explode(strtoupper(array_keys($pistes['Liaisons'])[$i]), $donnes_trait);
    $donnes_trait2 = @explode("@/li>", $donnes_trait2[1]);
    if (strpos($donnes_trait2[0], "Ouvert")) {
        $pistes['Liaisons'][array_keys($pistes['Liaisons'])[$i]] = 1;
    } elseif (strpos($donnes_trait2[0], "Fermé")) {
        $pistes['Liaisons'][array_keys($pistes['Liaisons'])[$i]] = 0;
    } elseif (strpos($donnes_trait2[0], "En prévision")) {
        $pistes['Liaisons'][array_keys($pistes['Liaisons'])[$i]] = 2;
    }
}

$contenu_json = json_encode($pistes);
file_put_contents("donnees.json", $contenu_json);
echo $contenu_json;