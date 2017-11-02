<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/17/2016
 * Time: 5:05 PM
 */
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-search"></i>
            Search Events

        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="panel-body">
                            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('event/search'); ?>">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Title</label>

                                        <input name="title" type="text" placeholder="Category Title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Event Category</label>
                                            <select  name="category" class="form-control">
                                                <option value="">Select</option>
                                                <?php
                                                if (is_array($main_cat)) {
                                                    foreach ($main_cat as $val) {
                                                        $sel = ($val->id == set_value('category'))?'selected="selected"':'';
                                                        ?>
                                                        <option  value="<?php echo $val->id; ?>" <?php echo $sel;?> ><?php echo $val->cat_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label>Event Location</label>
                                                <input name="location" type="text" placeholder="Event location" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Event Summary</label>
                                    <input name="summary" type="text" placeholder="Category Summary" class="form-control">
                                </div>
                            </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label>Event Description</label>
                                                <input name="description" type="text" placeholder="Category Description" class="form-control">
                                            </div>
                                        </div>
                                    </div>





                                </div>


                         </div>
                    </div>


            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-small pull-left'));?>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <button class="btn  btn-success  btn-small pull-right"  name="submit" type="submit">
                                            <i class="fa fa-check"></i> &nbsp; &nbsp; Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
                        <hr/>

                            <?php if(isset($result)) {
                                if (count($result) <= 0) {
                                    ?>

                                <?php } else {
                                    if (!empty($result)) { ?>
                                <div class="col-lg-12">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <i class="fa fa-search"></i>
                                            <h3 class="box-title">Search Result</h3></i>
                                        </div>
                                        <div class="panel-body">
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>

                                                        <th class="numeric">#</th>

                                                        <th class="numeric"><?php echo 'Event Title'; ?></th>

                                                        <th class="numeric"><?php echo 'Summary'; ?></th>

                                                        <th class="numeric"><?php echo 'Category'; ?></th>

                                                        <th class="numeric"><?php echo 'location'; ?></th>


                                                        <th class="numeric"><?php echo 'View'; ?></th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (!empty($result)) {
                                                        $i = 1;
                                                        foreach ($result as $row) { ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td data-title="<?php echo 'Event Title'; ?>"
                                                                    class="numeric"><?php echo $row->title; ?></td>
                                                                <td data-title="<?php echo 'summary'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php echo $row->summary; ?></span>
                                                                </td>
                                                                <td data-title="<?php echo 'Category'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php
                                                                        $data = get_data('event_main_cat', array('id' => $row->category));
                                                                        echo $data['cat_name'];
                                                                        ?></span>
                                                                </td>
                                                                <td data-title="<?php echo 'location'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php echo (!empty($row->location))?$row->location:'<span class="badge bg-red">Not Given</span>'; ?></span>
                                                                </td>

                                                                <td data-title="<?php echo 'View'; ?>" class="numeric">
                                                                    <a href="<?php echo base_url('event/layoutfull/' . $row->id); ?>" class="btn btn-block btn-dropbox"> View</a></td>

                                                            </tr>
                                                            <?php $i++;
                                                        }
                                                    } ?>
                                                    </tbody>
                                                </table>
                                                <?php }else{?>
                                                        <div class="col-lg-12">
                                                            <div class="box-body table-responsive no-padding">
                                                                <div class="alert alert-danger text-center">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    No search result found <i class="fa fa-info"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                            }?>


         </div>


         </div>
    </section>
</div>

<script>


    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "public_web/publicweb/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>
