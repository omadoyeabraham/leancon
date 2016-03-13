
<?php
include "header.php";
?>

<form role="form" action="../controllers/createNewProject.php" method="post">
  <div class="formContainer">
    <div class="newProjectForm">
        <input type="text" name="project_name" placeholder="Enter the name of the new project" class="formText" id="newProjectName">
        <textarea name="project_description" placeholder="Enter a short description of the project" class="new-project-description"></textarea>

        <input type="submit" name="submit" value="Create new project" class="btn mybtn">
    </div>
 </div>
</form>
<?php
include "footer.php";
?>
