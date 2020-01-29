<?php

namespace Map;

use \Tblentcln;
use \TblentclnQuery;
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
 * This class defines the structure of the 'tblentcln' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentclnTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentclnTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cero';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentcln';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentcln';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentcln';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the idnentcln field
     */
    const COL_IDNENTCLN = 'tblentcln.idnentcln';

    /**
     * the column name for the idnentemp field
     */
    const COL_IDNENTEMP = 'tblentcln.idnentemp';

    /**
     * the column name for the idnentorg field
     */
    const COL_IDNENTORG = 'tblentcln.idnentorg';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentcln.uuid';

    /**
     * the column name for the prdentcln field
     */
    const COL_PRDENTCLN = 'tblentcln.prdentcln';

    /**
     * the column name for the fchinccln field
     */
    const COL_FCHINCCLN = 'tblentcln.fchinccln';

    /**
     * the column name for the fchfnlcln field
     */
    const COL_FCHFNLCLN = 'tblentcln.fchfnlcln';

    /**
     * the column name for the fnsentcln field
     */
    const COL_FNSENTCLN = 'tblentcln.fnsentcln';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tblentcln.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tblentcln.updated_at';

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
        self::TYPE_PHPNAME       => array('Idnentcln', 'Idnentemp', 'Idnentorg', 'Uuid', 'Prdentcln', 'Fchinccln', 'Fchfnlcln', 'Fnsentcln', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idnentcln', 'idnentemp', 'idnentorg', 'uuid', 'prdentcln', 'fchinccln', 'fchfnlcln', 'fnsentcln', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(TblentclnTableMap::COL_IDNENTCLN, TblentclnTableMap::COL_IDNENTEMP, TblentclnTableMap::COL_IDNENTORG, TblentclnTableMap::COL_UUID, TblentclnTableMap::COL_PRDENTCLN, TblentclnTableMap::COL_FCHINCCLN, TblentclnTableMap::COL_FCHFNLCLN, TblentclnTableMap::COL_FNSENTCLN, TblentclnTableMap::COL_CREATED_AT, TblentclnTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('idnentcln', 'idnentemp', 'idnentorg', 'uuid', 'prdentcln', 'fchinccln', 'fchfnlcln', 'fnsentcln', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idnentcln' => 0, 'Idnentemp' => 1, 'Idnentorg' => 2, 'Uuid' => 3, 'Prdentcln' => 4, 'Fchinccln' => 5, 'Fchfnlcln' => 6, 'Fnsentcln' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('idnentcln' => 0, 'idnentemp' => 1, 'idnentorg' => 2, 'uuid' => 3, 'prdentcln' => 4, 'fchinccln' => 5, 'fchfnlcln' => 6, 'fnsentcln' => 7, 'createdAt' => 8, 'updatedAt' => 9, ),
        self::TYPE_COLNAME       => array(TblentclnTableMap::COL_IDNENTCLN => 0, TblentclnTableMap::COL_IDNENTEMP => 1, TblentclnTableMap::COL_IDNENTORG => 2, TblentclnTableMap::COL_UUID => 3, TblentclnTableMap::COL_PRDENTCLN => 4, TblentclnTableMap::COL_FCHINCCLN => 5, TblentclnTableMap::COL_FCHFNLCLN => 6, TblentclnTableMap::COL_FNSENTCLN => 7, TblentclnTableMap::COL_CREATED_AT => 8, TblentclnTableMap::COL_UPDATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('idnentcln' => 0, 'idnentemp' => 1, 'idnentorg' => 2, 'uuid' => 3, 'prdentcln' => 4, 'fchinccln' => 5, 'fchfnlcln' => 6, 'fnsentcln' => 7, 'created_at' => 8, 'updated_at' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('tblentcln');
        $this->setPhpName('Tblentcln');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentcln');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idnentcln', 'Idnentcln', 'BIGINT', true, null, null);
        $this->addForeignKey('idnentemp', 'Idnentemp', 'BIGINT', 'tblentemp', 'idnentemp', false, null, null);
        $this->addForeignKey('idnentorg', 'Idnentorg', 'BIGINT', 'tblentorg', 'idnentorg', false, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addColumn('prdentcln', 'Prdentcln', 'INTEGER', true, null, 0);
        $this->addColumn('fchinccln', 'Fchinccln', 'TIMESTAMP', false, null, null);
        $this->addColumn('fchfnlcln', 'Fchfnlcln', 'TIMESTAMP', false, null, null);
        $this->addColumn('fnsentcln', 'Fnsentcln', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        $this->addRelation('Tblentrcp', '\\Tblentrcp', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idnentcln',
    1 => ':idnentcln',
  ),
), null, null, 'Tblentrcps', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idnentcln', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblentclnTableMap::CLASS_DEFAULT : TblentclnTableMap::OM_CLASS;
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
     * @return array           (Tblentcln object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentclnTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentclnTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentclnTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentclnTableMap::OM_CLASS;
            /** @var Tblentcln $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentclnTableMap::addInstanceToPool($obj, $key);
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
            $key = TblentclnTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentclnTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentcln $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentclnTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblentclnTableMap::COL_IDNENTCLN);
            $criteria->addSelectColumn(TblentclnTableMap::COL_IDNENTEMP);
            $criteria->addSelectColumn(TblentclnTableMap::COL_IDNENTORG);
            $criteria->addSelectColumn(TblentclnTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentclnTableMap::COL_PRDENTCLN);
            $criteria->addSelectColumn(TblentclnTableMap::COL_FCHINCCLN);
            $criteria->addSelectColumn(TblentclnTableMap::COL_FCHFNLCLN);
            $criteria->addSelectColumn(TblentclnTableMap::COL_FNSENTCLN);
            $criteria->addSelectColumn(TblentclnTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TblentclnTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.idnentcln');
            $criteria->addSelectColumn($alias . '.idnentemp');
            $criteria->addSelectColumn($alias . '.idnentorg');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.prdentcln');
            $criteria->addSelectColumn($alias . '.fchinccln');
            $criteria->addSelectColumn($alias . '.fchfnlcln');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblentclnTableMap::DATABASE_NAME)->getTable(TblentclnTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentclnTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentclnTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentclnTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentcln or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentcln object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentclnTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentcln) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentclnTableMap::DATABASE_NAME);
            $criteria->add(TblentclnTableMap::COL_IDNENTCLN, (array) $values, Criteria::IN);
        }

        $query = TblentclnQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentclnTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentclnTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentcln table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentclnQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentcln or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentcln object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentclnTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentcln object
        }

        if ($criteria->containsKey(TblentclnTableMap::COL_IDNENTCLN) && $criteria->keyContainsValue(TblentclnTableMap::COL_IDNENTCLN) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentclnTableMap::COL_IDNENTCLN.')');
        }


        // Set the correct dbName
        $query = TblentclnQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentclnTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentclnTableMap::buildTableMap();
