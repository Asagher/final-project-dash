'use strict';

(function () {
  let in1 = document.getElementById('otc-1'),
    ins = document.querySelectorAll('input[type="number"]'),
    splitNumber = function (e) {
      let data = e.data || e.target.value; // Chrome doesn't get the e.data, it's always empty, fallback to value then.
      if (!data) return; // Shouldn't happen, just in case.
      if (data.length === 1) return; // Here is a normal behavior, not a paste action.

      popuNext(e.target, data);
      //for (i = 0; i < data.length; i++ ) { ins[i].value = data[i]; }
    },
    popuNext = function (el, data) {
      el.value = data[0]; // Apply first item to first input
      data = data.substring(1); // remove the first char.
      if (el.nextElementSibling && data.length) {
        // Do the same with the next element and next data
        popuNext(el.nextElementSibling, data);
      }
    };

  ins.forEach(function (input) {
    /**
     * Control on keyup to catch what the user intent to do.
     * I could have check for numeric key only here, but I didn't.
     */
    input.addEventListener('keyup', function (e) {
      // Break if Shift, Tab, CMD, Option, Control.
      if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e.keyCode == 17) {
        return;
      }

      // On Backspace or left arrow, go to the previous field.
      if (
        (e.keyCode === 8 || e.keyCode === 37) &&
        this.previousElementSibling &&
        this.previousElementSibling.tagName === 'INPUT'
      ) {
        this.previousElementSibling.select();
      } else if (e.keyCode !== 8 && this.nextElementSibling) {
        this.nextElementSibling.select();
      }

      // If the target is populated to quickly, value length can be > 1
      if (e.target.value.length > 1) {
        splitNumber(e);
      }
    });

    /**
     * Better control on Focus
     * - don't allow focus on other field if the first one is empty
     * - don't allow focus on field if the previous one if empty (debatable)
     * - get the focus on the first empty field
     */
    input.addEventListener('focus', function (e) {
      // If the focus element is the first one, do nothing
      if (this === in1) return;

      // If value of input 1 is empty, focus it.
      if (in1.value == '') {
        in1.focus();
      }

      // If value of a previous input is empty, focus it.
      // To remove if you don't wanna force user respecting the fields order.
      if (this.previousElementSibling.value == '') {
        this.previousElementSibling.focus();
      }
    });
  });

  /**
   * Handle copy/paste of a big number.
   * It catches the value pasted on the first field and spread it into the inputs.
   */
  in1.addEventListener('input', splitNumber);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var wizardValidationFormStep3 = document.getElementById('demoShip');
  const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
    // fields: {
    //   quantity: {
    //     validators: {
    //       notEmpty: {
    //         message: 'quantity is required'
    //       }
    //     }
    //   },
    //   category: {
    //     validators: {
    //       notEmpty: {
    //         message: 'category is required'
    //       }
    //     }
    //   },
    //   price_for_wight: {
    //     validators: {
    //       notEmpty: {
    //         message: 'price is required'
    //       }
    //     }
    //   },
    //   total_wight: {
    //     validators: {
    //       notEmpty: {
    //         message: 'wight is required'
    //       }
    //     }
    //   },
    //   line_total_cost: {
    //     validators: {
    //       notEmpty: {
    //         message: 'cost is required'
    //       }
    //     }
    //   }
    // },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        // eleInvalidClass: '',
        eleValidClass: ''
      }),
      autoFocus: new FormValidation.plugins.AutoFocus(),
      submitButton: new FormValidation.plugins.SubmitButton()
    }
  }).on('click', function () {});
  $('#submit-btn').click(function () {
    // Calculate total cost
    var total = 0;
    $('.shipment-line').each(function () {
      var quantity = $(this).find('.quantity').val();
      var price = $(this).find('.price_for_wight').val();
      var lineTotal = quantity * price;
      total += lineTotal;
    });

    // Display total
    $('#demoCalc').removeClass('d-none');
    $('#total-cost').text(total);
  });
  var catt = document.getElementById('category_shipment');
  console.log(catt);

  $('#category_shipment').change(function () {
    var categoryID = $(this).val();

    $.ajax({
      url: ''.concat(baseUrl, 'get-category-details/') + categoryID,
      type: 'GET',
      success: function (data) {
        $('#category-detail').empty();
        $.each(data, function (index, detail) {
          $('#category-detail').append('<option value="' + detail.id + '">' + detail.type + '</option>');
        });
      }
    });
  });

  function attachChangeHandler() {
    $('.shipment-line').on('change', '#category-detail', function () {
      var categoryName = $(this).find(':selected').text();
      var row = $(this).closest('.shipment-line');
      $.ajax({
        type: 'POST',
        url: ''.concat(baseUrl, 'form/wizard-icons/price'),
        data: {
          categoryName: categoryName
        },
        success: function (response) {
          row.find('.price_for_wight').val(response.price);
          row.find('.total_wight').val(response.weight);
        }
      });
    });
    $('.shipment-line').on('input', '.calculate-cost', function () {
      //   calculateLineTotalCost($(this).closest('.shipment-line'));
    });
  }
  attachChangeHandler();
})();
