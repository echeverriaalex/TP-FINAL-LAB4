
      

        <!-- Scripts -->
        <script src="<?php echo JS_PATH?>jquery/jquery.min.js"></script>
        <script src="<?php echo JS_PATH?>bootstrap.bundle.min.js"></script>
        <script src="<?php echo JS_PATH?>owl-carousel.js"></script>
        <script src="<?php echo JS_PATH?>Vanimation.js"></script>
        <script src="<?php echo JS_PATH?>imagesloaded.js"></script>
        <script src="<?php echo JS_PATH?>custom.js"></script>

        <script>

            $(document).on("click", ".naccs .menu div", function() {
            var numberIndex = $(this).index();

            if (!$(this).is("active")) {
                $(".naccs .menu div").removeClass("active");
                $(".naccs ul li").removeClass("active");

                $(this).addClass("active");
                $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

                var listItemHeight = $(".naccs ul")
                    .find("li:eq(" + numberIndex + ")")
                    .innerHeight();
                $(".naccs ul").height(listItemHeight + "px");
                }
            });
        </script>
    </body>
</html>