$('.btnGrid').on('click', function() {
	$('.grid-view').removeClass('d-none');
	$('.list-view').addClass('d-none');
})

$('.btnList').on('click', function() {
	$('.list-view').removeClass('d-none');
	$('.grid-view').addClass('d-none');
})

$('.btnMenu').on('click', function() {
  $('.sidebar-app').toggleClass('active');
})

$('.btnClose').on('click', function() {
  $('.sidebar-app').removeClass('active');
})

$('.addBtnModalStream').on('click', function() {
  $('.modalAddStream').modal('show');
})

$('.addBtnModalPermission').on('click', function() {
  $('.modalAddPermission').modal('show');
})

$('.editBtnModalPermission').on('click', function() {
  $('.modalEditPermission').modal('show');
})

$('.btnExport').on('click', function() {
  $('.modalExport').modal('show');
})

$('.btnAdd').on('click', function() {
  $('.modalAdd').modal('show');
})

$('.btnAdd2').on('click', function() {
  $('.modalAdd2').modal('show');
})

var date = new Date();
date.setDate(date.getDate());
$('.input-daterange').datepicker({
	clearBtn: true,
	startDate: date,
	autoclose: true, 
	todayHighlight: true
});

$('#participantsList').DataTable({
  "columnDefs": [
    { "orderable": false, "targets": 3 },
  ]
});
$('#registrationList').DataTable({
  "columnDefs": [
    { "orderable": false, "targets": 2 },
  ]
});
$('#participantsListEdit').DataTable({});
$('#matchtsList').DataTable({
});
$('#placement').DataTable({
  "columnDefs": [
    { "orderable": false, "targets": 0 },
  ]
});
$('#placement2').DataTable({
  "columnDefs": [
    { "orderable": false, "targets": 0 },
  ]
});

function showHidePasswordfn() {
  var showHideBtn = $(this);
  var showHideText = showHideBtn;
  var $pwd =  showHideBtn.closest(".input-group-prepend").prev('input');

  $(showHideBtn).toggleClass('toggleShowHide');
  showHideText.text(showHideBtn.is('.toggleShowHide') ? 'Hide' : 'Show');

  if ($pwd.attr('type') === 'password') {
    $pwd.attr('type', 'text');
  } else {
    $pwd.attr('type', 'password');
  }
}

// On Click.
$('.btn-pwd').on('click', showHidePasswordfn);

