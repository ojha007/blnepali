<div class="form-group
@if(isset($class))
{{$class}}
@else
    'col-md-12'
@endif"
     style="padding-right: 0">
    <label for="fieldID4">{{$label ?? 'Banner Picture'}}</label>
    <div class="input-group">
                   <span class="input-group-btn btn-flat">
                     <a id="banner_image" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                       <i class="fa fa-picture-o"></i>
                         Choose
                     </a>
                   </span>
        <label for="image_label">
        </label>
        <input type="text" id="image_label" class="form-control" name="{{$name}}">
    </div>
    @if(isset($holder))
        <img id="holder" style="margin-top:15px;max-height:100px;" alt="">
    @endif
</div>
