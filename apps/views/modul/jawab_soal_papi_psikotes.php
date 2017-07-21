<form  action="#" method="POST"> 
    <div class="box-footer"><h1 align="center">IST Psikotes Online</h1>
        <h1 align="center">            
            <style>
           p {
            text-align: center;
            font-size: 60px;
          }
    </style>

<meta http-equiv="refresh" content="601;url=http://www.valdoinc.com/" />
<div>Psikotes close in <span id="time">10:00</span> minutes!</div>

<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;
        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 10,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);};
</script>

</h1>
  </div>
    <section class=" connectedSortable">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        <ol>
                            <?php
                            $total = count($papi);
                            for($i=0;$i<$total;$i++) { ?>
                            <div class="col-xs-6">
                                <li>
                                    <input name="jawab<?php echo $papi[$i]['no_urut'];?>" value="opsi1" type="radio"> <?php echo $papi[$i]['opsi1']; ?><br>
                                    <input name="jawab<?php echo $papi[$i]['no_urut'];?>" value="opsi2" type="radio"> <?php echo $papi[$i]['opsi2']; ?>
                                </li><br>
                                </div>
                            <?php }?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="box-footer">
<input style="margin-left: 13px" type="submit" id="submit" value="SELESAI" class="btn btn-primary">
</div>
</form>