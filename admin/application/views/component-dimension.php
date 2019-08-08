<?php echo form_open_multipart('template/add_component_dimension');?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Add New Component</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<label class="col-lg-4">Select Component: </label>
						<select class="col-lg-8"  required name="component">
						<?php foreach($component as $key=>$val)
						{?>
						<option value="<?= $val['id'];?>"><?= $val['component_name'];?></option>
						<?php 
							
						}
						?>
						
						</select>
					</div>
					<div class="my-2"></div>
					<div class="row">
						<label class="col-lg-4">Add Dimensions to selected component: </label>
						<select style="min-height:200px;" multiple class="col-lg-8" name="dimension[]">
						<?php foreach($dimension as $key=>$val)
						{?>
						<option value="<?= $val['id'];?>"><?= $val['dimension_name'];?></option>
						<?php 
							
						}
						?>
						
						</select>
					</div>
				</div>
				<div class="my-2"></div>
				<div class="card-header py-3">
					
						<div class="row">
							<div class="col-lg-6"></div>
							<div class="col-lg-6"> 
								<input type="submit" name="save_project" value="Assign Dimensions To component"  class="btn btn-secondary">
									

								
							</div>
						</div>
		 			
				</div>
			</div>
		</div>
	</div>
</div>		</form>