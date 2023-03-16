<!--header start-->
<header class="header">
    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 d-flex align-items-center justify-content-end">
                    <ul class="social-link">
                        <li class="list-item ttu">Follow Us</li>
                        <li class="list-item">
                            <a href="{{setting('facebook')}}" target="_blank">
                                <i class="fab fa-facebook-square"></i>
                            </a></li>
                        <li class="list-item">
                            <a href="{{setting('twitter')}}" target="_blank">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                        </li>
                        <li class="list-item">
                            <a href="{{setting('instagram')}}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-item">
                            <a href="{{setting('youtube')}}" target="_blank">
                                <i class="fab fa-youtube-square"></i>
                            </a>
                        </li>
                        &nbsp;|
                        <li class="list-item">
                            <a href="https://breaknlinks.com/nepali/preeti-to-unicode" target="_blank">
                                <i class="fa fa-keyboard"></i>&nbsp;युनिकोड</a>
                        </li>
                    </ul>
                    <div class="news-lang">
                        <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
                            <form action="" class="language-picker__form">
                                <label for="language-picker-select">Select your language</label>
                                <select name="language-picker-select" id="language-picker-select">
                                    <option lang="np" value="nepali">Nepali</option>
                                    <option lang="en" value="english">English</option>
                                    <option lang="hi" value="hindi">Hindi</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="adv-widebanner">
                    {{--                    <img src="{{asset('frontend/images/xplus.png')}}"/>--}}
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar--primary">
        <div class="container-fluid container-xxl align-items-start position-relative">
            <div class="navbar-brand">
                <a href="{{route('index')}}" class="brand-logo">
                    <img src="{{asset('frontend/images/blLogo.png')}}" alt="Bl media Logo"/>
                </a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item nav-item--home">
                    <a class="nav-link" aria-current="page" href="{{route('index')}}"><i
                            class="fas fa-house-chimney"></i> </a>
                </li>
            </ul>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#primaryNavContent" aria-controls="primaryNavContent">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-end" id="primaryNavContent">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Break & Links</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto">
                        @foreach($headerCategories as $key=> $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{route('newsByCategory',['slug'=>$category->slug])}}">
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="expand-search-box">
                <input type="text" class="expand-search-input" placeholder="Start Looking For Something!">
                <a class="expand-search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>

        </div>
    </nav>
</header>
<!--header ended-->
