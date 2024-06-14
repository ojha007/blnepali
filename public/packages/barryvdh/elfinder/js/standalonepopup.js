$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    let updateID = $(this).attr('data-inputid'); // Btn id clicked
    let elfinderUrl = 'np/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    let triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '90%',
        height: '90%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    $('#' + requestingField).val(filePath).trigger('change');
    $('#holder').attr('src', filePath)
    $('#holder_href').attr('href', filePath)
}
