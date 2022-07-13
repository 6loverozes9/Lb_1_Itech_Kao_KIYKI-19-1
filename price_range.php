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
        if(isset($_GET["start_price"]) && isset($_GET["end_price"]))
        {
            $start_price = $_GET["start_price"];
            
            $end_price = $_GET["end_price"];
        
            $sth = $dbh->prepare("SELECT * FROM items WHERE `price` >= :start_price and `price` <= :end_price ");
            $sth->execute((array(':start_price' => $start_price, ':end_price' => $end_price )));
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