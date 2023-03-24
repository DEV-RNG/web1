<?php

@include 'config.php';

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:produit.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inventaire</title>
</head>
<body>
<div class="container">

   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Produit</th>
            <th>Nom du Produit</th>
            <th>Prit du Produit</th>
            <th>Action</th>
            <a href="admin_page.php" class="admin">Page d'ajout</a>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> modifié </a>
               <a href="produit.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> suprrimé </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>
</body>
</html>