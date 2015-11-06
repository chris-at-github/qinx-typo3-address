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
	protected $addressRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$addresses = $this->addressRepository->findAll();
		$this->view->assign('addresses', $addresses);
	}

	/**
	 * action show
	 * 
	 * @param \Qinx\Qxaddress\Domain\Model\Address $address
	 * @return void
	 */
	public function showAction(\Qinx\Qxaddress\Domain\Model\Address $address) {
		$this->view->assign('address', $address);
	}

	/**
	 * action new
	 * 
	 * @param \Qinx\Qxaddress\Domain\Model\Address $newAddress
	 * @ignorevalidation $newAddress
	 * @return void
	 */
	public function newAction(\Qinx\Qxaddress\Domain\Model\Address $newAddress = NULL) {
		$this->view->assign('newAddress', $newAddress);
	}

	/**
	 * action create
	 * 
	 * @param \Qinx\Qxaddress\Domain\Model\Address $newAddress
	 * @return void
	 */
	public function createAction(\Qinx\Qxaddress\Domain\Model\Address $newAddress) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->addressRepository->add($newAddress);
		$this->redirect('list');
	}

	/**
	 * action index
	 * 
	 * @return void
	 */
	public function indexAction() {
		
	}

}