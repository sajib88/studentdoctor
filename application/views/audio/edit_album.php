<?php
//var_dump($albumdata['album_name']);exit();
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Video Album
            <small>Create video Album</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">video </a></li>
            <li class="active">Create video Album </li>
        </ol>
    </section>


    <?php echo $this->session->flashdata('msg');?>



    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="col-md-12 well text-center">
                            <?php echo form_open_multipart('audio/audio/update');?>
                            <div class="form-group">
                                <input type="hidden" name="user_id_post" value="<?php echo $user_id;?>">
                                <input type="hidden" name="album_id" value="<?php echo $album_id;?>">

                                <label for="album" class="sr-only">Create Album</label>
                                <?php $v = !empty($albumdata['album_name'])?$albumdata['album_name']:''?>
                                <input type="text" name="album_name" value="<?php echo $v;?>" id="album" placeholder="Create Album" required class="form-control" />
                            </div>
                            <button type="submit" name="insert" class="btn btn-success">Create Album</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>