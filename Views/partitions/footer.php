<footer class="container-fluid bg-primary py-3 footer mt-auto bg-light">
        <div class="container text-white text-center">
            Copyright &copy; 2024 by Ducnvh
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
<script>
    
    

    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop()) {
                $('header').addClass('sticky-top')
            }
            else {
                $('header').removeClass('sticky-top')
            }
        });
    });
    $(document).ready(function() {
    var modalVideo = document.getElementById("modalVideo");
    var originalSrc = modalVideo.src;

    $('#myModal').on('hide.bs.modal', function() {
      modalVideo.src = ''; // Tạm dừng video bằng cách xóa nguồn
    });

    $('#myModal').on('shown.bs.modal', function() {
      modalVideo.src = originalSrc; // Phát lại video từ trạng thái trước đó
    });
  });
  var tenrap="";
document.querySelectorAll("#hanoi1 .checkgio").forEach(function(button) {
    button.addEventListener("click", function() {
        // Lưu trữ id của nhóm hiện tại
        var sourceContent = document.getElementById("tenrap3").innerHTML;
        tenrap=sourceContent;
        document.getElementById("tenrap").innerHTML = sourceContent;
    });
});
document.querySelectorAll("#hanoi2 .checkgio").forEach(function(button) {
    button.addEventListener("click", function() {
        // Lưu trữ id của nhóm hiện tại
        var sourceContent = document.getElementById("tenrap4").innerHTML;
        tenrap=sourceContent;
        document.getElementById("tenrap").innerHTML = sourceContent;
    });
});
document.querySelectorAll("#hochiminh1 .checkgio").forEach(function(button) {
    button.addEventListener("click", function() {
        // Lưu trữ id của nhóm hiện tại
        var sourceContent = document.getElementById("tenrap1").innerHTML;
        tenrap=sourceContent;
        document.getElementById("tenrap").innerHTML = sourceContent;
    });
});
document.querySelectorAll("#hochiminh2 .checkgio").forEach(function(button) {
    button.addEventListener("click", function() {
        // Lưu trữ id của nhóm hiện tại
        var sourceContent = document.getElementById("tenrap2").innerHTML;
        tenrap=sourceContent;
        document.getElementById("tenrap").innerHTML = sourceContent;
    });
});

var sourceContent = document.getElementById("tenphim").innerHTML;

// Gán nội dung của sourceDiv cho một phần tử div khác có id là "targetDiv"
document.getElementById("tenphim1").innerHTML = sourceContent.toUpperCase();

$(document).ready(function() {
    $("#citySelect").change(function() {
        var selectedValue = $(this).val();

        if (selectedValue === "hanoi") {
            $("#hanoi").removeClass("d-none");
            $("#hochiminh").addClass("d-none");
        } else if (selectedValue === "hochiminh") {
            $("#hochiminh").removeClass("d-none");
            $("#hanoi").addClass("d-none");
        }
    });
});

var selectedSeats = [];
let zezo=()=>{
    var seatButtons = document.querySelectorAll(".seat-button");
    seatButtons.forEach(function(seatButton) {
        if(seatButton.classList.contains("seat-selected"))
        {
            seatButton.classList.toggle("seat-selected");
            seatButton.classList.toggle("maunen");
            selectedSeats=[]
        }
        

    });
}
var datagio="";
var HourButtons = document.querySelectorAll(".checkgio");
HourButtons.forEach(function(HourButton) {
    HourButton.addEventListener("click", function() {
            $('.chonloaive').removeClass('d-none');
            $('.chonghe').removeClass('d-none');
            $('.thanhtoan').removeClass('d-none');
        HourButtons.forEach(function(btn) {
            if (btn !== HourButton) {
                btn.classList.remove("seat-selected");
                btn.classList.remove("maunen");
            }
        });
        datagio=HourButton.getAttribute("data-seat");
        console.log(datagio)
        HourButton.classList.toggle("seat-selected");
        HourButton.classList.toggle("maunen");
    });
    
    });
