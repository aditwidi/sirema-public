// File: public/js/app-validasirequest-formulaUser.js
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('namaPengaju').addEventListener('input', function() {
        if (!/^[A-Za-z\s]+$/.test(this.value)) {
            alert('Nama pengaju hanya boleh mengandung huruf dan spasi');
        }
    });

    document.getElementById('nomorHandphone').addEventListener('input', function() {
        if (!/^[0-9+]+$/.test(this.value)) {
            alert('Nomor telepon hanya boleh mengandung angka dan karakter +');
        }
    });

    document.getElementById('judulRequest').addEventListener('input', function() {
        if (!/^[A-Za-z0-9\s\-]+$/.test(this.value)) {
            alert('Judul request hanya boleh mengandung huruf, angka, spasi, dan dash (-)');
        }
    });
});
