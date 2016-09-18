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
		'//fonts.googleapis.com/css?family=Roboto',
		'//www.tinymce.com/css/codepen.min.css'
	]
	});

	$(".editbutton").text("Update");
	$(".editbutton").attr("onclick","updateContent(pagename)");

 }

 function dummy() {

 }

 function updateContent(pageName) {
            var url = "/core/contentupdate.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: {
					'page': pageName,
					'content': tinyMCE.activeEditor.getContent({format : 'raw'}) 
				},
                success: function(data) {
                    location.reload();
                }
            });

            return false; // avoid to execute the actual submit of the form.
        }
 </script>