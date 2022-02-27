<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="page-head-blog">
        <div class="single-blog-page">
            <!-- recent start -->
            <div class="left-blog">
                <h4>recent post</h4>
                <div class="recent-post">
                    <!-- start single post -->
                    @foreach($recents as $recent)
                    <div class="recent-single-post">
                        <div class="post-img">
                            <a href="{{ route('web.postdetail', $recent->slug) }}">
                                <img src="{{ $recent->getLogoUrl() }}" style="width: 80px;" alt="">
                            </a>
                        </div>
                        <div class="pst-content leftsi">
                            <p><a href="{{ route('web.postdetail', $recent->slug) }}">{!! Str::limit($recent->title, 80) !!}</a></p>
                        </div>
                    </div>
                    @endforeach
                    <!-- End single post -->
                </div>
            </div>
             <!-- recent end -->
        </div>
                                <!-- <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>categories</h4>
                                <ul>
                                <li>
                                    <a href="#">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#">Project</a>
                                </li>
                                <li>
                                    <a href="#">Design</a>
                                </li>
                                <li>
                                    <a href="#">wordpress</a>
                                </li>
                                <li>
                                    <a href="#">Joomla</a>
                                </li>
                                <li>
                                    <a href="#">Html</a>
                                </li>
                                <li>
                                    <a href="#">Website</a>
                                </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>archive</h4>
                                <ul>
                                <li>
                                    <a href="#">07 July 2016</a>
                                </li>
                                <li>
                                    <a href="#">29 June 2016</a>
                                </li>
                                <li>
                                    <a href="#">13 May 2016</a>
                                </li>
                                <li>
                                    <a href="#">20 March 2016</a>
                                </li>
                                <li>
                                    <a href="#">09 Fabruary 2016</a>
                                </li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="single-blog-page">
                                <div class="left-tags blog-tags">
                                    <div class="popular-tag left-side-tags left-blog">
                                        <h4>Facebook</h4>
                                        <div id="fb-root"></div>
                                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=346816959465122&autoLogAppEvents=1"></script>
                                        <div class="fb-page" data-href="https://www.facebook.com/Edusec237/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                        <blockquote cite="https://www.facebook.com/Edusec237/" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/Edusec237/">Edusec</a></blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>