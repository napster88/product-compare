       
	 <div class="container-fluid">
<?php
$img=isset($project_title[0]['project_image'])?$project_title[0]['project_image']:'no_image.png';
		$imgsrc=base_url('/application/web/uploads/').$img;
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><img style="width:100px;" src="<?= $imgsrc;?>"><?= $project_title[0]['project_name'];?></h1>

       
		<a href="<?= base_url('/project/add/').$project_title[0]['id'];?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">ADD NEW <?= strtoupper($project_title[0]['project_name']);?></span>
                  </a>
				  
				 <?php // print_r($render_template); ?>
				 
				 
				 
			<div class="card-body">
              <div class="table-responsive">
			  <?php 
					if(isset($render_template)): ?>
			  
			  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				    <tr>
					<?php
					 foreach($render_template as $key=>$val)
					{
						//echo "<div class='row'><label>";
						echo "<th>";
						echo $val['component'][0]['component_name'];
						echo "</th>";
						/* echo"</label><br/>";
						echo "<div class='col-lg-12'>";
						foreach($val['dimension'] as $keyy=>$vall)
						{
							echo "<input type='text' placeholder='".$vall['dimension_name']."'/>";
							//print_r($vall['dimension_name']);
						}
						echo "</div></div>"; */
					}  
					
					?>
					
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <?php 
					
					 foreach($render_template as $key=>$val)
					{
						
						echo "<th>";
						echo $val['component'][0]['component_name'];
						echo "</th>";
						
					}  
					
					?>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                     </tr>
                   </tbody>
                </table>
				<?php endif; ?>
              </div>
            </div>
          </div>
				 
				 
				 
				 
		 </div>