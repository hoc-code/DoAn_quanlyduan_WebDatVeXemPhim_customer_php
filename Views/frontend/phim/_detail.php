
<section>
        <div class="bg-primary">
    <div class="container">
            <div class="bg-primary">
                <div class="row" id="thongtinphim">
                    <div class="float-left col-md-5">
                        <div>
                            <img src="<?php echo $this->viewimg($thongtin['pimg']); ?>" class="d-block img-fluid" width="490" height="730" alt="">
                        </div>
                    </div>
                    <div class="float-right col-md-7">
                        <table>
                            <tr><td>
                                <h1 class="text-white text-capitalize" id="tenphim" ><?php echo $thongtin['pname']; ?></h1>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize"> <i class="bi bi-tags-fill"></i> <?php echo $thongtin['ptype'] ;?></p>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize"><i class="bi bi-stopwatch-fill"></i> <?php echo $thongtin['ptime']; ?>'</p>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize"><i class="bi bi-globe-asia-australia"></i> khác</p>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize"> <i class="bi bi-person-fill-check"></i>
                                    T<?php echo $thongtin['ptuoi'] ?>: Phim dành cho khán giả từ đủ <?php echo $thongtin['ptuoi'] ;?> tuổi trở lên.</p>
                            </td></tr>
                            <tr><td>
                                <h2 class="text-white text-capitalize">mô tả </h2>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize">Đạo diễn: <?php echo $thongtin['pdaodien']; ?></p>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize">Diễn viên: <?php echo $thongtin['pdienvien']; ?></p>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize">Khởi chiếu: <?php echo date("d-m-Y", strtotime($thongtin['pngay_bat_dau']))  ;?></p>
                            </td></tr>
                            <tr><td>
                                <h2 class="text-white text-capitalize">nội dung</h2>
                            </td></tr>
                            <tr><td>
                                <p type="text" class="text-white text-capitalize"><?php echo $thongtin['pnoidung']; ?></p>
                            </td></tr>
                            <tr><td>
                                    <a href="#" data-toggle='modal' data-target='#myModal'>
                                        <span>
                                        <img src="Views/img/icon-play-vid.svg" alt="">
                                        </span>
                                        <span class="text-light testclass ">
                                            Xem Trailer
                                        </span>
                                    </a>
                                    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" >
                                          <div class="modal-content">
                                      
                                            
                                            <div class="modal-body text-md-center " style="background-color: #070B15;">
                                                <div class="container" style="background-color: #070B15;">
                                                <button type="button  " class="close text-light  " data-dismiss="modal">&times;</button>
                                                <iframe id="modalVideo"  src="<?php echo $thongtin['pvideo']; ?>"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            </td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section >
  <div class="bg-primary">
    <div class="container">
    <div class="text-center text-white " >
          <h1>Lich chiếu</h1>
  </div>
    <div class="text-center">
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-outline-warning active ongay " >
          <input type="radio"  name="option1" checked>
           <h3><?php echo date("m-d");?></h3>
           <h5>
            <?php
            $ngayHienTai = date("N");
            $tenThu = "";
            switch ($ngayHienTai) {
                case 1:
                    $tenThu = "Thứ hai";
                    break;
                case 2:
                    $tenThu = "Thứ ba";
                    break;
                case 3:
                    $tenThu = "Thứ tư";
                    break;
                case 4:
                    $tenThu = "Thứ năm";
                    break;
                case 5:
                    $tenThu = "Thứ sáu";
                    break;
                case 6:
                    $tenThu = "Thứ bảy";
                    break;
                case 7:
                    $tenThu = "Chủ nhật";
                    break;
                default:
                    $tenThu = "Không xác định";
                    break;
            }
            echo $tenThu;
            
            ?>
           </h5>
           
        </label>
        <!-- <label class="btn btn-outline-warning ongay">
          <input type="radio"  name="option1">
          <h3>16/4</h3>
          <h3>thứ ba</h3>
        </label>
        <label class="btn btn-outline-warning ongay">
          <input type="radio"  name="option1">
          <h3>16/4</h3>
          <h3>thứ ba</h3>
        </label> -->
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="text-left text-white col-6" >
      <h1>Danh sách rạp</h1>
