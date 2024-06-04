document.addEventListener('DOMContentLoaded', function() {
    const logoutLinks = document.querySelectorAll('.logout-link');
    logoutLinks.forEach(logoutLink => {
    const logoutLinks = document.querySelectorAll('.logout-link');
    logoutLinks.forEach(logoutLink => {
        logoutLink.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Anda yakin ingin keluar?',
                text: "Anda akan keluar dari sesi saat ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });
    });
});
});
