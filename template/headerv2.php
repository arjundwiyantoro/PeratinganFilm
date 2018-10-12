<?php 

require_once '../core/core2.php';


 ?>

 <!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FilmQu</title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="Mario Loncarek">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="../plugin/megamenu/css/style2.css">
    <link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugin/megamenu/css/ionicons.min.css">

    <!-- JS -->
    <script>
        window.Modernizr || document.write('<script src="../plugin/megamenu/js/vendor/modernizr-2.8.3.min.js"><\/script>')
    </script>
</head>

<body>

    <div class="menu-container">
        <div class="menu">
        <form action="cari.php" method="get">
        <a href="../index2.php" style="text-decoration: none;"><b style="font-size: 25px;padding-top: 5px;margin-left: 40px;">FilemQuh</b></a>
        <input type="search" placeholder="Cari..." id="cari" style="margin-left: 40px;">
        <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </form>
            <ul>
                <li><a href="../diputar.php"><b>Movies</b></a>
                    <ul>
                        <li><a href="../akandatang.php">Movies</a>
                            <ul>
                                <li><a href="../akandatang.php">Akan Datang</a></li>
                                <li><a href="../diputar.php">Sedang Diputar</a></li>
                                <li><a href="../terpopuler.php">Terpopuler</a></li>
                                <li><a href="../genre.php">Genre</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Sedang Diputar</a>
                        <?php foreach($Movie->diputarlimit(1) as $d): ?>
                            <ul>
                                <li><a href="../tittle.php?m=<?php echo $d->slug; ?>"><img src="../cover/<?php echo $d->cover; ?>" height="150px" width="200px"></a><br>
                                <a href="../tittle.php?m=<?php echo $d->slug; ?>"><b><?php echo $d->judul; ?></b></a>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                        </li>
                        <li><a href="#">Akan Datang</a>
                        <?php foreach($Movie->akandatanglimit(1) as $d): ?>
                            <ul>
                                <li><a href="../tittle.php?m=<?php echo $d->slug; ?>"><img src="../cover/<?php echo $d->cover; ?>" height="150px" width="200px"></a><br>
                                <a href="../tittle.php?m=<?php echo $d->slug; ?>"><b><?php echo $d->judul; ?></b></a>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                        </li>
                        <li><a href="#">Terpopuler</a>
                        <?php foreach($Movie->topboxofficelimit(1) as $d): ?>
                            <ul>
                                <li><a href="../tittle.php?m=<?php echo $d->slug; ?>"><img src="../cover/<?php echo $d->cover; ?>" height="150px" width="200px"></a><br>
                                <a href="../tittle.php?m=<?php echo $d->slug; ?>"><b><?php echo $d->judul; ?></b></a>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                        </li>
                    </ul>
                </li>
                <li><a href="../allceleb.php"><b>Celebrity</b></a>
                    <ul>
                        <li><a href="">Born Today</a></li>
                    </ul>
                </li>
                <li><a href="../news.php"><b>News</b></a>
                    <ul>
                        <li><a href="../news.php">Berita</a>
                            <ul>
                            <?php foreach($News->limit(5) as $d){ ?>
                                <li><a href="../article.php?judul=<?php echo $d->slug; ?>"><?php echo substr($d->judul, 0,30); ?>..</a></li>
                            <?php } ?>
                            </ul>
                        </li>
                        <?php foreach($News->rand3() as $d){ ?>
                        <li><a href="#">Berita Pekan ini</a>
                            <ul>
                                <li><a href="../article.php?judul=<?php echo $d->slug; ?>"><img src="../cover/<?php echo $d->image; ?>" height="150px" width="200px"></a><br>
                                <label><?php echo substr($d->judul, 0,30); ?></label>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                <li><a href=""><b>Chart</b></a>
                    <ul>
                        <li><a href="#">Chart</a>
                            <ul>
                                <li><a href="#">100 FIlm Terbaik</a></li>
                                <li><a href="#">100 Film Indonesia</a></li>
                                <li><a href="#">Locations</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Chart</a>
                            <ul>
                                <li><a href="100filmterbaik.php"><img src="../cover/film-terbaik-2015-thumbs.png" height="150px" width="200px"></a><br>
                                <a href="100filmterbaik.php"><b>100 Film Terbaik</b></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Gambar</a>
                            <ul>
                                <li><a href="100filmindoterbaik.php"><img src="../cover/20170330_carousel_filmnasionalrappler.jpg" height="150px" width="200px"></a><br>
                                <a href="100filmindoterbaik.php"><b>100 Film Indonesia Terbaik</b></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Gambar</a>
                            <ul>
                                <li><a href="#"><img src="../cover/animation.jpg" height="150px" width="200px"></a><br>
                                <label>Animation</label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if(!isset($_SESSION['nama'])){ ?>
                <li><a href="../login.php"><b>Login</b></a></li>
                <li><a href="../register.php"><b>Register</b></a></li>
                <?php }else{ ?>
                <li><a href=""><b><?php echo ucfirst(Session::get('nama')); ?></b></a>
                    <ul>
                        <li><a href="../watchlist.php">Your List</a></li>
                        <li><a href="../ratinguser.php">Your Rating</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="../plugin/bootstrap/js/bootstrap.js"></script>
    <script src="../plugin/jquery-ui/jquery-ui.js"></script>
    <script>
        window.jQuery || document.write('<script src="../plugin/megamenu/js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>
    <script src="../plugin/megamenu/js/megamenu.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#klik').click(function(){
                click();
            })

            $('#cari').focus(function(){
                $('#cari').animate({
                    height:'50px',
                    width:'800px'
                })
                
            })

            $('#cari').blur(function(){
                $('#cari').animate({
                    height:'50px',
                    width:'400px'
                })
                
            })

            $("#cari").autocomplete({
            minLength: 2,
            source: "../rest/server.php?page=cari",
            focus: function( event, ui ) {
              $("#cari").val( ui.item.value );
              return false;
            }
          });

         $("#cari").data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    
            var $li = $('<li>'),
                $img = $('<img width="50px" height="80px">');


            $img.attr({
              src: '../cover/' + item.icon,
              alt: item.value
            });

            $li.attr('data-value', item.value);
            $li.append('<a href="'+item.url+'">');
            $li.find('a').append($img).append(item.value);    

            return $li.appendTo(ul);
          };
        });
    </script>
</body>

</html>