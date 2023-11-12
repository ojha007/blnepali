{{--<section class="page-footer">--}}
{{--    <div class="footer-content">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 footer-widget">--}}
{{--                    <div class="w-100 mb-3">--}}
{{--                        <a href="{{url('/np')}}" class="brand-logo">--}}
{{--                            <img src="https://breaknlinks.com/frontend/img/logo.png" alt="BL Media">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="infoblock">--}}
{{--                        <h4 class="block-title">BL Media Inc</h4>--}}
{{--                        <h6 class="block-subTitle">Media for all across the globe</h6>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 footer-widget">--}}
{{--                    <h5 class="widget-title">अन्य संस्करण</h5>--}}
{{--                    <ul class="nav nav--listing">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="/eng" class="nav-link" target="_blank">English</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="/" class="nav-link active">Nepali</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="/hindi" class="nav-link" target="_blank">Hindi</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 footer-widget">--}}
{{--                    <h5 class="widget-title">सम्पर्क गर्नुहोस्</h5>--}}
{{--                    <ul class="infoList">--}}
{{--                        <li class="list-item">--}}
{{--                            <label>ईमेल:</label>--}}
{{--                            <a href="mailto:{{setting('website_email')}}">{{setting('website_email')}}</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-item">--}}
{{--                            <label>सम्पर्क नम्बर</label>--}}
{{--                            {{setting('contact_number')}}--}}
{{--                        </li>--}}
{{--                        @if(setting('registration_number'))--}}
{{--                            <li class="list-item">--}}
{{--                                <label>दर्ता नम्बर</label>--}}
{{--                                {{setting('registration_number')}}--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        <li class="list-item">--}}
{{--                            <label>ठेगाना</label>--}}
{{--                            {{setting('address')}}--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 footer-widget">--}}
{{--                    <h5 class="widget-title">Subscribe</h5>--}}
{{--                    <form class="base-form mb-3">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" name="subscribeEmail" class="form-control"--}}
{{--                                   placeholder="your email to subscribe...">--}}
{{--                            <button type="submit" name="btnSubscribe" class="btn btn-primary"><i--}}
{{--                                    class="fa fa-paper-plane"></i></button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <ul class="social-link-circle">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{setting('facebook')}}" class="nav-link" target="_blank">--}}
{{--                                <i class="fab fa-facebook-square fa-1x"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{setting('twitter')}}" class="nav-link" target="_blank">--}}
{{--                                <i class="fab fa-twitter-square"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{setting('instagram')}}" class="nav-link" target="_blank">--}}
{{--                                <i class="fab fa-instagram"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{setting('youtube')}}" class="nav-link" target="_blank">--}}
{{--                                <i class="fab fa-youtube-square"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="footer-copyright">--}}
{{--        <div class="container-fluid d-flex align-items-center justify-content-center">--}}
{{--            Copyright &copy; <?php echo date('Y'); ?>--}}
{{--            <a href="{{url('/')}}" target="_blank" class="text-white">--}}
{{--                - BL Media. All rights reserved.--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pr-md-5">
                <a
                    class="d-flex gap-3 align-items-center"
                    href="https://breaknlinks.com/np/np">
                    <img src="https://breaknlinks.com/frontend/img/logo.png"
                         class="img-fluid"
                         style="width:80px;object-fit: contain;"
                         alt="BL Media">
                    <div class="">
                        <p class="fw-bold fs-5  lh-sm text-white">BL Media Inc</p>
                        <p class="text-white lh-sm">Media for all across the globe</p>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <h1 class="fw-bold text-break-primary text-uppercase">Editions</h1>
                <ul class="list-unstyled nav-links">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Nepali</a></li>
                    <li><a href="#">Hindi</a></li>
                    <li><a href="#">Español</a></li>
                    <li><a href="#">عربي한국어中文</a></li>
                </ul>
            </div>
            <div class="col-md">
                <h1 class="fw-bold text-break-primary text-uppercase">About Us</h1>
                <ul class="list-unstyled nav-links">
                    <li><a href="#">Email : breaknlinks@gmail.com
                        </a>
                    </li>
                    <li><a href="#">Contact No :  +97714496040</a></li>
                    <li><a href="#">
                            Address : New Baneshowr,10 Kathmandu</a>
                    </li>
                    <li><a href="#">Reg.No.350/2075-76</a></li>
                </ul>
            </div>
            <div class="col-md">
                <p class><a class="text-white fw-bold  text-break-primary text-uppercase">Follow Us</a></p>
                <ul class="social list-unstyled">
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="copyright pt-3">
                    <p><small class="fs-6 ">&copy; 2023 All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
</footer>
