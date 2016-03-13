<?php
require("../includes/config.php");
include "header.php";
?>

  <section class="section-group">
    <header>
      <h2>Tools</h2>
    </header>

    <div class="btns">
      <input type="button" value="New tool" onClick="add5stool();" class="btn-add"/>
      <input type="button" value="Delete Selected tools" onClick="del5stool();" class="btn-del"/>
      <input type="submit" value="Save-tools" class="btn-save" form="tools-5s" name="Save-tools" />
    </div>

    <form  id="tools-5s" method="post" action="../controllers/save-5s-tools.php" class="clear-left">
      <div class="tool-group">
        <div class="tool-item">
          <?php require_once("existing-5s-tools.php"); ?>
          <!--  <input type="checkbox" name="tools-5s-tool-check"/>
            <input type="text" name="tools-5s-tool-name[]" class="tools-5s-tool-name" placeholder="Enter the tool name"/>
            <select class="tools-5s-tool-status" name="tools-5s-tool-status[]">
                <option  value="volvo">Select the tool's status</option>
                <option value="Needed">Needed</option>
                <option value="Not needed">Not needed</option>
                <option value="Repair">Repair</option>
            </select> -->
        </div>
      </div>
      <div id="tool-include-file">
        <?php  if(isset($_SESSION['error_message'])) { echo $_SESSION['error_message'];} ?>

      </div>
    </form>


  </section>








<?php
include "footer.php";
?>
<script>



  function add5stool(){
    var newTool = '<div class="tool-item">'+
                        '<input type="checkbox" name="tools-5s-tool-check"/>'+
                        '<input type="text" name="tools-5s-tool-name[]" class="tools-5s-tool-name" placeholder="Enter the tool name"/>'+
                        '<select class="tools-5s-tool-status" name="tools-5s-tool-status[]">'+
                            '<option value="">Select the tools status</option>'+
                            '<option value="Needed">Needed</option>'+
                            '<option value="Not needed">Not needed</option>'+
                            '<option value="Repair">Repair</option>'+
                        '</select>'+
                  '</div>';

  $(".tool-group").append(newTool);

}// end of add5stool.

function del5stool(){
  $(".tool-item").each(function(index,item){
    jQuery(':checkbox', this).each(function(){
      if($(this).is(':checked')){
        $(item).remove();
      }
    });
  });
}//end of del5stool.
</script>
