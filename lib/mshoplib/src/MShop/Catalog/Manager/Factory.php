<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2011
 * @license LGPLv3, http://www.arcavias.com/en/license
 * @package MShop
 * @subpackage Catalog
 * @version $Id: Factory.php 14790 2012-01-10 17:48:19Z spopp $
 */


/**
 * Factory for Catalog Manager.
 *
 * @package MShop
 * @subpackage Catalog
 */
class MShop_Catalog_Manager_Factory
	extends MShop_Common_Factory_Abstract
	implements MShop_Common_Factory_Interface
{
	/**
	 * Creates a catalog DAO object.
	 *
	 * @param MShop_Context_Item_Interface $context Shop context instance with necessary objects
	 * @param string $name Manager name
	 * @return MShop_Common_Manager_Interface Manager object
	 * @throws MShop_Catalog_Exception If requested manager implementation couldn't be found
	 */
	public static function createManager( MShop_Context_Item_Interface $context, $name = null)
	{
		if ( $name === null ) {
			$name = $context->getConfig()->get('classes/catalog/manager/name', 'Default');
		}

		if ( ctype_alnum($name) === false )
		{
			$classname = is_string($name) ? 'MShop_Catalog_Manager_' . $name : '<not a string>';
			throw new MShop_Catalog_Exception(sprintf('Invalid characters in class name "%1$s"', $classname));
		}

		$iface = 'MShop_Catalog_Manager_Interface';
		$classname = 'MShop_Catalog_Manager_' . $name;

		$manager = self::_createManager( $context, $classname, $iface );
		return self::_addManagerDecorators( $context, $manager, 'catalog' );
	}
}