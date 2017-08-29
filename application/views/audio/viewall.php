<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Audio Album
            <small>All audio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Audio </a></li>
            <li class="active">My audio Album </li>
        </ol>
    </section>

    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">List All My Audio Albums</h3>
                            </div>
                            <div class="box-body no-padding">
                                <?php if(empty($album)){?>
                                    <div class="alert alert-danger">No Album</div>
                                <?php }else{?>
                                    <div id="no-more-tables">

                                        <table class="table table-hover" id="js_personal_table">
                                            <thead>
                                            <tr>

                                                <th class="numeric">#</th>

                                                <th class="numeric"><?php echo 'Album Name';?></th>
                                                <th class="numeric"><?php echo 'Edit';?></th>
                                                <th class="numeric"><?php echo 'Delete';?></th>
                                                <th class="numeric"><?php echo 'Add Audio';?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($album)) {
                                                $i = 1;
                                                foreach ($album as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td data-title="<?php echo 'Album Name'; ?>"
                                                            class="numeric"><?php echo $row->album_name; ?></td>

                                                        <td data-title="<?php echo 'Edit'; ?>" class="numeric"><a href="<?php echo base_url('audio/audio/edit/' . $row->album_id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                                        <td data-title="<?php echo 'Delete'; ?>" class="numeric"><a href="<?php echo base_url('audio/audio/delete/' . $row->album_id); ?>" class="btn btn-block btn-danger"> Delete</a></td>
                                                        <td data-title="<?php echo 'Add Audio'; ?>" class="numeric"><a href="<?php echo base_url('audio/audio/uploadAudio/' . $row->album_id); ?>" class="btn btn-block btn-info"> Add Audio</a></td>
                                                    </tr>
                                                    <?php $i++;
                                                }
                                            }?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
</div>


