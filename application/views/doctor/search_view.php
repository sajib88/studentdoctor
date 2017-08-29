<script type="text/javascript">



        function getComboA(sel) {
            var html = '';
            var value = sel.value;
            var base_url = '<?php echo base_url() ?>';
            var da = {state: value};
            /*$.ajax({
             type: 'POST',
             url: base_url + "doctor/docController/getStateByAjax",
             data: da,
             success: function(resultData) {
             //$("#result").html(resultData);
             //console.log(resultData);
             var data = JSON.parse(resultData);
             $('#result').empty();
             for(var i=0;i<data.length();i++){
             html+='<option value="">'+data[i]['name']+'</option>';
             }
             $('#result').append(html);


             }
             });*/


           /* $.getJSON( "<?php //echo base_url().'doctor/docController/getStateByAjax'?>", { state:  value} )
                .done(function( json ) {
                    $('#result').empty();
                    html+='<option value="">Select State</option>';
                    for(var i=0; i<json.length ; i++)
                    {
                        html+='<option value="'+json[i]['id']+'">'+json[i]['name']+'</option>';
                    }
                    $('#result').append(html);

                    $('#result').selectpicker('refresh');
                })
                .fail(function( jqxhr, textStatus, error ) {
                    var err = textStatus + ", " + error;
                    console.log( "Request Failed: " + err );
                });*/



        }
    </script>

<!--breadcrumbs start-->

<div id="page-title" class="page-title page-title-3 bg-black dark">
	<div class="bg-image"><img src="<?php echo base_url(); ?>front/img/photos/classic_title01.jpg" alt=""></div>
	<div class="container">
		<h1>Meet our Professionals</h1>
	</div>
	
</div>



<!-- Section-->
	<section class="section-sm border-bottom">
		<div class="container">
			<div class="row first-col-title">
				
				<div class="col-lg-10 col-lg-push-1">
					
					<div class="row">
                        
                        <?php
            
            if(!empty($searchData)) {

                foreach ($searchData as $row) {
                    ?>
						<div class="col-md-3 col-sm-6 feature  ">
							
							<div class="text-center mb-50">
                                 <div class="thumbnail">
								<img class="mb-20" src="<?php echo (!empty($row->photo))? base_url().'assets/file/'.$row->photo:'';?><?php echo (empty($row->photo))? base_url().'assets/user-demo.png':'';?>" alt="">
                                </div>
								<h5 class="mb-0 text-md"><?php echo (!empty($row->first_name) or (!empty($row->last_name)))?$row->first_name.'-'.$row->last_name: '' ?></h5>
								<span class="text-info"><?php echo getProfessionById($row->profession) ?></span>
                                
                               <a href="<?php echo base_url('doctor/docController/details_profile/' . $row->id); ?>" 
                                  class="btn btn-block btn-filled btn-primary btn-flat">
                                   
                            View Profile
                        </a>

							</div>
             
                            
						</div>
                                     <?php }
            }else{?>
                <div class="alert alert-danger">No Search Result Found </div>
            <?php }?>  
					</div>
				</div>
			</div>
		</div>
	</section>




<style>
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        background: #fff none repeat scroll 0 0;
        border: 1px solid #f0f0f0;
        border-radius: 0;
        margin-bottom: 20px;
        padding: 20px 0 0;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .thumbnail img
    {
        height: 150px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    .item.list-group-item .caption
    {
        padding: 9px 9px 0px 9px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;
    }
    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
    }

</style>











