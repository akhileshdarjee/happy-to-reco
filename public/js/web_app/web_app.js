// convert string to proper case
String.prototype.toProperCase = function () {
	return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

// convert string to snake case
String.prototype.toSnakeCase = function () {
	return this.replace(/(.)([A-Z])/g, "$1_$2").toLowerCase();
};

// check if string is a valid date
String.prototype.isDate = function () {
	var dateFormat;

	if (toString.call(this) === '[object Date]') {
		return true;
	}
	if (typeof this.replace === 'function') {
		this.replace(/^\s+|\s+$/gm, '');
	}

	dateFormat = /(^\d{1,4}[\.|\\/|-]\d{1,2}[\.|\\/|-]\d{1,4})(\s*(?:0?[1-9]:[0-5]|1(?=[012])\d:[0-5])\d\s*[ap]m)?$/;

	if (dateFormat.test(this)) {
		return !!new Date(this).getTime();
	}

	return false;
};

// check if string is a time
String.prototype.isTime = function () {
	var isValid = /^([0-1]?[0-9]|2[0-3]):([0-5][0-9])(:[0-5][0-9])?$/.test(this);
	return isValid;
};

// check if string is a time
String.prototype.isDateTime = function () {
	var date = this.split(" ");

	if (date[0].isDate() && date[1].isTime()) {
		return true;
	}

	return false;
};

// check if the string is a url/link
String.prototype.isURL = function() {
	var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	return pattern.test(this);
}

// slugify text
String.prototype.slugify = function() {
	return this.toString().toLowerCase().trim()
		.replace(/\s+/g, '-')			// Replace spaces with -
		.replace(/&/g, '-and-')			// Replace & with 'and'
		.replace(/[^\w\-]+/g, '')		// Remove all non-word chars
		.replace(/[\s_-]+/g, '-')		// swap any length of whitespace, underscore, hyphen characters with a single -
		.replace(/^-+|-+$/g, '');		// Remove last floating dash if exists
};

// Prototyping for getting month long name and short name
Date.prototype.getMonthName = function(lang) {
	lang = lang && (lang in Date.locale) ? lang : 'en';
	return Date.locale[lang].month_names[this.getMonth()];
};

Date.prototype.getMonthNameShort = function(lang) {
	lang = lang && (lang in Date.locale) ? lang : 'en';
	return Date.locale[lang].month_names_short[this.getMonth()];
};

Date.locale = {
	en: {
		month_names: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		month_names_short: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	}
};

Array.prototype.contains = function(obj) {
	var i = this.length;
	while (i--) {
		if (this[i] === obj) {
			return true;
		}
	}
	return false;
}

Array.prototype.random = function () {
	return this[Math.floor((Math.random()*this.length))];
}

// get object from localstorage
Storage.prototype.getObject = function(key) {
	var value = this.getItem(key);
	return value && JSON.parse(value);
}

// set object in localstorage
Storage.prototype.setObject = function(key, value) {
	this.setItem(key, JSON.stringify(value));
}

// set common global variables
var app_route = window.location.pathname;
var table = "/" + app_route.split("/").pop(-1);

// Setup ajax for making csrf token used by laravel
$(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
});

