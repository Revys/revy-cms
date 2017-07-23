// Ajax block replace request
$.fn.request = function(options)
{  
	let defaults = {
		url: false,
		type: 'get',
		controller: '',
		action: 'index',
		loader: 'global',
		language: language,
		complete: null,
		data: {}
	}; 
	
	var opts = $.extend(defaults, options);

	opts.replace = true;

	if (this.length == 0)
		opts.replace = false;
		
	if (this.length > 1) {
		console.log('Object should have single identifier');
		return false;
	}

	opts.element = this;

	if (this.attr('id') == undefined)
		this.attr('id', Math.random().toString(8));

	opts.oc = this.attr('id');

	// this.startLoader();   
	
	return request(opts);
}

let request = function(options)
{  
	$(options.element).data('callbacks', { complete: options.complete })
					  .data('loader', { type: options.loader });

	let url = '/admin/ru/' + options.controller + '/' + options.action;

	if (options.url)
		url = options.url;

	return new Promise((resolve, reject) => {
		axios[options.type](url, options.data)
			.then(response => {
				requestSuccess(options, response.data);
			})
			.catch(error => {
				requestFail(options, error.response.data);
			});
	});
}

let requestSuccess = function(options, data)
{  
	var jsonObj = new Array();
	try	{
		$(options.element).replaceWith(data.content);

		if (data.js !== '')
        	eval(data.js);
	} catch(ex) {
		console.log(ex);
	}
}

let requestFail = function(options, errors)
{  
	console.log('Request failed', options);
}