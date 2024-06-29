<header class="container-fluid bg-primary">
    <nav class="navbar container d-md-none d-lg-block navbar-expand-lg fw-bold small-nav">
        <div class="container-fluid top-nav">
            <a class="others fw-medium" href="#">अन्य संस्करण</a>
            <select
                class="form-control w-25 d-block d-md-none d-lg-none d-xl-none d-xxl-none form-control-sm bg-transparent border-0 text-white">
                <option class="bg-primary border-0" selected="" value="en">
                    English
                </option>
                <option class="bg-primary border-0" value="np">
                    नेपाली
                </option>
                <option class="bg-primary border-0" value="hindi">
                    हिन्दी
                </option>
            </select>
            <div class="collapse navbar-collapse" id="topnav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link ps-4" aria-current="page" href="/np">
                            नेपाली</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/en">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hindi">Hindi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/spanish">Español</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://breaknlinks.com/arabic" class="nav-link" target="_blank">عربي</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://breaknlinks.com/korean" class="nav-link" target="_blank">한국어</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://breaknlinks.com/chinese" class="nav-link" target="_blank">中文</a>
                    </li>
                </ul>
                <ul class="d-flex list-style align-items-center gap-2">
                    <li class="social-nav">
                        <a href="{{setting('facebook')}}" target="_blank">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-facebook"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                />
                            </svg>
                        </a>
                    </li>
                    <li class="social-nav">
                        <a href="{{setting('twitter')}}" target="_blank">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-twitter-x"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"
                                />
                            </svg>
                        </a>
                    </li>
                    <li class="social-nav">
                        <a href="{{setting('youtube')}}" target="_blank">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-youtube"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"
                                />
                            </svg>
                        </a>
                    </li>
                    <li class="social-nav">
                        <a
                            href="/np/preeti-to-unicode"
                            target="_blank"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-keyboard"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h12zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H2z"
                                />
                                <path
                                    d="M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75v-.5zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25v-.5zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75v-.5zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75v-.5zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75v-.5zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75v-.5zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75v-.5zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75v-.5zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75v-.5zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25v-.5z"
                                />
                            </svg>
                            युनिकोड
                        </a>
                    </li>
                    <li class="small-nav d-flex">
                        <button id="searchIcon" class="btn" type="button">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="white"
                                class="bi bi-search"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                                />
                            </svg>
                        </button>
                        <form action="" class="d-none d-flex" id="searchBox">
                            <input type="text" class="form-control" placeholder="यहाँ टाईप गर्नुहोस्..."
                                   aria-label="Search"
                                   aria-describedby="button-addon4"/>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="bg-body-tertiary my-nav border-bottom">
    <div class="container">
        <nav class="navbar  text-center navbar-expand-lg my-nav py-0">
            <div class="container-fluid">
                <a class="d-inline-block" href="/">
                    <img
                        style="height: 35px; object-fit: contain; margin-left: -25px"
                        id="logo_image_nav"
                        class="me-5"
                        src="https://breaknlinks.com/frontend/img/logo.png"
                        alt="BL Media"
                    />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse pe-5"
                    id="navbarSupportedContent"
                >

                    <ul class="navbar-nav me-auto mb-lg-0 align-items-center">
                        @foreach($headerCategories as $key=> $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{route('newsByCategory',$category->slug)}}">
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
