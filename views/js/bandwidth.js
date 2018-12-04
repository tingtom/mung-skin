$j(document).ready(function() {
	// Change bandwidth
	$j("#btnApplyBandwidth").click(function() {
		StateStuff( 'bandwidth', $j("#newBandwidth").val() );
	});

	function StateStuff( action, newBandwidth ){
		var formData = {
			'view' : 'console',
			'action' : action,
			'apply' : 1,
			'newBandwidth': newBandwidth
		};
		console.log(formData);

		$j.ajax({
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
