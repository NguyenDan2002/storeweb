<?php

$mysqli = new mysqli("localhost:3306","root","","dbstore");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
    }
    $sql_get_order_codes = "SELECT order_code FROM orders";
    $result_order_codes = $mysqli->query($sql_get_order_codes);
    
    // Khởi tạo mảng để lưu danh sách order_code
    $order_codes = array();
    if ($result_order_codes->num_rows > 0) {
        while ($row = $result_order_codes->fetch_assoc()) {
            $order_codes[] = $row["order_code"];
        }
    }

    if (isset($_GET['cancel']) && $_GET['cancel'] == 1) {
        foreach ($order_codes as $code) {
            $sql_get_order = "SELECT * FROM orders WHERE order_code = $code LIMIT 1";
            $query_get_order = mysqli_query($mysqli, $sql_get_order);
    
            $sql_get_order_detail = "SELECT * FROM order_detail WHERE order_code = $code";
            $query_order_detail = mysqli_query($mysqli, $sql_get_order_detail);
    
            while ($item = mysqli_fetch_array($query_order_detail)) {
                $product_id = $item['product_id'];
                $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
                $product = mysqli_fetch_array($query_get_product);

    
                mysqli_query($mysqli, "UPDATE product SET product_quantity =(product_quantity), quantity_sales = quantity_sales WHERE product_id = $product_id");
            }
    
            $sql_order_cancel = "UPDATE orders SET order_status = -1 WHERE order_code = $code";
            mysqli_query($mysqli, $sql_order_cancel);

        }    
    }
    $sql_plus = "SELECT order_code FROM orders";

// xoa tat ca