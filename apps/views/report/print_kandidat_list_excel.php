<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=baris_list_report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
   <style>
table {
    border-collapse: collapse;
    width: 90%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
<?php 
    $total=count($list);
    ?>
<h1 align="center">LIST KANDIDAT</h1>
<table align="center" style="border: 1px;">
  <tr>
    <th>no</th>
    <th>Nama</th>
    <th>No Ktp</th> 
    <th>No Telp</th>
    <th>Email</th>
  </tr> <?php 
        $no = 1;
        for($i=0;$i<$total;$i++)
        {
        ?>
  <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $list[$i]['nama_lengkap'] ?></td>
        <td><?php echo "'".$list[$i]['no_ktp'] ?></td> 
        <td><?php echo "'".$list[$i]['no_tlp'] ?></td>
        <td><?php echo $list[$i]['email'] ?></td>
  </tr> <?php 
       $no++;}
    ?>
</table>