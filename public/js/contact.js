document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.form-group').forEach(function(group) {
        if (group.querySelector('input[type="checkbox"], input[type="radio"]')) {
            group.classList.add('no-border');
        }
    });
});