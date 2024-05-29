document.addEventListener('DOMContentLoaded', function() {
    var userMenu = document.getElementById('userMenu');
    var dropdownContent = document.querySelector('.dropdown-content');
    
    userMenu.addEventListener('click', function() {
        dropdownContent.classList.toggle('show');
    });
    
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            if (dropdownContent.classList.contains('show')) {
                dropdownContent.classList.remove('show');
            }
        }
    };
});