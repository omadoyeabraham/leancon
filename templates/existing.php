
<?php
include "header.php";
?>

<form role="form" action="../controllers/openExistingProject.php" method="post">
  <div class="formContainer">
    <div class="newProjectForm">
        <input type="text" name="project_name" placeholder="Enter the name of the project" class="formText" id="newProjectName">
        <input type="submit" name="submit" value="Open project" class="btn mybtn">
    </div>
 </div>
</form>

<?php
include "footer.php";
?>
