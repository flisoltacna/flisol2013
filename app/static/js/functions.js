function reDesign() {
	$('#contenido_guest').remove();
	loadHeader();
	loadContent();
	$('#header').fadeIn('slow');
};

function logOut() {
	$('#header').fadeOut('slow');
	$('#contenido_logged').fadeOut('slow');
	loadIndex();
	$('#contenido_logged').remove();
	$('#header').remove();
};

function loadHeader() {
	$('body').append('<div id="header"></div>');
	 $.ajax({
            type: 'POST',
            url: 'system/header.php',
            data: '',
            success: function(data) {
            $('#header').html(data);	
            }
        })      
};

function loadContent() {
	$('body').append('<div id="content_logged"></div>');
	 $.ajax({
            type: 'POST',
            url: 'system/content.php',
            data: '',
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
            $('#content_logged').html(data);	
            }
        })      
};

function loadIndex() {
	$('body').append('<div id="contenido_guest"></div>');
	 $.ajax({
            type: 'POST',
            url: 'system/index.php',
            data: '',
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
            $('#contenido_guest').html(data);	
            }
        })      
};

function uploadImage() {
	 $.ajax({
            type: 'POST',
            url: 'system/share.php',
            data: '',
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
           alert(data);   
            }
        })      
};