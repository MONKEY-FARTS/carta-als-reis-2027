<?php

$jsonFile = "products.json";
$imgDir = "img/";

if (!is_dir($imgDir)) {
    mkdir($imgDir, 0755, true);
}

$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$url = $_POST["url"];
$pq = $_POST["pq"];

$products = json_decode(
    file_get_contents($jsonFile),
    true
);

$id = count($products) + 1;

$extension = pathinfo(
    $_FILES["img"]["name"],
    PATHINFO_EXTENSION
);


$imageName = "img-" . $id . "." . $extension;

$imagePath = $imgDir . $imageName;

move_uploaded_file(
    $_FILES["img"]["tmp_name"],
    $imagePath
);

$products[] = [
    "id" => $id,
    "name" => $name,
    "description" => $description,
    "price" => $price,
    "img" => $imagePath,
    "pq" => $pq,
    "url" => $url
];

file_put_contents(
    $jsonFile,
    json_encode(
        $products,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    )
);

include "generar.php";
header("Location: index.php");
exit();


?>
