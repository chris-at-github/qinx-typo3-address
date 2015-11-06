<?php
namespace Qinx\Qxaddress\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Christian Pschorr <pschorr.christian@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * AddressController
 */
class AddressController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * addressRepository
	 * 
	 * @var \Qinx\Qxaddress\Domain\Repository\AddressRepository
	 * @inject
	 */
	protected $addressRepository = null;

	/**
	 * action index
	 * 
	 * @return void
	 */
	public function indexAction() {
		$addresses = $this->addressRepository->findAll();
		$this->view->assign('addresses', $addresses);
	}

	/**
	 * action properties
	 *
	 * @param \Qinx\Qxaddress\Domain\Model\Address $address
	 * @return void
	 */
	public function propertiesAction(\Qinx\Qxaddress\Domain\Model\Address $address) {
		$this->view->assign('address', $address);
	}
}