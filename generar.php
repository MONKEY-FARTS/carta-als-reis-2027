<?php

$json = file_get_contents('products.json');
$products = json_decode($json, true);

if (!is_dir('productes')) {
    mkdir('productes');
}

foreach ($products as $product) {

    $id = $product['id'];
    $name = htmlspecialchars($product['name']);
    $description = htmlspecialchars($product['description']);
    $price = htmlspecialchars($product['price']);
    $img = htmlspecialchars($product['img']);
    $pq = htmlspecialchars($product['pq']);
    $url = htmlspecialchars($product['url']);

    $html = <<<HTML
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>$name</title>
    <link rel="stylesheet" href="../product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="jpg" href="../img/icon.jpg">
</head>

<body>
    <div class="general">
        <div class="imagen">
            <img src="../$img" alt="Cadira Ergonòmica">
        </div>
        <div class="description">
            <h1>$name</h1>
            <p>$description</p>
            <h2 class="price">$price €</h2>
            <div class="button">
                <button class="buy btn" data-url="$url">Comprar</button>
                <button class="pq btn" title="Per què?">?</button>
            </div>
        </div>
        <i class="fas fa-house" onclick="location.href = '../index.html'"></i>
    </div>
    <div class="why">$pq</div>
    <script>
        const general = document.querySelector(".general");
        const buy = document.querySelector(".buy");
        const why = document.querySelector(".why");

        buy.addEventListener("click", () => {
            window.open(buy.dataset.url, "_blank")
        })

        general.addEventListener("click", (event) => {
            let positionClick = event.target;
            if (positionClick.classList.contains("pq")) {
                why.style.display = "block"
            } else{
                why.style.display = "none"
            }
        })
    </script>
</body>

</html>
HTML;

    file_put_contents(
        "productes/$name.html",
        $html
    );
}

// echo "Fitxers creats correctament.";

?>
