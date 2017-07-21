<form action="<?php echo base_url()?>mod-psikotes-online/<?php echo $this->uri->segment(2); ?>" method="POST"> <div class="box-footer"><h1 align="center">Psikotes Online</h1></div>
    <section class="col-lg-6 connectedSortable">       
        <?php $p = count($list); for ($i = 0; $i < $p; $i++) { if ($i % 2 == 1) {?>
                <div class="box-body">
                    <div class="callout callout-success">
                        <b><?php echo $i ?></b>. <?php echo $list[$i]['soal_psikotes'] ?><br>
                        <input type="radio" value="pilihan_A" name="jawab<?php echo $i ?>" required> A. <?php echo $list[$i]['pilihan_A'] ?><br>
                        <input type="radio" value="pilihan_B" name="jawab<?php echo $i ?>"> B. <?php echo $list[$i]['pilihan_B'] ?><br>
                        <input type="radio" value="pilihan_C" name="jawab<?php echo $i ?>"> C. <?php echo $list[$i]['pilihan_C'] ?><br>
                        <input type="radio" value="pilihan_D" name="jawab<?php echo $i ?>"> D. <?php echo $list[$i]['pilihan_D'] ?><br>
                        <input type="hidden" value="<?php echo $list[$i]['jawaban'] ?>" name="jawaban<?php echo $i ?>">
                    </div>
                </div> <?php }} ?>
    </section>
    <section class="col-lg-6 connectedSortable">
<?php $t = count($list);
$no = 2; for ($s = 2; $s < $t; $s++) { if ($s % 2 == 0) { ?>
                <div class="box-body">
                    <div class="callout callout-warning">
                        <b><?php echo $s ?></b>. <?php echo $list[$s]['soal_psikotes'] ?><br>
                        <input type="radio" value="pilihan_A" name="jawab<?php echo $s ?>" required> A. <?php echo $list[$s]['pilihan_A'] ?><br>
                        <input type="radio" value="pilihan_B" name="jawab<?php echo $s ?>"> B. <?php echo $list[$s]['pilihan_B'] ?><br>
                        <input type="radio" value="pilihan_C" name="jawab<?php echo $s ?>"> C. <?php echo $list[$s]['pilihan_C'] ?><br>
                        <input type="radio" value="pilihan_D" name="jawab<?php echo $s ?>"> D. <?php echo $list[$s]['pilihan_D'] ?><br>
                        <input type="hidden" value="<?php echo $list[$s]['jawaban'] ?>" name="jawaban<?php echo $s ?>">
                    </div>
                </div>
    <?php }} ?>
    </section>
    <div class="box-footer">
        <input style="margin-left: 13px" type="submit" id="submit" value="submit" class="btn btn-primary">
    </div>
</form>