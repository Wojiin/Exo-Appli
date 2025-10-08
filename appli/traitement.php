<?php
# Ouvre ou récupère une session utilisateur
    session_start();
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "delete":
                if(isset($_SESSION['products'])){
                unset($_SESSION['products'][$_GET['id']]);};
                header("Location:recap.php");
                exit();
                break;
            case "clear":
                unset($_SESSION['products']);
                echo '<script>alert("Liste supprimé")</script>';
                break;
            case "qtt-up":
                
                break;
            case "qtt-down":

                break;
        }
    }

    # Condition qui vérifie la validité définie par les filtres du champ name="submit" du formulaire
    if(isset($_POST['submit'])){ 
        # Retire les caractères spéciaux, empêche l'injection de code via le formulaire         
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        # "FILTER_VALIDATE_FLOAT" n'autorise que les nombres à virgule, "FILTER_FLAG_ALLOW_FRACTION" permet l'ajout d'un "," ou "."
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        # N'autorise que les nombres entiers différents de "0"
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
# "filter_input()" Renvoie les valeurs assainies des champs traités
        # Si tout les champs renvoient la valeur "true", un tableau associatif est défini pour contenir
        # chaque variable dans le tableau "$_SESSION"
        if($name && $price && $qtt){
            $product = [
                "delete" => $delete,
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            $_SESSION['products'][] = $product;
            $_SESSION['message'] = "<p class='valid'>Produit ajouté au panier avec succès !</p>";
        } else {
            $_SESSION['message'] = "<p class='invalid'>Erreur : veuillez remplir correctement le formulaire.</p>";
    }
}
    
# "Location:" Redirige l'utilisateur vers la page si le champ n'est pas valide    
    header("Location:index.php");