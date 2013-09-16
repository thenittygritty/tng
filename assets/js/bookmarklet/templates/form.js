this["JST"] = this["JST"] || {};

this["JST"]["assets/js/bookmarklet/templates/form.hbs"] = Handlebars.template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression;


  buffer += "<div id=\"tngbookmarklet\">\n	<style>\n		#tngbookmarklet * {\n			box-sizing: border-box;\n			color: #4a525c;\n			position: relative;\n		}\n		#tngbookmarklet {\n			font: 300 14px/18px \"Helvetica Neue\", \"Helvetica\", sans-serif;\n			position: fixed;\n			background-color: #f7f6f3;\n			height: 557px;\n			z-index: 99999;\n			padding: 15px;\n			font-weight: 400;\n            width: 100%;\n            max-width: 500px;\n            top: 20px;\n            left: 0;\n            right: 0;\n            bottom: 0;\n            margin: auto;\n            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);\n            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);\n            border-radius: 5px;\n            float: none;\n		}\n\n		#tngbookmarklet h1 {\n			display: block;\n			font: bold 20px/24px \"Helvetica Neue\", \"Helvetica\", sans-serif;\n			color: #5b88bb;\n			margin: 0 0 15px 0;\n			text-transform: none;\n            float: none;\n            padding: 0;\n		}\n\n		#tngbookmarklet h1 span {\n			color: #e02d0d;\n			font: 300 20px/24px \"Helvetica Neue\", \"Helvetica\", sans-serif;\n			font-weight: bold;\n			padding-right: 10px;\n            float: none;\n		}\n\n		#tngbookmarklet input {\n			font: 300 14px/18px \"Helvetica Neue\", \"Helvetica\", sans-serif;\n			padding: 5px;\n			display: block;\n			width: 500px;\n			border: 1px solid #ccc;\n			margin: 5px 0 15px 0;\n			border-radius: 2px;\n			float: none;\n		}\n\n		#tngbookmarklet textarea {\n			font: 300 14px/18px \"Helvetica Neue\", \"Helvetica\", sans-serif;\n			margin: 5px 0 0 0;\n			display: block;\n			width: 100%;\n			height: 180px;\n			border: 1px solid #ccc;\n			border-radius: 2px;\n            float: none;\n		}\n\n		#tngbookmarklet #buttonwrap {\n			display: block;\n			height: 28px;\n			position: relative;\n		}\n\n		#tngbookmarklet #tngbm-button {\n			font: 300 14px/18px \"Helvetica Neue\", \"Helvetica\", sans-serif;\n			display: block;\n			margin-top: 15px;\n			background-color: #e02d0d;\n			color: white;\n			border: none;\n			border-radius: 2px;\n			padding: 5px;\n			position: absolute;\n			right: 0;\n            float: none;\n		}\n\n		#tngbookmarklet label {\n			font-weight: bold;\n			margin-bottom: 5px;\n		}\n\n		#tngbookmarklet label span {\n			color: #e02d0d;\n		}\n\n		#tngbookmarklet .closelink {\n			position: absolute;\n			top: 7px;\n			right: 15px;\n			text-decoration: none;\n			z-index: 99999;\n			font-size: 12px;\n			color: #AFB7C0;\n		}\n\n		#tngbookmarklet .closelink:hover {\n			color: #AFB7C0;\n			text-decoration: underline;\n		}\n\n	</style>\n\n	<a href=\"#\" class=\"closelink\">close</a>\n	<form action=\"";
  if (stack1 = helpers.postUrl) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.postUrl; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" method=\"get\" enctype=\"application/x-www-form-urlencoded\" id=\"linkpostform\">\n		<h1><span>//</span> Edit Your Linkpost</h1>\n		<label for=\"inputtitle\">Title <span>*</span></label>\n		<input type=\"text\" name=\"title\" id=\"inputtitle\" placeholder=\"Title\" value=\"";
  if (stack1 = helpers.title) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.title; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">\n		<label for=\"inputlink\">Link <span>*</span></label>\n		<input type=\"text\" name=\"link\" id=\"inputlink\" placeholder=\"Link\" value=\"";
  if (stack1 = helpers.link) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.link; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">\n		<label for=\"inputauthor\">Author <span>*</span></label>\n		<input type=\"text\" name=\"author\" placeholder=\"Author\" id=\"inputauthor\" value=\"";
  if (stack1 = helpers.author) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.author; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">\n		<label for=\"inputcredit\">Credit</label>\n		<input type=\"text\" name=\"credit\" placeholder=\"Credit (optional)\" id=\"inputcredit\">\n		<label for=\"linkposttext\">Text <span>*</span></label>\n		<textarea name=\"text\" id=\"linkposttext\">";
  if (stack1 = helpers.selection) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.selection; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</textarea>\n		<div id=\"buttonwrap\">\n			<button id=\"tngbm-button\">Create Linkpost</button>\n		</div>\n	</form>\n</div>\n";
  return buffer;
  });