$( document ).ready(function() {
	// set body data url
	$("body").attr("data-url", app_route);

	// highlight text
	$("#top-search").on("input change", function() {
		$('body').removeHighlight();
		$('body').highlight($(this).val());
	});

	// back to top
	var amountScrolled = 300;
	$(window).scroll(function() {
		if ($(window).scrollTop() > amountScrolled) {
			$('a.back-to-top').fadeIn('slow');
		}
		else {
			$('a.back-to-top').fadeOut('slow');
		}
	});

	$('a.back-to-top').click(function() {
		$('body, html').animate({
			scrollTop: 0
		}, 400);
		return false;
	});


	// toggle breadcrumb
	var breadcrumb_ignore_list = ['/app', '/login', '/password'];
	if ((breadcrumb_ignore_list.indexOf(app_route) >= 0) || app_route.split("/")[1] == "list") {
		if ($(".navbar-brand").length > 1) {
			$(".navbar-brand:last").remove();
		}
	}
	else {
		var module_name = app_route.split("/")[2];
		var breadcrumb = '<a class="navbar-brand" href="/list/' + module_name + '" style="font-size: 22px;">' + module_name.replace(/_/g, " ").toProperCase() + ' List</a>';
		$(".navbar-brand").addClass("hidden-xs hidden-sm");
		$(breadcrumb).insertAfter(".navbar-brand");
	}


	// toggle vertical nav active
	$.each($(".treeview"), function(index, navbar) {
		if ($(this).find('a').attr('href') == app_route) {
			$(this).addClass('active');
		}
		else {
			$(this).removeClass('active');
		}
	});


	// module click navigate to list view
	$(".module-btn").on("click", function() {
		window.location = $(this).data("href");
	});


	// enable date picker
	$(function () {
		$("body").find(".date").datepicker({
			format: 'dd-mm-yyyy',
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: false,
			autoclose: true
		}).on('changeDate', function(ev) {
			if (typeof change_doc === "function") {
				change_doc();
			}
		});
	});


	// enable datetime picker
	$(function () {
		$("body").find(".datetimepicker").datetimepicker({
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'fa fa-crosshairs',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			},
			format: 'DD-MM-YYYY hh:mm A',
			allowInputToggle: true,
		}).on("dp.change", function(e) {
			if (typeof change_doc === "function") {
				change_doc();
			}
		});
	});


	// enable wyswig editor
	tinymce.init({
		selector: ".text-editor",
		theme: "modern",
		height : 250,
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc jbimages'
		],
		toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
		toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		relative_urls: false,
		setup : function(ed) {
			ed.on('change', function(e) {
				if (typeof change_doc === "function") {
					change_doc();
				}
			});
		}
	});


	// Autocomplete
	enable_autocomplete();
	
	// allow only numbers to text box
	$('body').on('input change', '.numbers-only', function() {
		this.value = this.value.replace(/[^0-9\.]/g,'');
	});
});


// Autocomplete
function enable_autocomplete() {
	var autocomplete = $('.autocomplete');
	$.each(autocomplete, function(index, field) {
		var data_module = $(field).data("target-module");
		var data_field = $(field).data("target-field");
		var item_data = {};
		var module_fields = {};
		$.each($("body").find('input[data-target-module="' + data_module + '"]'), function(index, element) {
			if (module_fields[data_module]) {
				module_fields[data_module].push($(element).data("target-field"));
			}
			else {
				module_fields[data_module] = [$(element).data("target-field")];
			}
		});

		$(this).attr('data-target-field', data_field).typeahead({
			onSelect: function(item) {
				var selected_item_data = {};
				$.each(item_data, function(index, value) {
					if (item.text == item_data[index][data_field]) {
						selected_item_data = value;
					}
				});

				delete selected_item_data[data_field];

				$.each(selected_item_data, function(key, value) {
					var input_field = $('body').find('input[data-target-field="' + key + '"][data-target-module="' + data_module + '"]');

					if (input_field.length > 1) {
						// when autocomplete for same module is present in parent and child
						if ($(field).closest('tr').find('input[data-target-field="' + key + '"][data-target-module="' + data_module + '"]').length) {
							$(field).closest('tr').find('input[data-target-field="' + key + '"][data-target-module="' + data_module + '"]').val(value).trigger('change');
						}
						else {
							$(input_field).val(value).trigger('change');
						}
					}
					else {
						$(input_field).val(value).trigger('change');
					}

					if (typeof initialize_mandatory_fields === 'function') { 
						initialize_mandatory_fields(); 
					}
					if (typeof remove_mandatory_highlight === 'function') { 
						remove_mandatory_highlight(mandatory_fields); 
					}
				});
			},
			displayField: data_field,
			ajax: {
				url: '/getAutocomplete',
				preDispatch: function (query) {
					return {
						module: data_module,
						field: data_field,
						fetch_fields: module_fields[data_module]
					}
				},
				preProcess: function (data) {
					if (data.success === false) {
						// Hide the list, there was some error
						return false;
					}
					item_data = data;
					return data;
				},
				triggerLength: 1
			},
			scrollBar: true
		});
	});
}


// msgbox
function msgbox(msg, footer, title, size) {
	$("#message-box").on("show.bs.modal", function (e) {
		$(this).find(".modal-title").html(title ? title : "Message");
		$(this).find(".modal-body").html(msg);

		if (footer) {
			$(this).find(".modal-footer").html(footer);
			$(this).find(".modal-footer").show();
		}
		else {
			$(this).find(".modal-footer").html("");
			$(this).find(".modal-footer").hide();
		}
	})
	.on('hidden.bs.modal', function (e) {
		$(this).find(".modal-title").html("Message");
		$(this).find(".modal-body").html("");
		$(this).find(".modal-footer").html("");
		$(this).find(".modal-footer").hide();
	});

	$('#message-box').modal('show');
}


