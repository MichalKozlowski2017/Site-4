import noUiSlider from 'nouislider';

export default {
  init() {


  },
  finalize() {
    $(document).ready(function() {
      const slider1 = document.getElementById('slider1');
      const slider2 = document.getElementById('slider2');
      const slider1input = document.getElementById('slider1-input');
      const slider2input = document.getElementById('slider2-input');
      const rrsoInput = document.getElementById('rrso');
      const calcSum = document.getElementById('calcSum');

      function createSlider1() {
        noUiSlider.create(slider1, {
          start: 6000,
          step: 10,
          range: {
            'min': 500,
            'max': 150000,
          },
        });

        slider1.noUiSlider.on('update', function(value) {
          slider1input.value = value.toString().slice(0, -3);
          slider1input.style.width = ((slider1input.value.length + 1) * 14) + 'px';
        });

        slider1input.addEventListener('change', function() {
          slider1.noUiSlider.set([this.value, null]);
        });
      }

      function createSlider2(min, max, start) {
        noUiSlider.create(slider2, {
          start: start,
          step: 1,
          range: {
            'min': min,
            'max': max,
          },
        });

        slider2.noUiSlider.on('update', function(value) {
          slider2input.value = value.toString().slice(0, -3);
          slider2input.style.width = ((slider2input.value.length + 1) * 15) + 'px';
        });

        slider2input.addEventListener('change', function() {
          slider2.noUiSlider.set([this.value, null]);
        });
      }

      createSlider1();
      createSlider2(1, 120, 1);

      function rrso(installment, range) {
        let rrso;

        if (range == 16) {
          if (installment <= 31) {
            rrso = 1.60 * installment;
          } else {
            rrso = 50;
          }
        } else if (range == 12) {
          if (installment <= 41) {
            rrso = 1.20 * installment;
          } else {
            rrso = 50;
          }
        } else if (range == 10) {
          if (installment <= 49) {
            rrso = 1.00 * installment;
          } else {
            rrso = 50;
          }
        } else if (range == 7) {
          if (installment <= 71) {
            rrso = 0.70 * installment;
          } else {
            rrso = 50;
          }
        }
        return rrso.toFixed(2)
      }

      function calcMathSlider1() {
        var tax;
        var totalCost;
        var installment;
        var currentInstallment;
        slider1.noUiSlider.on('update', function(){
          if (parseInt(slider1.noUiSlider.get(), 10) <= 2000) {
              tax = 100;
              totalCost = tax;
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              currentInstallment = parseInt(slider2.noUiSlider.get(), 10);
              slider2.noUiSlider.destroy();
              createSlider2(1, 6, currentInstallment);
              calcMathSlider2();
              document.getElementById('installmentsButton').innerHTML = '6 rat';
            } else if (parseInt(slider1.noUiSlider.get(), 10) >= 2001 && parseInt(slider1.noUiSlider.get(), 10) <= 4999) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 16;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              currentInstallment = parseInt(slider2.noUiSlider.get(), 10);
              slider2.noUiSlider.destroy();
              createSlider2(1, 72, currentInstallment);
              calcMathSlider2();
              document.getElementById('installmentsButton').innerHTML = '72 rat';

            } else if (parseInt(slider1.noUiSlider.get(), 10) >= 5000 && parseInt(slider1.noUiSlider.get(), 10) <= 7999) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 12;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              currentInstallment = parseInt(slider2.noUiSlider.get(), 10);
              slider2.noUiSlider.destroy();
              createSlider2(1, 72, currentInstallment);
              calcMathSlider2();
              document.getElementById('installmentsButton').innerHTML = '72 rat';
            } else if (parseInt(slider1.noUiSlider.get(), 10) >= 8000 && parseInt(slider1.noUiSlider.get(), 10) <= 29999) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 10;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              currentInstallment = parseInt(slider2.noUiSlider.get(), 10);
              slider2.noUiSlider.destroy();
              createSlider2(1, 72, currentInstallment);
              calcMathSlider2();
              document.getElementById('installmentsButton').innerHTML = '72 rat';
            } else if (parseInt(slider1.noUiSlider.get(), 10) >= 30000 && parseInt(slider1.noUiSlider.get(), 10) <= 150000) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 7;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              currentInstallment = parseInt(slider2.noUiSlider.get(), 10);
              slider2.noUiSlider.destroy();
              createSlider2(1, 120, currentInstallment);
              calcMathSlider2();
              document.getElementById('installmentsButton').innerHTML = '120 rat';
            }
            calcSum.innerHTML = Math.floor(installment);
            document.getElementById('input_4_162').setAttribute('value', parseInt(slider1.noUiSlider.get(), 10));
        });
      }

      function calcMathSlider2() {
        var tax;
        var totalCost;
        var installment;
        slider2.noUiSlider.on('update', function(){
          if (parseInt(slider1.noUiSlider.get(), 10) <= 2000) {
              tax = 100;
              totalCost = tax;
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
            } else if (slider1.noUiSlider.get() >= 2001 && slider1.noUiSlider.get() <= 4999) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 16;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              rrsoInput.innerHTML = rrso(parseInt(slider2.noUiSlider.get()), 16);
            } else if (slider1.noUiSlider.get() >= 5000 && slider1.noUiSlider.get() <= 7999) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 12;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              rrsoInput.innerHTML = rrso(parseInt(slider2.noUiSlider.get()), 12);
            } else if (parseInt(slider1.noUiSlider.get(), 10) >= 8000 && parseInt(slider1.noUiSlider.get(), 10) <= 29999) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 10;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              rrsoInput.innerHTML = rrso(parseInt(slider2.noUiSlider.get()), 10);
            } else if (parseInt(slider1.noUiSlider.get(), 10) >= 30000 && parseInt(slider1.noUiSlider.get(), 10) <= 150000) {
              tax = parseInt(slider1.noUiSlider.get(), 10) / 1000 * 7;
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 10);
              installment = (parseInt(slider1.noUiSlider.get(), 10) + totalCost) / parseInt(slider2.noUiSlider.get(), 10);
              totalCost = tax * parseInt(slider2.noUiSlider.get(), 7);
              rrsoInput.innerHTML = rrso(parseInt(slider2.noUiSlider.get()), 7);
            }
            calcSum.innerHTML = Math.floor(installment);
            document.getElementById('input_4_163').setAttribute('value', parseInt(slider2.noUiSlider.get(), 10));

            // Form gf_page_steps
            if (document.getElementById('gf_step_4_1').classList.contains('gf_step_active')) {
              document.getElementById('gf_page_steps_4').style.display = 'none';
                $('.calc-wniosek').css('display', 'block');
            }

            jQuery(document).bind('gform_page_loaded', function(){
              if (document.getElementById('gf_step_4_1').classList.contains('gf_step_active')) {
                document.getElementById('gf_page_steps_4').style.display = 'none';
                $('.calc-wniosek, wniosek__content__wrapper__title').css('display', 'block');
              } else {
                $('.calc-wniosek, .wniosek__content__wrapper__title').css('display', 'none');
              }

              var steps = document.getElementsByClassName('gf_step_number');
              for (var i = 0; i <= 4; i++) {
                steps[i].innerHTML = i;
              }

            });
            $('.gf_step').css('display', 'none');
        });
      }

      calcMathSlider1();
      // calcMathSlider2();

      // jQuery('#gform_fields_4_5 .ginput_container_checkbox').mouseenter(function(){
      //   jQuery(this).animate({
      //     height: 200,
      //   });
      // });
      // jQuery('#gform_fields_4_5 .ginput_container_checkbox').mouseout('mouseout', function(){
      //   jQuery(this).animate({
      //     height: 50,
      //   });
      // });
    });
  },
};
