<?php
require_once('dbConnection.php');

session_start();

//check user is logged in
if (!isset($_SESSION["who"])) {
    header('Location: login.php'); //redirect user if not logged in


} else {

    $response["id"]          = $_POST["id"]; //store question id
    $response["quill"]       = $_POST["quill"]; //store pitch
    $response["name"]        = $_POST["name"]; //store script name
    $response["category"]    = $_POST["category"]; //store category
    $response["scriptId"]    = $_POST["scriptId"]; //store script id
    $response["answerCount"] = $_POST["answerCount"]; //store number of answers
    $response["answerId"]    = $_POST["answerId"]; //answerId
    $response["userId"]      = $_SESSION["who"]; //store user id
    $holder                  = 1;

    //Dynamically store answers
    for ($i = 0; $i < $response["answerCount"]; $i++) {

        $tempAnsId = $i + 1;
        $response["a" . $tempAnsId] = $_POST["a" . $tempAnsId]; //store answer text

    }

    //update scriptName and category query
    $sqlUpdate = "UPDATE script SET scriptName = '" . $response["name"] . "', category = '" . $response["category"] . "' WHERE scriptId = '" . $response["scriptId"] . "'";

    mysqli_query($dbConnection, $sqlUpdate) //execute query
      or die('Problem with update scriptname query' . mysqli_error());


    //update pitch
    $sqlUpdate = "UPDATE question SET texts = '" . $response["quill"] . "' WHERE questionId = '" . $response["id"] . "'";

    mysqli_query($dbConnection, $sqlUpdate)
      or die('Problem with update pitch query' . mysqli_error());


    //select all answers for desired pitch
    $sqlUpdate = "SELECT * FROM answer WHERE questionId = '" . $response["id"] . "'";

    //execute query
    $results = mysqli_query($dbConnection, $sqlUpdate)
      or die('Problem with select answer query' . mysqli_error());

      //for all answers for the desired pitch
    while ($row = mysqli_fetch_array($results)) {

        //update each answers text to include the changes made by user when editing
        $sql = "UPDATE answer SET texts = '" . $response["a" . $holder] . "' WHERE idanswer = '" . $row["idanswer"] . "'";

        mysqli_query($dbConnection, $sql) //execute query
          or die('Problem with update answer query' . mysqli_error());

        $holder++;

    }

    //grab total number of answers for current pitch
    $result = mysqli_query($dbConnection, "SELECT count(*) as total FROM answer WHERE questionId = '" . $response["id"] . "'");
    $results  = mysqli_fetch_array($result);
    $response["total"] = $results['total'];

    //if the user has added a new answer while editing
    if ($response["answerCount"] > $response["total"]) {

        //insert new answer into database
        $sql = "INSERT INTO answer (texts, questionId) VALUES ('" . $response["a" . $holder] . "', '" . $response["id"] . "' )";

        mysqli_query($dbConnection, $sql)
          or die('Problem with insert answer query' . mysqli_error());

        $holder++;


    }

}
?>
