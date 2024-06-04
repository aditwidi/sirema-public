/**
 * Page Request List
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
    },
    progresObj = {
        'On Going': { title: 'On Going', class: 'bg-label-warning' },
        'Selesai': { title: 'Selesai', class: 'bg-label-success' },
        '-': { title: '-', class: 'bg-label-secondary' }
    };

  if (select2.length) {
    var $this = select2;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Country',
      dropdownParent: $this.parent()
    });
  }

  // Request datatable
  if (dt_request_table.length) {
    const user_id = document.getElementById('user_id').value;
    var dt_request = dt_request_table.DataTable({
      ajax: `/api/projects/personil/${user_id}`, // JSON file to add data
      pageLength: 5,
      lengthChange: false,
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'nama_pengaju' },
        { data: 'bentuk_request' },
        { data: 'judul_request' },
        { data: 'progres' }
      ],
      columnDefs: [
        {
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
            // Progres Request
            targets: -1,
            render: function (data, type, full, meta) {
              var $progres = full['progres'];

              return (
                '<span class="badge ' +
                progresObj[$progres].class +
                '" text-capitalized>' +
                progresObj[$progres].title +
                '</span>'
              );
            }
          }
      ],
      order: [[1, 'desc']],
      dom:
        '<"row me-2"' +
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
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['nama_pengaju'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
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
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
    });
  }

  // Delete Record
  $('.datatables-users tbody').on('click', '.delete-record', function () {
    dt_user.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

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
