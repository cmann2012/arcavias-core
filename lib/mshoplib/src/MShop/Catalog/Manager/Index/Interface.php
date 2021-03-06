<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2011
 * @license LGPLv3, http://www.arcavias.com/en/license
 * @package MShop
 * @subpackage Catalog
 * @version $Id: Interface.php 14246 2011-12-09 12:25:12Z nsendetzky $
 */


/**
 * Catalog index interface for classes managing product indices.
 *
 * @package MShop
 * @subpackage Catalog
 */
interface MShop_Catalog_Manager_Index_Interface
	extends MShop_Common_Manager_Factory_Interface
{
	/**
	 * Optimizes the index if necessary.
	 * This operation can last very long and it shouldn't be called by a script
	 * executed by a web server.
	 */
	public function optimize();


	/**
	 * Rebuilds the catalog index for searching products or specified list of products.
	 * This can be a long lasting operation.
	 *
	 * @param array $items Optional list with products
	 */
	public function rebuildIndex( array $items = array() );
}