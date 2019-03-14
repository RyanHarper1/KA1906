<?php
require_once('dbConnection.php');

session_start();

//check user is logged in
if (!isset($_SESSION["who"])){
  header('Location: login.php'); //redirect user if not logged in


}else{

  //response varibales
  $response["scriptId"] = $_POST["scriptId"]; //store script id
  $response["questionId"] = $_POST["questionId"]; //store pitch
  $response["answerId"] = $_POST["answerId"]; //store script name
  $response["scriptName"] = 0;
  $response["category"] = 0;
  $response["i"] = 1;

  //get script name and Category
  $results = mysqli_query($dbConnection,"SELECT * FROM script WHERE scriptId = '".$response["scriptId"]."'");

  $result = mysqli_fetch_array($results);
  $response["scriptName"] = $result['scriptName'];
  $response["category"] = $result['category'];



  //get pitch
  $results = mysqli_query($dbConnection,"SELECT texts FROM question WHERE questionId = '".$response["questionId"]."'");

  $result = mysqli_fetch_assoc($results);
  $response[] = $result;

  $response["backId"] = $response["questionId"];



  //get answers
  $results = mysqli_query($dbConnection,"SELECT * FROM answer WHERE questionId = '".$response["questionId"]."'");

  while ($row = mysqli_fetch_array($results)) {

    $temp["tempID"] = $response["i"];
    $temp["id"] = $row['texts'];
    $temp["nextId"] = $row['nextQuestionId'];
    $temp["ans"] = $row['idanswer'];
    

    $response[]=$temp;

    $response["i"]++;
  }


  echo json_encode($response);




}
