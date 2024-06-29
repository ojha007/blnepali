<div class="uk-card-header" style="text-align: center">
    <h1 id="site-title" class="logo text-logo text-center">
        <a href="{{url('/np')}}" target="_blank">
            <img src="{{asset('/frontend/img/logo.png')}}" height="50" alt="BL Media" loading="lazy"
                 title="BL Media">
        </a>

        <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true"
                src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&amp;font_color=333333&amp;aj_time=yes&amp;font_size=14&amp;line_brake=0&amp;api=510247j582"
                width="334" height="22"></iframe>

    </h1>

</div>
<nav class="uk-navbar-container uk-light uk-navbar" style="background: #FF5E14;">
    <div class="uk-navbar-center">
        <div>
            <ul class="uk-navbar-nav">
                <li class=" {{request()->is(
                    'preeti-to-unicode',
                    'nepali/preeti-to-unicode'
                    ) ? 'uk-active':''}}">
                    <a href="/preeti-to-unicode">
                        Preeti to Nepali Unicode
                    </a></li>
                <li class=" {{request()->is(
                            'unicode-to-preeti',
                            'nepali/unicode-to-preeti'
                            ) ? 'uk-active':''}}"><a
                        href="/unicode-to-preeti">
                        Nepali Unicode to
                        Preeti</a></li>
                <li class="{{request()->is(
                    'roman-to-unicode',
                    'nepali/roman-to-unicode'
                     ) ? 'uk-active':''}}"><a
                        href="/roman-to-unicode">
                        Roman to Nepali Unicode</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

