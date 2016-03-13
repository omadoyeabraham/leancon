<?php
// Configuration file
require ("../includes/config.php");
include "header.php";
?>

<h1 class="lead-text"><span>Project Title</span> <?= $_SESSION['active_project'] ?> </h1>
<?php
  if($_SESSION['active_project_description'] !== "")
  {
      echo '<h2 class="lead-text"><span>Project description</span> '. $_SESSION["active_project_description"] .'<h2>';
  }
?>

<section>
  <header>
    <h3>Available Tools</h3>
    <button class="mybtn btn-tools"><a href="5s.php">5S</a></buton>
    <button class="mybtn btn-tools"><a href="#">Last Planner</a></buton>
    <button class="mybtn btn-tools"><a href="#">Kaban</a></buton>
  </header>
</section>


<?php
include "footer.php";
?>
