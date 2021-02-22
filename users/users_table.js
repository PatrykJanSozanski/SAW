$(document).ready(function() {
    $('#users').DataTable({
        "ajax": "./select_users.php"
    });
});