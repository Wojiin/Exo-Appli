<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
// action cible le fichier à atteindre post transmet les données du formulaire à traitement.php                                                         dans un tableau*/
        <form action = "traitement.php" method = "post"> 
                <label>Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
// name="submit" permet de vérifier la validation du formulaire par l'utilisateur
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>      
        </form>
</body>
</html>