<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2011
 * @license LGPLv3, http://www.arcavias.com/en/license
 * @version $Id: default.php 14408 2011-12-17 13:24:46Z nsendetzky $
 */

return array(
	'item' => array(
		'insert' => '
			INSERT INTO "mshop_product_type"( "siteid", "code", "domain", "label", "status", "mtime", "editor", "ctime" )
			VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )
		',
		'update' => '
			UPDATE "mshop_product_type"
			SET "siteid" = ?, "code" = ?, "domain" = ?, "label" = ?, "status" = ?, "mtime" = ?, "editor" = ?
			WHERE "id" = ?
		',
		'delete' => '
			DELETE FROM "mshop_product_type"
			WHERE :cond
			AND siteid = ?
		',
		'search' => '
			SELECT mproty."id", mproty."siteid", mproty."code", mproty."domain", mproty."label",
				mproty."status", mproty."mtime", mproty."editor", mproty."ctime"
			FROM "mshop_product_type" AS mproty
			:joins
			WHERE :cond
			/*-orderby*/ ORDER BY :order /*orderby-*/
			LIMIT :size OFFSET :start
		',
		'count' => '
			SELECT COUNT(*) AS "count"
			FROM (
				SELECT DISTINCT mproty."id"
				FROM "mshop_product_type" AS mproty
				:joins
				WHERE :cond
				LIMIT 10000 OFFSET 0
			) AS list
		',
	),
);
