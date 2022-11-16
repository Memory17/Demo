<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="/" class="simple-text logo-normal">
        HOUSEW
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item @php
            if(isset($activeDashboard))
            echo $activeDashboard;
        @endphp">
          <a class="nav-link" href="admin/dashboard">
            <i class="material-icons">dashboard</i>
            <p>Thống kê</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeCategory))
              echo $activeCategory;
          @endphp">
          <a class="nav-link" href="admin/categorys">
            <i class="material-icons">content_paste</i>
            <p>Loại Sản Phẩm</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeBrand))
              echo $activeBrand;
          @endphp">
          <a class="nav-link" href="admin/brands">
            <i class="material-icons">content_paste</i>
            <p>Không Gian Decor</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeProduct))
              echo $activeProduct;
          @endphp">
          <a class="nav-link" href="admin/products">
            <i class="material-icons">content_paste</i>
            <p>Sản Phẩm</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activePost))
              echo $activePost;
          @endphp">
          <a class="nav-link" href="admin/posts">
            <i class="material-icons">content_paste</i>
            <p>Bài Viết</p>
          </a>
        </li>
        @if (Auth::user()->role_id == 1)
          <li class="nav-item 
            @php
            if(isset($activeUser))
            echo $activeUser;
            @endphp">
            <a class="nav-link" href="admin/users">
              <i class="material-icons">content_paste</i>
              <p>Người Dùng</p>
            </a>
          </li>
        @endif
        
        <li class="nav-item @php
              if(isset($activeOrder))
              echo $activeOrder;
          @endphp">
          <a class="nav-link" href="admin/orders">
            <i class="material-icons">content_paste</i>
            <p>Hóa Đơn</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeComment))
              echo $activeComment;
          @endphp">
          <a class="nav-link" href="admin/comments">
            <i class="material-icons">content_paste</i>
            <p>Bình Luận</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeShip))
              echo $activeShip;
          @endphp">
          <a class="nav-link" href="admin/ships">
            <i class="material-icons">content_paste</i>
            <p>Phí Vận Chuyển</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeCoupon))
              echo $activeCoupon;
          @endphp">
          <a class="nav-link" href="admin/coupons">
            <i class="material-icons">content_paste</i>
            <p>Mã Giảm Giá</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeSlide))
              echo $activeSlide;
          @endphp">
          <a class="nav-link" href="admin/slides">
            <i class="material-icons">content_paste</i>
            <p>Slide/Banner</p>
          </a>
        </li>
        <li class="nav-item @php
              if(isset($activeRequirement))
              echo $activeRequirement;
          @endphp">
          <a class="nav-link" href="admin/requirements">
            <i class="material-icons">content_paste</i>
            <p>Lời Nhắn</p>
          </a>
        </li>
      </ul>
    </div>
  </div>