<script src="<?php echo base_url(); ?>optimum/js/calculator.js" ></script>
<script>
                            function showPluginDetails() {
                                var id = $('#pluginslist').val();
                                $('.plugin-details').hide();
                                $('#' + id).show();
                                return;
                            }
                            </script>
							
							
	<?php if (($this->session->flashdata('error_message')) != ""): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
           
            text: '<?php echo $this->session->flashdata('error_message'); ?>',
            position: 'top-right',
            loaderBg: '#f56954',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
	<?php endif; ?>
	
	<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script> 
	
	<!-- ./wrapper -->
 <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
	
	
	<!-- jQuery -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js" ></script>
	<script src="<?php echo base_url(); ?>optimum/js/fullcalendar/fullcalendar.min.js" ></script>
	<script src="<?php echo base_url(); ?>optimum/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" ></script>

	<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/dropzone-master/dist/dropzone.js" ></script>

	
	 <!-- Magnific popup JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js" ></script>
	<!--Wave Effects -->
    <script src="<?php echo base_url(); ?>optimum/js/waves.js" ></script> 

	<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js" ></script> 
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js" ></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js" ></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
	 <!-- icheck -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/icheck/icheck.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/icheck/icheck.init.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js" ></script>
	<script type="text/javascript">
    $('.slimscrollsidebar').slimScroll({
        height: '100%'
    });
   
    </script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>optimum/js/waves.js" ></script>
    <!--Morris JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/raphael/raphael-min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/morrisjs/morris.js" ></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js" ></script>
    <!-- jQuery peity -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/peity/jquery.peity.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/peity/jquery.peity.init.js" ></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/js/custom.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/js/dashboard1.js" ></script>
 <!-- Calendar JavaScript -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/calendar/jquery-ui.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/moment/moment.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/calendar/dist/fullcalendar.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/calendar/dist/cal-init.js" ></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js" ></script>
	 <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js" ></script>
	 <script src="<?php echo base_url(); ?>optimum/js/validator.js" ></script>
	 
	<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/switchery/dist/switchery.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>optimum/plugins/bower_components/multiselect/js/jquery.multi-select.js" ></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-rtl-master/dist/js/bootstrap-rtl.min.js" >
	
	 <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/datatables/jquery.dataTables.min.js" ></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" ></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" ></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" ></script>
    <!-- end - This is for export functionality only -->
	<!-- icheck -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/icheck/icheck.min.js" ></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/icheck/icheck.init.js" ></script>
	 <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js" ></script>
	 
	 <script src="<?php echo base_url(); ?>optimum/js/materialize.min.js"></script>
	     <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/dropify/dist/js/dropify.min.js" ></script>

	 
	 <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>optimum/plugins/bower_components/gallery/js/animated-masonry-gallery.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>optimum/plugins/bower_components/gallery/js/jquery.isotope.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>optimum/plugins/bower_components/fancybox/ekko-lightbox.min.js" ></script>
    <script type="text/javascript">
    $(document).ready(function($) {
        // delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    if (window.console) {
                        return console.log('Checking our the events huh?');
                    }
                },
                onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);
                    }
                }
            });
        });

        //Programatically call
        $('#open-image').click(function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

        // navigateTo
        $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
            event.preventDefault();

            var lb;
            return $(this).ekkoLightbox({
                onShown: function() {

                    lb = this;

                    $(lb.modal_content).on('click', '.modal-footer a', function(e) {

                        e.preventDefault();
                        lb.navigateTo(2);

                    });

                }
            });
        });


    });
    </script>
	 
	 
	 <!-- Chart Files -->
		<script src="<?php echo base_url(); ?>optimum/flot/jquery.flot.js"></script>
		<script src="<?php echo base_url(); ?>optimum/flot.tooltip/flot.tooltip.js"></script>
		<script src="<?php echo base_url(); ?>optimum/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url(); ?>optimum/flot/jquery.flot.categories.js"></script>
		<script src="<?php echo base_url(); ?>optimum/flot/jquery.flot.resize.js"></script>
		<script src="<?php echo base_url(); ?>optimum/liquid-meter/liquid.meter.js"></script>
		<script src="<?php echo base_url(); ?>optimum/snap.svg/snap.svg.js"></script>
		<script src="<?php echo base_url(); ?>optimum/snap.svg/snap.svg.js"></script>
		<script src="<?php echo base_url(); ?>optimum/liquid-meter/liquid.meter.js"></script>
	
		<!-- Examples -->
		<script src="<?php echo base_url();?>assets/javascripts/dashboard/custom_dashboard.js"></script>
		<script src="<?php echo base_url();?>assets/javascripts/forms/custom_validation.js"></script>
        <script src="<?php echo base_url();?>assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url();?>assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	 
<script src="<?php echo base_url(); ?>optimum/js/jquery.PrintArea.js" type="text/JavaScript"></script>

	 
	  <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
	
	  <!-- Chart JS -->
	<!-- <script src="<?php echo base_url(); ?>optimum/fullcalendar/js/index.js"></script>-->

   		<!--<script src="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js"></script>-->
		<!--<script src="assets/js/neon-calendar.js"></script>-->

   <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
	
	
    <script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();


    });
    </script>
	
	
<script>
    function checkDelete()
    {
        var chk = confirm("Are You Sure To Delete This !");
        if (chk)
        {
            return true;
        } else {
            return false;
        }
    }
