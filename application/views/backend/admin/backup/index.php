<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right mb-3">
                                    <a href="<?php echo site_url('backup/create'); ?>" class="btn ft-hero-btn btn-sm">
                                        <i class="fas fa-paste pr-1"></i>Create Backup
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table id="backup_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Backup</th>
                                    <th>Backup Size</th>
                                    <th>Backup Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $files = get_filenames(FCPATH.'/uploads/db_backup/');
                                    if (!empty($files)){
                                        foreach ($files as $file):
                                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                                        if ($ext != "zip") continue;
                                        $_fullpath = FCPATH.'/uploads/db_backup/'.$file;
                                ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $file?></td>
                                    <td><?php echo bytesToSize($_fullpath);?></td>
                                    <td><?php
                                        echo date('d.M.Y', filectime($_fullpath)) . ", " . date('g:i A', filectime($_fullpath));
                                    ?></td>
                                    <td>
                                        <!-- download link -->
                                        <a href="<?=site_url('backup/download?file='.$file) ?>" class="btn btn-default">
                                            <i class="fas fa-download"></i>Download
                                        </a>
                                        <a href="<?=site_url('backup/delete_file/'.$file);?>">
                                            <button class="btn btn-info btn-icon-anim btn-square">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; }; ?>
                            </tbody>
                            <tfoot>
                                <th width="60">#</th>
                                <th>Backup</th>
                                <th>Backup Size</th>
                                <th>Backup Date</th>
                                <th>Action</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>