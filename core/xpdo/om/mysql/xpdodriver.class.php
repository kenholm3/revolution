<?php
/*
 * Copyright 2010-2011 by MODX, LLC.
 *
 * This file is part of xPDO.
 *
 * xPDO is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * xPDO is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * xPDO; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 */

/**
 * The mysql implementation of the xPDODriver class.
 *
 * @package xpdo
 * @subpackage om.mysql
 */

/**
 * Include the parent {@link xPDODriver} class.
 */
require_once (dirname(dirname(__FILE__)) . '/xpdodriver.class.php');

/**
 * Provides mysql driver abstraction for an xPDO instance.
 *
 * This is baseline metadata and methods used throughout the framework.  xPDODriver 
 * class implementations are specific to a PDO driver and this instance is 
 * implemented for mysql.
 *
 * @package xpdo
 * @subpackage om.mysql
 */
class xPDODriver_mysql extends xPDODriver {
    public $_currentTimestamps= array (
        'CURRENT_TIMESTAMP',
        'CURRENT_TIMESTAMP()',
        'NOW()',
        'LOCALTIME',
        'LOCALTIME()',
        'LOCALTIMESTAMP',
        'LOCALTIMESTAMP()',
        'SYSDATE()'
    );
    public $_currentDates= array (
        'CURDATE()',
        'CURRENT_DATE',
        'CURRENT_DATE()'
    );
    public $_currentTimes= array (
        'CURTIME()',
        'CURRENT_TIME',
        'CURRENT_TIME()'
    );

    /**
     * Get a mysql xPDODriver instance.
     *
     * @param object $xpdo A reference to a specific xPDO instance.
     */
    function __construct(& $xpdo) {
        parent :: __construct($xpdo);
        $this->dbtypes['integer']= array('/INT/i');
        $this->dbtypes['boolean']= array('/^BOOL/i');
        $this->dbtypes['float']= array('/^DEC/i','/^NUMERIC$/i','/^FLOAT$/i','/^DOUBLE/i','/^REAL/i');
        $this->dbtypes['string']= array('/CHAR/i','/TEXT/i','/^ENUM$/i','/^SET$/i','/^TIME$/i','/^YEAR$/i');
        $this->dbtypes['timestamp']= array('/^TIMESTAMP$/i');
        $this->dbtypes['datetime']= array('/^DATETIME$/i');
        $this->dbtypes['date']= array('/^DATE$/i');
        $this->dbtypes['binary']= array('/BINARY/i','/BLOB/i');
        $this->dbtypes['bit']= array('/^BIT$/i');
    }
}
