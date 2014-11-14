/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, globalstrict: true,
 latedef:true, noarg:true, noempty:true, nonew:true, undef:true, maxlen:256,
 strict:true, trailing:true, boss:true, browser:true, devel:true, jquery:true */
/*global document, jQuery, sprintf, TYPO3 */
(function ($) {
    'use strict';
    function runTest(testIdentifier) {
        var $element = $('[data-checkid=' + testIdentifier + ']'),
            moduleToken = $('.moduleToken').text();
        $element.find('.feedback .clearing, .feedback .report').hide();
        $element.find('.feedback .running').show();
        $.ajax({
            type: 'POST',
            url: 'mod.php?M=tools_SmoothmigrationSmoothmigration&moduleToken=' + moduleToken,
            dataType: 'json',
            data: {
                tx_smoothmigration_tools_smoothmigrationsmoothmigration: {
                    action: 'runTest',
                    controller: 'Ajax',
                    checkIdentifier: testIdentifier
                }
            }
        }).done(function (result) {
            $element.find('.feedback .running').hide();
            $element.find('.feedback .report .status').text(sprintf(
                TYPO3.lang['check.testRun'],
                result.result
            ));
            if (result.result === 'OK') {
                $element.find('.feedback .report .result').text(sprintf(
                    TYPO3.lang['check.checkResultMessage'],
                    result.issueCount
                ));
                if (result.issueCount > 0) {
                    $element.setMessageState('warning');
                } else {
                    $element.setMessageState('ok');
                }
            } else {
                $element.setMessageState('error');
            }
            $element.find('.feedback .report').show();
        });
    }

    function clearTestResults(testIdentifier) {
        var $element = $('[data-checkid=' + testIdentifier + ']'),
            moduleToken = $('.moduleToken').text();
        $element.find('.feedback .running, .feedback .report').hide();
        $element.find('.feedback .clearing').show();
        $.ajax({
            type: 'POST',
            url: 'mod.php?M=tools_SmoothmigrationSmoothmigration&moduleToken=' + moduleToken,
            dataType: 'json',
            data: {
                tx_smoothmigration_tools_smoothmigrationsmoothmigration: {
                    action: 'clearTestResults',
                    controller: 'Ajax',
                    checkIdentifier: testIdentifier
                }
            }
        }).done(function (result) {
            $element.find('.feedback .clearing').hide();
            $element.find('.feedback .report .status').text(sprintf(
                TYPO3.lang['check.testRun'],
                result.result
            ));
            if (result.result === 'OK') {
                $element.find('.feedback .report .result').text(sprintf(
                    TYPO3.lang['check.clearResultMessage'],
                    result.issueCount
                ));
                $element.setMessageState('ok');
            } else {
                $element.setMessageState('error');
            }
            $element.find('.feedback .report').show();
        });
    }

    $.extend($.fn, {
        clearAllIssues: function () {
            this.bind('click.clearAllIssues', function () {
                $('div[data-checkid]').each(function (index, element) {
                    clearTestResults($(element).attr('data-checkid'));
                });
            });
            return this;
        },
        clearIssues: function () {
            this.bind('click.clearIssues', function () {
                clearTestResults($(this).parents('div').parents('div').attr('data-checkid'));
            });
            return this;
        },
        runAllChecks: function () {
            this.bind('click.runAllChecks', function () {
                $('div[data-checkid]').each(function (index, element) {
                    runTest($(element).attr('data-checkid'));
                });
            });
            return this;
        },
        runCheck: function () {
            this.bind('click.runCheck', function () {
                runTest($(this).parents('div').parents('div').attr('data-checkid'));
            });
            return this;
        },
        setMessageState: function (state) {
            this.removeClass('message-error message-notice message-ok message-warning')
                .addClass('message-' + state);
        }
    });
}(jQuery));

jQuery(document).ready(function ($) {
    'use strict';
    $('.t3-smoothmigration-clearAllIssues').clearAllIssues();
    $('.t3-smoothmigration-clearIssues').clearIssues();
    $('.t3-smoothmigration-runAllChecks').runAllChecks();
    $('.t3-smoothmigration-runCheck').runCheck();
});
