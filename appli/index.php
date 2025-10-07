<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Ajouter un produit</title>
</head>
    <body>
        <header>
            <nav> 
                <a href="http://localhost/Quentin_MAIA/appli/recap.php">Récap</a>
            </nav>
        </header>
        <main>
            <h1>Ajouter un produit</h1>
            <form action = "traitement.php" method = "post"> 
                    <label>Nom du produit :
                        <input type="text" name="name">
                    </label>
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
                <p class=submit>
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>      
            </form>
        </main>
    </body>
</html>