<form action="<?php echo base_url(); ?>mod-soal-psikotes/<?php echo $this->uri->segment(2) ?>?psikotes=ist" method="POST" enctype="multipart/form-data">
    <section class=" connectedSortable">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">IST PSIKOTES</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        <table style="width:100%">
                            <tr>
                                <th>NO</th>
                                <th>Deret A</th>
                                <th>Deret B</th> 
                                <th>Deret C</th>
                                <th>Deret D</th> 
                                <th>Deret E</th>
                                <th>Deret F</th> 
                                <th>Deret G</th>
                                <th>JAWABAN</th> 
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="1" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[0]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="2" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[1]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="3" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[2]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="4" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[3]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="5" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[4]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="6" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[5]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                             <tr>
                                <td width="120px"><input type="text"   value="7" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[6]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="8" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[7]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="9" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[8]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="10" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[9]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="11" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[10]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                             <tr>
                                <td width="120px"><input type="text"   value="12" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[11]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="13" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[12]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="14" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[13]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="15" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[14]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="16" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[15]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                             <tr>
                                <td width="120px"><input type="text"   value="17" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[16]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="18" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[17]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="19" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[18]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="120px"><input type="text"   value="20" name="urutan[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret1'] ?>" onkeypress="return isNumberKey(event)"  name="deret1[]" class="form-control" ></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret2'] ?>"  onkeypress="return isNumberKey(event)" name="deret2[]" class="form-control"> </td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret3'] ?>" onkeypress="return isNumberKey(event)"  name="deret3[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret4'] ?>" onkeypress="return isNumberKey(event)" name="deret4[]"class="form-control"></td> 
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret5'] ?>"  onkeypress="return isNumberKey(event)" name="deret5[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret6'] ?>"  onkeypress="return isNumberKey(event)"  name="deret6[]" class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['deret7'] ?>"  onkeypress="return isNumberKey(event)"  name="deret7[]"class="form-control"></td>
                                <td width="120px"><input type="text"   value="<?php echo $ist[19]['jawaban'] ?>"  onkeypress="return isNumberKey(event)" name="jawaban[]" class="form-control"></td>
                            </tr>
                        </table>
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