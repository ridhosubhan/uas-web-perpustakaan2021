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

        // scroll

        $(document).ready(function() {
        
        $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
        $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 
        
        });
        </script>

    </body>
</html>