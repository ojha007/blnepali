<footer class="page-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 float-left">
                <div class="footer-brand">
                    <figure class="brand-logo">
                        <img src="{{asset('frontend/img/logo.png')}}" alt="Bl Media"/>
                    </figure>
                    <div class="brand-info">
                        <h2 class="brand-name">In Association with BL Media Inc.</h2>
                        <p> Copyright &copy; <?php echo date('Y'); ?>, www.breaknlinks.com </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 pt-3 footerButtom">
                <span> {{setting('organization_name')}}</span>
                <br>
                <span> {{trans('messages.email')}} : {{setting('organization_email')}} </span>
            </div>
        </div>

    </div>
</footer>