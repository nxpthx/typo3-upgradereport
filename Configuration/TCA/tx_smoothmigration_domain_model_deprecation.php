<?php

$TCA['tx_smoothmigration_domain_model_deprecation'] = array(
	'crtl' => $TCA['tx_smoothmigration_domain_model_deprecation']['crtl'],
	'interface' => array(
		'showRecordFieldList' => 'file, class, interface, method, message, is_static, visibility, deprecated_since_version, removed_in_version, replacement_class, replacement_interface, replacement_method, no_brainer, replacement_message',
	),
	'types' => Array(
		'0' => Array('showitem' => 'file, class, interface, method, message, is_static, visibility, deprecated_since_version, removed_in_version, replacement_class, replacement_interface, replacement_method, no_brainer, replacement_message')
	),
	'columns' => array(
		'file' => array(
			'label' => 'file',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'class' => array(
			'label' => 'class',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'interface' => array(
			'label' => 'interface',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'method' => array(
			'label' => 'method',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'message' => array(
			'label' => 'message',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'is_static' => array(
			'label' => 'is_static',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'visibility' => array(
			'label' => 'visibility',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'deprecated_since_version' => array(
			'label' => 'deprecated_since_version',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'removed_in_version' => array(
			'label' => 'removed_in_version',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_class' => array(
			'label' => 'replacement_class',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_interface' => array(
			'label' => 'replacement_interface',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_method' => array(
			'label' => 'replacement_method',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'no_brainer' => array(
			'label' => 'no_brainer',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_message' => array(
			'label' => 'replacement_message',
			'config' => Array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
	),
);