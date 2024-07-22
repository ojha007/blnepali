<div class="section-row" id="bl_comment">
    <h2 class="comment_us">
        {{trans('comments.comment_us')}}
    </h2>
    <div class="b-tabs">
        <ul class="nav nav-tabs b-tabs-nav pb-2 pt-2">
            <li class="b-tabs-tab b-tabs-state-default">
                <a href="#all_comments" data-toggle="tab" class="b-tabs-anchor active">
                    {{trans('comments.all_comments')}}</a>
            </li>
            <li class="b-tabs-tab b-tabs-state-default">
                <a href="#write_comments" data-toggle="tab" class="b-tabs-anchor">
                    {{{trans('comments.give_comments')}}}
                </a>
            </li>
        </ul>
        <div class="comment__wrap">
            <div class="comment-content">
                <div class="tab-content  clearfix">
                    <div class="tab-pane active" id="all_comments">
                        @if(count($comments))
                            <div class="comment_block">
                                <div class="new_comment">
                                @foreach($comments as $comment)
                                    <!-- build comment -->
                                        <ul class="user_comment">
                                            <!-- current #{user} avatar -->
                                            <div class="user_avatar">
                                                <img
                                                    src="{{asset('backend/images/admin-logo.jpg')}}"/>
                                            </div><!-- the comment body -->
                                            <div class="comment_body">
                                                <p>{{$comment->description}}</p>
                                            </div>

                                            <!-- comments toolbar -->
                                            <div class="comment_toolbar">

                                                <!-- inc. date and time -->
                                                <div class="comment_details">
                                                    <ul>
                                                        <li>
                                                            <i class="fa fa-clock"></i>
                                                            {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                                                        </li>
                                                        <li><i class="fa fa-user"></i>
                                                            {{$comment->full_name}}
                                                        </li>
                                                    </ul>
                                                </div><!-- inc. share/reply and love -->
                                            </div>

                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <button
                            id="btn_write_comments"
                            data-tab="write_comments"
                            class="btn btn-flat btn-success">
                            {{{trans('comments.give_comments')}}}
                        </button>
                    </div>
                    <div class="tab-pane" id="write_comments">
                        <form id="comment_form" method="post"
                              action="{{route('news.storeComments',$news->id)}}">
                            <div class="form-group">
                                <label class="label required"
                                       for="full_name">{{trans('comments.full_name')}}</label>
                                <input type="text" id="full_name" class="form-control" name="full_name">
                            </div>
                            <div class="form-group">
                                <label class="label required"
                                       for="email">{{trans('comments.email')}}</label>
                                <input type="email" id="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label class="label required"
                                       for="description">{{trans('comments.comment')}}</label>
                                <textarea type="text" id="description" class="form-control"
                                          name="description"
                                          rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-flat btn-success">{{trans('comments.submit')}}</button>
                                <button type="reset"
                                        class="btn btn-flat btn-danger float-right">{{trans('comments.cancel')}}
                                </button>

                            </div>
                        </form>
                    </div>
                    <div class="alert server_message alert-dismissible  mt-2" role="alert"
                         style="display: none">

                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<div class="section-row">
    <h2></h2>
    <div class="fb-comments"
         data-href="{{request()->url()}}"
         data-width="auto"  data-numposts="5"></div>
</div>

<style>
    .user_avatar {
        width: 50px;
        height: 50px;
        display: inline-block;
        vertical-align: middle;
    }

    .user_avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .comment_block {
        width: 100%;
        height: auto;
        margin: 0 auto;
    }

    .comment_block .new_comment {
        width: 100%;
        height: auto;
    }

    .comment_block .new_comment .user_comment {
        list-style-type: none;
    }

    .comment_block .new_comment .comment_body {
        display: inline-block;
        vertical-align: middle;
        width: calc(100% - 75px);
        padding: 5px 10px;
        color: #555;
        background-color: #fff;
        border-bottom: 2px solid #f2f2f2;
    }


    .comment_block .new_comment .comment_toolbar {
        width: 100%;
    }

    .comment_block .new_comment .comment_toolbar ul {
        list-style-type: none;
        padding-left: 75px;
        font-size: 0;
    }

    .comment_block .new_comment .comment_toolbar ul li {
        display: inline-block;
        padding: 5px;
        font-size: 0.7rem;
        color: #d9d9d9;
    }

    .comment_block .new_comment .comment_toolbar ul li:hover {
        cursor: pointer;
    }

    .comment_block .new_comment .comment_toolbar .comment_details {
        display: inline-block;
        vertical-align: middle;
        text-align: left;
    }

    .comment_block .new_comment .comment_toolbar .comment_details li {
        color: black;
    }

    .b-tabs > .b-tabs-nav > .b-tabs-tab > .active {
        background-color: #f66c2c;
    }

    .b-tabs > .b-tabs-nav > .b-tabs-tab > a:hover {
        color: black;
    }

    .b-tabs .b-tabs-nav .b-tabs-anchor {
        padding: 0 12px;
        display: inline-block;
        text-decoration: none;
        color: rgba(0, 0, 0, .6);
        font-weight: 600;
    }

    .b-tabs .b-tabs-nav .b-tabs-tab {
        position: relative;
        top: 1px;
    }

    .b-tabs .b-tabs-tab {
        display: inline-block;
        margin: 0;
        list-style: none;
    }

    #comment_form input {
        font-weight: 600;
    }

    .b-tabs-nav {
        border-bottom: 1px solid #ccc;
        line-height: 40px;
    }


    #bl_comment .nav-pills > li > a {
        border-radius: 4px 4px 0 0;
    }

    .comment_us {
        background-color: #f6f1f1;
        padding: 15px;
        margin-top: 0;
    }

    label.required:after {
        content: " *";
        color: red;
    }

    .comment__wrap {
        background-color: #f6f1f1;
        padding: 15px;
        margin-top: 0;
        border-radius: 4px;
    }

    .error {
        color: #f31717;
        margin-left: 5px;
    }

    .has-error {
        border-color: #f51818;
    }
