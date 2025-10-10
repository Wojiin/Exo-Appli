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
        # Vérifie si la clé 'products' existe dans la session et si elle contient des données
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            # Affiche un message si le panier est vide
            echo "<p> Aucun produit en session ... </p>";
        }
        else {
            # Construit un tableau HTML pour afficher les produits du panier
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
        # Initialise le total général des prix
        $totalGeneral = 0;
        # Parcourt chaque produit dans la session pour afficher ses détails
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    # Lien sous forme d'icône pour supprimer un produit via traitement.php
                    "<td><a href='traitement.php?action=delete&id=".$index."'><i class='fa-solid fa-trash-can'></i></a></td>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    # Affiche la quantité avec des liens sous forme d'icône pour l'augmenter ou la diminuer
                    "<td class='qtt'><a href='traitement.php?action=qtt-down&id=".$index."'><i class='fa-solid fa-circle-minus'></a></i>".$product['qtt']."<a href='traitement.php?action=qtt-up&id=".$index."'><i class='fa-solid fa-circle-plus'></i></a>"."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                 "</tr>";
                # Additionne la somme de tous les prix pour définir le total
                $totalGeneral+= $product['total'];
        }
        # Affiche le total général du panier
        echo "<tr>",
                "<td colspan=5 class=total>Total général : </td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
            "</table>";
        }
            # Initialise une variable pour compter le nombre total d'articles
            $panier = 0;
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $product) {
                # Additionne les quantités de chaque produit dans la variable
                $panier += $product['qtt'];
    }
}
        # Affiche le nombre total d'articles dans le panier
        echo "<p class='panier'> Articles dans le panier : <strong>$panier</strong> </p><br>";
            if (isset($_SESSION['products'])) {
            # Affiche un lien pour vider le panier si des produits existent
            echo "<a href='traitement.php?action=clear'><p class='del'>SUPPRIMER LE PANIER</p></a>";
    
        }
        # Affiche un message de confirmation d'ajout ou supression de produit dans le panier ou un message d'erreur dans la session
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
}
        ?>
        </main>
        </div>
    </body>
    </html>