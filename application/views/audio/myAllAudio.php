<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Audio Files
            <small>List of audio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">audio </a></li>
            <li class="active">Create audio Album </li>
        </ol>
    </section>


    <section class="content">

        <?php if(!empty($allvideos)){ ?>
            <div class="panel panel-default">
                <div class="panel-body box box-primary">
                    <h3>All Audios List</h3>
                    <hr>

                    <div class="row">

                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">Status</th>
                                <th>File</th>
                                <th>Download</th>
                                <th style="width: 40px">Date</th>
                            </tr>

                            <?php foreach ($allvideos as $row){?>
                            <tr>
                                <td><a class="btn btn-app">
                                        <span class="badge bg-green">100% Ok</span>
                                        <i class="fa fa-play"></i>
                                    </a></td>
                                <td> <audio src="<?php echo base_url() . 'assets/uploads/audio/' . $row->name; ?>" preload="auto" />
                                    </td>
                                <td>

                                   <a href="<?php echo base_url() . 'assets/uploads/audio/' . $row->name; ?>"><button type="button" class="btn btn-block btn-success btn-flat">Download</button></a>

                                </td>
                                <td><span class="badge bg-red"><?php echo  date('F d, Y', strtotime($row->added)); ?></span></td>
                            </tr><?php  }?>

                            </tbody></table>


                    </div>
                </div>
            </div>
            <?php
        } else{?>
            <div class="alert alert-danger"> No Audio Available </div>

        <?php }?>
    </section>
</div>




<!-- THIS css/JS Sound -->
<script src="<?php echo base_url(); ?>script-assets/audiojs/audio.min.js"></script>

<script>
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>