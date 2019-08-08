<?php echo form_open_multipart('project/do_upload');?>
<div class="container-fluid">
	<div class="row">
	
		<div class="col-lg-12">
			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Create New Template</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<label class="col-lg-4">Template title*</label>
						<input class="col-lg-8 template_title" style="width:100%;" placeholder="Template title*" required name="template_title" type="text">
					</div>
					<div class="row" >
					
					<?php /* echo "<pre>";
					print_r($project_list_wo_temp); 
					echo "<pre/>"; */?>
						<label class="col-lg-4">Assign This Template To: </label>
						<select class="col-lg-8 project_list" style="width:100%;" multiple>
							<?php 
							


							foreach($project_list_wo_temp as $key=>$val)
							{?>
								<option value="<?= $val['id']; ?>"><?= $val['project_name']; ?></option>
							<?php }?>
						</select>
					</div>
					<div class="my-2"></div>
					<div class="row" >
						<div class="col-lg-3">
							<div style="width:100%; height:500px;"    class="component_list card shadow mb-4">
								<div class="card-header py-3" style="margin-bottom: 7px;">
									<h6 class="m-0 font-weight-bold text-primary">Select Components</h6>
								</div>
								<div class="ul_comp_list" style="height:450px; overflow-y: scroll;">
								<?php 
								foreach($component as $key=>$val){ 
								$img=isset($val['component_image'])?$val['component_image']:'no_image.png';
								$imgsrc=base_url('/application/web/uploads/').$img;
								?>
								<div  class=" parent_comp_layout_<?= $val['component_id'];?>">
									<div class="comp_layout comp_layout_<?= $val['component_id'];?>" component_id="<?= $val['component_id'];?>" col-lg-10" style="width:100%; border: 1px dotted; margin: 0 auto;     margin-bottom: 3px!important;">
										<label class="col-lg-12">
											<input class="comp_radio" type="radio" name="add_component" value="<?= $val['component_id'];?>">
											<img style="width:30px; height:25px;" src="<?= $imgsrc;?>"> 
											<strong><?= $val['component_name']; ?></strong>
										</label>
										<div style="display:none;" class="col-lg-12 dimension_sort  dimension_<?= $val['component_id'];?>">
										<?php  $i= count($val['dimension_detail']);
										foreach($val['dimension_detail'] as $keyy=>$vall){ ?>
											<label style="width:<?= 100/$i-1;?>%">
												<input type="checkbox" value="<?= $keyy;?>" name="dim_select_<?= $val['component_id'];?>" class="dim_check dim_check_<?= $val['component_id'];?>" component_id="<?= $val['component_id'];?>" dimension_id="<?= $keyy;?>" checked />
												<?=$vall; ?>
											</label>
											<?php 
										}  ?>
										</div>
									</div>
									<!--<div class="my-1 comp_space_<?= $val['component_id'];?>"></div> -->
									</div>
									<?php 
								}?>
							</div></div>
						</div>
						<div class="" style=" width:30px;      height: 200px;  margin: auto;" >					
							<div class="row">
								<input type="button" value=">>" attr="add_comp" class="add_rem_btn shadow mb-2"></div>
							
							<div class="row">
								<input type="button" value="<<"  attr="rem_comp" class="add_rem_btn shadow mb-2">
							</div>
						</div>
						
							<div class="col-lg-8" >					
							
							<div style="width:100%; min-height:500px;"  class="template_div card shadow mb-4">
								<div style="margin-bottom: .25rem!important;" class="card-header py-3">
									<h6  class=" m-0 font-weight-bold text-primary">Layout </h6>
								</div>
								<div class="sortable">
								
								</div>
								
							</div>
						</div>
						
					</div>
					<div class="my-2"></div>
					
					
				</div>
				<div class="my-2"></div>
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
						<div class="row">
							<div class="col-lg-9"></div>
							<a href="#" class="btn btn-success save_template btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Create Template</span>
                  </a>
						</div>
		 			</h6>
				</div>
			</div>
		</div>
	</div>
</div>		</form>



<script src="<?=base_url('/application/web/js/');?>drag-sort.js" type="text/javascript"></script>


<script>
jQuery(document).ready(function($){
	$( ".sortable" ).sortable({
		flow: 'vertical'
		
	});
	/* $( ".dimension_sort" ).sortable(
	{flow: 'horizontal'});
	 */
	
	jQuery('.save_template').click(function(){
		
		var selected_projects=[];
		 jQuery('.project_list :selected').each(function(){
			 let prod_id=jQuery(this).val();
			 selected_projects.push(prod_id);
			});
		//let project_array=jQuery('.project_list').children("option:selected").val();
		//project_array[]='aa';
		let len=jQuery('.sortable').find('.comp_layout').length;
		var final_comp_array=[];
		var final_dim_array=[];
		var comp_array=[];
		var sorted_array={};
		jQuery('.sortable').find('.comp_layout').each(function( index ) {
			let comp_id=jQuery(this).attr('component_id');
			let dimcheck="dim_check_"+comp_id;
			var dim_array=[];
			jQuery('.sortable').find('.'+dimcheck).each(function( index ) {
				  let check = jQuery(this).prop("checked");
				if(check){
					let dim_id=jQuery(this).attr('dimension_id');
					dim_array.push(dim_id);
				}
			});
			final_comp_array.push(comp_id);
			final_dim_array[comp_id]=dim_array;
		});
		sorted_array['title']=jQuery('.template_title').val();
		sorted_array['projects']=selected_projects;
		sorted_array['order']=final_comp_array;
		sorted_array['list']=final_dim_array;
		//console.log(JSON.stringify({ sorted_array}));
			//console.log(sorted_array);
		 jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "template/save_template",
			data: {
				fields: sorted_array},
			success: function(res)
			{
				console.log(res);
			}				
		}); 
		
	});
	jQuery('.add_rem_btn').click(function(){
		let btn_prop=jQuery(this).attr('attr');
		
		if(btn_prop=='add_comp')
		{		
			let comp_radio=jQuery('.component_list').find('.comp_radio:checked').val();
			let comp_layout='parent_comp_layout_'+comp_radio;
			let htmlt=jQuery("."+comp_layout).html();
			let dimension='dimension_'+comp_radio;
			jQuery('.sortable').append(htmlt);
			jQuery("."+comp_layout).hide();
			jQuery('.comp_radio'). prop("checked", false);
			jQuery('.sortable').find("."+dimension).show();
		}
		if(btn_prop=='rem_comp')
		{
			
			let comp_radio=jQuery('.sortable').find('.comp_radio:checked').val();
			let comp_layout='comp_layout_'+comp_radio;
			//let comp_space='comp_space_'+comp_radio;
			let dimension='dimension_'+comp_radio;
			jQuery("."+dimension).hide();
			jQuery('.sortable').find("."+comp_layout).remove();
			//jQuery('.sortable').find("."+comp_space).remove();
			let parent_comp_layout='parent_comp_layout_'+comp_radio;
			jQuery("."+parent_comp_layout).show();
			
		
		}
		
	});
});
</script>
