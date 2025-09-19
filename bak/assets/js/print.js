// Create a jquery plugin that prints the given element.
jQuery.fn.print = function () {
    // NOTE: We are trimming the jQuery collection down to the
    // first element in the collection.
    if (this.size() > 1) {
        this.eq(0).print();
        return;
    } else if (!this.size()) {
        return;
    }

    // ASSERT: At this point, we know that the current jQuery
    // collection (as defined by THIS), contains only one
    // printable element.

    // Create a random name for the print frame.
    var strFrameName = ("printer-" + (new Date()).getTime());

    // Create an iFrame with the new name.
    var jFrame = $("<iframe name='" + strFrameName + "'>");

    // Hide the frame (sort of) and attach to the body.
    jFrame
		.css("width", "1px")
		.css("height", "1px")
		.css("position", "absolute")
		.css("left", "-9999px")
		.appendTo($("body:first"))
	;

    // Get a FRAMES reference to the new frame.
    var objFrame = window.frames[strFrameName];

    // Get a reference to the DOM in the new frame.
    var objDoc = objFrame.document;

    // Grab all the style tags and copy to the new
    // document so that we capture look and feel of
    // the current document.

    // Create a temp document DIV to hold the style tags.
    // This is the only way I could find to get the style
    // tags into IE.
    var jStyleDiv = $("<div>").append(
		$("style").clone()
		);

    // Write the HTML for the document. In this, we will
    // write out the HTML of the current element.
    objDoc.open();
    objDoc.write("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">");
    objDoc.write("<html>");
    objDoc.write("<body>");
    objDoc.write("<head>");
    objDoc.write("<title>");
    objDoc.write(document.title);
    objDoc.write("</title>");
    objDoc.write('<link rel="stylesheet" id="contact-form-7-css"  href="wp-content/plugins/contact-form-7/styles900f.css?ver=3.0.2.1" type="text/css" media="all" /><link rel="stylesheet" id="style-css"  href="wp-content/themes/newbusiness/style3d36.css?ver=3.3.1" type="text/css" media="all" />');
    objDoc.write(jStyleDiv.html());
    objDoc.write("</head>");
    objDoc.write(this.html());
    objDoc.write("</body>");
    objDoc.write("</html>");
    objDoc.close();

    // Print the document.
    objFrame.focus();
    objFrame.print();

    // Have the frame remove itself in about a minute so that
    // we don't build up too many of these frames.
    setTimeout(
		function () {
		    jFrame.remove();
		},
		(60 * 1000)
		);
}



function printnew(event) {

    var ht = $(event).parents(".print").html();
    $(event).parents(".print").addClass("cprt");

    $(".cprt > .noprint").hide();
    $(event).parents(".print").find('*').each(function (index) {
        $(this).copyCSS($(this));
    });
    //alert($(event).parents(".print").css());
    $(event).parents(".print").print();
    $(event).parents(".print").html(ht);
    $(event).parents(".print").removeClass("cprt");

}
function printnew(event , nocss) {

    var ht = $(event).parents(".print").html();
    $(event).parents(".print").addClass("cprt");

    $(".cprt > .noprint").hide();
//    $(event).parents(".print").find('*').each(function (index) {
//        $(this).copyCSS($(this));
//    });
    //alert($(event).parents(".print").css());
    $(event).parents(".print").print();
    $(event).parents(".print").html(ht);
    $(event).parents(".print").removeClass("cprt");

}

$.fn.copyCSS = function (source) {
    var dom = $(source).get(0);
    var dest = {};
    var style, prop;
    if (window.getComputedStyle) {
        var camelize = function (a, b) {
            return b.toUpperCase();
        };
        if (style = window.getComputedStyle(dom, null)) {
            var camel, val;
            if (style.length) {
                for (var i = 0, l = style.length; i < l; i++) {
                    prop = style[i];
                    camel = prop.replace(/\-([a-z])/, camelize);
                    val = style.getPropertyValue(prop);
                    dest[camel] = val;
                }
            } else {
                for (prop in style) {
                    camel = prop.replace(/\-([a-z])/, camelize);
                    val = style.getPropertyValue(prop) || style[prop];
                    dest[camel] = val;
                }
            }
            return this.css(dest);
        }
    }
    if (style = dom.currentStyle) {
        for (prop in style) {
            dest[prop] = style[prop];
        }
        return this.css(dest);
    }
    if (style = dom.style) {
        for (prop in style) {
            if (typeof style[prop] != 'function') {
                dest[prop] = style[prop];
            }
        }
    }
    return this.css(dest);
};