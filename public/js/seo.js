$(document).on('keyup','#slug-text',function() {
    let str = $(this).val();
    str = str.toLowerCase();
    var regExp = /\s+/g;
    str = str.replace(regExp,'-');
    $(this).val(str);
});