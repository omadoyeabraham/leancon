<?php
// Configuration file
require ("../includes/config.php");

// If the user has entered input
if (!empty($_POST)){
    $project_name = $_POST['project_name'];


    //query database and create project only if it doesnt already exist
    $result = query("SELECT * FROM projects WHERE project_name = ?", $project_name);

    if(count($result) !== 1){
        echo "This project does not exist";
    }
    else{
            foreach ($result as $key => $value) {
                $_SESSION["active_project"] = $value['project_name'];
                $_SESSION["active_project_description"] = $value['project_description'];
                /*echo ($_SESSION["active_project"]);
                echo "<br>";
                echo ($_SESSION["active_project_description"]);
                */
                }


          header('Location: ../templates/activeProject.php');
        }
    }



?>
