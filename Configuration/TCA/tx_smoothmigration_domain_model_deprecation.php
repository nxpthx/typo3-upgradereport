<?php

$TCA['tx_smoothmigration_domain_model_deprecation'] = array(
	'ctrl' => $TCA['tx_smoothmigration_domain_model_deprecation']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'file, class, interface, method, message, is_static, visibility, deprecated_since_version, removed_in_version, replacement_class, replacement_interface, replacement_method, no_brainer, replacement_message',
	),
	'types' => array(
		1 => array('showitem' => 'file, class, interface, method, message, is_static, visibility, deprecated_since_version, removed_in_version, replacement_class, replacement_interface, replacement_method, no_brainer, replacement_message')
	),
	'columns' => array(
		'file' => array(
			'label' => 'file',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'class' => array(
			'label' => 'class',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'interface' => array(
			'label' => 'interface',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'method' => array(
			'label' => 'method',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'message' => array(
			'label' => 'message',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'is_static' => array(
			'label' => 'is_static',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'visibility' => array(
			'label' => 'visibility',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'deprecated_since_version' => array(
			'label' => 'deprecated_since_version',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'removed_in_version' => array(
			'label' => 'removed_in_version',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_class' => array(
			'label' => 'replacement_class',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_interface' => array(
			'label' => 'replacement_interface',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_method' => array(
			'label' => 'replacement_method',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'regex_search' => array(
			'label' => 'regex_search',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'regex_replace' => array(
			'label' => 'regex_replace',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'no_brainer' => array(
			'label' => 'no_brainer',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
		'replacement_message' => array(
			'label' => 'replacement_message',
			'config' => array(
				'type' => 'input',
				'size' => '40',
				'max' => '256',
			),
		),
	),
);