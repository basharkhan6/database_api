<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/product.php';

// utilities
$utilities = new Utilities();

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$product = new Product($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
// get jwt
$jwt=isset($data->jwt) ? $data->jwt : die("Missing Token.");

// check auth
$url = $home_url . "/user/validate_token.php";
$fields = array('jwt' => $jwt);
$result = json_decode($utilities->sendPostRequest($url, $fields, "json"));
// var_dump($result);

if($result->message != "Access granted.") {
    // set response code - 401 unauthorized
    http_response_code(401);
    // close the script
    die("Authentication Failed. Please provide right token.");
}

// set ID property of product to be edited
$product->id = $data->id;

// set product property values
$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->category_id = $data->category_id;

// update the product
if($product->update()){
    // set response code - 200 ok
    http_response_code(200);
    // tell the user
    echo json_encode(array("message" => "Product was updated."));
}

// if unable to update the product, tell the user
else{
    // set response code - 503 service unavailable
    http_response_code(503);
    // tell the user
    echo json_encode(array("message" => "Unable to update product."));
}
?>