</style>
@push('scripts')
    <script>
        function removedSpinner(button, reset) {
            let form = $('#comment_form')
            setTimeout(function () {
                button.html('').text('@lang(('comments.give_comments'))').removeAttr('disabled');
                if (reset === true) {
                    form.trigger('reset');
                }
            }, reset ? 100 : 1000)
        }

        $(document).ready(function () {
            $('#comment_form').submit(function (e) {
                $(this).find('.has-error').removeClass('has-error');
                let button = $(this).find('button[type="submit"]');
                button.attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i>');
                e.preventDefault();
                let full_name = $('input[name="full_name"]');
                let email = $('input[name="email"]');
                let description = $('textarea[name="description"]');
                $(".error").remove();
                if (full_name.val().length < 1) {
                    full_name.addClass('has-error')
                    full_name.after('<span class="error">@lang('comments.full_name_required')</span>');
                    removedSpinner(button,false);
                    return;
                }
                if (description.val().length < 1) {
                    description.addClass('has-error')
                    description.after('<span class="error">@lang('comments.comment_required')</span>');
                    removedSpinner(button, false);
                    return;
                }
                if (email.val().length < 1) {
                    email.addClass('has-error')
                    email.after('<span class="error">@lang('comments.email_required')</span>');
                    removedSpinner(button, false);
                    return;
                }
                $.ajax({
                    url: '{{route($routePrefix.'news.storeComments',$news->id)}}',
                    method: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        "full_name": full_name.val(),
                        "description": description.val(),
                        "email": email.val(),
                        'news_id': '{{$news->id}}'
                    }, success: function (response) {
                        $('.server_message')
                            .css("display", "flex")
                            .addClass('alert-success')
                            .html(alertMessageWithClose(response.success));
                        removedSpinner(button, true);
                        $('#all_comments').addClass('active show');
                        $('#write_comments').removeClass('active');
                        $('.nav-tabs a[href="#write_comments"]').removeClass('active');
                        $('.nav-tabs a[href="#all_comments"]').addClass('active');
                    }, error: function (error) {
                        if (error.status === 500) {
                            $('.server_message')
                                .css('display', 'flex')
                                .addClass('alert-danger')
                                .html(alertMessageWithClose(error['responseJSON'].error));
                        } else {
                            let errors = error['responseJSON'].errors;
                            for (let e in errors) {
                                $('#comment_form').find('#' + e).addClass('').addClass('has-error')
                                    .after(`<span class="error">${errors[e]}</span>`);
                            }
                        }
                        removedSpinner(button, false);
                    }

                })


            });

        });
        $('#btn_write_comments').on('click', function () {
            $('#write_comments').addClass('active show');
            $('#all_comments').removeClass('active');
            $('.nav-tabs a[href="#write_comments"]').addClass('active');
            $('.nav-tabs a[href="#all_comments"]').removeClass('active');
        });
        const alertMessageWithClose = (message) => {
            return `
           <strong>${message}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
           `
        }
    </script>
@endpush


