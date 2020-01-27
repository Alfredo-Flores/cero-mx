<?php

namespace Map;

use \Tblentrcp;
use \TblentrcpQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'tblentrcp' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentrcpTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentrcpTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cero';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentrcp';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentrcp';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentrcp';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the idnentrcp field
     */
    const COL_IDNENTRCP = 'tblentrcp.idnentrcp';

    /**
     * the column name for the idnentemp field
     */
    const COL_IDNENTEMP = 'tblentrcp.idnentemp';

    /**
     * the column name for the idnentorg field
     */
    const COL_IDNENTORG = 'tblentrcp.idnentorg';

    /**
     * the column name for the idnentcln field
     */
    const COL_IDNENTCLN = 'tblentrcp.idnentcln';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentrcp.uuid';

    /**
     * the column name for the fchinccln field
     */
    const COL_FCHINCCLN = 'tblentrcp.fchinccln';

    /**
     * the column name for the tipentrcp field
     */
    const COL_TIPENTRCP = 'tblentrcp.tipentrcp';

    /**
     * the column name for the kgsentrcp field
     */
    const COL_KGSENTRCP = 'tblentrcp.kgsentrcp';

    /**
     * the column name for the cntcjsrcp field
     */
    const COL_CNTCJSRCP = 'tblentrcp.cntcjsrcp';

    /**
     * the column name for the rtnentcln field
     */
    const COL_RTNENTCLN = 'tblentrcp.rtnentcln';

    /**
     * the column name for the vldentcln field
     */
    const COL_VLDENTCLN = 'tblentrcp.vldentcln';

    /**
     * the column name for the fnsentcln field
     */
    const COL_FNSENTCLN = 'tblentrcp.fnsentcln';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tblentrcp.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tblentrcp.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Idnentrcp', 'Idnentemp', 'Idnentorg', 'Idnentcln', 'Uuid', 'Fchinccln', 'Tipentrcp', 'Kgsentrcp', 'Cntcjsrcp', 'Rtnentcln', 'Vldentcln', 'Fnsentcln', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idnentrcp', 'idnentemp', 'idnentorg', 'idnentcln', 'uuid', 'fchinccln', 'tipentrcp', 'kgsentrcp', 'cntcjsrcp', 'rtnentcln', 'vldentcln', 'fnsentcln', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(TblentrcpTableMap::COL_IDNENTRCP, TblentrcpTableMap::COL_IDNENTEMP, TblentrcpTableMap::COL_IDNENTORG, TblentrcpTableMap::COL_IDNENTCLN, TblentrcpTableMap::COL_UUID, TblentrcpTableMap::COL_FCHINCCLN, TblentrcpTableMap::COL_TIPENTRCP, TblentrcpTableMap::COL_KGSENTRCP, TblentrcpTableMap::COL_CNTCJSRCP, TblentrcpTableMap::COL_RTNENTCLN, TblentrcpTableMap::COL_VLDENTCLN, TblentrcpTableMap::COL_FNSENTCLN, TblentrcpTableMap::COL_CREATED_AT, TblentrcpTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('idnentrcp', 'idnentemp', 'idnentorg', 'idnentcln', 'uuid', 'fchinccln', 'tipentrcp', 'kgsentrcp', 'cntcjsrcp', 'rtnentcln', 'vldentcln', 'fnsentcln', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idnentrcp' => 0, 'Idnentemp' => 1, 'Idnentorg' => 2, 'Idnentcln' => 3, 'Uuid' => 4, 'Fchinccln' => 5, 'Tipentrcp' => 6, 'Kgsentrcp' => 7, 'Cntcjsrcp' => 8, 'Rtnentcln' => 9, 'Vldentcln' => 10, 'Fnsentcln' => 11, 'CreatedAt' => 12, 'UpdatedAt' => 13, ),
        self::TYPE_CAMELNAME     => array('idnentrcp' => 0, 'idnentemp' => 1, 'idnentorg' => 2, 'idnentcln' => 3, 'uuid' => 4, 'fchinccln' => 5, 'tipentrcp' => 6, 'kgsentrcp' => 7, 'cntcjsrcp' => 8, 'rtnentcln' => 9, 'vldentcln' => 10, 'fnsentcln' => 11, 'createdAt' => 12, 'updatedAt' => 13, ),
        self::TYPE_COLNAME       => array(TblentrcpTableMap::COL_IDNENTRCP => 0, TblentrcpTableMap::COL_IDNENTEMP => 1, TblentrcpTableMap::COL_IDNENTORG => 2, TblentrcpTableMap::COL_IDNENTCLN => 3, TblentrcpTableMap::COL_UUID => 4, TblentrcpTableMap::COL_FCHINCCLN => 5, TblentrcpTableMap::COL_TIPENTRCP => 6, TblentrcpTableMap::COL_KGSENTRCP => 7, TblentrcpTableMap::COL_CNTCJSRCP => 8, TblentrcpTableMap::COL_RTNENTCLN => 9, TblentrcpTableMap::COL_VLDENTCLN => 10, TblentrcpTableMap::COL_FNSENTCLN => 11, TblentrcpTableMap::COL_CREATED_AT => 12, TblentrcpTableMap::COL_UPDATED_AT => 13, ),
        self::TYPE_FIELDNAME     => array('idnentrcp' => 0, 'idnentemp' => 1, 'idnentorg' => 2, 'idnentcln' => 3, 'uuid' => 4, 'fchinccln' => 5, 'tipentrcp' => 6, 'kgsentrcp' => 7, 'cntcjsrcp' => 8, 'rtnentcln' => 9, 'vldentcln' => 10, 'fnsentcln' => 11, 'created_at' => 12, 'updated_at' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('tblentrcp');
        $this->setPhpName('Tblentrcp');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentrcp');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idnentrcp', 'Idnentrcp', 'BIGINT', true, null, null);
        $this->addForeignKey('idnentemp', 'Idnentemp', 'BIGINT', 'tblentemp', 'idnentemp', false, null, null);
        $this->addForeignKey('idnentorg', 'Idnentorg', 'BIGINT', 'tblentorg', 'idnentorg', false, null, null);
        $this->addForeignKey('idnentcln', 'Idnentcln', 'BIGINT', 'tblentcln', 'idnentcln', false, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addColumn('fchinccln', 'Fchinccln', 'TIMESTAMP', false, null, null);
        $this->addColumn('tipentrcp', 'Tipentrcp', 'VARCHAR', true, 255, null);
        $this->addColumn('kgsentrcp', 'Kgsentrcp', 'DOUBLE', true, null, null);
        $this->addColumn('cntcjsrcp', 'Cntcjsrcp', 'INTEGER', true, null, null);
        $this->addColumn('rtnentcln', 'Rtnentcln', 'DOUBLE', true, 8, 0);
        $this->addColumn('vldentcln', 'Vldentcln', 'BOOLEAN', true, 1, false);
        $this->addColumn('fnsentcln', 'Fnsentcln', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tblentcln', '\\Tblentcln', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idnentcln',
    1 => ':idnentcln',
  ),
), null, null, null, false);
        $this->addRelation('Tblentemp', '\\Tblentemp', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idnentemp',
    1 => ':idnentemp',
  ),
), null, null, null, false);
        $this->addRelation('Tblentorg', '\\Tblentorg', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idnentorg',
    1 => ':idnentorg',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Idnentrcp', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? TblentrcpTableMap::CLASS_DEFAULT : TblentrcpTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Tblentrcp object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentrcpTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentrcpTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentrcpTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentrcpTableMap::OM_CLASS;
            /** @var Tblentrcp $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentrcpTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TblentrcpTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentrcpTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentrcp $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentrcpTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TblentrcpTableMap::COL_IDNENTRCP);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_IDNENTEMP);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_IDNENTORG);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_IDNENTCLN);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_FCHINCCLN);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_TIPENTRCP);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_KGSENTRCP);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_CNTCJSRCP);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_RTNENTCLN);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_VLDENTCLN);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_FNSENTCLN);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TblentrcpTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.idnentrcp');
            $criteria->addSelectColumn($alias . '.idnentemp');
            $criteria->addSelectColumn($alias . '.idnentorg');
            $criteria->addSelectColumn($alias . '.idnentcln');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.fchinccln');
            $criteria->addSelectColumn($alias . '.tipentrcp');
            $criteria->addSelectColumn($alias . '.kgsentrcp');
            $criteria->addSelectColumn($alias . '.cntcjsrcp');
            $criteria->addSelectColumn($alias . '.rtnentcln');
            $criteria->addSelectColumn($alias . '.vldentcln');
            $criteria->addSelectColumn($alias . '.fnsentcln');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(TblentrcpTableMap::DATABASE_NAME)->getTable(TblentrcpTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentrcpTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentrcpTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentrcpTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentrcp or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentrcp object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrcpTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentrcp) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentrcpTableMap::DATABASE_NAME);
            $criteria->add(TblentrcpTableMap::COL_IDNENTRCP, (array) $values, Criteria::IN);
        }

        $query = TblentrcpQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentrcpTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentrcpTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentrcp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentrcpQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentrcp or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentrcp object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrcpTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentrcp object
        }

        if ($criteria->containsKey(TblentrcpTableMap::COL_IDNENTRCP) && $criteria->keyContainsValue(TblentrcpTableMap::COL_IDNENTRCP) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentrcpTableMap::COL_IDNENTRCP.')');
        }


        // Set the correct dbName
        $query = TblentrcpQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentrcpTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentrcpTableMap::buildTableMap();
