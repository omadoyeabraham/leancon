<?php
          //Retreive already existing tools
            $query = QUERY('SELECT distinct * FROM tools WHERE project_name=?
                      AND tool_category="5S"'
                    , $_SESSION['active_project']);

                    $rowCount = count($query);
                    if ($rowCount > 0){
                        //loop through existing tools and echo them out.
                        for ($i=0; $i < $rowCount; $i++){
                            ?>

                            <div class="tool-item">
                            <input type="checkbox" name="tools-5s-tool-check"/>
                              <input type="text" name="tools-5s-tool-name[]" class="tools-5s-tool-name" value=" <?= $query[$i]['tool_name'] ?> "/>
                              <select class="tools-5s-tool-status" name="tools-5s-tool-status[]" value="<?= $query[$i]['tool_status'] ?>">
                                  <option  value="">Select the tool's status</option>
                                  <option value="Needed" <?php if($query[$i]['tool_status'] === "Needed"){echo "selected";} ?> >Needed</option>
                                  <option value="Not needed" <?php if($query[$i]['tool_status'] === "Not needed"){echo "selected";}?> >Not needed</option>
                                  <option value="Repair" <?php if($query[$i]['tool_status'] === "Repair"){echo "selected";}?> >Repair</option>
                              </select>
                            </div>



                      <?php

                    }// end for

              }
    ?>
