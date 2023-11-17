<?php

try {

    $conn = new PDO('mysql:host=localhost;dbname=electronacer', 'root', '');
    $stmt = $conn->prepare('SELECT * FROM users');
    $stmt->execute();
    $result = $stmt->fetchAll();

    $user_exit = false;
    foreach ($result as $row) {
        if ($_POST['identifiant'] === $row[0] && $_POST['password'] === $row[1]) {
            $user_exit = true;
            $product = $conn->prepare('SELECT * FROM products');
            $product->execute();
            $items = $product->fetchAll();
        }
    }
    if (!$user_exit) {
        header("Location: index.html");
        exit();
    }

} catch (Exception $e) {

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
        <div class="collapse navbar-collapse d-flex" id="navbarTogglerDemo01">
            <a class="navbar-brand col-5" href="index.html">ElectroNacer</a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <!-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.html">Home</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link active" href="#">Products</a>
                </li>
            </ul>

        </div>
    </nav>

    <?php
    $name = $_POST['identifiant'];
    echo "<h1>Welcome $name </h1>";

    ?>

    <div class="select">

        <select id="filter">
            <option value="0">All</option>
            <option value="1">Arduino</option>
            <option value="2">Afficheur</option>
            <option value="3">Robot</option>
            <option value="4">produits en rupture de stock</option>
        </select>
    </div>


    <div class="product-menu">
        <?php
        foreach ($items as $item) {
            $title = $item["libelle"];
            $price = "prix: " . $item["prix_unitaire"] . "DH";
            $qnt_min = $item['quantite_min'];
            $qnt_stock = $item['quantite_stock'];
            $catg = $item['categorie'];
            $img = "assets/images/" . $item['image_src'];
            $card = "
                <div class='product-item $catg'>
                    <img src= $img alt='Product 1'>
                    <h5>$title</h5>
                    <p>$price</p>
                    <p class='qntMin'>Quantity minimale: $qnt_min</p>
                    <p class='qntStc'>Quantity en Stock:  $qnt_stock</p>
                    <p>Categorie: $catg</p>
                </div>
            ";

            echo $card;
        }
        ?>
    </div>

    <script src="script.js"></script>

</body>

</html>