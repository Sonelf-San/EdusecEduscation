<footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>E</span>dusec</h2>
                </div>

                <p>
                {!! \App\Pages::find(22)->content !!}
                </p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="{!! \App\Pages::find(23)->content !!}"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="{!! \App\Pages::find(24)->content !!}"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="{!! \App\Pages::find(25)->content !!}"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="{!! \App\Pages::find(26)->content !!}"><i class="fa fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                    Contactez-nous
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> {!! \App\Pages::find(18)->content !!}</p>
                  <p><span>Email:</span> {!! \App\Pages::find(19)->content !!}</p>
                  <p><span>Working Hours:</span> {!! \App\Pages::find(21)->content !!}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Facebook</h4>
                <div class="flicker-img border-solid">
                  <div id="fb-root"></div>
                  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=346816959465122&autoLogAppEvents=1"></script>
                  <div class="fb-page" data-href="https://www.facebook.com/Edusec237/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <blockquote cite="https://www.facebook.com/Edusec237/" class="fb-xfbml-parse-ignore">
                  <a href="https://www.facebook.com/Edusec237/">Edusec</a></blockquote>
                  <!-- <a href="#"><img src="{{ asset('assets/img/portfolio/1.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/2.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/3.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/4.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/5.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/6.jpg') }}" alt=""></a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                <!-- &copy;  -->
                © Copyright <strong>Edusec</strong>. All Rights Reserved 2018 - <script>document.write(new Date().getFullYear())</script>
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>