document.addEventListener("DOMContentLoaded", function() {
  
    // Lắng nghe sự kiện click trên các nút chứa ghế
    var seatButtons = document.querySelectorAll(".seat-button");
    // Số lượng ghế tối đa được chọn

    // Mảng lưu trữ các ghế đã chọn
    

    // Lắng nghe sự kiện click trên mỗi nút ghế
    seatButtons.forEach(function(seatButton) {
        seatButton.addEventListener("click", function() {
            // Kiểm tra số lượng ghế đã chọn
            var maxSeats = parseInt(amount)+parseInt(amount1);
            if (selectedSeats.length < maxSeats || seatButton.classList.contains("seat-selected")) {
                // Kiểm tra xem ghế đã được chọn hay không
                if (seatButton.classList.contains("seat-selected")) {
                    // Nếu được chọn, loại bỏ ghế khỏi mảng selectedSeats
                    var seat = seatButton.getAttribute("data-seat");
                    var index = selectedSeats.indexOf(seat);
                    if (index !== -1) {
                        selectedSeats.splice(index, 1);
                    document.getElementById('thongtin').innerHTML=document.getElementById('thongtin').innerHTML+" | "+selectedSeats.join(',');
                    }
                } else {
                    // Nếu chưa được chọn, thêm ghế vào mảng selectedSeats
                    var seat = seatButton.getAttribute("data-seat");
                    selectedSeats.push(seat);
                    document.getElementById('thongtin').innerHTML="Phòng chiếu : p4 | "+selectedSeats.join(',');
                }
                // Cập nhật trạng thái chọn ghế
                seatButton.classList.toggle("seat-selected");
                seatButton.classList.toggle("maunen");

                // Hiển thị số ghế đã chọn
                console.log(selectedSeats);
            } else {

                // Nếu số lượng ghế đã chọn đã đạt tới giới hạn, không cho phép chọn thêm ghế nào
                alert("Bạn chỉ có thể chọn tối đa " + maxSeats + " ghế!");
            }
        });
    });
});

let amountElement = document.getElementById('amount');
let amount= amountElement.value;
let money= document.getElementById('tien1');
let datamoney =money.getAttribute("data-value");
let giatri = document.getElementById('giatri');

let render=(amount)=>{
    amountElement.value=amount;
}
let handleplus =()=>{
    if( parseInt(amount)+parseInt(amount1) <90){
        amount++;
        if(amount1==0)
            document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn" ;
        else
            document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn" +" | "+ amount1+" người lớn(đôi)" ;
        render(amount);
        hienthi();
    }
    else{
        alert("khong duoc dat qua so ghe")
    }
}

let handleminus =()=>{
    if(amount>0){
        amount--;
        
        if(amount==0)
        {
            if(amount1==0)
                document.getElementById("tenrap").innerHTML= tenrap ;
            else
                document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount1+" người lớn(đôi)" ;
        }
        else
        {
            if(amount1==0)
                document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn";
            else
                document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn" +" | " + amount1+" người lớn(đôi)" ;
        }
    }
    
             
    zezo();
    hienthi();
    render(amount);
}


let money1= document.getElementById('tien2');
let datamoney1 =money1.getAttribute("data-value");
let amountElement1 = document.getElementById('amount1');
let amount1= amountElement1.value;

let render1=(amount1)=>{
    amountElement1.value=amount1;
}
let handleplus1 =()=>{
    if( parseInt(amount)+parseInt(amount1) <90){
    amount1++;
    if(amount==0)
            document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount1+" người lớn (đôi)" ;
        else
            document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn" +" | "+ amount1+" người lớn (đôi)" ;
    hienthi();
    render1(amount1)}
    else{
        alert("khong duoc dat qua so ghe")
    }
}
let handleminus1 =()=>{
    if(amount1>0){
        amount1--;
        if(amount1==0)
        {
            if(amount==0)
                document.getElementById("tenrap").innerHTML= tenrap ;
            else
                document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn " ;

        }
        else
        {
            if(amount==0)
                document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount1+" người lớn(đôi)";
            else
                document.getElementById("tenrap").innerHTML= tenrap +" | "+ amount+" người lớn" +" | " + amount1+" người lớn(đôi)" ;
        }
        }
    zezo();
    hienthi();
    render1(amount1)
}
let hienthi=()=>{
    let valuetong =datamoney1*amount1+datamoney*amount;
    giatri.textContent=valuetong;
    giatri.setAttribute("data-value", valuetong);
}
</script>
</body>
</html>