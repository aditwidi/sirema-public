/**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
    let borderColor, bodyBg, headingColor;

    if (isDarkStyle) {
        borderColor = config.colors_dark.borderColor;
        bodyBg = config.colors_dark.bodyBg;
        headingColor = config.colors_dark.headingColor;
    } else {
        borderColor = config.colors.borderColor;
        bodyBg = config.colors.bodyBg;
        headingColor = config.colors.headingColor;
    }

  // Variable declaration for table
  var dt_request_table = $('.datatables-request'),
    select2 = $('.select2'),
    userView = 'app-user-view-account.html',
    statusObj = {
    'pending': { title: 'Pending', class: 'bg-label-warning' },
    'disetujui': { title: 'Disetujui', class: 'bg-label-success' },
    'ditolak': { title: 'Ditolak', class: 'bg-label-danger' }
    };

    // Requests datatable
    if (dt_request_table.length) {
        var dt_request = dt_request_table.DataTable({
            ajax: `/api/admin/requests`, // JSON file to add data
            columns: [
                // columns according to JSON
                {
                    data: ''
                },
                {
                    data: 'nama_pengaju'
                },
                {
                    data: 'bentuk_request'
                },
                {
                    data: 'judul_request'
                },
                {
                    data: 'deadline'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action'
                }
            ],
            columnDefs: [{
                    // For Responsive
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // User full name and email
                    targets: 1,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var $name = full['nama_pengaju'],
                            $email = full['email'],
                            $image = full['avatar'];
                        if ($image) {
                            // For Avatar image
                            var $output =
                                '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
                        } else {
                            // For Avatar badge
                            var stateNum = Math.floor(Math.random() * 6);
                            var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                            var $state = states[stateNum],
                                $name = full['nama_pengaju'],
                                $initials = $name.match(/\b\w/g) || [];
                            $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                            $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                        }
                        // Creates full output for row
                        var $row_output =
                            '<div class="d-flex justify-content-start align-items-center user-name">' +
                            '<div class="avatar-wrapper">' +
                            '<div class="avatar avatar-sm me-3">' +
                            $output +
                            '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<span class="fw-semibold">' +
                            $name +
                            '</span>' +
                            '<small class="text-muted">' +
                            $email +
                            '</small>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    // Bentuk Request
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $bentuk = full['bentuk_request'];
                        var bentukBadgeObj = {
                          Design:
                            '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="ti ti-device-laptop ti-sm"></i></span>',
                          Liputan:
                            '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="ti ti-camera ti-sm"></i></span>',
                          Video:
                            '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="ti ti-brand-youtube ti-sm"></i></span>',
                          Kepenulisan:
                            '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="ti ti-pencil ti-sm"></i></span>',
                        };
                        return "<span class='text-truncate d-flex align-items-center'>" + bentukBadgeObj[$bentuk] + $bentuk + '</span>';
                      }
                },
                {
                    // Judul Request
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var $judul = full['judul_request'];

                        return '<span class="fw-semibold">' + $judul + '</span>';
                    }
                },
                {
                    // Deadline Request
                    targets: 4,
                    render: function (data, type, full, meta) {
                        var $deadline = full['deadline'];

                        return '<span class="fw-semibold">' + $deadline + '</span>';
                    }
                },
                {
                    // User Status
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status = full['status'];

                        return (
                            '<span class="badge ' +
                            statusObj[$status].class +
                            '" text-capitalized>' +
                            statusObj[$status].title +
                            '</span>'
                        );
                    }
                },
                {
                    // Actions
                    targets: -1,
                    title: 'Actions',
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {
                      // Check the status of the row
                      var $status = full['status'];

                      if ($status === 'disetujui') {
                        // If status is 'Disetujui', only show the view (eye) action
                        return (
                            `<div class="d-flex justify-content-center align-items-center">` +
                            `<a href="/admin/detail-request/request/${full.id}" class="text-body"><i class="ti ti-eye ti-sm me-2"></i></a>` +
                            `</div>`
                            );
                      } else if ($status === 'pending') {
                        // For all other statuses, show all actions
                        return (
                          `<div class="d-flex align-items-center">` +
                          `<a href="/admin/detail-request/request/${full.id}" class="text-body"><i class="ti ti-eye ti-sm me-2"></i></a>` +
                          `<a href="/admin/edit-request/request/${full.id}" class="text-body"><i class="ti ti-edit ti-sm mx-2"></i></a>` +
                          `<a href="javascript:;" class="text-body" onclick="deleteRequest(${full.id});"><i class="ti ti-trash ti-sm mx-1"></i></a>` +
                          `</div>`
                        );
                      } else if ($status === 'ditolak') {
                        // For all other statuses, show all actions
                        return (
                          `<div class="d-flex justify-content-center align-items-center">` +
                          `<a href="/admin/detail-request/request/${full.id}" class="text-body"><i class="ti ti-eye ti-sm me-2"></i></a>` +
                          `<a href="javascript:;" class="text-body" onclick="deleteRequest(${full.id});"><i class="ti ti-trash ti-sm mx-1"></i></a>` +
                          `</div>`
                        );
                      }
                    }
                  }
            ],
            order: [
                [5, 'desc']
            ],
            dom: '<"row me-2"' +
                '<"col-md-2"<"me-3"l>>' +
                '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                '>t' +
                '<"row mx-2"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: '_MENU_',
                search: '',
                searchPlaceholder: 'Search..'
            },
            // Buttons with Dropdown
            buttons: [{
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle mx-3',
                    text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                    buttons: [{
                            extend: 'print',
                            text: '<i class="ti ti-printer me-2" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be print
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            },
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css('color', headingColor)
                                    .css('border-color', borderColor)
                                    .css('background-color', bodyBg);
                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('color', 'inherit')
                                    .css('border-color', 'inherit')
                                    .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti ti-file-text me-2" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti ti-copy me-2" ></i>Copy',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        }
                    ]
                },
                {
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Ajukan Request</span>',
                    className: 'add-new btn btn-primary',
                    action: function (e, dt, button, config) {
                        window.location = '/admin/ajukan-request';
                    }
                }
            ],
            // For responsive popup
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details Request ' + data['judul_request'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ?
                                '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>' :
                                '';
                        }).join('');

                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            },
            initComplete: function () {
                // Adding role filter once table initialized
                this.api()
                    .columns(2)
                    .every(function () {
                        var column = this;
                        var select = $(
                                '<select id="BentukRequest" class="form-select text-capitalize"><option value=""> Select Bentuk Request </option></select>'
                            )
                            .appendTo('.bentuk_request')
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
                // Adding status filter once table initialized
                this.api()
                    .columns(5)
                    .every(function () {
                        var column = this;
                        var select = $(
                                '<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>'
                            )
                            .appendTo('.status_request')
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append(
                                    '<option value="' +
                                    statusObj[d].title +
                                    '" class="text-capitalize">' +
                                    statusObj[d].title +
                                    '</option>'
                                );
                            });
                    });
            }
        });
    }

    // Delete Record
    $('.datatables-users tbody').on('click', '.delete-record', function () {
        dt_request.row($(this).parents('tr')).remove().draw();
    });

    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
        $('.dataTables_filter .form-control').removeClass('form-control-sm');
        $('.dataTables_length .form-select').removeClass('form-select-sm');
    }, 300);
});

function deleteRequest(id) {
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Anda akan menghapus salah satu data pengajuan request Anda!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3D5EE1',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus Data!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `/api/requests/delete/${id}`, // Ensure this matches your API route
          type: 'DELETE',
          success: function(response) {
            Swal.fire(
              'Terhapus!',
              'Data pengajuan request Anda telah dihapus.',
              'success'
            ).then(() => {
              window.location.reload(); // Reload the page after showing the success message
            });
          },
          error: function(xhr, status, error) {
            Swal.fire(
              'Error!',
              'Terjadi kesalahan saat menghapus data: ' + error,
              'error'
            );
          }
        });
      }
    });
}

// Validation & Phone mask
(function () {
    const phoneMaskList = document.querySelectorAll('.phone-mask'),
        addNewUserForm = document.getElementById('addNewUserForm');

    // Phone Number
    if (phoneMaskList) {
        phoneMaskList.forEach(function (phoneMask) {
            new Cleave(phoneMask, {
                phone: true,
                phoneRegionCode: 'US'
            });
        });
    }
    // Add New User Form Validation
    const fv = FormValidation.formValidation(addNewUserForm, {
        fields: {
            userFullname: {
                validators: {
                    notEmpty: {
                        message: 'Please enter fullname '
                    }
                }
            },
            userEmail: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your email'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                // Use this for enabling/changing valid/invalid class
                eleValidClass: '',
                rowSelector: function (field, ele) {
                    // field is the field name & ele is the field element
                    return '.mb-3';
                }
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            // Submit the form when all fields are valid
            // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            autoFocus: new FormValidation.plugins.AutoFocus()
        }
    });
})();