</div>
<div class="text-right col-6">
  <div >
    <select id="citySelect" class="btn btn-warning">
      <option value="hanoi">Hà nội</option>
      <option value="hochiminh">Hồ Chí Minh</option>
    </select>
  </div>

</div>
</div>
<div class="d-none" id="hochiminh">
<div  class="diachi">
<div class="text-white" id="hochiminh1">
<h3 style="margin: 20px; padding-top: 20px;" id="tenrap1">Nhom9 Nguyễn Trãi</h3>
<p style="margin: 20px;">271 Nguyễn Trãi, Phường Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh</p>
<div style="margin: 20px;"  class="btn-group btn-group-toggle chinhlabel" data-toggle="buttons" >
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    uasort($lichchieu, 'compareTime');
    $current_time = date("H:i");
    foreach ($lichchieu as $lichchieu1):
        $giochieu = date("H:i", strtotime($lichchieu1['giochieu']));

        
        if($giochieu < $current_time):
     ?>
    <button class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>" disabled style=" margin-right: 10px;">
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </button>
    <?php else: ?>
        <label class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>"  >
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </label>

    <?php
        endif;
         endforeach; ?>
</div>

</div>

</div>
<div  class="diachi">
    <div class="text-white" id="hochiminh2">
    <h3 style="margin: 20px; padding-top: 20px;" id="tenrap2">Nhom9 Hai Bà Trưng</h3>
    <p style="margin: 20px;">135 Hai Bà Trưng, Phường Bến Nghé ,Quận 1,Thành Phố Hồ Chí Minh</p>
    <div style="margin: 20px;"  class="btn-group btn-group-toggle chinhlabel" data-toggle="buttons" >
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date("H:i");
    uasort($lichchieu, 'compareTime');
    foreach ($lichchieu as $lichchieu1):
        $giochieu = date("H:i", strtotime($lichchieu1['giochieu']));

        
        if($giochieu < $current_time):
     ?>
    <button class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>" disabled>
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </button>
    <?php else: ?>
        <label class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>"  >
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </label>

    <?php
        endif;
         endforeach; ?>
    </div>
    
    </div>
    
</div>
</div>
<div class="" id="hanoi">
    <div  class="diachi ">
    <div class="text-white"  id="hanoi1">
    <h3 style="margin: 20px; padding-top: 20px;" id="tenrap3">Nhom9 Giải Phóng</h3>
    <p style="margin: 20px;">55 Giải Phóng, Phường Đồng tâm, Quận Hai Bà Trưng, Thành Phố Hà Nội</p>
    <div style="margin: 20px;"  class="btn-group btn-group-toggle chinhlabel text-white"  >
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date("H:i");
    uasort($lichchieu, 'compareTime');
    foreach ($lichchieu as $lichchieu1):
        $giochieu = date("H:i", strtotime($lichchieu1['giochieu']));

        
        if($giochieu < $current_time):
     ?>
    <button class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>" disabled>
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </button>
    <?php else: ?>
        <label class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>"  >
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </label>

    <?php
        endif;
         endforeach; ?>
    </div>
    
    </div>
    
    </div>
    <div  class="diachi ">
        <div class="text-white" id="hanoi2">
        <h3 style="margin: 20px; padding-top: 20px;" id="tenrap4">Nhom9 Cầu Giấy</h3>
        <p style="margin: 20px;">302 Cầu Giấy Hà Nội</p>
        <div style="margin: 20px;"  class="btn-group btn-group-toggle chinhlabel " data-toggle="buttons" >
        <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date("H:i");
    function compareTime($a, $b) {
        $timeA = strtotime($a['giochieu']);
        $timeB = strtotime($b['giochieu']);
        return $timeA - $timeB;
    }
    
    // Sắp xếp mảng $lichchieu sử dụng hàm so sánh compareTime
    uasort($lichchieu, 'compareTime');

    foreach ($lichchieu as $lichchieu1):
        $giochieu = date("H:i", strtotime($lichchieu1['giochieu']));

        
        if($giochieu < $current_time):
     ?>
    <button class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>" disabled>
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </button>
    <?php else: ?>
        <label class="btn mauvien checkgio" data-seat="<?php echo substr($lichchieu1['giochieu'], 0, 5); ?>"  >
        <h6 class="text-white"><?php echo substr($lichchieu1['giochieu'], 0, 5); ?></h6>
    </label>

    <?php
        endif;
         endforeach; ?>
        </div>
        
        </div>
        
    </div>
    </div>

