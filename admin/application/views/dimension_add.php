<?php echo form_open_multipart('dimension/do_upload');?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Add Dimension</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<label class="col-lg-4">Dimension title*: </label>
						<input class="col-lg-8" required name="dimension_title" type="text">
					</div>
					<div class="my-2"></div>
					<div class="row">
						<label class="col-lg-4">Input type: </label>
						<select  class="col-lg-8" name="dimension_image">
						<option>button</option>
						<option>Checkbox</option>
						<option>color</option>
						<option>date</option>
						<option>datetime-local</option>
						<option>Dropdown</option>
						<option>email</option>
						<option>file</option>
						<option>hidden</option>
						<option>image</option>
						<option>month</option>
						<option>number</option>
						<option>password</option>
						<option>radio</option>
						<option>range</option>
						<option>reset</option>
						<option>search</option>
						<option>submit</option>
						<option>tel</option>
						<option>text</option>
						<option>Textarea</option>
						<option>time</option>
						<option>url</option>
						<option>week</option>
						</select>
						
					</div>
					<div class="my-2"></div>
					<div class="row">
						<label class="col-lg-4">Default values: </label>
						<textarea  class="col-lg-8" name="dimension_image"></textarea>
					</div>
				</div>
				<div class="my-2"></div>
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-3"> 
								<input type="submit" name="save_project" value="Add Dimension"  class="btn btn-secondary">
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