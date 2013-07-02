<?php
/**
 * Created by JetBrains PhpStorm.
 * User: maddy
 * Date: 7/2/13
 * Time: 10:58 AM
 * To change this template use File | Settings | File Templates.
 */

$TCA['tx_upgradereport_domain_model_issue'] = array(
	'crtl' => $TCA['tx_upgradereport_domain_model_issue']['crtl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, inspection, issue_identifier, extension, location, additional_information',
	),
	'columns' => array(
		'starttime' => Array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
			'config' => Array(
				'type' => 'input',
				'size' => '10',
				'max' => '20',
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => '0'
			)
		),
		'endtime' => Array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
			'config' => Array(
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => '0',
				'range' => Array(
					'upper' => mktime(0, 0, 0, 12, 31, 2020),
					'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))
				)
			)
		),
		'hidden' => Array(
			'l10n_mode' => $hideNewLocalizations,
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array(
				'type' => 'check',
				'default' => '1'
			)
		),
		'tstamp' => Array(
			'label' => 'LLL:EXT:tt_news/locallang_tca.xml:tt_news.tstamp',
			'config' => Array(
				'type' => 'input',
				'eval' => 'datetime',
			)
		),
		'inspection' => array(
			'label' => 'inspection',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			)
		),
		'issue_identifier' => array(
			'label' => 'issue_identifier',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			)
		),
		'extension' => array(
			'label' => 'extension',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			)
		),
		'location' => array(
			'label' => 'location',
			'config' => Array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '3'
			)
		),
		'additional_information' => array(
			'label' => ' additional information',
			'config' => Array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '3'
			)
		)
	),
);