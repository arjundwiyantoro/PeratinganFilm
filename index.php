<?php 

require_once 'core/core.php';





 ?>

 <?php foreach ($Movie->show() as $d){ ?>
 <h1><a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></h1>
 <p>Jumlah Ratting: <?php echo number_format($d->jml,1); ?>/5</p>
 <p><a href="rating.php?id_movie=<?php echo $d->id_movie; ?>">Beri rating</a></p>
 <?php } ?>