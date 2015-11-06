<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Qinx.' . $_EXTKEY,
	'Pi1',
	array(
		'Address' => 'list, show, new, create, index',
		
	),
	// non-cacheable actions
	array(
		'Address' => 'create, ',
		
	)
);
