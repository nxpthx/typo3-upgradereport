var UpgradeReport = function() {
    'use strict';
    var self = this;

    self._runTest = function(testIdentifier) {
        var $listElement = $('li[data-checkid=' + testIdentifier + ']');
        $.ajax({
            type: 'POST',
            url: 'mod.php?M=tools_SmoothmigrationSmoothmigration',
            dataType: 'json',
            data: {
                tx_smoothmigration_tools_smoothmigrationsmoothmigration: {
                    action: 'runTest',
                    controller: 'Ajax',
                    checkIdentifier: testIdentifier
                }
            }
        }).done(function(result) {
            $listElement.find('.spinner').remove();
            $listElement.find('.feedback').html('<p>Test Run ' + result.result + '.</p>');
            if (result.result === 'OK') {
                $listElement.find('.feedback').html('<p>Found ' + result.issueCount + ' issues.</p>');
                if (result.issueCount > 0) {
                    $listElement
                        .removeClass('message-error')
                        .removeClass('message-notice')
                        .removeClass('message-ok')
                        .addClass('message-warning');
                /*    $content.append('<ul></ul>')
                    var $list = $content.children('ul');
                    for (var i = 0; i < result.issueCount; i++) {
                        $list.append('<li><p class="explenation">' + result.issues[i].explenation + '</p><p class="solution">' + result.issues[i].solution + '</p></li>')
                    }
                */
                } else {
                    $listElement
                        .removeClass('message-error')
                        .removeClass('message-notice')
                        .removeClass('message-warning')
                        .addClass('message-ok');
                }
            } else {
                $listElement
                    .removeClass('message-notice')
                    .removeClass('message-ok')
                    .removeClass('message-warning')
                    .addClass('message-error');
            }
        });
    };

    self._clearTestResults = function(testIdentifier) {
        var $listElement = $('li[data-checkid=' + testIdentifier + ']');
        $.ajax({
            type: 'POST',
            url: 'mod.php?M=tools_SmoothmigrationSmoothmigration',
            dataType: 'json',
            data: {
                tx_smoothmigration_tools_smoothmigrationsmoothmigration: {
                    action: 'clearTestResults',
                    controller: 'Ajax',
                    checkIdentifier: testIdentifier
                }
            }
        }).done(function(result) {
            $listElement.find('.spinner').remove();
            $listElement.find('.feedback').html('<p>Test Run ' + result.result + '.</p>');
            if (result.result === 'OK') {
                $listElement.find('.feedback').html('<p>Cleared ' + result.issueCount + ' issues.</p>');
                $listElement
                    .removeClass('message-error')
                    .removeClass('message-notice')
                    .removeClass('message-warning')
                    .addClass('message-ok');
            } else {
                $listElement
                    .removeClass('message-notice')
                    .removeClass('message-ok')
                    .removeClass('message-warning')
                    .addClass('message-error');
            }
        });
    };


    self.click_runButton = function(event) {
        var $link = $(this);
        var checkId = $link.parents('li').attr('data-checkid');
        $link.parents('li').find('.feedback').html('<span class="spinner"><!-- --></span><strong class="spinner"> Running...</strong>');
        self._runTest(checkId);
        return false;
    };

    self.click_clearIssues = function(event) {
        var $link = $(this);
        var checkId = $link.parents('li').attr('data-checkid');
        $link.parents('li').find('.feedback').html('<span class="spinner"><!-- --></span><strong class="spinner"> Clearing...</strong>');
        self._clearTestResults(checkId);
        return false;
    };

    self.click_runAllButton = function(event) {
        $('li[data-checkid]').each(function(index, element) {
            $(element).find('.feedback').html('<span class="spinner"><!-- --></span><strong class="spinner"> Running...</strong>');
            self._runTest($(element).attr('data-checkid'));
        });
    };

    self.click_clearAllIssuesButton = function(event) {
        $('li[data-checkid]').each(function(index, element) {
            $(element).find('.feedback').html('<span class="spinner"><!-- --></span><strong class="spinner"> Clearing...</strong>');
            self._clearTestResults($(element).attr('data-checkid'));
        });
    };
};

jQuery(document).ready(function($) {
    'use strict';
    var functionality = new UpgradeReport();
    $('.t3-smoothmigration-runCheck').click(functionality.click_runButton);
    $('.t3-smoothmigration-clearIssues').click(functionality.click_clearIssues);
    $('.t3-smoothmigration-runAllChecks').click(functionality.click_runAllButton);
    $('.t3-smoothmigration-clearAllIssues').click(functionality.click_clearAllIssuesButton);
});