</div>
  <div class="container chonloaive  d-none">
    <div class="text-center text-white "style="margin: 20px;">
          <h1>Chọn Loại Vé</h1>
    </div>
    <div class="row">
      <div class="btn col-6">
        <div class=" text-white p-3 text-left w-100 h-100 rounded-right rounded-left text-capitalize" style="border: 3px solid #ffffff;">
            <p >
                <i class="bi bi-person-workspace"></i>
                người lớn
            </p>
            <p>
                <i class="bi bi-person-fill"></i>
                đơn
            </p>
            <p id="tien1" data-value="45000">
                <i class="bi bi-cash-stack"></i>
                 <?php echo $thongtin['pprice'] ;?>
            </p>
            <div id="buy-amount" >
                <button class="minus-btn" onclick="handleminus()">
                    <i class="bi bi-dash text-white"></i>
                </button>
                <input type="text" name="amount" id="amount" value="0" disabled>
                <button class="plus-btn" onclick="handleplus()">
                    <i class="bi bi-plus text-white"></i>
                </button>
            </div>
        </div>
      </div>
      <div class="btn col-6">
        <div class=" text-white p-3 text-left w-100 h-100 rounded-right rounded-left text-capitalize" style="border: 3px solid #ffffff;">
            <p >
                <i class="bi bi-person-workspace"></i>
                người lớn
            </p>
            <p>
                <i class="bi bi-people-fill"></i>
                đôi
            </p>
            <p id="tien2" data-value="145000">
                <i class="bi bi-cash-stack"></i>
                <?php echo $thongtin['pprice']*2+10000; ?>
            </p>
            <div id="buy-amount" >
                <button class="minus-btn" onclick="handleminus1()">
                    <i class="bi bi-dash text-white"></i>
                </button>
                <input type="text" name="amount" id="amount1" value="0" disabled>
                <button class="plus-btn" onclick="handleplus1()">
                    <i class="bi bi-plus text-white"></i>
                </button>
            </div>
        </div>
      </div>
      
      </div>
    </div>
  

