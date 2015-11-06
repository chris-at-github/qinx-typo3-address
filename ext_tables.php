<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Qinx Address'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Qinx Address');

$qxAddressColumns = array(
	'latitude' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address.latitude',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		)
	),
	'longitude' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address.longitude',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $qxAddressColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCATypes('tt_address', ',--div--;LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address,latitude,longitude');

$GLOBALS['TCA']['tt_address']['ctrl']['sortby'] = 'sorting';
$GLOBALS['TCA']['tt_address']['ctrl']['dividers2tabs'] = true;
$GLOBALS['TCA']['tt_address']['feInterface']['fe_admin_fieldList'] .= ',latitude, longitude';