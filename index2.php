<?php

header('Content-type: application/json');

$pistes = [
    'Vertes' => [],
    'Bleues' => [],
    'Rouges' => [],
    'Noires' => []
];

$page = new DOMDocument();

//$pageData = file_get_contents("https://www.villarddelans.com/hiver/pistes.html#.XgdWu0dKhPY");
$pageData = file_get_contents("liste_pistes2.txt");

//$pageData = file_get_contents("https://web.archive.org/web/20180203002330if_/https://www.villarddelans.com/hiver/pistes.html#.WnUBDGj7RPY");

$pageData = utf8_encode($pageData);

@$page->loadHTML($pageData);

$finder = new DomXPath($page);
$pistesContent = $finder->query("//*[contains(@class, 'piste')]");

foreach ($pistesContent as $key => $value) {
    /*finder = new DomXPath($value);
    $level = $finder->query("//*[contains(@class, 'niveau_texte')]");
    $name = $finder->query("//*[contains(@class, 'nom')]");*/
    $pistesForeach = new DOMDocument();
    var_dump($value);
    //$pistesForeach = $pistesForeach->loadHTML($value);
    //$pistesForeach = $pistesForeach->getElementsByTagName('span');
    //var_dump($pistesForeach);
    
}