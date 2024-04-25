<section class="pad">
        <div class="bg-primary">
        <div class="container">
        <h1 class="text-light text-center "> Phim đang chiếu </h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-touch="false" data-interval="false">
        <table class="table" >
        <?php
        $countds = count($home);
        $cols=4;
        $row=ceil($countds/$cols);
        ?>
            <?php for($i=0;$i<$row;$i++):
                if($i==0): ?>
                <tr class="carousel-item active"   >
            <?php else: ?>
                <tr class="carousel-item">
            <?php endif;
            for($j=0;$j < $cols; $j++):
            
                $index = $i * $cols + $j;
                if ($index < $countds) :
            ?>
            <td>
          <div class="container">
                    <a class="image " href="#">
                        <img src="<?php echo $this->viewimg($home[$index]['pimg']);?>" class="d-block boanh" alt="...">
                    </a>
                    <div class="d-flex justify-content-center align-items-center  text-center" style="height: 5rem;">
                        <a href="index.php?controller=home&action=show&id=<?php echo $home[$index]['pid'] ;?>" class="text-light text-uppercase" ><?php echo $home[$index]['pname']; ?> </a>
                    </div>
                    <div class="nav">
                        <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $home[$index]['pid']; ?>">
                            <span>
                                <img src="Views/img/icon-play-vid.svg" alt="">
                            </span>
                            <span class="text-light testclass ">
                                Xem Trailer
                            </span>
                        </a>
                       
                        <a href="#" class="btn btn-info ml-auto">Đặt vé</a>

                        <div class="modal" id="myModal<?php echo $home[$index]['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" >
                              <div class="modal-content">
                          
                                <div class="modal-body text-md-center " style="background-color: #070B15;">
                                    <div class="container" style="background-color: #070B15;">
                                    <button type="button  " class="close text-light  " data-dismiss="modal">&times;</button>
                                    <iframe id="modalVideo<?php echo $home[$index]['pid']; ?>"  src="<?php echo $home[$index]['pvideo']; ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>


                    </div>
                </div>
        </td>

        <?php else: ?>
        <td></td>
        <?php endif;?>
        
        <?php endfor; ?>
            </tr>
        <?php endfor; ?>

        <script>
               <?php for($i=0;$i<$countds;$i++): ?>
                $(document).ready(function() {
                    var modalVideo = document.getElementById("modalVideo<?php echo $home[$i]['pid']; ?>");
                    var originalSrc = modalVideo.src;

                    $('#myModal<?php echo $home[$i]['pid']; ?>').on('hide.bs.modal', function() {
                    modalVideo.src = '';
                    });

                    $('#myModal<?php echo $home[$i]['pid']; ?>').on('shown.bs.modal', function() {
                    modalVideo.src = originalSrc;
                    });
                });
                <?php endfor; ?>
        </script>
        </table>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        <div>
            <ol class="carousel-indicators ">
                <?php for($i=0;$i < $row;$i++):
                    if($i==0):
                    ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class="active"></li>
                <?php else: ?>
                
                <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>"></li>

                <?php endif; endfor; ?>
              </ol>
        </div>
      </div>
</div>

</div>

</section>
    
<section class="pad">
        <div class="bg-primary">
        <div class="container">
        <h1 class="text-light text-center "> Phim sắp chiếu </h1>
        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel" data-touch="false" data-interval="false">
        <table class="table" >
        <?php
        $countds1 = count($phimchuachieu);
        $cols1=4;
        $row1=ceil($countds1/$cols1);
        ?>
            <?php for($i=0;$i<$row1;$i++):
                if($i==0): ?>
                <tr class="carousel-item active"   >
            <?php else: ?>
                <tr class="carousel-item">
            <?php endif;
            for($j=0;$j < $cols1; $j++):
            
                $index = $i * $cols1 + $j;
                if ($index < $countds1) :
            ?>
            <td>
          <div class="container">
                    <a class="image " href="#">
                        <img src="<?php echo $this->viewimg($phimchuachieu[$index]['pimg']);?>" class="d-block boanh" alt="...">
                    </a>
                    <div class="d-flex justify-content-center align-items-center  text-center" style="height: 5rem;">
                        <a href="index.php?controller=home&action=show&id=<?php echo $phimchuachieu[$index]['pid'] ;?>" class="text-light text-uppercase" ><?php echo $phimchuachieu[$index]['pname']; ?> </a>
                    </div>
                    <div class="nav">
                        <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $phimchuachieu[$index]['pid']; ?>">
                            <span>
                                <img src="Views/img/icon-play-vid.svg" alt="">
                            </span>
                            <span class="text-light testclass ">
                                Xem Trailer
                            </span>
                        </a>
                       
                        <a href="#" class="btn btn-info ml-auto">Đặt vé</a>

                        <div class="modal" id="myModal<?php echo $phimchuachieu[$index]['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" >
                              <div class="modal-content">
                          
                                <div class="modal-body text-md-center " style="background-color: #070B15;">
                                    <div class="container" style="background-color: #070B15;">
                                    <button type="button  " class="close text-light  " data-dismiss="modal">&times;</button>
                                    <iframe id="modalVideo<?php echo $phimchuachieu[$index]['pid']; ?>"  src="<?php echo $phimchuachieu[$index]['pvideo']; ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>


                    </div>
                </div>
        </td>

        <?php else: ?>
        <td></td>
        <?php endif;?>
        
        <?php endfor; ?>
            </tr>
        <?php endfor; ?>

        <script>
               <?php for($i=0;$i<$countds1;$i++): ?>
                $(document).ready(function() {
                    var modalVideo = document.getElementById("modalVideo<?php echo $phimchuachieu[$i]['pid']; ?>");
                    var originalSrc = modalVideo.src;

                    $('#myModal<?php echo $phimchuachieu[$i]['pid']; ?>').on('hide.bs.modal', function() {
                    modalVideo.src = '';
                    });

                    $('#myModal<?php echo $phimchuachieu[$i]['pid']; ?>').on('shown.bs.modal', function() {
                    modalVideo.src = originalSrc;
                    });
                });
                <?php endfor; ?>
        </script>
        </table>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions1" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions1" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        <div>
            <ol class="carousel-indicators ">
                <?php for($i=0;$i < $row1;$i++):
                    if($i==0):
                    ?>
                <li data-target="#carouselExampleCaptions1" data-slide-to="<?php echo $i; ?>" class="active"></li>
                <?php else: ?>
                
                <li data-target="#carouselExampleCaptions1" data-slide-to="<?php echo $i; ?>"></li>

                <?php endif; endfor; ?>
              </ol>
        </div>
      </div>
</div>

</div>

</section>