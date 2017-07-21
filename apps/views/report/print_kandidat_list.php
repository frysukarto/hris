<?php ob_start(); ?>
<html>
    <head>
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
    </head>
    <body>
        <?php $total = count($list); ?>
        <h1 align="center" >LIST KANDIDAT</h1><br>
        <table align="center" style="border: 1px;">
            <tr>
                <th>no</th>
                <th>Nama</th>
                <th>No Ktp</th> 
                <th>No Telp</th>
            </tr> <?php $no = 1; for ($i = 0; $i < $total; $i++) { ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $list[$i]['nama_lengkap'] ?></td>
                <td><?php echo $list[$i]['no_ktp'] ?></td> 
                <td><?php echo $list[$i]['no_tlp'] ?></td>
            </tr> <?php $no++; } ?>
        </table>
    </body>
</html>
<?php ob_end_flush(); ?>