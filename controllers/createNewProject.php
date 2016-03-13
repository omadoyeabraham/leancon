<?php
// Configuration file
require ("../includes/config.php");

// If the user has entered input
if (!empty($_POST)){
    $project_name = $_POST['project_name'];
    // If the user entered a description
    if(!empty($_POST['project_description'])){
       $project_description = $_POST['project_description']; 
    }
    else{
        $project_description = "";
    }

    //query database and create project only if it doesnt already exist
    $result = query("SELECT * FROM projects WHERE project_name = ?", $project_name);
    
    if(count($result) == 1){
        echo "This project already exists";
    }
    else{
        query("INSERT INTO projects (project_name, project_description)
             VALUES('$project_name','$project_description')
        ");
        
        //Set session variables
             $_SESSION["active_project"] = $project_name;
             $_SESSION["active_project_description"] = $project_description;
            
            header('Location: ../templates/activeProject.php');
    }
    
}

?>