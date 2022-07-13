<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <table class="table" >
        <tr>
            <th>NAME</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>QUALITY</th>
        </tr>
        <?php
        include('connect.php');
        if(isset($_GET["category_selected"]))
        {
            $category_selected = $_GET["category_selected"];
           
                $sql_getId = "SELECT `id_category` FROM category WHERE `name` = :category_selected";
                $sth = $dbh->prepare($sql_getId);
                $sth->execute((array(':category_selected' => $category_selected)));
                
                $category_id = $sth->fetchAll();
                 foreach($category_id as $row)
                {
                    $cat_id = $row['id_category'];
    
                }

                $sth = $dbh->prepare("SELECT * FROM items WHERE `fid_category` = :cat_id");
                $sth->execute((array(':cat_id' => $cat_id)));
                $product = $sth->fetchAll(PDO::FETCH_OBJ);
                
                foreach($product as $row)
                {
                    print "<tr> <th>$row->name</th> <th>$row->price</th>
                    <th>$row->quantity</th> <th>$row->quality</th></tr>";
                }

        }
        ?>
    </table>
</body>
</html>