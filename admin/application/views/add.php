<div class="container-fluid">
<?php
$img=isset($project_title[0]['project_image'])?$project_title[0]['project_image']:'no_image.png';
		$imgsrc=base_url('/application/web/uploads/').$img;
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><img style="width:100px;" src="<?= $imgsrc ;?>"><?= $project_title[0]['project_name'];?></h1>
		  
		  
		  
		  <div class='row'><label>Title</label><input type="text"/>
		  </div>
<?php 
if(isset($render_template)):
 foreach($render_template as $key=>$val)
{
	echo "<div class='row'><label>";
	echo $val['component'][0]['component_name'];
	echo"</label><br/>";
	echo "<div class='col-lg-12'>";
	foreach($val['dimension'] as $keyy=>$vall)
	{
		echo "<input type='text' placeholder='".$vall['dimension_name']."'/>";
		//print_r($vall['dimension_name']);
	}
	echo "</div></div>";
}  
endif;
?>
        </div>
		<button value="Save_<?= $project_title[0]['project_name'];?>">Save <?= $project_title[0]['project_name'];?></button>
		