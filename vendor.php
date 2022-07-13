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
        if(isset($_GET["vendor_selected"]))
        {
            $vendor_selected = $_GET["vendor_selected"];
           
            $sth = $dbh->prepare("SELECT `id_vendors` FROM vendors WHERE `name` = :vendor_selected");
            $sth->execute((array(':vendor_selected' => $vendor_selected)));
                
            $vendors_id = $sth->fetchAll();
            foreach($vendors_id as $row)
            {
                $vend_id = $row['id_vendors'];
    
            }
           
            $sth = $dbh->prepare("SELECT * FROM items WHERE `fid_vendors` = :vend_id");
            $sth->execute((array(':vend_id' => $vend_id)));
                
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