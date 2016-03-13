<?php
require("../includes/config.php");

// Clear error message variable
 unset($_SESSION['error_message']);

//If the user creates a tool and wants to save it
 if (!empty($_POST["tools-5s-tool-name"])){

  //Get number of tools that are created
   $counter = count($_POST['tools-5s-tool-name']);

   //Loop through each tool
   for ($i = 0; $i < $counter; $i++ )
        {
          //Determine if tool already exists.
          $query1 = QUERY ('SELECT * FROM tools where tool_name = ? AND tool_category="5S" '
                      ,$_POST['tools-5s-tool-name'][$i]);
          $rowCount = count($query1);


          //What to do if the tool already exists
          if ($rowCount!== 0){
            //Update tool_status
            $query2 = QUERY('UPDATE tools SET tool_status=?
                             WHERE tool_name = ?',
                             $_POST['tools-5s-tool-status'][$i],$query1[0]['tool_name'])
          ;
        }
          //If tool doesn't exist
          else{
            //insert new tool into table
            $query2 = QUERY ('INSERT INTO tools (tool_name,tool_status,tool_category,project_name)
                              VALUES(?,?,"5S",?) ',
                             $_POST['tools-5s-tool-name'][$i], $_POST['tools-5s-tool-status'][$i],$_SESSION['active_project'] );

                            header('Location: ../templates/5s.php');

          }
        }

 }

 else{
   $_SESSION['error_message'] = "Please create a tool to be saved";
   header('Location: ../templates/5s.php');
 }


?>
