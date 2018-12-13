$(document).ready(function() {
	// Change bandwidth
	$("#btnApplyBandwidth").click(function() {
		StateStuff( 'bandwidth', $("#newBandwidth").val() );
	});

	function StateStuff( action, newBandwidth ){
		var formData = {
			'view' : 'console',
			'action' : action,
			'apply' : 1,
			'newBandwidth': newBandwidth
		};

		$.ajax({
			type: 'POST',
			url: thisUrl,
			data: formData,
			dataType: 'html',
			enocde: true
		}).done(function(data) {
			location.reload();
		});
	}
});
