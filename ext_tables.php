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

if (!isset($GLOBALS['TCA']['tt_address']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['tt_address']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['tt_address']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['tt_address']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$GLOBALS['TCA']['tt_address']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(),
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $tempColumns, 1);
}

$tmp_qxaddress_columns = array(

	'name' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address.name',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'latitude' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address.latitude',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'double2'
		)
	),
	'longitude' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address.longitude',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'double2'
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address',$tmp_qxaddress_columns);

$GLOBALS['TCA']['tt_address']['types']['Tx_Qxaddress_Address']['showitem'] = $TCA['tt_address']['types']['1']['showitem'];
$GLOBALS['TCA']['tt_address']['types']['Tx_Qxaddress_Address']['showitem'] .= ',--div--;LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tx_qxaddress_domain_model_address,';
$GLOBALS['TCA']['tt_address']['types']['Tx_Qxaddress_Address']['showitem'] .= 'name, latitude, longitude';

$GLOBALS['TCA']['tt_address']['columns'][$TCA['tt_address']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:qxaddress/Resources/Private/Language/locallang_db.xlf:tt_address.tx_extbase_type.Tx_Qxaddress_Address','Tx_Qxaddress_Address');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', $GLOBALS['TCA']['tt_address']['ctrl']['type'],'','after:' . $TCA['tt_address']['ctrl']['label']);
