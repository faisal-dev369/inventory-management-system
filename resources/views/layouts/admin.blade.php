<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('contents/admin/fonts/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/admin/fonts/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/admin/fonts/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  </head>
  <body>
    <header>
        <div class="container-fluid header_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                      <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('contents/admin/images/avatar.png') }}" class="img-fluid">
                            {{Auth::user()->name}}
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-tie"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a></li>
                        <li><a class="dropdown-item" href="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                      </ul>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>  
    </header>

    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        <img class="" src="{{ asset('contents/admin/images/avatar.png') }}" alt="avatar"/>
                        <h5>{{Auth::user()->name}}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                            

                        <ul>
                         <li><a href="index.html"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                            <li><a href="{{ 'http://127.0.0.1:8000/dashboard/user/add' }}"><i class="fa-solid fa-user"></i> Users</a></li>
                            <li><a href="{{ 'http://127.0.0.1:8000/dashboard/income/category/add' }}"><i class="fa-solid fa-wallet"></i> Income</a></li>
                            <li><a href="#"><i class="fa-solid fa-money-bill-wave"></i> Expense</a></li>
                            <li><a href="#"><i class="fa-solid fa-file-alt"></i> Report</a></li>
                            <li><a href="#"><i class="fa-solid fa-trash"></i> Recycle Bin</a></li>
                        <li><a href="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>


         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
          </form>
                       
                </ul>        
                    </div>
                </div>

                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>                             
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- @if(session('success'))
                            <div id="success-message" class="alert alert-success text-center mt-3">
                             {{ session('success') }}
                            </div>
                        @endif -->

                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; {{ date('Y') }} | All rights reserved by Dashboard | Development By <a href="#">Rasel Islam.</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="{{ asset('contents/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



    <script src="{{ asset('contents/admin/js/custom.js') }}"></script>
    <!-- <script>
    // 3 সেকেন্ড পরে মেসেজ অটো হাইড
         setTimeout(function() {
        var msg = document.getElementById('success-message');
        if(msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.style.display = 'none', 500);
        }
    }, 3000);
    </script> -->
    @yield('scripts')
  </body>
</html>
