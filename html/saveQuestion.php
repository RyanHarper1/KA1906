<?php
require_once('dbConnection.php');

session_start();

//check user is logged in
if (!isset($_SESSION["who"])){
  header('Location: login.php'); //redirect user if not logged in


}else{

  //response varibales
  $response["id"] = $_POST["id"]; //store question id
  $response["quill"] = $_POST["quill"]; //store pitch
  $response["name"] = $_POST["name"]; //store script name
  $response["category"] = $_POST["category"]; //store category
  $response["scriptId"] = $_POST["scriptId"]; //store script id
  $response["answerCount"] = $_POST["answerCount"]; //store number of answers
  $response["answerId"] = $_POST["answerId"];
  $response["userId"] = $_SESSION["who"]; //store user id
  $firstQuestionId;
  
  $response["name"] = str_replace(' ', '', $response["name"]);
  $response["category"] = str_replace(' ', '', $response["category"]);

  //Dynamically store answers
  for ($i = 0; $i < $_POST["answerCount"]; $i++){

      $tempAnsId = $i + 1;
      $response["a".$tempAnsId] = $_POST["a".$tempAnsId];

  }


  //if script has not yet been created
  if ($response["scriptId"] == 0 ){

    //create script
    $sql = "INSERT INTO script (userId, scriptName, category) VALUES ('".$response["userId"]."', '".$response["name"]."', '".$response["category"]."' )";

    mysqli_query($dbConnection, $sql);


    //get script ID
    $response["scriptId"] = mysqli_insert_id ($dbConnection);


    //store PITCH
    $sqlQuestion = "INSERT INTO question (texts, scriptId) VALUES ('".$response["quill"]."', '".$response["scriptId"]."')";

    mysqli_query($dbConnection, $sqlQuestion);


    //get first question ID
    $firstQuestionId = mysqli_insert_id ($dbConnection);
    $response["backId"] = $firstQuestionId;
    $response["id"] = $firstQuestionId;



    //Insert first question ID into script table
    $sqlUpdate = "UPDATE script SET firstQuestionId = '$firstQuestionId' WHERE scriptId = '".$response["scriptId"]."'";

    mysqli_query($dbConnection, $sqlUpdate);

	
    //store answers
    for ($i = 0; $i < $_POST["answerCount"]; $i++){

        $tempAnsId = $i + 1;

        $sqlQuestion = "INSERT INTO answer (texts, questionId) VALUES ('".$response["a".$tempAnsId]."', '$firstQuestionId')";

        mysqli_query($dbConnection, $sqlQuestion)
        or die (mysqli_error($dbConnection));
        
        $response["test".$i] = $response["a".$tempAnsId];

	
	
        $temp["tempID"] = $tempAnsId;
        $temp["id"] = mysqli_insert_id ($dbConnection);

        $response[]=$temp;
        
     
    }
    

    //if script has already been created
  } else {

    //store PITCH
    $sqlQuestion = "INSERT INTO question (texts, scriptId) VALUES ('".$response["quill"]."', '".$response["scriptId"]."')";

    mysqli_query($dbConnection, $sqlQuestion);


    //grab question id
    $response["id"] = mysqli_insert_id ($dbConnection);
    $response["backId"] = $response["id"];
    $response["questionId"] = $response["id"];


    //store answers
    for ($i = 0; $i < $_POST["answerCount"]; $i++){

        $tempAnsId = $i + 1;

        $sqlQuestion = "INSERT INTO answer (texts, questionId) VALUES ('".$response["a".$tempAnsId]."', '".$response["id"]."')";

        mysqli_query($dbConnection, $sqlQuestion);

	
	
        $temp["tempID"] = $tempAnsId;
        $temp["id"] = mysqli_insert_id ($dbConnection);

        $response[]=$temp;


    }

    //Store nextQuestionId in answer table
    $sqlUpdate = "UPDATE answer SET nextQuestionId = '".$response["id"]."' WHERE idanswer = '".$response["answerId"]."'";

    mysqli_query($dbConnection, $sqlUpdate);





  }




//var_dump($_POST);

echo json_encode($response);

}