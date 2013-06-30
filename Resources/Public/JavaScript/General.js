var UpgradeReport = function() {
	var self = this;
	self._runTest = function(testIdentifier) {
		$listElement = $('li[data-checkid=' + testIdentifier + ']');
		$.ajax({
			type: "POST",
			url: "mod.php?M=tools_UpgradereportUpgradereport",
			dataType: 'json',
			data: {
				tx_upgradereport_tools_upgradereportupgradereport: {
					action: 'runTest',
					controller: 'Ajax',
					checkIdentifier: testIdentifier
				}
			}
		}).done(function(result) {
			var $content = $listElement.children('div.message-body');
			$content.append('<p>Test Run ' + result.result + '.</p>');
			if (result.result == 'OK') {
				$content.append('<p>Found ' + result.issueCount + ' issues.</p>');
				if (result.issueCount > 0) {
					$listElement.removeClass('message-notice').addClass('message-warning');
				} else {
					$listElement.removeClass('message-notice').addClass('message-ok');
				}
			} else {
				$listElement.removeClass('message-notice').addClass('message-error');
			}
		});
	};

	self.click_runButton = function(event) {
		var $link = $(this);
		var checkId = $link.parents('li').attr('data-checkid');
		self._runTest(checkId);
		return false;
	};

}

$(document).ready(function() {
	var functionality = new UpgradeReport;
	console.log(functionality);
	$('.t3-upgradereport-runCheck').click(functionality.click_runButton);
});