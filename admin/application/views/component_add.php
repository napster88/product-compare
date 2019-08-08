<?php echo form_open_multipart('component/do_upload');?>
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
						<label class="col-lg-4">Component title*: </label>
						<input class="col-lg-8"  required name="component_title" type="text">
					</div>
					<div class="my-2"></div>
					<div class="row">
						<label class="col-lg-4">Component Image: </label>
						<input class="col-lg-8" name="component_image" type="file">
					</div>
				</div>
				<div class="my-2"></div>
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-3"> 
								<input type="submit" name="save_project" value="Add Component"  class="btn btn-secondary">
									

								
							</div>
						</div>
		 			</h6>
				</div>
			</div>
		</div>
	</div>
</div>		</form>