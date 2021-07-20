<footer class="footer">
                    © 2021 Crafted with <i class="fa fa-heart text-danger"></i> by <b>JayaCode<b>
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <!-- <script src="<?= BASEPATH?>/assets/js/jquery.min.js"></script> -->
        <script src="<?= BASEPATH?>/assets/js/popper.min.js"></script>
        <script src="<?= BASEPATH?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= BASEPATH?>/assets/js/modernizr.min.js"></script>
        <script src="<?= BASEPATH?>/assets/js/detect.js"></script>
        <script src="<?= BASEPATH?>/assets/js/fastclick.js"></script>
        <script src="<?= BASEPATH?>/assets/js/jquery.slimscroll.js"></script>
        <script src="<?= BASEPATH?>/assets/js/jquery.blockUI.js"></script>
        <script src="<?= BASEPATH?>/assets/js/waves.js"></script>
        <script src="<?= BASEPATH?>/assets/js/jquery.nicescroll.js"></script>
        <script src="<?= BASEPATH?>/assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?= BASEPATH?>/assets/plugins/skycons/skycons.min.js"></script>
        <script src="<?= BASEPATH?>/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?= BASEPATH?>/assets/plugins/morris/morris.min.js"></script>

        <script src="<?= BASEPATH?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        
        <script src="<?= BASEPATH?>/assets/pages/dashborad.js"></script>

        <!-- App js -->
        <script src="<?= BASEPATH?>/assets/js/app.js"></script>

        <!-- Required datatable js -->
        <script src="<?=BASEPATH?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Buttons examples -->
        <script src="<?=BASEPATH?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/buttons.colVis.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?=BASEPATH?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=BASEPATH?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?=BASEPATH?>assets/pages/datatables.init.js"></script>

        <script>
             /* BEGIN SVG WEATHER ICON */
             if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
                {"color": "#fff"},
                {"resizeClear": true}
                ),
                    list  = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

                for(i = list.length; i--; )
                icons.set(list[i], list[i]);
                icons.play();
            };

        //UNTUK EVENT HANYA KETIK ANGKA
        $('.hanyaAngka').on("keypress keyup blur",function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
            
        $(document).ready(function() {   
            // scroll
            $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
            $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 

            // JALANIN SELECT2
            $('.select2').select2();
            $(window).resize(function() {
                $('.select2').css('width', "100%");
            });
        
        });
        </script>

    </body>
</html>