var ipicker = new Pikaday(
	{
		field: document.getElementById('idate'),
		format: 'DD/MM/YYYY'
	});
	
var epicker = new Pikaday(
	{
		field: document.getElementById('edate'),
		format: 'DD/MM/YYYY'
	});

var aipicker = new Pikaday(
	{
		field: document.getElementById('aidate'),
		format: 'DD/MM/YYYY'
	});
	
var tipicker = new Pikaday(
	{
		field: document.getElementById('tidate'),
		format: 'DD/MM/YYYY'
	});
	
var aepicker = new Pikaday(
	{
		field: document.getElementById('aedate'),
		format: 'DD/MM/YYYY'
	});
	
var tepicker = new Pikaday(
	{
		field: document.getElementById('tedate'),
		format: 'DD/MM/YYYY'
	});
	
var cipicker = new Pikaday(
	{
		field: document.getElementById('cidate'),
		format: 'DD/MM/YYYY'
	});
	
var cepicker = new Pikaday(
	{
		field: document.getElementById('cedate'),
		format: 'DD/MM/YYYY'
	});


$('#name option').on('click', function() {
	$('#iuid').val($('#name')[0].selectedIndex);
});

$('#segment option').on('click', function() {
	$('#euid').val($('#segment')[0].selectedIndex);
});