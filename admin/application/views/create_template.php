<?php echo form_open_multipart('project/do_upload');?>
<div class="container-fluid">
	<div class="row">
	<div class="col-lg-3">
		<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Drag Components</h6>
					</div>
					<div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
					<?php foreach($component as $key=>$val)
					{?>
					<div id="div<?= $val['component_id']; ?>" class="row d1" class="drag" draggable="true" ondragstart="drag(event)"  >
					<div class="col-lg-12" style="border: 1px dotted; padding-top:5px;">
							<label class="col-lg-12"><?= $val['component_name']; ?></label>
							<?php $i= count($val['dimension_detail']);
							foreach($val['dimension_detail'] as $keyy=>$vall)
							{?>
								<span style="width:<?= 100/$i;?>%"><?=$vall; ?></span>
							
							<?php } ?>
						</div>
							<div class="my-2"></div>
						</div>
				
					<?php }
					
					?>
						
						
						
					
					</div>
		</div>
	
	</div>
	
	
	
		<div class="col-lg-9">
			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Create New Template</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<label class="col-lg-3">Template title*: </label>
						<input class="col-lg-7" required name="product_title" type="text">
					</div>
					<div class="my-2"></div>
					<div class="row" >
					<label class="col-lg-3">Drag Component Here: </label>
					<div id="div1" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: 1px dotted; padding-top:5px; min-width:50%; min-height:300px;" class="col-lg-7"></div>
							
						</div>
						<div class="my-2"></div>
					<div class="row" >
					<label class="col-lg-3">Assign This Template To: </label>
					<div class="col-lg-7">
					<select style="width:100%;" multiple>
					<?php foreach($project as $key=>$val)
					{?>
					<option><?= $val['project_name']; ?></option>
						
					<?php }
					
					?>
					</select>
					</div>
							
						</div>
					
					
					
					
				</div>
				<div class="my-2"></div>
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-3"> 
								<input type="submit" name="save_project" value="Create Template"  class="btn btn-secondary ">
									<span class="icon text-white-50">
										<i class="fas fa-arrow-right"></i>
									</span>
								</div>
						</div>
		 			</h6>
				</div>
			</div>
		</div>
	</div>
</div>		</form>


<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
</script>