// add status labels, icon for money related fields
function beautify_list_view(table) {
	// field defaults
	var money_list = ['total_amount', 'grand_total', 'rate', 'amount', 'debit', 'credit', 'price'];
	var contact_list = ['contact_no', 'phone_no', 'phone', 'mobile', 'mobile_no'];
	var address_list = ['address', 'full_address', 'city', 'venue'];
	var email_list = ['email_id', 'guest_id'];
	var label_list = ['status', 'role'];
	var label_bg = {
		'status' : { 'Active' : 'label-success', 'Inactive' : 'label-danger', 'Vacant' : 'label-success', 'Occupied' : 'label-danger' }, 
		'role' : { 'Administrator' : 'label-default', 'User' : 'label-info' }
	}

	var table = table ? table : "table.list-view";
	var thead = $(table).find("thead");
	var tbody = $(table).find("tbody");

	// make table heading
	$.each($(thead).find("tr > th"), function() {
		if ($(this).attr("name")) {
			var heading_name = $(this).attr("name");
			var heading = heading_name.replace(/_/g, " ").toProperCase();
			if (heading.indexOf("Id") > -1) {
				heading = heading.replace("Id", "ID");
			}

			if (money_list.contains(heading_name)) {
				$(this).html(heading + ' (<i class="fa fa-inr"></i>)');
			}
			else {
				$(this).html(heading);
			}
		}
	});

	if ($(tbody).find("tr").length < 1) {
		row = '<tr>\
			<td style="text-align:center; padding:10px; border-bottom:none;" colspan="' + $(thead).find("tr > th").length + '">\
				<div class="h4"><strong>No Data</strong></div>\
			</td>\
		</tr>';
		$(table).find('tbody').empty().append(row);
	}
	else {
		// make table rows
		$.each($(tbody).find("tr > td"), function() {
			if ($(this).attr("data-field-name")) {
				var column_name = $(this).attr("data-field-name");
				var column_value = $.trim($(this).html());
				if ($.trim(column_value) != "") {
					if (money_list.contains(column_name)) {
						$(this).html('<i class="fa fa-inr"></i> ' + column_value);
					}
					else if (contact_list.contains(column_name)) {
						$(this).html('<i class="fa fa-phone"></i> ' + column_value);
					}
					else if (address_list.contains(column_name)) {
						$(this).html('<i class="fa fa-map-marker"></i> ' + column_value);
					}
					else if (email_list.contains(column_name)) {
						$(this).html('<i class="fa fa-envelope"></i> ' + column_value);
					}
					else if (label_list.contains(column_name)) {
						$(this).html('<span class="label ' + label_bg[column_name][column_value] + '">' + column_value +  '</span>');
					}
					else if (column_value.isDate()) {
						$(this).html('<i class="fa fa-calendar"></i> ' + moment(column_value).format('DD-MM-YYYY'));
					}
					else if (column_value.isDateTime()) {
						$(this).html('<i class="fa fa-calendar"></i> ' + moment(column_value).format('DD-MM-YYYY hh:mm A'));
					}
					else if (column_value.isTime()) {
						$(this).html('<i class="fa fa-clock-o"></i> ' + column_value);
					}
					else if (column_value && trim(column_value).isURL()) {
						$(this).html('<a href="' + column_value + '" target="_blank">' + column_value + '</a>');
					}
				}
			}
		});
	}
}


// copies selected text in the browser
function copyit(theField) {
	var selectedText = document.selection;
	if (selectedText.type == 'Text') {
		var newRange = selectedText.createRange();
		theField.focus();
		theField.value = newRange.text;
	}
	else {
		msgbox('Select text in the page and then try again');
	}
}


// Removes any white space to the right and left of the string
function trim(str) {
	return str.replace(/^\s+|\s+$/g, "");
}


// Removes any white space to the left of the string
function ltrim(str) {
	return str.replace(/^\s+/, "");
}


// Removes any white space to the right of the string
function rtrim(str) {
	return str.replace(/\s+$/, "");
}


// Return a string only containing the letters a to z
function onlyLetters(str) {
	return str.toLowerCase().replace(/[^a-z]/g, "");
};


// Return a string only containing the letters a to z and numbers
function onlyLettersNums(str) {
	return str.toLowerCase().replace(/[^a-z,0-9,-]/g, "");
}


// Removes an item from a given array
function removeArrayItem(arr, item) {
	var i = 0;
	while (i < arr.length) {
		if (arr[i] == item) {
			arr.splice(i, 1);
		}
		else {
			i++;
		}
	}
}


// Does the node have a class
function hasClass(node, className) {
	if (node.className) {
		return node.className.match(
			new RegExp('(\\s|^)' + className + '(\\s|$)'));
	}
	else {
		return false;
	}
}


