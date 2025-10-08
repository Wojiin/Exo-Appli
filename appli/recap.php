<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/de6359c2dd.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css"/>
        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <div id="wrapper">
        <header>
            <nav> 
                <a href="http://localhost/Quentin_MAIA/appli/index.php">Index</a>
            </nav>
        </header>
        <main>
        <?php
// Condition qui vérifie si la clé " products " existe et si elle contient des données dans le tableau de session
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p> Aucun produit en session ... </p>";
        }
        else {
// Si c'est le cas, affiche le tableau de session sous la forme :
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>Supprimer</th>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
        $totalGeneral = 0;
// Boucle itérative qui renvoie les données de chaque produit de manière uniforme
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td><a href='traitement.php?action=delete&id=".$index."'><i class='fa-solid fa-trash-can'></i></a></td>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td class='qtt'>"."<i class='fa-solid fa-circle-minus'></i>".$product['qtt']."<i class='fa-solid fa-circle-plus'></i>"."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                 "</tr>";
                 // Additionne la somme de tous les prix pour définir le total
                $totalGeneral+= $product['total'];
        }
        // Mise en forme du total général
        echo "<tr>",
                "<td colspan=1 class='del'>"."<i class='fa-solid fa-trash-can'></i>"."</td>",
                "<td colspan=4 class=total>Total général : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
            "</table>";
        }
            $panier = 0;
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $product) {
                $panier += $product['qtt'];
    }
}
 echo "<p class='panier'> Articles dans le panier : <strong>$panier</strong> </p>";
        ?>
        </main>
        </div>
    </body>
    </html>