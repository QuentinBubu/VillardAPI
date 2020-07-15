<?php
// 0 = ferme; 1 = ouvert; 2 = en prev

$pistes = [
    "Vertes" => [
        "Lilas" => 0,
        "Marguerite bas" => 0,
        "Violette" => 0,
        "Daim" => 0,
        "Marmotte" => 0,
        "Marmotton bas" => 0,
        "Marmotton haut" => 0,
        "Salamandre bas" => 0,
        "Salamandre haut" => 0,
        "Piste aux etoiles" => 0,
        "Clots" => 0,
     "La traverse" => 0
    ],

    "Bleues" => [
        "Marguerite" => 0,
        "Narcisse bas" => 0,
        "Narcisse milieu" => 0,
        "Perce neige" => 0,
        "Cerf bleu" => 0,
        "Chevreuil bas" => 0,
        "Chevreuil haut" => 0,
        "Bourgon" => 0,
        "Bouquetin" => 0,
        "Eterlou" => 0,
        "Perdrix Bl bas" => 0,
        "Perdrix Bl haut" => 0
    ],

    "Rouges" => [
        "Edelweiss" => 0,
        "Edelweiss 2" => 0,
        "Narcisse Rouge" => 0,
        "Cerf Rouge" => 0,
        "Canyon bas" => 0,
        "Canyon haut" => 0,
        "Coq 2 bas" => 0,
        "Coq bas" => 0,
        "Coq 2 haut" => 0,
        "Coq milieu" => 0,
        "Coq haut" => 0,
        "Loup" => 0,
        "Epervier" => 0,
        "Loup bas" => 0,
        "Loup haut" => 0,
        "Loup milieu" => 0
    ],

    "Noirs" =>[
        "Choucas" => 0,
        "Grand couloir" => 0,
        "Rhodo bas" => 0,
        "Rhodo haut" => 0,
        "Carolle Montillet" => 0,
        "Chamois" => 0,
        "Emile Allais" => 0,
        "Escalier" => 0,
        "Livere Blanc" => 0,
        "Lievre Blanc bas" => 0
    ],

    "Liaisons" => [
        "Retour village" => 0,
        "Villard Correncon" => 0
    ]
];


//$donnes = file_get_contents("https://www.villarddelans.com/hiver/pistes.html#.XgdWu0dKhPY");
$donnes = file_get_contents("liste_pistes.txt");

$donnes2 = str_replace("<", "@", $donnes);

/*$arr = explode("@h2>DOMAINE ALPIN VILLARD DE LANS / CORRENCON EN VERCORS@/h2>", $donnes2, 2);
$first = $arr[1];

$arr = explode("@h2>HAMEAU DES RAMBINS / Domaine débutant des Rambins-Corrençon village@/h2>", $first, 2);
$text_final = $arr[0];

echo $text_final;*/
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
header('Content-type: application/json');
echo  $contenu_json  ;
?>
