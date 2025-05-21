<?php

$breeds = ["Labrador Retriever", "German Shepherd", "Golden Retriever", "Poodle", "Bulldog", "Beagle"];

$q = isset($_GET["q"]) ? strtolower(trim($_GET["q"])) : "";

$res = "Dog Breed not found";

foreach ($breeds as $b) {
    if (stripos($b, $q) === 0) {
        $res = $b;
        break;
    }
}

echo $res;
?>