</script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
	
	<script type="text/javascript">
    //Alerts

    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);

        return false;
    });

    /* Click to close */

    $(".myadmin-alert-click").click(function(event) {
        $(this).fadeToggle(350);

        return false;
    });

    $(".showtop").click(function() {
        $(".alerttop").fadeToggle(350);
    });
    $(".showtop2").click(function() {
        $(".alerttop2").fadeToggle(350);
    });
	</script>
	 <script>
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'

    });

    $('.clockpicker').clockpicker({
            donetext: 'Done',

        })
        .find('input').change(function() {
            console.log(this.value);
        });

    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker

    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({

        todayHighlight: true
    });

    // Daterange picker

    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>
	
	<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
	<?php if (($this->session->flashdata('flash_message')) != ""): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
			heading: 'Congratulations!!!',
            text: '<?php echo $this->session->flashdata('flash_message'); ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
	<?php endif; ?>
	
	
	
	
	<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });
        // For select 2

        $(".select2").select2();
        $('.selectpicker').selectpicker();

        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }

        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();

        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });

        // For multiselect

        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });

        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });

    });
    </script>
    <!--Style Switcher -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>optimum/date/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>optimum/date/daterangepicker.css" />
	<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
	
			
<script src="<?php echo base_url(); ?>js/meteorEmoji.min.js"></script>
  <script>
    (() => {
      new MeteorEmoji()
    })()
  </script>
  
  <script src="<?php echo base_url(); ?>js/chat.js"></script>
  
  <script type="text/javascript">
var audioUrl = '<?php echo base_url(); ?>uploads/chat.mp3';
// SIMPLE EXEMPLE
var audio = new Audio(audioUrl); // define your audio
$('.btn').click( () => audio.play() ); // that will do the trick !!

// ADVANCED EXEMPLE

// array with souds to cycle trough
// the more in the array, the faster you can retrigger the click 
var audio2 = [new Audio(audioUrl), new Audio(audioUrl), new Audio(audioUrl), new Audio(audioUrl), new Audio(audioUrl)]; // put it has much has you want
var soundNb = 0; // counter

$('.btn2').click( () => audio2[ soundNb++ % audio2.length ].play());

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.set_langs').on('click', function () {
            var lang_url = $(this).data('href');
            $.ajax({url: lang_url, success: function (result) {
                    location.reload();
                }});
        });
    });
</script>



 <!-- jQuery file upload -->
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-d�posez un fichier ici ou cliquez',
                replace: 'Glissez-d�posez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'D�sol�, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
		
		<!--BlockUI Script -->
    <script src="<?php echo base_url(); ?>optimum/plugins/bower_components/blockUI/jquery.blockUI.js"></script>
    <script type="application/javascript">
    // This is for BlockUI plugin demo
    $('#blockbtn1').click(function() {
        $('div.block1').block({
            message: null
        });
    });
    $('#blockbtn2').click(function() {
        $('div.block2').block({
            message: '<h3>Please Wait...</h3>',
            css: {
                border: '1px solid #fff'
            }
        });
    });
    $('#blockbtn3').click(function() {
        $('div.block3').block({
            message: '<h3>Please Wait...</h3>',
            overlayCSS: {
                backgroundColor: '#02bec9'
            },
            css: {
                border: '1px solid #fff'
            }
        });
    });
    $('#blockbtn4').click(function() {
        $('div.block4').block({
            message: '<p style="margin:0;padding:8px;font-size:24px;">Just a moment...</p>',
            css: {
                color: '#fff',
                border: '1px solid #fb9678',
                backgroundColor: '#fb9678'
            }
        });
    });
    $('#blockbtn5').click(function() {
        $('div.block5').block({
            message: '<h4><img src="<?php echo base_url(); ?>optimum/plugins/images/busy.gif" /> Just a moment...</h4>',
            css: {
                border: '1px solid #fff'
            }
        });
    });
    $('#blockbtn6').click(function() {
        $('div.block6').block({
            message: $('#domMessage'),
            css: {
                border: '1px solid #fff'
            }
        });
    });
    $('#unblockbtn1').click(function() {
        $('div.block1').unblock();
    });
    $('#unblockbtn2').click(function() {
        $('div.block2').unblock();
    });
    $('#unblockbtn3').click(function() {
        $('div.block3').unblock();
    });
    $('#unblockbtn4').click(function() {
        $('div.block4').unblock();
    });
    $('#unblockbtn5').click(function() {
        $('div.block5').unblock();
    });
    $('#unblockbtn6').click(function() {
        $('div.block6').unblock();
    });
    </script>
	
	 <!-- Session-timeout-idle 
    <script src="<?php echo base_url(); ?>optimum/idle/jquery.idletimeout.js"></script>
    <script src="<?php echo base_url(); ?>optimum/idle/jquery.idletimer.js"></script>
    <script src="<?php echo base_url(); ?>optimum/idle/session-timeout-idle-init.js"></script>
    -->
	
	<script>
    function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  var ampm = " PM "
        if (h < 12) {
            ampm = " AM "
        }
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s + ampm;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
</script>

 <!-- jQuery for carousel -->
    <script src="<?php echo base_url();?>optimum/plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>optimum/plugins/bower_components/owl.carousel/owl.custom.js"></script>
	
	<script src="<?php echo base_url('js/font-awesome-icon-picker/fontawesome-four-iconpicker.min.js');?>" charset="utf-8"></script>

<script>
$(document).ready(function() {
    $(".html5editor").each(function(){$(this).wysihtml5();});
});
$(function() {
   $('.icon-picker').iconpicker();
 });
</script>
</body>

</html>