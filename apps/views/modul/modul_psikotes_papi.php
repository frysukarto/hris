<form action="<?php echo base_url(); ?>mod-soal-psikotes/<?php echo $this->uri->segment(2) ?>?psikotes=papi" method="POST" enctype="multipart/form-data">
<style>
    #left {
      width: 550px;
      float: left;
    }
    #right {
      margin-left: 550px;
    }
    .clear {
      clear: both;
    }
</style>
    <section class="connectedSortable">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">INPUT PAPI KOSTICK</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <style>th, td {width: 100px;}
                       table, th, td {border: 1px solid black; 
                               border-collapse: collapse;}
                </style>
                <div align="center" > 
                <div class="box-body">
        
                    
                 
                    <div class="col-md-6" id="kids">
                        <div class="col-xs-3"><input required name="no_urut[]" placeholder="No urut" class="form-control"></div><br><br>
                        <input style="margin-top: 10px" name="opsi1[]" placeholder="Pernyataan 1" class="form-control">
                        <input style="margin-top: 10px" name="opsi2[]" placeholder="Pernyataan 2" class="form-control"><br>
                        <input type="button" onClick="addKid()" value="+" /><br><br>
                    </div>
                <div id="right">
                      
                </div>
                    <script>
                    var i = 1;
                    function addKid() {
                    if (i <= 100) {
                    i++;
                    var div = document.createElement('div');
                    div.innerHTML = 
                            '<div class="col-xs-3"><input required name="no_urut[]" placeholder="No urut" class="form-control"></div><br><br>\n\
                             <input name="opsi1[]" required placeholder="Pernyataan 1" class="form-control">\n\
                             <input name="opsi2[]" required placeholder="Pernyataan 2" style="margin-top: 10px" class="form-control"><br> \n\
                             <input type = "button" value = "-" onclick = "removeKid(this)" >\n\
                             <input type="button" onClick="addKid()" value="+" /><br><br>';
                    document.getElementById('kids').appendChild(div);
                    }
                }
                function removeKid(div) {
                document.getElementById('kids').removeChild(div.parentNode);
                i--;
                }
                </script>
                </div>
            </div>
         </div>
    </section>
    <div class="box-footer">
        <input type="checkbox" name="persetujuan" required > i'm not Bot
        <button style="margin-left: 13px" type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>