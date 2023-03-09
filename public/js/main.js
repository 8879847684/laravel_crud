var MYAPP = MYAPP || {};
MYAPP.common = {
    base_url: baseUrl,
    routeName: segment1,
    segment1: segment2,
    segment2: segment3,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    convertToSlug: function(Text) {
        return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    }
};

$(document).ready(function() {
    $('.flatpickr').flatpickr({
        enableTime: false,
        // dateFormat: 'Y-m-d G:i K',
        dateFormat: 'Y-m-d',
        minDate: 'today',
        //disable: disabledDate // ["2022-11-18", "2022-11-20", "2022-11-28"]
    });
});
