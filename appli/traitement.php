<?php
# Ouvre ou récupère une session utilisateur
    session_start();
# Vérifie si une action est demandée avec un lien qui contient l'instruction action
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "delete":
                # Supprime un produit spécifique du panier en utilisant son index
                if(isset($_SESSION['products'])){
                unset($_SESSION['products'][$_GET['id']]);
                # Stocke un message de confirmation pour la suppression
                $_SESSION['message'] = "<p class='suppr'>Produit supprimé avec succès !</p>";
            };
                # Redirige vers la page de récapitulatif
                header("Location:recap.php");
                exit();
                break;
            case "clear":
            # Vide complètement le panier en supprimant la clé 'products'
            if(isset($_SESSION['products'])){
                unset($_SESSION['products']);
                # Stocke un message de confirmation pour la suppression
                $_SESSION['message'] = "<p class='suppr'>Panier vidé avec succès !</p>";
            };
                # Redirige vers la page de récapitulatif
                header("Location:recap.php");
                exit();
                break;
            case "qtt-up":
                # Augmente de 1 la quantité d'un produit spécifique
                if(isset($_SESSION['products'])){
                ($_SESSION['products'][$_GET['id']]['qtt']++);
                # Met à jour le total en multipliant le prix par la nouvelle quantité
                ($_SESSION['products'][$_GET['id']]['total']=$_SESSION['products'][$_GET['id']]['price']*$_SESSION['products'][$_GET['id']]['qtt']);
            };
                # Redirige vers la page de récapitulatif
                header("Location:recap.php");
                exit();
                break;
            case "qtt-down":
                # Diminue la quantité d'un produit spécifique si elle est supérieure à 0 (Pas de quantité négative possible)
                if(isset($_SESSION['products']) && ($_SESSION['products'][$_GET['id']]['qtt']) > 0){
                ($_SESSION['products'][$_GET['id']]['qtt']--);
                # Met à jour le total en multipliant le prix par la nouvelle quantité
                ($_SESSION['products'][$_GET['id']]['total']=$_SESSION['products'][$_GET['id']]['price']*$_SESSION['products'][$_GET['id']]['qtt']);
            };
                # Redirige vers la page de récapitulatif
                header("Location:recap.php");
                exit();
                break;
        }
    }

    # Vérifie si le formulaire d'ajout de produit a été soumis
    if(isset($_POST['submit'])){ 
        # Nettoie le champ 'name' pour empêcher l'injection de code        
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        # "FILTER_VALIDATE_FLOAT" n'autorise que les nombres à virgule, "FILTER_FLAG_ALLOW_FRACTION" permet l'ajout d'un "," ou "."
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        # N'autorise que les nombres entiers positifs
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        # Vérifie que tous les champs sont valides avant d'ajouter le produit
        if($name && $price && $qtt){
            # Crée un tableau associatif pour stocker les données du produit
            $product = [
                "delete" => $delete,
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            # Ajoute le produit au tableau de session 'products'
            $_SESSION['products'][] = $product;
            # Stocke un message de confirmation pour l'ajout
            $_SESSION['message'] = "<p class='valid'>Produit ajouté au panier avec succès !</p>";
        } else {
            # Stocke un message d'erreur si les champs ne sont pas valides
            $_SESSION['message'] = "<p class='invalid'>Erreur : veuillez remplir correctement le formulaire.</p>";
    }
}
    
# Redirige vers la page d'index après le traitement du formulaire    
    header("Location:index.php");