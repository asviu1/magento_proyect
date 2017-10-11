Hammer.plugins.fakeMultitouch();

		function getIndexForValue(elem, value) {
			for (var i=0; i<elem.options.length; i++)
				if (elem.options[i].value == value)
					return i;
		}

		function pad(number) {
			if ( number < 10 ) {
				return '0' + number;
			}
			return number;
		}

		function update(datetime) {
			$("#month").drum('setIndex', datetime.getMonth());			
			$("#date").drum('setIndex', datetime.getDate()-1); 
		}

		$(document).ready(function () {
			$("select.date").drum({
				onChange : function (elem) {
					var arr = {'date' : 'setDate', 'month' : 'setMonth'};
					var date = new Date();
					for (var s in arr) {
						var i = ($("form[name='date'] select[name='" + s + "']"))[0].value;
						eval ("date." + arr[s] + "(" + i + ")");
					}
					date.setSeconds(0);
					update(date);

					var format = date.getFullYear() + '-' + pad( date.getMonth() + 1 ) + '-' + pad( date.getDate() ) + ' ' + pad( date.getHours() ) + ':' + pad( date.getMinutes() );

					$('.date_header .selection').html(format);
				}
			});
			update(new Date());
		});