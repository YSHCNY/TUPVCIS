<?php
// test

$host = "localhost";
$username = "root";
$password = "";
$database = "tupvcisdb";

try {
    $connect = new PDO('mysql:host='.$host.';port=3307; dbname='.$database,$username,$password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";


    $query = '
    SELECT * FROM table23 WHERE order_customer_name LIKE "%' . $_POST["search"]["value"] . '%"
    OR order_item LIKE "%' . $_POST["search"]["value"] . '%"
    OR order_date LIKE "%' . $_POST["search"]["value"] . '%"
    OR order_value LIKE "%' . $_POST["search"]["value"] . '%"
    OR sum_test LIKE "%' . $_POST["search"]["value"] . '%"
    ';
    if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
    } else {
        $query .= 'ORDER BY order_id DESC ';
    }
    $query1 = '';
    if ($_POST["length"] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    $statement = $connect->prepare($query);
    $statement->execute();
    $number_filter_row = $statement->rowCount();
    $statement = $connect->prepare($query . $query1);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    $total_order = 0;
    $test_order = 0;
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = $row["order_customer_name"];
        $sub_array[] = $row["order_item"];
        $sub_array[] = $row["order_date"];
        $sub_array[] = $row["order_value"];
        $sub_array[] = $row["sum_test"];
        $total_order = $total_order + floatval($row["order_value"]);
        $test_order = $test_order + floatval($row["sum_test"]);
        $data[] = $sub_array;
    }
    function count_all_data($connect)
    {
        $query = "SELECT * FROM table23";
        $statement = $connect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }
    $output = array(
        'draw'    => intval($_POST["draw"]),
        'recordsTotal'  => count_all_data($connect),
        'recordsFiltered' => $number_filter_row,
        'data'    => $data,
        'total'    => number_format($total_order, 2),
        'testtotal'    => number_format($test_order, 2)
    );
    echo json_encode($output);



} catch (PDOException $e) {
    print"Error!" . $e->getMessage()."<br/>";die();
   
}







?>
