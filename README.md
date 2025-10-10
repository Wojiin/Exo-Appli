# 📚 Exercice ELAN Formation — « Exo-Appli » 

---

## 📝 À propos

Ce dépôt contient un exercice pratique en **PHP**, représentant un **modèle de gestion de panier**.  
L’objectif est de créer une application web permettant de **gérer des produits en session**, de **les ajouter, modifier ou supprimer**, et de visualiser le tout dans un **tableau dynamique**.  
Le projet inclut également l’amélioration du **design via CSS** et la **navigation entre pages**.

Les fonctionnalités principales sont :  
- Navigation entre `index.php` et `recap.php` via une barre de navigation  
- Suivi du **nombre total d’articles** dans le panier, quelle que soit la page affichée  
- Ajout de produits via formulaire et génération dynamique d’un **tableau récapitulatif**  
- Modification des quantités de chaque produit avec les boutons "+" et "-"  
- **Suppression d’un produit spécifique**  
- **Vidage complet du panier**  
- Affichage de **messages dynamiques** (succès, erreur, notifications)  

---

## 🧠 Notions abordées

### ⚙️ Concepts PHP et Web

- Gestion des sessions pour stocker et récupérer les données utilisateur (`$_SESSION`)  
- Traitement des formulaires avec `$_POST` et `filter_input()` pour sécuriser les entrées  
- Organisation des actions via un **switch** dans `traitement.php` selon l’URL (`$_GET['action']`)  
- Génération dynamique d’un **tableau HTML** à partir des produits stockés en session  
- Mise à jour du **total et des quantités** en temps réel  
- Affichage de messages de confirmation ou d’erreur via la session  
- Intégration d’un **design** avec CSS et Google Fonts  
- Utilisation d’icônes Font Awesome pour améliorer l’interface (supprimer, augmenter/diminuer la quantité)

### 🌐 Navigation et affichage

- Barre de navigation pour passer à tout moment de `index.php` à `recap.php`  
- Visualisation du **nombre total d’articles** dans le panier  
- Affichage clair et interactif des informations produits dans un tableau  
- Messages dynamiques pour l’ajout, la suppression ou le vidage du panier  

---

## 🎯 Objectifs pédagogiques

### 🧩 Partie PHP

- Gérer les **sessions** pour manipuler les données côté serveur  
- Traiter les **formulaires** et valider les entrées utilisateur  
- Générer dynamiquement un **tableau HTML** à partir des données du formulaire  
- Utiliser un **switch** pour centraliser le traitement des différentes actions (`add`, `delete`, `clear`, `qtt-up`, `qtt-down`)  
- Afficher des **messages dynamiques** (succès, erreur, notifications)  
