@extends('frontend.unicode.index')
@section('content')
    <div>
        <div class="uk-section uk-section-default uk-section-small">
            <div class="uk-container uk-container-center">

                <form>
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-width-1-2@m">
                            <label for="legacy_text"></label>
                            <textarea class="textarea_unicode uk-textarea uk-width-1-1"
                                      id="legacy_text" name="TextToConvert" rows="12"
                                      style="font-family:Preeti; font-size:20px;line-height: 40px;"></textarea>
                        </div>

                        <div class="uk-width-1-2@m">
                            <label for="unicode_text"></label>
                            <textarea
                                class="textarea_unicode uk-textarea uk-width-1-1"
                                id="unicode_text" name="ConvertedText" rows="12"
                                style="font-size:20px;line-height: 40px;"></textarea>
                        </div>
                    </div>

                    <div class="uk-text-center unicode_roman">

                        <div class="unicode_cap_1 uk-margin-top">
                            <input accesskey="c"
                                   class="uk-button uk-button-primary uk-width-1-1"
                                   id="converter" name="converter"
                                   onclick="convert_to_unicode();"
                                   title="Click here to convert preeti to nepali unicode"
                                   type="button"
                                   value="Click here to convert preeti to unicode"/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('/frontend/unicode/js/preeti.js')}}"></script>
@endpush
