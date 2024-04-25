
    <div class="signin_modal">
    <?php
            
            if(isset($result)){
                if($result["mess"]==true){
                    echo "<h5>Đăng nhập thất ok</h5>";
                }
                else{
                    echo "<h5>Đăng nhập thất bại</h5>";
                }
            }
            else{
                echo "<h5>Đăng nhập thất bại</h5>";
            }
            ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#signup" type="button" role="tab"
                aria-controls="home" aria-selected="true">Đăng kí</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#signin" type="button" role="tab"
                aria-controls="profile" aria-selected="false">Đăng nhập</a>
        </li>

    </ul>
    <div class="tab-content signin_tab" id="myTabContent">
        <div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="home-tab">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="Username1" name="Username1" aria-describedby="textlHelp"
                        placeholder="Username">

                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp"
                        placeholder="Email">

                </div>
                <div class="form-group">

                    <input type="password" class="form-control" id="Password1" name="Password1" placeholder="Password">
                </div>

                <button type="submit" name="submit1" class="btn btn-primary btn-block">Đăng Kí</button>
            </form>
        </div>
        <div class="tab-pane fade" id="signin" role="tabpanel" aria-labelledby="profile-tab"> 
         
            <form method="post" action="index.php?controller=login&action=login">
                <div class="form-group">
                    <input type="text" class="form-control" id="Username2" name="Username2" aria-describedby="textlHelp"
                        placeholder="Username">

                </div>

                <div class="form-group">

                    <input type="password" class="form-control" id="Password2" name="Password2" placeholder="Password">
                </div>

                <button type="submit" name="submit2" class="btn btn-primary btn-block">Đăng Nhập</button>
            </form>
        </div>

    </div>
</div>

