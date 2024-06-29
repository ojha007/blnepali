@extends('frontend.unicode.index')
@section('content')
    <div class="uk-section-default uk-section uk-section-small">
        <div class="uk-container uk-container-center">
            <form name="Form1">
                <div class="uk-grid uk-grid-small">
                    <div class="uk-width-1-2@m">
                        <label for="asciiArchive"> </label>
                        <textarea name="asciiArchive" id="asciiArchive" class="uk-textarea uk-width-1-1"
                                  onclick="asciiArchiveClick();"
                                  onkeyup="editArchive();" placeholder="Type Roman Here..." rows="12"> </textarea>

                        <label for="ascii"></label>
                        <textarea name="ascii" onblur="asciiBlur();" onclick="asciiClick();"
                                  onkeyup="beginConvert(event);" rows="1"
                                  id="ascii"
                                  style="display:none;">यहाँ टाईप गर्नुहोस् ।</textarea>
                    </div>
                    <div class="uk-width-1-2@m">
                        <label for="unicodeArchive"></label>
                        <textarea class="uk-textarea uk-width-1-1" name="unicodeArchive" id="unicodeArchive" readonly=""
                                  rows="12"></textarea>
                        <label for="unicode"></label>
                        <textarea id="unicode" name="unicode" readonly="" rows="1"
                                  size="70"
                                  style="display:none;"></textarea>
                    </div>
                </div>

                <input checked="checked" name="smartConverter_"
                       onclick="smartConverter(Form1.smartConverter_.checked);convert();" style="display:none;"
                       type="checkbox">


                <div class="uk-margin-top">
                    <div class="uk-grid uk-grid-small" uk-grid="">
                        <div class="uk-first-column">
                            <input class="uk-button uk-button-secondary uk-width-1-1" name="clear"
                                   onclick="clearInput();" type="button" value="Clear">
                        </div>

                        <div>
                            <input class="uk-button uk-button-primary uk-width-1-1" disabled="disabled"
                                   name="convertNow"
                                   onclick="convertArchive();"
                                   title="If the text is too large, press this button to convert." type="button"
                                   value="Convert Now">
                        </div>
                        <div>
                            <input class="uk-button uk-button-primary uk-width-1-1" name="sAll"
                                   onclick="selectAll(Form1.unicodeArchive);" style="margin-left: 5px;"
                                   title="On Internet Explorer, it will perform the 'Copy' command, too.
                       But not so on other browsers due to their limitations. For those, after selected, right click and select 'Copy' "
                                   type="button" value="Select All">
                        </div>
                        <div>
                            <select class="uk-select uk-width-1-1" name="htmlEncode" onchange="toggleHTML();">
                                <option selected="selected" value="false">Readable Unicode</option>
                                <option value="true">HTML Encoded Unicode</option>
                            </select>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{asset('/frontend/unicode/js/k.js')}}"></script>
    <script src="{{asset('/frontend/unicode/js/j.js')}}"></script>
    <script src="{{asset('/frontend/unicode/js/d.js')}}"></script>
@endpush
