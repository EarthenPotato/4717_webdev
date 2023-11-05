// plus-minus-input.js
function modifyNumber(type, input) {
    var currentVal = parseInt(input.value, 10);
    if (!isNaN(currentVal)) {
      if (type === 'minus') {
        if (currentVal > parseInt(input.min, 10)) {
          input.value = currentVal - 1;
        }
      } else if (type === 'plus') {
        input.value = currentVal + 1;
      }
    } else {
      input.value = 0;
    }
  }
  
  document.addEventListener('DOMContentLoaded', function(event) {
    document.querySelectorAll('.plus-minus-input button').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var input = this.parentNode.querySelector('input[type=number]');
        var type = this.classList.contains('plus') ? 'plus' : 'minus';
        modifyNumber(type, input);
      });
    });
  });
  