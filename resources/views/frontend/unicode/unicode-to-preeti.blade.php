@extends('frontend.unicode.index')
@section('content')
    <div class="uk-section-default uk-section uk-section-small">
        <div class="uk-container uk-container-center">

            <form>
                <div class="uk-grid uk-grid-small">
                    <div class="uk-width-1-2@m">
                        <label for="unicode_text"></label>
                        <textarea id="unicode_text" name="unicode" rows="12"
                                  class="uk-textarea uk-width-1-1"
                                  placeholder="Paste Nepali Unicode text here"
                                  style="font-size:20px;line-height: 40px;"></textarea>
                    </div>

                    <div class="uk-width-1-2@m">
                        <label for="legacy_text"></label>
                        <textarea id="legacy_text" name="text" rows="12"
                                  style="font-family:Preeti;font-size:20px;line-height: 40px;"
                                  class="uk-textarea uk-width-1-1"></textarea>
                    </div>
                </div>


                <div class="uk-margin-top uk-text-center">

                    <div><input class="uk-button uk-button-primary uk-width-1-1" id="converter" name="unicode"
                                onclick="convert_to_Preeti();" style="font-size: 13px;line-height: 30px;"
                                title="Click here to convert unicode to preeti" type="button"
                                value="Click here to convert unicode to preeti">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('/frontend/unicode/js/f1.js')}}"></script>
    <script src="{{asset('/frontend/unicode/js/f2.js')}}"></script>
    <script src="{{asset('/frontend/unicode/js/f3.js')}}"></script>
@endpush
