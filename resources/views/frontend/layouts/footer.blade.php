<section class="page-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 footer-widget">
                    <div class="w-100 mb-3">
                        <a href="{{url('/np')}}" class="brand-logo">
                            <img src="https://breaknlinks.com/frontend/img/logo.png" alt="BL Media">
                        </a>
                    </div>
                    <div class="infoblock">
                        <h4 class="block-title">BL Media Inc</h4>
                        <h6 class="block-subTitle">Media for all across the globe</h6>

                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 footer-widget">
                    <h5 class="widget-title">अन्य संस्करण</h5>
                    <ul class="nav nav--listing">
                        <li class="nav-item">
                            <a href="/eng" class="nav-link" target="_blank">English</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link active">Nepali</a>
                        </li>
                        <li class="nav-item">
                            <a href="/hindi" class="nav-link" target="_blank">Hindi</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 footer-widget">
                    <h5 class="widget-title">सम्पर्क गर्नुहोस्</h5>
                    <ul class="infoList">
                        <li class="list-item">
                            <label>ईमेल:</label>
                            <a href="mailto:{{setting('website_email')}}">{{setting('website_email')}}</a>
                        </li>
                        <li class="list-item">
                            <label>सम्पर्क नम्बर</label>
                            {{setting('contact_number')}}
                        </li>
                        @if(setting('registration_number'))
                            <li class="list-item">
                                <label>दर्ता नम्बर</label>
                                {{setting('registration_number')}}
                            </li>
                        @endif
                        <li class="list-item">
                            <label>ठेगाना</label>
                            {{setting('address')}}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 footer-widget">
                    <h5 class="widget-title">Subscribe</h5>
                    <form class="base-form mb-3">
                        <div class="input-group">
                            <input type="text" name="subscribeEmail" class="form-control"
                                   placeholder="your email to subscribe...">
                            <button type="submit" name="btnSubscribe" class="btn btn-primary"><i
                                    class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                    <ul class="social-link-circle">
                        <li class="nav-item">
                            <a href="{{setting('facebook')}}" class="nav-link" target="_blank">
                                <i class="fab fa-facebook-square fa-1x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{setting('twitter')}}" class="nav-link" target="_blank">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{setting('instagram')}}" class="nav-link" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{setting('youtube')}}" class="nav-link" target="_blank">
                                <i class="fab fa-youtube-square"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            Copyright &copy; <?php echo date('Y'); ?>
            <a href="{{url('/')}}" target="_blank" class="text-white">
                - BL Media. All rights reserved.
            </a>
        </div>
    </div>
</section>
