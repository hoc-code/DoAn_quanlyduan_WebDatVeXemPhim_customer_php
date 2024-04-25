
<!doctype html>
<html lang="en">
  <head>
    <title>Đặt vé xem phim </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="Views/css/thu.css">
</head>
  <body  >
    <header class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php?controller=home&action=index">CGV</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">

                    <from class="form-inline ml-auto my-2 my-lg-0 ">
                        <input class="form-control mr-sm-2  " type="text" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item nav">
                            <a class="nav-link" href="index.php?controller=login">
                                <i class="bi bi-person-circle"></i>
                                Đăng nhập </a>
                            <span class="nav-link">/</span>
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-add"></i>
                                Đăng kí </a>
                        </li>
                        
                    </ul>
                    
                </div>
            </nav>
        </div>
        <div class="container container-fluid bg-primary ">
        <ul class="nav nav-pills  " >
 
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-light header2" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
    <i class="bi bi-geo-alt"></i>
    Chọn rạp </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Nhom9 Nguyễn Trãi</a>
      <a class="dropdown-item" href="#">Nhom9 Cầu Giấy</a>
      <a class="dropdown-item" href="#">Nhom9 Giải Phóng</a>
      <a class="dropdown-item" href="#">Nhom9 Hai Bà Trưng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="#"><i class="bi bi-calendar"></i> Lịch chiếu</a>
  </li>
  
</ul>

        </div>
    </header>
