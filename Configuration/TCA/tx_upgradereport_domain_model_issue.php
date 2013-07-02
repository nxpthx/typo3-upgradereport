<?php

$TCA['tx_upgradereport_domain_model_issue'] = array(
	'crtl' => $TCA['tx_upgradereport_domain_model_issue']['crtl'],
	'interface' => array(
		'showRecordFieldList' => 'inspection, issue_identifier, extension, location, additional_information',
	),
	'columns' => array(
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