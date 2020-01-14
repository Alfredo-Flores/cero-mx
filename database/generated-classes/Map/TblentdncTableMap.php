<?php

namespace Map;

use \Tblentdnc;
use \TblentdncQuery;
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
 * This class defines the structure of the 'tblentdnc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentdncTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentdncTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cero';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentdnc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentdnc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentdnc';

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
     * the column name for the identdnc field
     */
    const COL_IDENTDNC = 'tblentdnc.identdnc';

    /**
     * the column name for the idnentemp field
     */
    const COL_IDNENTEMP = 'tblentdnc.idnentemp';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentdnc.uuid';

    /**
     * the column name for the dscentdnc field
     */
    const COL_DSCENTDNC = 'tblentdnc.dscentdnc';

    /**
     * the column name for the tipentdnc field
     */
    const COL_TIPENTDNC = 'tblentdnc.tipentdnc';

    /**
     * the column name for the kgsentdnc field
     */
    const COL_KGSENTDNC = 'tblentdnc.kgsentdnc';

    /**
     * the column name for the cntcjsdnc field
     */
    const COL_CNTCJSDNC = 'tblentdnc.cntcjsdnc';

    /**
     * the column name for the tmprstdnc field
     */
    const COL_TMPRSTDNC = 'tblentdnc.tmprstdnc';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tblentdnc.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tblentdnc.updated_at';

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
        self::TYPE_PHPNAME       => array('Identdnc', 'Idnentemp', 'Uuid', 'Dscentdnc', 'Tipentdnc', 'Kgsentdnc', 'Cntcjsdnc', 'Tmprstdnc', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('identdnc', 'idnentemp', 'uuid', 'dscentdnc', 'tipentdnc', 'kgsentdnc', 'cntcjsdnc', 'tmprstdnc', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(TblentdncTableMap::COL_IDENTDNC, TblentdncTableMap::COL_IDNENTEMP, TblentdncTableMap::COL_UUID, TblentdncTableMap::COL_DSCENTDNC, TblentdncTableMap::COL_TIPENTDNC, TblentdncTableMap::COL_KGSENTDNC, TblentdncTableMap::COL_CNTCJSDNC, TblentdncTableMap::COL_TMPRSTDNC, TblentdncTableMap::COL_CREATED_AT, TblentdncTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('identdnc', 'idnentemp', 'uuid', 'dscentdnc', 'tipentdnc', 'kgsentdnc', 'cntcjsdnc', 'tmprstdnc', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Identdnc' => 0, 'Idnentemp' => 1, 'Uuid' => 2, 'Dscentdnc' => 3, 'Tipentdnc' => 4, 'Kgsentdnc' => 5, 'Cntcjsdnc' => 6, 'Tmprstdnc' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('identdnc' => 0, 'idnentemp' => 1, 'uuid' => 2, 'dscentdnc' => 3, 'tipentdnc' => 4, 'kgsentdnc' => 5, 'cntcjsdnc' => 6, 'tmprstdnc' => 7, 'createdAt' => 8, 'updatedAt' => 9, ),
        self::TYPE_COLNAME       => array(TblentdncTableMap::COL_IDENTDNC => 0, TblentdncTableMap::COL_IDNENTEMP => 1, TblentdncTableMap::COL_UUID => 2, TblentdncTableMap::COL_DSCENTDNC => 3, TblentdncTableMap::COL_TIPENTDNC => 4, TblentdncTableMap::COL_KGSENTDNC => 5, TblentdncTableMap::COL_CNTCJSDNC => 6, TblentdncTableMap::COL_TMPRSTDNC => 7, TblentdncTableMap::COL_CREATED_AT => 8, TblentdncTableMap::COL_UPDATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('identdnc' => 0, 'idnentemp' => 1, 'uuid' => 2, 'dscentdnc' => 3, 'tipentdnc' => 4, 'kgsentdnc' => 5, 'cntcjsdnc' => 6, 'tmprstdnc' => 7, 'created_at' => 8, 'updated_at' => 9, ),
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
        $this->setName('tblentdnc');
        $this->setPhpName('Tblentdnc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentdnc');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('identdnc', 'Identdnc', 'BIGINT', true, null, null);
        $this->addForeignKey('idnentemp', 'Idnentemp', 'BIGINT', 'tblentemp', 'idnentemp', false, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addColumn('dscentdnc', 'Dscentdnc', 'VARCHAR', true, 255, null);
        $this->addColumn('tipentdnc', 'Tipentdnc', 'VARCHAR', true, 255, null);
        $this->addColumn('kgsentdnc', 'Kgsentdnc', 'DOUBLE', true, null, null);
        $this->addColumn('cntcjsdnc', 'Cntcjsdnc', 'INTEGER', true, null, null);
        $this->addColumn('tmprstdnc', 'Tmprstdnc', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblentdncTableMap::CLASS_DEFAULT : TblentdncTableMap::OM_CLASS;
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
     * @return array           (Tblentdnc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentdncTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentdncTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentdncTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentdncTableMap::OM_CLASS;
            /** @var Tblentdnc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentdncTableMap::addInstanceToPool($obj, $key);
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
            $key = TblentdncTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentdncTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentdnc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentdncTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblentdncTableMap::COL_IDENTDNC);
            $criteria->addSelectColumn(TblentdncTableMap::COL_IDNENTEMP);
            $criteria->addSelectColumn(TblentdncTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentdncTableMap::COL_DSCENTDNC);
            $criteria->addSelectColumn(TblentdncTableMap::COL_TIPENTDNC);
            $criteria->addSelectColumn(TblentdncTableMap::COL_KGSENTDNC);
            $criteria->addSelectColumn(TblentdncTableMap::COL_CNTCJSDNC);
            $criteria->addSelectColumn(TblentdncTableMap::COL_TMPRSTDNC);
            $criteria->addSelectColumn(TblentdncTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TblentdncTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.identdnc');
            $criteria->addSelectColumn($alias . '.idnentemp');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.dscentdnc');
            $criteria->addSelectColumn($alias . '.tipentdnc');
            $criteria->addSelectColumn($alias . '.kgsentdnc');
            $criteria->addSelectColumn($alias . '.cntcjsdnc');
            $criteria->addSelectColumn($alias . '.tmprstdnc');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblentdncTableMap::DATABASE_NAME)->getTable(TblentdncTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentdncTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentdncTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentdncTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentdnc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentdnc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentdncTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentdnc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentdncTableMap::DATABASE_NAME);
            $criteria->add(TblentdncTableMap::COL_IDENTDNC, (array) $values, Criteria::IN);
        }

        $query = TblentdncQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentdncTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentdncTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentdnc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentdncQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentdnc or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentdnc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentdncTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentdnc object
        }

        if ($criteria->containsKey(TblentdncTableMap::COL_IDENTDNC) && $criteria->keyContainsValue(TblentdncTableMap::COL_IDENTDNC) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentdncTableMap::COL_IDENTDNC.')');
        }


        // Set the correct dbName
        $query = TblentdncQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentdncTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentdncTableMap::buildTableMap();
