var currentStep = 1;

$('#next-btn').click(function() {
  if (currentStep < 4) {
    $('#step' + currentStep).removeClass('active');
    currentStep++;
    $('#step' + currentStep).addClass('active');
  }
});

$('#prev-btn').click(function() {
  if (currentStep > 1) {
    $('#step' + currentStep).removeClass('active');
    currentStep--;
    $('#step' + currentStep).addClass('active');
  }
});