<?php
require_once('dbConnection.php');

session_start();

//check user is logged in
if (!isset($_SESSION["who"])) {
    header('Location: login.php'); //redirect user if not logged in


} else {

    //response varibales
    $response["scriptId"]   = $_POST["scriptId"]; //store script id
    $response["questionId"] = $_POST["questionId"]; //store pitch
    $response["answerId"]   = $_POST["answerId"]; //store script name
    $response["scriptName"] = " "; //initiate scriptname variable
    $response["category"]   = " "; //initiate category variable
    $response["i"]          = 1; //count the number of answers stored

    //Execute query to get script name and Category
    $results = mysqli_query($dbConnection, "SELECT * FROM script WHERE scriptId = '" . $response["scriptId"] . "'") or die('Problem with script query' . mysqli_error());
    $result = mysqli_fetch_array($results); //store query results

    $response["scriptName"] = $result['scriptName'];
    $response["category"]   = $result['category'];


    //Execute query to get pitch
    $results = mysqli_query($dbConnection, "SELECT texts FROM question WHERE questionId = '" . $response["questionId"] . "'") or die('Problem with question query' . mysqli_error());
    $result = mysqli_fetch_assoc($results); //store query results

    $response[] = $result;
    $response["backId"] = $response["questionId"]; //stores the previous question id for back button functionality


    //Execute query to get answers
    $results = mysqli_query($dbConnection, "SELECT * FROM answer WHERE questionId = '" . $response["questionId"] . "'") or die('Problem with query' . mysqli_error());

    while ($row = mysqli_fetch_array($results)) {

        $temp["tempID"] = $response["i"];
        $temp["id"]     = $row['texts']; //store answer text
        $temp["nextId"] = $row['nextQuestionId']; //store the id of the question which user will be directed to from that answer
        $temp["ans"]    = $row['idanswer']; //store answer id

        $response[] = $temp; //store $temp array into response array
        $response["i"]++; //increment answer count
    }

}
