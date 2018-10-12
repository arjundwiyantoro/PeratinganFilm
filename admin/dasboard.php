<?php 
require_once '../core/core2.php';
$jumlahrating = $Ratting->jumlah1();
$diatas7 = $Ratting->diatas7();
$hasil7  = $diatas7 * 100 / $jumlahrating;
$diatas4 = $Ratting->diatas4();
$hasil4  = $diatas4 * 100 / $jumlahrating;
$diatas0 = $Ratting->diatas0();
$hasil0  = $diatas0 * 100 / $jumlahrating;
 ?>
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-film w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $Movie->jumlah2(); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Movies</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-newspaper-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $News->jumlah(); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total News</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $Ratting->jumlah1(); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Rating</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $User->jumlah(); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Users</h4>
      </div>
    </div>
  </div>

  
  <hr>
  <div class="w3-container">
    <h5>Rata Rata Skor</h5>
    <p>7-10 &nbsp;&nbsp;&nbsp;<b><?php echo $diatas7 ?> Rating</b></p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:<?php echo round($hasil7); ?>%"><?php echo round($hasil7); ?>%</div>
    </div>

    <p>4-7 &nbsp;&nbsp;&nbsp;<b><?php echo $diatas4 ?> Rating</b></p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:<?php echo round($hasil4); ?>%"><?php echo round($hasil4); ?>%</div>
    </div>

    <p>0-4 &nbsp;&nbsp;&nbsp;<b><?php echo $diatas0 ?> Rating</b></p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:<?php echo round($hasil0); ?>%"><?php echo round($hasil0); ?>%</div>
    </div>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Film Terbaik Bulan ini</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <?php foreach($Movie->terbaik2() as $d){ ?>
      <tr>
        <td><?php echo $d->judul; ?></td>
        <td><?php echo number_format($d->jml,1); ?></td>
      </tr>
    <?php } ?>
    </table><br>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="../profil/profil.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Admin</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Ratting Terbaru</h5>
    <?php foreach($Ratting->terbaru() as $d){ ?>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4><?php echo $d->username; ?><span class="w3-opacity w3-medium"> <?php echo $d->tanggal; ?></span></h4>
        <p><?php echo $d->review; ?></p><br>
      </div>
    </div>
    <?php } ?>
  </div>
  <br>