import './bootstrap';

// <!-- include js files -->
src="assets/dest/js/jquery.js"
src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"
src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"
src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"
src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"
src="assets/dest/vendors/animo/Animo.js"
src="assets/dest/vendors/dug/dug.js"
src="assets/dest/js/scripts.min.js"

	// <!--customjs-->
	type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });


	 jQuery(document).ready(function($) {
                'use strict';

// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
});