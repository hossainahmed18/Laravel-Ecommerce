<!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="/images/admin/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">Richard V.Welsh</p>
                <p class="designation">Manager</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href=" {{ route('admin.index') }} "><img class="menu-icon" src="/images/admin/menu_icons/01.png" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>

         


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/admin/menu_icons/08.png" alt="menu icon"> <span class="menu-title"> Manage Products    </span><i class="menu-arrow"></i></a>
            <div class="collapse" id="product-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.products') }} ">Products</a></li>
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.product.create') }} ">Create Products</a></li>
                
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title"> Manage Orders    </span><i class="menu-arrow"></i></a>
            <div class="collapse" id="order-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.orders') }} ">Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.orders') }} ">See Orders</a></li>
                
              </ul>
            </div>
          </li>




          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/admin/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Manage Category    </span><i class="menu-arrow"></i></a>
            <div class="collapse" id="category-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.categories') }} ">Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.category.create') }} ">Create Category</a></li>
                
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/admin/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Manage Brands    </span><i class="menu-arrow"></i></a>
            <div class="collapse" id="brand-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.brands') }} ">Brands</a></li>
                <li class="nav-item"> <a class="nav-link" href=" {{ route('admin.brand.create') }} ">Create Brand</a></li>
                
              </ul>
            </div>
          </li>



          <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png"> <span class="menu-title">
        Manage Divisions</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="division-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.divisions') }}">Manage Division</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.division.create') }}">Add Division</a></li>
          </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png"> <span class="menu-title">
        Manage Districts</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="district-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.districts') }}">Manage Districts</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a></li>
          </ul>
      </div>
    </li>


    <li class="nav-item">
      <form action="{{ route('admin.logout') }}" method="Post">
          @csrf
          <input type="submit" name="" value="logout Now" class="btn btn-danger">
      </form>
    </li>

          


          
        </ul>
      </nav>