<div class="container chonghe d-none">
    <div class="text-center text-white "style="margin: 20px;">
          <h1>Chọn Ghế</h1>
    </div>
    <div class="container1">
        <img src="Views/img/img-screen.png" class="d-block img-fluid" alt="">
        <div class="text-white text-center1">
            <h2>Màn Hình</h2>
        </div>
    </div>
    
    <div style="  width: 100%; overflow-x: auto;" id="table">
        <table class="text-center text-white" style="width: 100%;border-collapse: collapse;">
        <tr>
            <td>A</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button " data-seat="A1">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">A1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="A2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">A2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="A3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">A3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="A4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">A4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="A5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">A5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="A6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">A6</span>
                    </div>
                </div>
            </td>
           
        </tr>
        <tr>
            <td>B</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button " data-seat="B1">
                        <input type="checkbox">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">B1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="B2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">B2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="B3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">B3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="B4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">B4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="B5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">B5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="B6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">B6</span>
                    </div>
                </div>
            </td>
          
        </tr>
        <tr>
            <td>C</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button " data-seat="C1">
                        <input type="checkbox">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">C1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="C2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">C2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="C3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">C3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="C4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">C4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="C5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">C5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="C6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">C6</span>
                    </div>
                </div>
            </td>
         
        </tr>
        <tr>
            <td>D</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button " data-seat="D1">
                        <input type="checkbox">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">D1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="D2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">D2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="D3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">D3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="D4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">D4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="D5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">D5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="D6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">D6</span>
                    </div>
                </div>
            </td>
          
        </tr>
        <tr>
            <td>E</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button "  data-seat="E1">
                        <input type="checkbox">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">E1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="E2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">E2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="E3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">E3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="E4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">E4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="E5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">E5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="E6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">E6</span>
                    </div>
                </div>
            </td>
            
        </tr>
        <tr>
            <td>F</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button "data-seat="F1">
                        <input type="checkbox">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">F1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="F2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">F2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="F3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">F3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="F4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">F4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="F5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">F5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="F6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">F6</span>
                    </div>
                </div>
            </td>
           
        </tr>
        <tr>
            <td>G</td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button " data-seat="G1">
                        <input type="checkbox">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">G1</span>
                    </div>
                </div>
        
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="G2">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">G2</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="G3">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">G3</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="G4">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">G4</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="G5">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">G5</span>
                    </div>
                </div>
            </td>
            <td colspan="2" class="text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button" data-seat="G6">
                        <img src="Views/img/seat.svg" alt="">
                        <span class="text-purple">G6</span>
                    </div>
                </div>
            </td>
           
        </tr>
        <tr>
            <td>H</td>
            <td  class="text-center" colspan="2">
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button "data-seat="H1">
                        <input type="checkbox">
                        <img src="Views/img/seat-couple-w.svg" alt="">
                        <span class="text-purple">H1</span>
                    </div>
                </div>
        
            </td>
            <td  class="text-center" colspan="2">
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="H2">
                        <img src="Views/img/seat-couple-w.svg" alt="">
                        <span class="text-purple">H2</span>
                    </div>
                </div>
            </td>
            <td   class="text-center"colspan="2" >
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="H3">
                        <img src="Views/img/seat-couple-w.svg" alt="">
                        <span class="text-purple">H3</span>
                    </div>
                </div>
            </td>
            <td  class="text-center" colspan="2">
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button"data-seat="H4">
                        <img src="Views/img/seat-couple-w.svg" alt="">
                        <span class="text-purple">H4</span>
                    </div>
                </div>
            </td>
            <td  class="text-center" colspan="2">
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn mauvien seat-button "data-seat="H5">
                        <img src="Views/img/seat-couple-w.svg" alt="">
                        <span class="text-purple">H5</span>
                    </div>
                </div>
            </td>
            <td  class="text-center" colspan="2">
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <!-- <div class="image-container btn btn-outline-primary " style="pointer-events: none;" > -->
                        <div class="image-container btn mauvien  seat-button "  data-seat="H6">
                        <img src="Views/img/seat-couple-w.svg" alt="" >
                        <span class="text-purple">H6</span>
                    </div>
                </div>
            </td>
        
        </tr>
        <tr>
            <td class="text-center" colspan="3">
                <img src="Views/img/seat.svg" alt="">
                <span class="text-white">Ghế thường</span>
            </td>
            <td class="text-center" colspan="3">
                <img src="Views/img/seat-couple-w.svg" alt="">
                <span class="text-white">Ghế đôi</span>
            </td>
            <td class="text-center" colspan="3">
                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn btn-outline-warning active" >
                    <img src="Views/img/seat.svg" alt="" checked >
                    
            </div>
            <span class="text-white">Ghế chọn</span>
            </div>
            </td>
            <td class="text-center" colspan="3">

                <div class="btn-group btn-group-toggle d-inline-block" data-toggle="buttons">
                    <div class="image-container btn btn-outline-primary active" >
                    <img src="Views/img/seat.svg" alt="" checked >
                    
            </div>
            <span class="text-white">Ghế đã đặt</span>
            </div>
            </td>
        </tr>
        </table>
    </div>
</div>
<div class="thanhtoan d-none" >
    <div class="container text-white">
        <div class="thanhtoanleft" >
            <h2 style="margin: 10px;"id="tenphim1"></h2>
            <h6 style="margin: 10px;" id="tenrap"> </h6>
            <h6 style="margin: 10px;" id="thongtin">Phòng chiếu: P<?php echo $lichchieu1['pcid'];?>  </h6>
        </div>
        <div class="thanhtoantight">
            <div class="tien" >
                <span >Tạm tính </span>
                <span id="giatri" data-value="0">0</span>
            </div>
            <button>Đặt vé</button>
        </div>
    </div>
</div>
</div>
</section>

    