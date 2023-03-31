<?php

$searchRoot = 'test_search';
$searchName = 'test.txt';
$searchResult = [];

function search (string $searchRoot, string $searchName, &$searchResult)
{
    $directory = scandir($searchRoot);
    foreach($directory as $key => $value) {
        if ($value == '.' || $value == '..') {
            continue;
        }
        if (is_dir($searchRoot . '/' . $directory[$key])) {
            search($searchRoot . '/' . $directory[$key], $searchName, $searchResult);
        } else {
            if ($searchName == $directory[$key]) {
                $searchResult[] = $searchRoot . '/' . $directory[$key];
            }
        }
    }
}

search($searchRoot, $searchName, $searchResult);
$searchResult = array_filter($searchResult, "filesize");

if( count($searchResult) == 0) {
    print_r('поиск не дал результатов');
} else {
    var_dump($searchResult);
}





