(function($) {
    'use strict';
    function runTest (testIdentifier) {
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
            $listElement.find('.feedback .running').hide();
            $listElement.find('.feedback .report').html('<p>Test Run ' + result.result + '.</p>');
            if (result.result === 'OK') {
                $listElement.find('.feedback .report').html('<p>Found ' + result.issueCount + ' issues.</p>');
                if (result.issueCount > 0) {
                    $listElement.setMessageState('warning');
                } else {
                    $listElement.setMessageState('ok');
                }
            } else {
                $listElement.setMessageState('error');
            }
        });
    }

    function clearTestResults (testIdentifier) {
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
            $listElement.find('.feedback .clearing').hide();
            $listElement.find('.feedback .report').html('<p>Test Run ' + result.result + '.</p>');
            if (result.result === 'OK') {
                $listElement.find('.feedback .report').html('<p>Cleared ' + result.issueCount + ' issues.</p>');
                $listElement.setMessageState('ok');
            } else {
                $listElement.setMessageState('error');
            }
        });
    }

    $.extend($.fn, {
        clearIssues: function() {
            this.bind('click.clearIssues', function() {
                $(this).parents('li').find('.feedback .running').hide();
                $(this).parents('li').find('.feedback .clearing').show();
                clearTestResults($(this).parents('li').attr('data-checkid'));
            });
            return this;
        },

        clearAllIssues: function() {
            this.bind('click.clearAllIssues', function() {
                $('li[data-checkid]').each(function(index, element) {
                    $(element).find('.feedback .running').hide();
                    $(element).find('.feedback .clearing').show();
                    clearTestResults($(element).attr('data-checkid'));
                });
            });
            return this;
        },

        runCheck: function() {
            this.bind('click.runCheck', function() {
                $(this).parents('li').find('.feedback .clearing').hide();
                $(this).parents('li').find('.feedback .running').show();
                runTest($(this).parents('li').attr('data-checkid'));
            });
            return this;
        },

        runAllChecks: function() {
            this.bind('click.runAllChecks', function() {
                $('li[data-checkid]').each(function(index, element) {
                    $(element).find('.feedback .clearing').hide();
                    $(element).find('.feedback .running').show();
                    runTest($(element).attr('data-checkid'));
                });
            });
            return this;
        },

        setMessageState: function(state) {
            this
                .removeClass('message-error')
                .removeClass('message-notice')
                .removeClass('message-ok')
                .removeClass('message-warning')
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
