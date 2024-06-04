document.addEventListener('DOMContentLoaded', async function() {
    var dataRequestForm = document.getElementById('dataRequestForm');
    var editRequestForm = document.getElementById('editRequestForm');
    var adminRequestForm = document.getElementById('adminRequestForm'); // New variable for admin form
    var adminEditRequestForm = document.getElementById('adminEditRequestForm');
    var adminAddUserForm = document.getElementById('adminAddUserForm');
    var adminEditRoleForm = document.getElementById('adminEditRoleForm');
    var adminEditTolakRequestForm = document.getElementById('adminEditTolakRequestForm');
    var terimaProjectForm = document.querySelector('form[action*="terima-project"]');
    var tolakProjectForm = document.getElementById('personilTolakProject');
    var selesaikanProjectForm = document.getElementById('personilSelesaikanProject');
    window.maxPersonil = await fetchMaxPersonil();
    console.log("Max Personil is set to:", window.maxPersonil);


    async function fetchMaxPersonil() {
        try {
            const response = await fetch('/api/count-personil'); // Make sure this URL is correct
            const data = await response.json(); // Parse the JSON from the response
            console.log(data); // Check to make sure 'data' is what you expect
            return data.personilCount; // Make sure 'personilCount' is a number in the response
        } catch (error) {
            console.error('Error fetching personil count:', error);
            return 0; // Return a default or error value
        }
    }



    function isValidRequiredPersonil(inputValue) {
        const requiredPersonil = parseInt(inputValue, 10); // Parse it as an integer
        // Now use window.maxPersonil to access the fetched value
        return !isNaN(requiredPersonil) && requiredPersonil >= 1 && requiredPersonil <= window.maxPersonil;
    }

    function isValidName(inputValue) {
        return /^[A-Za-z\s]+$/.test(inputValue);
    }

    function isValidPhoneNumber(inputValue) {
        return /^\d{9,12}$/.test(inputValue);
        // return /^[0-9]+$/.test(inputValue);
    }

    function isValidTitle(inputValue) {
        return /^[A-Za-z0-9\s\-]+$/.test(inputValue);
    }

    function isValidDeadline(inputValue) {
        return inputValue.trim() !== ''; // Memastikan bahwa deadline tidak kosong
    }

    function isValidComment(inputValue) {
        // Basic validation to disallow script tags and suspicious SQL commands
        var scriptTagPattern = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
        var sqlInjectionPattern = /('|";|--|\b(SELECT|DELETE|INSERT|UPDATE|DROP)\b)/gi;
        return !(scriptTagPattern.test(inputValue) || sqlInjectionPattern.test(inputValue));
    }

    function handleSelesaikanProjectFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesaikan projek ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData(form);

                    $.ajax({
                        url: form.action,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire(
                                'Selesai!',
                                'Projek telah diselesaikan.',
                                'success'
                            ).then(function() {
                                window.location.href = redirectUrl;
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Kesalahan', 'Terjadi kesalahan saat menyelesaikan proyek.', 'error');
                        }
                    });
                }
            });
        });
    }

    function handleTolakProjectFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var commentInput = form.querySelector('textarea[name="comment"]');
            var personilInput = form.querySelector('input[name="personil"]');
            var requiredPersonil = personilInput.dataset.requiredPersonil;

            // Validate comment
            if (!commentInput.value.trim() || !isValidComment(commentInput.value)) {
                Swal.fire('Kesalahan', 'Alasan penolakan tidak boleh kosong atau mengandung karakter yang tidak diizinkan', 'error');
                return;
            }

            // Validate personil pengganti, if required
            if (requiredPersonil && !personilInput.value.trim()) {
                Swal.fire('Kesalahan', 'Personil pengganti harus diisi', 'error');
                return;
            }

            var formData = new FormData(form);

            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Proyek telah berhasil ditolak',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = redirectUrl;
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Kesalahan', 'Terjadi kesalahan saat menolak proyek.', 'error');
                }
            });
        });
    }

    function handleTerimaProjectFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(form);

            // Optionally add any validations here

            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Projek telah berhasil diterima',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = redirectUrl;
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Kesalahan', 'Terjadi kesalahan saat menerima proyek.', 'error');
                }
            });
        });
    }

    function handleAdminEditTolakRequestFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(form);

            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Permintaan telah berhasil diperbarui',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = redirectUrl;
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Kesalahan', 'Terjadi kesalahan saat memperbarui permintaan.', 'error');
                }
            });
        });
    }

    function handleEditRoleFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(form);


            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Permintaan telah berhasil diperbarui',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = redirectUrl;
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Kesalahan', 'Terjadi kesalahan saat memperbarui permintaan.', 'error');
                }
            });
        });
    }

    function handleAdminAddUserFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var nameInput = form.querySelector('input[name="name"]');
            var emailInput = form.querySelector('input[name="email"]');
            var passwordInput = form.querySelector('input[name="password"]');
            var roleSelect = form.querySelector('select[name="role"]');
            var divisiSelect = form.querySelector('select[name="divisi"]');

            if (!isValidName(nameInput.value)) {
                Swal.fire('Kesalahan', 'Nama pengaju hanya boleh mengandung huruf dan spasi', 'error');
                return;
            }

            // Check divisi select only if the role is 'Personil' and it's visible
            if (roleSelect.value === 'Personil' && divisiSelect.style.display !== 'none' && !divisiSelect.value) {
                Swal.fire('Error', 'Please select a divisi.', 'error');
                return;
            }

            // If validation passes, prepare and send the AJAX request
            var formData = new FormData(form);

            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Akun telah berhasil dibuat.',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = redirectUrl;
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Kesalahan', 'Terjadi kesalahan saat memperbarui permintaan.', 'error');
                }
            });
        });

    }

    function handleFormSubmit(form, redirectUrl) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var emptyFields = [];
            var requiredPersonilInput = this.querySelector('input[name="required_personil"]');
            var requiredPersonilValue = requiredPersonilInput.value;
            var nameInput = this.querySelector('input[name="nama_pengaju"]');
            var phoneNumberInput = this.querySelector('input[name="nomor_telepon_pengaju"]');
            var titleInput = this.querySelector('input[name="judul_request"]');
            var deadlineInput = this.querySelector('input[name="deadline"]');

            if (!nameInput.value.trim()) emptyFields.push("Nama Pengaju");
            if (!phoneNumberInput.value.trim()) emptyFields.push("Nomor Telepon");
            if (!titleInput.value.trim()) emptyFields.push("Judul Request");
            if (deadlineInput && !deadlineInput.value.trim()) emptyFields.push("Deadline");

            if (emptyFields.length > 1) {
                Swal.fire('Kesalahan', 'Field yang belum diisi: ' + emptyFields.join(', '), 'error');
                return;
            }
            if (!isValidDeadline(deadlineInput.value)) {
                Swal.fire('Kesalahan', 'Deadline tidak boleh kosong', 'error');
                return;
            }

            if (!nameInput.value.trim()) {
                Swal.fire('Kesalahan', 'Nama pengaju tidak boleh kosong', 'error');
                return;
            }

            if (!phoneNumberInput.value.trim()) {
                Swal.fire('Kesalahan', 'Nomor telepon tidak boleh kosong', 'error');
                return;
            }

            if (!titleInput.value.trim()) {
                Swal.fire('Kesalahan', 'Judul request tidak boleh kosong', 'error');
                return;
            }

            if (!isValidName(nameInput.value)) {
                Swal.fire('Error', 'Nama pengaju hanya boleh mengandung huruf dan spasi', 'error');
                return;
            }

            if (!isValidPhoneNumber(phoneNumberInput.value)) {
                Swal.fire('Error', 'Nomor telepon hanya boleh mengandung angka dan berjumlah 9-12 digit', 'error');
                return;
            }

            if (!isValidTitle(titleInput.value)) {
                Swal.fire('Error', 'Judul request hanya boleh mengandung huruf, angka, spasi, dan dash (-)', 'error');
                return;
            }

            if (!isValidRequiredPersonil(requiredPersonilInput.value)) {
                Swal.fire('Error', `Jumlah orang yang dibutuhkan harus antara 1 dan ${window.maxPersonil}`, 'error');
                return; // stop here if not valid
            }

            var phoneInput = this.querySelector('input[name="nomor_telepon_pengaju"]');
            var phoneNumber = phoneInput.value;
            if (!phoneNumber.startsWith('+62')) {
                phoneInput.value = '+62' + phoneNumber;
            }

            var formData = new FormData(this);

            // Specific logic for adminEditRequestForm
            if (form.id === 'adminEditRequestForm') {
                var tagifyInput = document.querySelector('#TagifyUserList');
                if (tagifyInput) {
                    var tagify = new Tagify(tagifyInput);
                    var personilIDs = tagify.value.map(item => item.value);
                    personilIDs.forEach(id => formData.append('personil[]', id));
                }
            }

            $.ajax({
                url: this.action,
                type: this.method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data pengajuan request telah disimpan',
                        icon: 'success'
                    }).then(function() {
                        window.location.href = redirectUrl;
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire('Kesalahan', 'Terjadi kesalahan saat memperbarui permintaan.', 'error');
                }
            });
        });
    }



    if (dataRequestForm) {
        handleFormSubmit(dataRequestForm, '/user/list-request');
    }

    if (editRequestForm) {
        handleFormSubmit(editRequestForm, '/user/list-request');
    }

    // Handling the admin form submission
    if (adminRequestForm) {
        handleFormSubmit(adminRequestForm, '/admin/list-request'); // Redirect to the admin specific URL
    }

    // Handling the admin form submission
    if (adminEditRequestForm) {
        handleFormSubmit(adminEditRequestForm, '/admin/list-request'); // Redirect to the admin specific URL
    }

    if (adminAddUserForm) {
        handleAdminAddUserFormSubmit(adminAddUserForm, '/admin/list-user'); // Adjust the redirect URL as needed
    }

    if (adminEditRoleForm) {
        handleEditRoleFormSubmit(adminEditRoleForm, '/admin/list-user'); // Adjust the redirect URL as needed
    }

    if (adminEditTolakRequestForm) {
        handleAdminEditTolakRequestFormSubmit(adminEditTolakRequestForm, '/admin/list-request'); // Adjust the redirect URL as needed
    }

    if (terimaProjectForm) {
        handleTerimaProjectFormSubmit(terimaProjectForm, '/personil/list-request'); // Adjust the redirect URL as needed
    }

    if (tolakProjectForm) {
        handleTolakProjectFormSubmit(tolakProjectForm, '/personil/list-request'); // Adjust the redirect URL as needed
    }

    if (selesaikanProjectForm) {
        handleSelesaikanProjectFormSubmit(selesaikanProjectForm, '/personil/list-project'); // Adjust the redirect URL as needed
    }

});