// Add a class to an node
function addClass(node, className) {
	if (hasClass(node, className)) node.className += " " + className;
}


// Removes a class from an node
function removeClass(node, className) {
	if (hasClass(node, className)) {
		var reg = new RegExp('(\\s|^)' + className + '(\\s|$)');
		node.className = node.className.replace(reg, ' ');
	}
}


// Get elements by class name (Backwards compatible version)
function getElementsByClassName(rootNode, className) {
	var returnElements = [];
	if (rootNode.getElementsByClassName) {
		// Native getElementsByClassName 
		returnElements = rootNode.getElementsByClassName(className);
	}
	else if (document.evaluate) {
		// XPath 
		var xpathExpression;
		xpathExpression = ".//*[contains(concat(' ', @class, ' '), ' " 
			+ className + " ')]";
		var xpathResult = document.evaluate(
			xpathExpression, rootNode, null, 0, null);
		var node;
		while ((node = xpathResult.iterateNext())) {
			returnElements.push(node);
		}
	}
	else {
		// Slower DOM fallback 
		className = className.replace(/\-/g, "\\-");
		var elements = rootNode.getElementsByTagName("*");
		for (var x = 0; x < elements.length; x++) {
			if (elements[x].className.match("(^|\\s)" + className 
				+ "(\\s|$)")) {
				returnElements.push(elements[x]);
			}
		}
	}

	return returnElements;
}


// Get elements by attribute (Backwards compatible version)
function getElementsByAttribute(rootNode, attributeName, attributeValues) {

	var attributeList = attributeValues.split(" ");
	var returnElements = [];
	if (rootNode.querySelectorAll) {
		var selector = '';
		for (var i = 0; i < attributeList.length; i++) {
			selector += '[' + attributeName 
				+ '*= "' + attributeList[i] + '"], ';
		}
		returnElements = rootNode.querySelectorAll(
			selector.substring(0, selector.length - 2));
	}
	else if (document.evaluatex) {
		// XPath 
		var xpathExpression = ".//*[";
		for (var i = 0; i < attributeList.length; i++) {
			if (i !== 0) {
				xpathExpression += " or ";
			}
			xpathExpression += "contains(concat(' ', @" + attributeName	+ ", ' '), ' " + attributeList[i] + " ')";
		}
		xpathExpression += "]";
		var xpathResult = document.evaluate(
			xpathExpression, rootNode, null, 0, null);
		var node;
		while ((node = xpathResult.iterateNext())) {
			returnElements.push(node);
		}
	}
	else {
		// Slower fallback 
		attributeName = attributeName.replace(/\-/g, "\\-");
		var elements = rootNode.getElementsByTagName("*");
		for (var x = 0; x < elements.length; x++) {
			if (elements[x][attributeName]) {
				var found = false;
				for (var y = 0; y < attributeList.length; y++) {
					if (elements[x][attributeName].match("(^|\\s)" 
						+ attributeList[y] + "(\\s|$)")) {
						found = true;
					}
				}
				if (found)
					returnElements.push(elements[x]);
			}
		}
	}

	return returnElements;
}


// Is an object a string
function isString(obj) {
	return typeof (obj) == 'string';
}


// Is an object a array
function isArray(obj) {
	return obj && !(obj.propertyIsEnumerable('length')) 
		&& typeof obj === 'object' 
		&& typeof obj.length === 'number';
}


// Is an object a int
function isInt(obj) {
	var re = /^\d+$/;
	return re.test(obj);
}


// Is an object a email address
function isEmail(obj) {
	if (isString(obj)) {
		return obj.match(/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/ig);
	}
	else {
		return false;
	}
}


// Is an object a URL
function isUrl (obj) {
	if (isString(obj)) {
		var re = new RegExp("^(http|https)\://([a-zA-Z0-9\.\-]+(\:" +
			"[a-zA-Z0-9\.&%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|" +
			"[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2" +
			"[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\." +
			"(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|" +
			"[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]" +
			"{1}[0-9]{1}|[0-9])|localhost|([a-zA-Z0-9\-]+\.)*[a-zA-Z" +
			"0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name" +
			"|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-z" +
			"A-Z0-9\.\,\?\'\\\+&%\$#\=~_\-]+))*$");
		return obj.match(re);
	}
	else {
		return false;
	}
}


// convert mysql date time to javascript date time
function mysqlDateTimeToJSDate(datetime) {
	// Split timestamp into [ Y, M, D, h, m, s ]
	var t = datetime.split(/[- :]/);
	return new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
}