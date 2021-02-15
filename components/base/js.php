<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="http://localhost/pos/assets/plugins/jquery/jquery.js"></script>

<!-- Bootstrap -->
<script src="http://localhost/pos/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="http://localhost/pos/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="http://localhost/pos/assets/plugins/isotope/isotope.pkgd.min.js"></script>
<script src="http://localhost/pos/assets/js/bootbox.js"></script>
<script src="http://localhost/pos/assets/plugins/slick/slick.min.js"></script>
<script src="http://localhost/pos/assets/plugins/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!-- AdminLTE App -->
<script src="http://localhost/pos/assets/dist/js/adminlte.js"></script>
<script src="http://localhost/pos/assets/js/main.js"></script>
<script src="http://localhost/pos/assets/js/slick-custom.js"></script>
<script src="http://localhost/pos/controllers/js/functions.js"></script>

<!--Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>


