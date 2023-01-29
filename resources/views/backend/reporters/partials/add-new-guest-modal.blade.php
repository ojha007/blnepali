<div id="add_guest" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {!! Form::open(['route'=>$routePrefix.'reporters.store','class'=>'bootstrap-modal-form form-horizontal','file'=>'true']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Guest</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12 form-group col-sm-12 {{$errors->has('name') ? 'has-error': ''}}">
                    <label for="name">Name<span class="asterisk">*</span></label>
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Guest Name']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-12  form-group col-sm-12 {{$errors->has('organization') ? 'has-error' : ''}}">
                    <label for="organization">Organization<span class="asterisk">*</span></label>
                    {!! Form::text('organization',null,['class'=>'form-control','placeholder'=>'Enter Guest Name']) !!}
                    {!! $errors->first('organization', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="col-md-12 form-group col-sm-12 {{$errors->has('file') ? 'has-error' : ''}}">
                    <label>Profile Picture<span class="asterisk">*</span></label>
                    <input type="file" class="form-control" name="guest_image" id="guest_image">
                    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="guest_submit_btn" name="action"
                        class="btn btn-primary btn-flat pull-right"
                        value="Add">
                    <i class="fa fa-save"></i> Submit

                </button>
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
