<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<h2>Лабораторна робота №1, КІУКІ-19-1, Туан Као Ань, Варіант №5 </h2>
<div class="wrapper">

       <div class="vendor">
           <h4>Select Vendor: </h4>
           <form action="vendor.php" method="get">
               <select name="vendor_selected">
               <option name='select vendor' >select vendor</option>
                <?php
                 include('connect.php');  
                
                foreach($dbh->query("SELECT * FROM vendors") as $row)
                {
                    $vendor_selected = $row['name'];
                    echo "<option value = '$vendor_selected'> $vendor_selected</option>";
                }
                    
                ?>
               </select>
               <input class="submit" type="submit" value="OK">
           </form>

       </div>

       <div class="range">
       
           <h4>Price range: </h4>
           <form action="price_range.php" method="get">
               <input name="start_price" >
               <input name="end_price">
               <input class="submit" type="submit" value="OK">
           </form>
       </div>


       <div class="category">

           <h4>Select category: </h4>
           
           <form action="category.php" method="GET">
               <select name="category_selected">
               <option name='select category'>select category</option>
            <?php
        
            foreach($dbh->query("SELECT * FROM category") as $row)
            {
                $name_cat = $row['name'];
                echo "<option value = '$name_cat'> $name_cat</option>";
            }
            ?>
            </select>
            <input class="submit" type="submit" value="OK">
           </form>
       </div>

   </div>
<body> 
</body>
</html>