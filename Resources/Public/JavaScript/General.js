(function($) {
    'use strict';
    function runTest (testIdentifier) {
        var $element = $('[data-checkid=' + testIdentifier + ']');
        $element.find('.feedback .clearing').hide();
        $element.find('.feedback .running').show();
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
            $element.find('.feedback .running').hide();
            $element.find('.feedback .report').html('<p>' + TYPO3.lang['check.testRun'] + ' ' + result.result + '.</p>');
            if (result.result === 'OK') {
                $element.find('.feedback .report').append('<p>' + TYPO3.lang['check.found'] + ' ' + result.issueCount + ' ' + TYPO3.lang['check.issues'] + '.</p>');
                if (result.issueCount > 0) {
                    $element.setMessageState('warning');
                } else {
                    $element.setMessageState('ok');
                }
            } else {
                $element.setMessageState('error');
            }
        });
    }

    function clearTestResults (testIdentifier) {
        var $element = $('[data-checkid=' + testIdentifier + ']');
        $element.find('.feedback .running').hide();
        $element.find('.feedback .clearing').show();
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
            $element.find('.feedback .clearing').hide();
            $element.find('.feedback .report').html('<p>' + TYPO3.lang['check.testRun'] + ' ' + result.result + '.</p>');
            if (result.result === 'OK') {
                $element.find('.feedback .report').append('<p>' + TYPO3.lang['check.cleared'] + ' ' + result.issueCount + ' ' + TYPO3.lang['check.issues'] + '.</p>');
                $element.setMessageState('ok');
            } else {
                $element.setMessageState('error');
            }
        });
    }

    $.extend($.fn, {
        clearIssues: function() {
            this.bind('click.clearIssues', function() {
                clearTestResults($(this).parents('li').attr('data-checkid'));
            });
            return this;
        },
        clearAllIssues: function() {
            this.bind('click.clearAllIssues', function() {
                $('li[data-checkid]').each(function(index, element) {
                    clearTestResults($(element).attr('data-checkid'));
                });
            });
            return this;
        },
        runCheck: function() {
            this.bind('click.runCheck', function() {
                runTest($(this).parents('li').attr('data-checkid'));
            });
            return this;
        },
        runAllChecks: function() {
            this.bind('click.runAllChecks', function() {
                $('li[data-checkid]').each(function(index, element) {
                    runTest($(element).attr('data-checkid'));
                });
            });
            return this;
        },
        setMessageState: function(state) {
            this.removeClass('message-error message-notice message-ok message-warning')
                .addClass('message-' + state);
        }
    });
})(jQuery);

jQuery(document).ready(function($) {
    'use strict';
    $('.t3-smoothmigration-clearIssues').clearIssues();
    $('.t3-smoothmigration-clearAllIssues').clearAllIssues();
    $('.t3-smoothmigration-runCheck').runCheck();
    $('.t3-smoothmigration-runAllChecks').runAllChecks();
});
