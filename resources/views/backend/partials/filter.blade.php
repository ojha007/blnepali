<div class="box-header filterHeader">
    <div class="row">
       <div class="col-md-12">
           @if(isset($filterBy))
               @if(is_array($filterBy))
                   @foreach($filterBy as $key=>$filter)
                       <div class="form-group col-md-3">
                           {!! Form::select($key, $filter, request()->get($key) ,
                                array('placeholder' => ucwords(str_replace('_',' ',$key)),
                           'class' => 'form-control  select2', 'style'=>'width:100%;')) !!}
                       </div>
                   @endforeach
               @endif
           @endif
       </div>
    </div>
</div>
