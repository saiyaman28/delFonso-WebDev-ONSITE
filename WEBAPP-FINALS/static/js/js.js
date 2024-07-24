document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('res_date').addEventListener('input', function(e) {
        var input = e.target;
        var date = new Date(input.value);
        console.log('Selected date:', date);
        console.log('Day of the week:', date.getDay());
        if (date.getDay() === 0) {
            input.value = '';
            alert('Sundays are not allowed. Please select another date.');
        }
    });
});

function res_list_del_cnfrm() {
    return confirm("Are you sure you want to cancel your reservation?");
}

function user_list_del_cnfrm() {
    return confirm("Are you sure you want to delete this user? This cannot be undone!");
}