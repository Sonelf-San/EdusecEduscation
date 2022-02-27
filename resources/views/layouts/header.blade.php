<header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="{{ route('index') }}">
                <h1>
                    <img src="{{ asset('assets/img/E.png') }}" width="50" height="50" alt="" title="">
                    <span>E</span>dusec
                </h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
				</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="{{ Request::is('index') ? 'active' : '' }}">
                    <a class="page-scroll" href="{{ route('index') }}">Home</a>
                  </li>
               
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Collège<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">6<sup>èm</sup></a></li>
                      <li><a href="#">5<sup>èm</sup></a></li>
                      <li><a href="#">4<sup>èm</sup></a></li>
                      <li><a href="#">3<sup>èm</sup></a></li>
                    </ul> 
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Lycée<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">2<sup>nd</sup></a></li>
                      <li><a href="#">1<sup>er</sup></a></li>
                      <li><a href="#">T<sup>le</sup></a></li>
                    </ul> 
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Examens<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">BEPC</a></li>
                      <li><a href="#">PROBATOIRE</a></li>
                      <li><a href="#">BACC</a></li>
                    </ul> 
                  </li>

                  <li class = "{{ Request::is('concours*') ? 'active' : '' }}">
                    <a class="page-scroll" href="{{ route('web.concours.index') }}">Concours</a>
                  </li>
                  <li class = "{{ Request::is('bourses*') ? 'active' : '' }}">
                    <a class="page-scroll" href="{{ route('web.bourses.index') }}">Bourses</a>
                  </li>
                  <li class = "{{ Request::is('ecoles*') ? 'active' : '' }}">
                    <a class="page-scroll" href="{{ route('web.ecoles.index') }}">Les Grandes Ecoles & Facultés</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->