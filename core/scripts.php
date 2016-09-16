<script>
function edit() {
	tinymce.init({
	selector: '.editable',
	height: 500,
	theme: 'modern',
	plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	automatic_uploads: true,
	file_browser_callback_types: 'file image media',
	file_picker_types: 'file image media',
	images_upload_base_path: '/assets/uploads/',
	content_css: [
		'//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
	]
	});
 }
 </script>