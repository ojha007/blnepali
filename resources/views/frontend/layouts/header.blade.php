<!--header start-->
<header class="header">
    <section class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 d-flex align-items-center justify-content-end">
                    <ul class="social-link">
                        <li class="list-item ttu">Follow Us</li>
                        <li class="list-item"><a href="#"><i class="fab fa-facebook-square"></i> </a></li>
                        <li class="list-item"><a href="#"><i class="fab fa-twitter-square"></i> </a></li>
                        <li class="list-item"><a href="#"><i class="fab fa-instagram"></i> </a></li>
                        <li class="list-item"><a href="#"><i class="fab fa-youtube-square"></i> </a></li>
                    </ul>

                    <!--                    <span class="news-lang">-->
                    <!--                        <a href="#"><span class="lang-flag"><img src="assets/images/UK-Flag.png"/></span> <span class="lang-text">English</span> </a>-->
                    <!--                    </span>-->

                    <div class="news-lang">
                        <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
                            <form action="" class="language-picker__form">
                                <label for="language-picker-select">Select your language</label>
                                <select name="language-picker-select" id="language-picker-select">
                                    <option lang="de" value="deutsch">Deutsch</option>
                                    <option lang="en" value="english">English</option>
                                    <option lang="fr" value="francais">Français</option>
                                    <option lang="it" value="italiano">Italiano</option>
                                    <option lang="np" value="nepali">Nepali</option>
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
        <div class="container-fluid align-items-start">
            <div class="navbar-brand">
                <a href="#" class="brand-logo">
                    {{--                    <img src="" alt="Bl media Logo"/> --}}
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#primaryNavContent" aria-controls="primaryNavContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="primaryNavContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('index')}}">
                            <i class="fas fa-house-chimney"></i> </a>
                    </li>
                    @foreach($headerCategories as $key=> $category)
                        <li class="nav-item">
                            <a class="nav-link">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
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
