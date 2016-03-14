<?php
require("../includes/connect-db.php");
require('../includes/config.php');

// Clear error message variable
if(isset($_SESSION['error_message'])){
    unset($_SESSION['error_message']);
  }

/*
1) Get data of all tools currently in the 5s-form

*/

 //If user arrives here via POST
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

   //If user creates a tool and wants to save it
   if (!empty($_POST["tools-5s-tool-name"])){

     //Get number of tools that are created
     $counter = count($_POST['tools-5s-tool-name']);
         //Debugging statements
         echo "No of tools ".$counter."<br><hr>";
         //print_r ($_POST['tools-5s-tool-name']);
         echo "<br><hr>";

    //Loop through each created tool
    for($i=0; $i < $counter; $i++){

        // Variables for the query bind
        $tempToolName =  strip_tags( trim( $_POST["tools-5s-tool-name"][$i] ) );
        $tempToolCategory = "5s";
        $tempProjectName = strip_tags(trim($_SESSION["active_project"] ) );

        $sql = "SELECT * FROM TOOLS WHERE tool_name = :tool_name
                  AND tool_category = :tool_category
                   AND project_name = :project_name ";

          $stmt = $db->prepare($sql);
          $stmt->bindParam(':tool_name', $tempToolName);
          $stmt->bindParam(':tool_category', $tempToolCategory);
          $stmt->bindParam(':project_name', $tempProjectName);

          $stmt->execute();

          //Count the number of rows returned if any
          $row = $stmt->fetchColumn();
          //Kill the current database connection
          $stmt = null;

          //stuff todo if the tool already exists in the query
          //UPDATE the new parameters into the database
          if($row > 0){
                // Variables for the query bind
                $tempToolStatus = strip_tags(trim($_POST["tools-5s-tool-status"][$i] ));

                $sql2 = "UPDATE tools SET tool_status = :tool_status
                          WHERE tool_name = :tool_name";

                $stmt2 = $db->prepare($sql2);
                $stmt2->bindParam(':tool_name', $tempToolName);
                $stmt2->bindParam(':tool_status', $tempToolStatus);

                $stmt2->execute();

          }// End of stuff todo if tool exists

          //STUFF todo if tool doesnt exist.. Insert it into the DB
          else{
                // Variables for the query bind
                $tempToolName =  strip_tags(trim( $_POST["tools-5s-tool-name"][$i] ) );
                $tempToolCategory = "5S";
                $tempProjectName = strip_tags(trim($_SESSION["active_project"] ) );
                $tempToolStatus = strip_tags(trim($_POST["tools-5s-tool-status"][$i] ));

                $sql3 = "INSERT INTO tools (tool_name,tool_status,tool_category,project_name)
                          VALUES (:tool_name, :tool_status, :tool_category, :project_name) ";

                $stmt3 = $db->prepare($sql3);
                $stmt3->bindParam(':tool_name', $tempToolName);
                $stmt3->bindParam(':tool_status', $tempToolStatus);
                $stmt3->bindParam(':tool_category', $tempToolCategory);
                $stmt3->bindParam(':project_name', $tempProjectName);

                $stmt3->execute();

          }//End for when the tool is just inserted ELSE clause



   }//END of loop through the created tools

   header("Location: ../templates/5s.php");



   }// END of $_POST["tools-5s-tool-name"]

 }// END of main post.

//If user tries to hack in via get.
 else{
   echo "<h2>Stop trying to hack me</h2>". "<br>".
        "<h3>You have been warned</h3>". "<br>";
 }



?>
