$(document).ready(function () {
    $('#list-table').DataTable({
        searching: false,
        ordering: false
    });

});
function clearSearchForm() {
    $(':input', '#searchForm')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .prop('checked', false)
        .prop('selected', false);
}