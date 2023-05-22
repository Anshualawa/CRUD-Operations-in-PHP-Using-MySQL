<?php
error_reporting(E_ERROR | E_PARSE);
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == 'POST') {

    $inputData = json_decode(file_get_contents("php://input"), true);

    if (empty($inputData)) {
        echo $_POST['name'];
        $storeCustomer = storeCustomer($_POST);
    } else {

        $storeCustomer = storeCustomer($inputData);
    }
    echo $storeCustomer;


} elseif ($requestMethod == 'PUT') {
    $inputData = json_decode(file_get_contents("php://input"), true);
    if (empty($inputData)) {
        $updateCustomer = updateCustomer($_POST, $_GET);
    } else {
        $updateCustomer = updateCustomer($inputData, $_GET);
    }
} elseif ($requestMethod == "GET") {
    if (isset($_GET['id'])) {
        $customer = getCustomer($_GET);
        echo $customer;
    } else {
        $customerList = getCustomerList();
        echo $customerList;
    }


} elseif ($requestMethod == "DELETE") {

    $deleteCustomer = deleteCustomer($_GET);
    echo $deleteCustomer;

} else {
    $data = [
        'status' => 405,
        'message' => $requestMethod . ' Method Not Allowed',
    ];
    header("HTPP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
?>