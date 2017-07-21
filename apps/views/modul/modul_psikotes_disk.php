<form action="<?php echo base_url(); ?>mod-soal-psikotes/<?php echo $this->uri->segment(2) ?>?psikotes=ist" method="POST" enctype="multipart/form-data">
    <section class=" connectedSortable">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">DISK PSIKOTES</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <div class="box-footer">
        <input type="checkbox" name="persetujuan" required >i'm not Bot
        <button style="margin-left: 13px" type="submit" class="btn btn-primary">UPDATE</button>
    </div>
</form>