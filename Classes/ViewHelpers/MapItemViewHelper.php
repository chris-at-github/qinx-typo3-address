<?php
namespace Qinx\Qxaddress\ViewHelpers;

class MapItemViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'div';

	/**
	 * Arguments initialization
	 *
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerUniversalTagAttributes();
	}

	/**
	 * @param \Qinx\Qxaddress\Domain\Model\Address $address
	 * @return string
	 */
	public function render(\Qinx\Qxaddress\Domain\Model\Address $address) {
		$this->tag->setContent($this->renderChildren());

		// Latitude | Longitude
		$this->tag->addAttribute('data-qx-latitude', $address->getLatitude());
		$this->tag->addAttribute('data-qx-longitude', $address->getLongitude());

		// Marker-Icon
		if($address->getMarker() !== null) {
			$this->tag->addAttribute('data-qx-marker', $address->getMarker()->getOriginalResource()->getPublicUrl());
		}

		return $this->tag->render();
	}
}
