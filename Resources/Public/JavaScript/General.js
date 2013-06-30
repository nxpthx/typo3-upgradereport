var UpgradeReport = function() {
	var self = this;

	self._runTest = function(testIdentifier) {
		var $listElement = $('li[data-checkid=' + testIdentifier + ']');
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
					$content.append('<ul></ul>')
					var $list = $content.children('ul');
					for (var i = 0; i < result.issueCount; i++) {
						$list.append('<li><p class="explenation">' + result.issues[i].explenation + '</p><p class="solution">' + result.issues[i].solution + '</p></li>')
					}
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

	self.click_runAllButton = function(event) {
		$('li[data-checkid]').each(function(index, element) {
			self._runTest($(element).attr('data-checkid'));
		});
	}

}

$(document).ready(function() {
	var functionality = new UpgradeReport;
	$('.t3-upgradereport-runCheck').click(functionality.click_runButton);
	$('.t3-upgradereport-runAllChecks').click(functionality.click_runAllButton);
});