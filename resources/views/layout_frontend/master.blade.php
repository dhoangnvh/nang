<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="page_assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="page_assets/css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="page_assets/owlcarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="page_assets/owlcarousel/dist/assets/owl.theme.default.min.css">
</head>
<body>
  <!-- header -->
  <div id="menutop">
    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-end align-items-center">
        <div class="hotline">
          <i class="fas fa-phone-alt"></i> <span class="mx-2">0987654321 - 0123456789</span>
        </div>
        <div class="contact">
          <a class="btn-contact">Liên hệ ngay</a>
        </div>
      </div>
    </div>
    <div class="topmenu">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="#">
            <img src="page_assets/images/logo.svg" alt="" srcset="" class="logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Giới thiệu <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Dịch vụ</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#">Dự án</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#">Liên hệ</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <div style="margin-top: 111px;"></div>
  <!-- end header -->

  @yield('content')
  
  <!--  -->
  <div class="footer">
    <div class="py-50">
      <div class="container footer1">
        <div class="content">
          <img src="page_assets/images/bieu-tuong-goldidea.svg" alt="" srcset="">
          <div class="title">Hãy để GoldIdea gia tăng sức hấp dẫn & lan tỏa thương hiệu của bạn</div>
          <a href="#" class="btn-cont" rel="nofollow">Liên hệ ngay</a>
          <div class="des mt-3">
            <div class="text-center">Hoặc gọi cho chúng tôi để được tư vấn miễn phí<br>0904742898&nbsp; - &nbsp;0904100479</div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer2">
      <div class="container">
        <div class="d-none d-md-flex align-items-center justify-content-between footer-menu">
          <div class="logo">
            <img src="page_assets/images/logo.svg" alt="" srcset="" width="158px">
          </div>
          <div class="menu-bot d-flex">
            <div><a href="#" class="link-theme">Dự án theo lĩnh vực</a></div>
            <div><a href="#" class="link-theme">Tuyển dụng</a></div>
            <div><a href="#" class="link-theme">Blog</a></div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3">
            <div class="py-5">
              <div class="title">Về chúng tôi</div>
              <div class="info">
                Phương châm làm việc luôn<br>
                có trách nhiệm trong từng dự<br>
                án và nỗ lực từng ngày để việc<br>
                kinh doanh của khách hàng tốt hơn
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="py-5">
              <div class="title">Dịch vụ tiêu biểu</div>
              <div class="info">
                <ul class="mnubot">
                  <li>
                    <a href="#" class="link-theme">Thiết Kế Logo Công ty</a>
                  </li>
                  <li>
                    <a href="#" class="link-theme">Thiết Kế Thương Hiệu</a>
                  </li>
                  <li>
                    <a href="#" class="link-theme">Thiết Kế Bao Bì</a>
                  </li>
                  <li>
                    <a href="#" class="link-theme">Thiết kế Profile</a>
                  </li>
                  <li>
                    <a href="#" class="link-theme">Thiết Kế Logo Công ty</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="py-5">
              <div class="title">Goldidea Hà Nội</div>
              <div class="info">
                1. P307, Nhà A2, Nguyễn Cơ Thạch, Mỹ Đình, Nam Từ Liêm, Hà Nội<br>
                2. P404B, Gemek 2, Lê Trọng Tấn, An Khánh, Hoài Đức, Hà Nội<br>
                Điện thoại: &nbsp;0987654321<br>
                Hotline: 0987654321<br>
                Email: info@email.com.vn
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="py-5">
              <div class="title">Goldidea Hà Nội</div>
              <div class="info">
                Hà Nội, TPHCM, Đà Nẵng, Bình Dương, Biên Hòa (Đồng Nai), Nha Trang (Khánh Hòa), Hải Phòng, Quảng Ninh, Vinh (Nghệ An).
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="bottom">   
    <div class="container">
      <div class="d-flex justify-content-between">
        <div class="social">
          Theo dõi chúng tôi 
          <a href="#" class="link-theme" target="_blank"> <i class="fab fa-facebook"></i></a>
          <a href="#" class="link-theme" target="_blank"> <i class="fab fa-twitter"></i></a>
          <a href="#" class="link-theme" target="_blank"> <i class="fab fa-youtube"></i></a>
          <a href="#" class="link-theme" target="_blank"> <i class="fab fa-pinterest"></i></a>
          <a href="#" class="link-theme" target="_blank"> <i class="fab fa-linkedin"></i></a>
        </div>
        <div class="copyright">© 2010 - 2019 Goldidea. All rights reservved.</div>
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="page_assets/owlcarousel/dist/owl.carousel.min.js"></script>

  <script>
    jQuery(document).ready(function($) {
      $('.custom1').owlCarousel({
        animateOut: 'animate__fadeOut',
        items: 1,
        margin: 0,
        nav:true,
        stagePadding: 0,
        smartSpeed: 400,
        loop: true,
        autoplay:true,
        autoplayTimeout:5000
      });
    });
  </script>
</body>
</html>
