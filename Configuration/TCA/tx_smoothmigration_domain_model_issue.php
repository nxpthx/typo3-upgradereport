<?php

$TCA['tx_smoothmigration_domain_model_issue'] = array(
	'ctrl' => $TCA['tx_smoothmigration_domain_model_issue']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'inspection, issuer, extension, location_info, additional_infon',
	),
	'types' => array(
		1 => array('showitem' => 'inspection, issue, extension, location_info, additional_info')
	),
	'columns' => array(
		'inspection' => array(
			'label' => 'inspection',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			)
		),
		'identifier' => array(
			'label' => 'issue_identifier',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			)
		),
		'extension' => array(
			'label' => 'extension',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			)
		),
		'location_info' => array(
			'label' => 'location',
			'config' => array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '3'
			)
		),
		'additional_info' => array(
			'label' => ' additional information',
			'config' => array(
				'type' => 'text',
				'cols' => '40',
				'rows' => '3'
			)
		),
		'migration_status' => array(
			'label' => 'Migration status',
			'config' => array(
				'type' => 'input',
				'cols' => '40',
				'max' => '1',
			),
		),
	),
);