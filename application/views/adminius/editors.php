               <div class="span9" id="content">
                	<div class="row-fluid">
		                <div class="span9" id="content">
		                    <div class="row-fluid">
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">CKEditor Full</div>
		                            </div>
		                            <div class="block-content collapse in">
		                              <textarea id="ckeditor_full"></textarea>
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
                        <div class="span4" id="content">
                            <div id="row-fluid">
                                <div id="block">
                                    <div class="navbar navbar-inner block-header">
                                        <div class="muted pull-left">asdas</div>
                                    </div>
                                    <div class="block-content collapse in">
                                        asdasda
                                    </div>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        </div>

        <!--/.fluid-container-->
        <script src="<?php  echo base_url('assets/adminius/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js');?>"></script>
        <script src="<?php  echo base_url('assets/adminius/vendors/jquery-1.9.1.min.js');?>"></script>
        <script src="<?php  echo base_url('assets/adminius/bootstrap/js/bootstrap.min.js');?>"></script>
		<script src="<?php  echo base_url('assets/adminius/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js');?>"></script>

		<script src="<?php  echo base_url('assets/adminius/vendors/ckeditor/ckeditor.js');?>"></script>
		<script src="<?php  echo base_url('assets/adminius/vendors/ckeditor/adapters/jquery.js');?>"></script>

		<script type="text/javascript" src="<?php  echo base_url('assets/adminius/vendors/tinymce/js/tinymce/tinymce.min.js');?>"></script>

        <script src="<?php  echo base_url('assets/adminius/assets/scripts.js');?>"></script>
        <script>
        $(function() {
            // Bootstrap
            $('#bootstrap-editor').wysihtml5();

            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });

        // Tiny MCE
        tinymce.init({
		    selector: "#tinymce_basic",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});

		// Tiny MCE
        tinymce.init({
		    selector: "#tinymce_full",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace wordcount visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons",
		    image_advtab: true,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ]
		});

        </script>
    </body>

</html>