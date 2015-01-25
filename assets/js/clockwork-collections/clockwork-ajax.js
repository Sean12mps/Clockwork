ChildFx.prototype.collections.ajaxFunc = {

	getData : function( cmd, data, fn ){

		var that = this;

		that.received = '';

		jQuery.ajax( {
		  	type: "POST",
		  	url: cfx_ajax.ajaxurl,
		  	data: { 
					"action" 		: cfx_ajax.ajax_action
				, 	"do" 			: cmd
				, 	"data" 			: data
				, 	"_ajax_nonce" 	: cfx_ajax._ajax_nonce
		    },
		    success: function(result){

		    	var response = result;

		    	that.received = result;

		    	if( fn ){

		    		fn();
		    	}
		    },
		   	dataType : "json"
		} );
	}
};