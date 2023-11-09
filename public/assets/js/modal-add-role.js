/**
 * Add new role Modal JS
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // edit role
    $(document).on('click', '.role-edit-modal', function () {
      var role_id = $(this).data('id');

      // get data
      $.get(''.concat(baseUrl, 'access-roles/').concat(role_id, '/edit'), function (data) {
        $('#modalRoleName').val(data.name);
      });

      // On edit role click, update text
    });

    // add role form validation
    var fr = FormValidation.formValidation(document.getElementById('addRoleForm'), {
      fields: {
        modalRoleName: {
          validators: {
            notEmpty: {
              message: 'Please enter role name'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // Get form data
      var n = $('#addRoleForm').serialize();
      console.log(n);

      $.ajax({
        data: $('#addRoleForm').serialize(),
        url: ''.concat(baseUrl, 'access-roles'),
        type: 'POST',

        success: function success(status) {
          let card = renderRoleCard(status.data);
          $('#cardsContainer').before(card);

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status.message, '!'),
            text: 'Role '.concat(status.message, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          Swal.fire({
            title: 'Duplicate Entry!',
            text: 'Your role should be unique.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });

    function renderRoleCard(data) {
      let name = data.name;
      let role_id = data.id;
      let card = `
      <div class="col-xl-4 col-lg-6 col-md-6 ">
      <div class="card data-anas">
      <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
          <h6 class="fw-normal">Total 7 users</h6>
          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Jimmy Ressula" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{asset('assets/img/avatars/4.png')}}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kristi Lawker" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{asset('assets/img/avatars/15.png')}}" alt="Avatar">
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Danny Paul" class="avatar avatar-sm pull-up">
              <img class="rounded-circle" src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar">
            </li>
          </ul>
        </div>
        <div class="d-flex justify-content-between align-items-end">
          <div class="role-heading">

              <h4 class="mb-1">  ${name} </h4>

            <a href="javascript:;" data-bs-toggle="modal" data-id=${role_id} data-bs-target="#addRoleModal" class="role-edit-modal"><small>Edit Role</small></a>
          </div>
          <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
        </div>
      </div>
    </div>
    </div>
      `;
      (function () {
        // On edit role click, update text
        var roleEditList = document.querySelectorAll('.role-edit-modal'),
          roleAdd = document.querySelector('.add-new-role'),
          roleTitle = document.querySelector('.role-title');

        roleAdd.onclick = function () {
          roleTitle.innerHTML = 'Add New Role'; // reset text
        };
        if (roleEditList) {
          roleEditList.forEach(function (roleEditEl) {
            roleEditEl.onclick = function () {
              roleTitle.innerHTML = 'Edit Role'; // reset text
            };
          });
        }
      })();

      return card;
    }
    $.ajax({
      url: ''.concat(baseUrl, 'access-roles'),
      success: function (roles) {
        roles.forEach(role => {
          let card = renderRoleCard(role);
          $('#cardsContainer').before(card);
        });
      }
    });

    // Select All checkbox click
    const selectAll = document.querySelector('#selectAll'),
      checkboxList = document.querySelectorAll('[type="checkbox"]');
    selectAll.addEventListener('change', t => {
      checkboxList.forEach(e => {
        e.checked = t.target.checked;
      });
    });
  })();
});
