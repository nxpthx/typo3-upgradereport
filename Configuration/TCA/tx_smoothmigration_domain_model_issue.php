<?php

$TCA['tx_smoothmigration_domain_model_issue'] = array(
	'ctrl' => $TCA['tx_smoothmigration_domain_model_issue']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'inspection, issuer, extension, location_info, additional_infon',
	),
	'types' => Array(
		'0' => Array('showitem' => 'inspection, issue, extension, location_info, additional_info')
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
		'identifier' => array(
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
		'location_info' => array(
			'label' => 'location',
			'config' => Array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '3'
			)
		),
		'additional_info' => array(
			'label' => ' additional information',
			'config' => Array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '3'
			)
		),
		'migration_status' => array(
			'label' => 'Migration status',
			'config' => Array(
				'type' => 'input',
				'cols' => '40',
				'max' => '1',
			),
		),
	),
);