  <section class="content"><div class="row">
<section class="col-lg-3 connectedSortable"><div class="box">
   
        
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php base_url()?>/assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php echo $profile[0]['fullname'] ?>s</h3>
                    <p class="text-muted text-center"><?php echo $profile[0]['fullname'] ?></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                <b>Fullname</b> <a class="pull-right"><?php echo $profile[0]['fullname'] ?></a></li>
                <li class="list-group-item"><b>Username</b> <a class="pull-right"><?php echo $profile[0]['username'] ?></a></li>
                <li class="list-group-item"><b>Email</b> <a class="pull-right"><?php echo $profile[0]['email'] ?></a></li>
                <li class="list-group-item"><b>Status</b> <a class="pull-right"><?php echo $profile[0]['status'] ; ?></a></li>
                <li class="list-group-item"><b>No Telepon</b> <a class="pull-right"><?php echo $profile[0]['no_tlp'] ?></a></li>
                <li class="list-group-item"><b>SIP</b> <a class="pull-right"><?php echo $profile[0]['SIP']  ?></a>
                <li class="list-group-item"><b>Tanggal Lahir</b> <a class="pull-right"><?php echo tanggalindo($profile[0]['tgl_lahir'])  ?></a>
                        </li>
                    </ul>
               <?php if($this->uri->segment(2) == $this->session->userdata('id_admin')) { ?>
                    <a href="<?php echo base_url(); ?>/change-password" class="btn btn-primary btn-block"><b>Change Password</b></a>
               <?php } else { ?>
                
                <?php } ?>
                </div>
            </div>
        
    
</div></section>
<section class="col-lg-8 connectedSortable">
<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-list-ul"></i>
        <h3 class="box-title">Log</h3>
        <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
        </div>
    </div>
    <div class="box-body chat" id="chat-box">
        <?php $total = count($log);
        $no =1;
        for ($i = 0; $i < $total; $i++) {
           ?><div class="item">
                <span class="label label-interview1"><?php echo $no ?></span>
               <span class="label label-info"><?php echo indonesian_dates($log[$i]['time']) ?></span>
               <span class="label label-warning"><?php echo $log[$i]['fullname'] ?></span>
               <span class="label label-success"><?php echo $log[$i]['log'] ?></span>
               <span class="label label-primary"><?php echo textlimit($log[$i]['browser'], 20) ?></span>
               <span class="label label-psikotes"><?php echo $log[$i]['city'] ?></span>
                <span class="label label-caller"><?php echo $log[$i]['isp'] ?></span>
                    </div>
        <?php 
        $no++;
        } ?>
    </div>
</div></section></div></section>