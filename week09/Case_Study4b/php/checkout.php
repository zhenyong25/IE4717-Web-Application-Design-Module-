<?php
    $javaqty = $_POST["javaquantity"];
    $cafeqty = $_POST["cafeQuantity"];
    $capuccinoqty = $_POST["capuccinoquantity"];
    $cafetype = $_POST["cafe"];
    $capuccinotype = $_POST["capuccino"];

    if (!$javaqty && !$cafeqty && !$capuccinoqty) {
        echo "You have not ordered any coffee!";
        exit;
    }


    @ $db = new mysqli('localhost', 'root', '', 'javajam');

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database. Please try again later.";
        exit;
    }


    if ($javaqty) {
        $javaprice = $javaqty * 2;
        $query = "insert into sales values
                 ('Just Java', NULL, '".$javaqty."', '".$javaprice."')";
        $result = $db->query($query);

        if (!$result) {
            echo "An error has occurred. Java item was not added.";
        }
    }


    if ($cafeqty) {
        if ($cafetype == 'Single') {
            $cafeprice = $cafeqty * 2;
        } else {
            $cafeprice = $cafeqty * 3;
        }
        $query = "insert into sales values
                 ('Cafe au Lait', '".$cafetype."', '".$cafeqty."', '".$cafeprice."')";
        $result = $db->query($query);

        if (!$result) {
            echo "An error has occurred. Cafe au Lait item was not added.";
        }
    }

    if ($capuccinoqty) {
        if ($capuccinotype == 'Single') {
            $capuccinoprice = $capuccinoqty * 4.75;
        } else {
            $capuccinoprice = $capuccinoqty * 5.75;
        }
        $query = "insert into sales values
                 ('Iced Cappuccino', '".$capuccinotype."', '".$capuccinoqty."', '".$capuccinoprice."')";
        $result = $db->query($query);

        if (!$result) {
            echo "An error has occurred. Iced Cappuccino item was not added.";
        }
    }

    $db->close();

    echo '<script>alert("Your order has been processed");</script>';

    header("Location: http://localhost:8000/Case_Study4b/sales_report.html");
    exit();
?>