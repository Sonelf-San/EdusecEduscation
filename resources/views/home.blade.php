@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<main role="main" id="main">


  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{ asset('assets/img/slider/slider1.jpg') }}" alt="" title="#slider-direction-1" />
        <img src="{{ asset('assets/img/slider/slider2.jpg') }}" alt="" title="#slider-direction-2" />
        <img src="{{ asset('assets/img/slider/slider3.jpeg') }}" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">"{!! \App\Pages::find(1)->content !!}"</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{!! \App\Pages::find(4)->content !!}</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">"{!! \App\Pages::find(2)->content !!}"</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{!! \App\Pages::find(5)->content !!}</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">"{!! \App\Pages::find(3)->content !!}"</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">{!! \App\Pages::find(6)->content !!}</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->


  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>A propos d'Edusec</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
                <p class = "text-justify">
                <br> {!! \App\Pages::find(7)->content !!}
                </p>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
                <p class = "text-justify">
                <br>{!! \App\Pages::find(8)->content !!}
                </p>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

      <!-- Start About area -->
      <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Qui sommes nous?</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
      <p class = "text-justify">
      {!! \App\Pages::find(9)->content !!}
      </p>
            <ul>
            <li>
                <i class="fa fa-check"></i> Examens
            </li>
            <li>
                <i class="fa fa-check"></i> Concours
            </li>
            <li>
                <i class="fa fa-check"></i> Bourses
            </li>
            <li>
                <i class="fa fa-check"></i> Epreuves
            </li>
            </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Start Objectives area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Objectifs</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
      <p class = "text-justify">
      {!! \App\Pages::find(10)->content !!}
      </p>
      </div>
    </div>
  </div>
  <!-- End Objectives area -->

  <!-- our-skill-area start -->
  <div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <!-- section-heading end -->
        <div class="row">
          <div class="skill-text">
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="95" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Concours</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="85" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Bourses</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Epreuves</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="65" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Corrections</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-skill-area end -->



  <!-- Start team Area -->
  <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Latest Posts</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
          <!-- Start column -->
          @foreach($articles as $post)
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="single-team-member height">
                      <div class="team-img text-center img-fluid causes-one__img">
                          <a class = "cover-img" href="{{ route('web.postdetail', $post->slug) }}">
                              <img src="{{ asset('storage/logos/' . $post->logo->image) }}" class = "" alt="">
                          </a>

                      </div>                                        
                      <div class="team-content text-center">
                          <i class="fa fa-user"></i>
                              <small>{{$post->author}}</small>                                        
                              |
                          <i class="fa fa-calendar"></i>
                          <small>{{ $post->created_at->format('d M Y') }}</small>
                          <div class="text-center titltesh3 border-solid">
                          <a href="{{ route('web.postdetail', $post->slug) }}" 
                          class = "text-justify titles">{{ $post->title }}</a>
                      </div>
                      </div>
                  </div>
              </div>
          @endforeach
          <!-- End column -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->

  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                    {!! \App\Pages::find(11)->content !!}                    </p>
                    <h6>{!! \App\Pages::find(14)->content !!}</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                    {!! \App\Pages::find(12)->content !!}
                    </p>
                    <h6>{!! \App\Pages::find(15)->content !!}</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                    {!! \App\Pages::find(13)->content !!}
                    </p>
                    <h6>{!! \App\Pages::find(16)->content !!}</h6>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->

  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>{!! \App\Pages::find(17)->content !!}</h3>
            <!-- <a class="sus-btn" href="#">Get A quate</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: {!! \App\Pages::find(18)->content !!}<br>
                  <span>Monday-Friday ({!! \App\Pages::find(21)->content !!})</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: {!! \App\Pages::find(19)->content !!}<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Location: {!! \App\Pages::find(20)->content !!}<br>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form method="POST" id = "contact-form" role="form" class="contactForm">
              @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value = "{{ old('name') }}"
                    id="name" placeholder="Your Name" data-rule="minlen:4" 
                    data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                    <!-- Error -->
                    <span class="text-danger" id="name-error"></span>
                    <!-- Error -->
                </div>
                <div class="form-group">
                  <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                  id="email" placeholder="Your Email" data-rule="email" 
                  data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                    <!-- Error -->
                    <span class="text-danger" id="email-error"></span>
                    <!-- Error -->
                </div>
                <div class="form-group">
                  <input type="text" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" value="{{ old('subject') }}"
                  id="subject" placeholder="Subject" data-rule="minlen:4" 
                  data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                    <!-- Error -->
                    <span class="text-danger" id="subject-error"></span>
                    <!-- Error -->
                </div>
                <div class="form-group">
                  <textarea class="form-control @error('messages') is-invalid @enderror" name="messages" rows="5" id = "messages"
                  data-rule="required" data-msg="Please write something for us" placeholder="Enter your message (Either in English or French)">{{ old('messages') }}</textarea>
                  <div class="validation"></div>
                    <!-- Error -->
                    <span class="text-danger" id="message-error"></span>
                    <!-- Error -->
                </div>
                <div id="msg_div">
                    <span class="text-success" id="success-message"> </span>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->


  <script src="{{ asset('assets/js/jque.js') }}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contact-form').on('submit', function(event){
        event.preventDefault();
        $('#name-error').text('');
        $('#email-error').text('');
        $('#subject-error').text('');
        $('#message-error').text('');

       let name = $('#name').val();
       let email = $('#email').val();
       let subject = $('#subject').val();
       let messages = $('#messages').val();
    //    console.log(response);
        $.ajax({
          url: "{{ route('send-mail') }}",
          type: "POST",
          data:{
              name:name,
              email:email,
              subject:subject,
              messages:messages,
              _token: "{{ csrf_token()}}",
          },
          success:function(response){
            // console.log(response);
            if (response) {
              $('#success-message').text(response.success);
              $("#contact-form")[0].reset();
            }
          },
          error: function(response) {
              $('#name-error').text(response.responseJSON.errors.name);
              $('#email-error').text(response.responseJSON.errors.email);
              $('#subject-error').text(response.responseJSON.errors.subject);
              $('#message-error').text(response.responseJSON.errors.messages);
          }
         });
        });
      </script>
@endsection
