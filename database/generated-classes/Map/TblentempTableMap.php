<?php

namespace Map;

use \Tblentemp;
use \TblentempQuery;
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
 * This class defines the structure of the 'tblentemp' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentempTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentempTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cerodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentemp';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentemp';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentemp';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the idnentemp field
     */
    const COL_IDNENTEMP = 'tblentemp.idnentemp';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentemp.uuid';

    /**
     * the column name for the idnentprs field
     */
    const COL_IDNENTPRS = 'tblentemp.idnentprs';

    /**
     * the column name for the namentemp field
     */
    const COL_NAMENTEMP = 'tblentemp.namentemp';

    /**
     * the column name for the logentemp field
     */
    const COL_LOGENTEMP = 'tblentemp.logentemp';

    /**
     * the column name for the drcentemp field
     */
    const COL_DRCENTEMP = 'tblentemp.drcentemp';

    /**
     * the column name for the lclentemp field
     */
    const COL_LCLENTEMP = 'tblentemp.lclentemp';

    /**
     * the column name for the mncentemp field
     */
    const COL_MNCENTEMP = 'tblentemp.mncentemp';

    /**
     * the column name for the ententemp field
     */
    const COL_ENTENTEMP = 'tblentemp.ententemp';

    /**
     * the column name for the pasentorg field
     */
    const COL_PASENTORG = 'tblentemp.pasentorg';

    /**
     * the column name for the cdgpstemp field
     */
    const COL_CDGPSTEMP = 'tblentemp.cdgpstemp';

    /**
     * the column name for the cdgtrbemp field
     */
    const COL_CDGTRBEMP = 'tblentemp.cdgtrbemp';

    /**
     * the column name for the girentemp field
     */
    const COL_GIRENTEMP = 'tblentemp.girentemp';

    /**
     * the column name for the tlfofiemp field
     */
    const COL_TLFOFIEMP = 'tblentemp.tlfofiemp';

    /**
     * the column name for the emlofiemp field
     */
    const COL_EMLOFIEMP = 'tblentemp.emlofiemp';

    /**
     * the column name for the desaliemp field
     */
    const COL_DESALIEMP = 'tblentemp.desaliemp';

    /**
     * the column name for the candonemp field
     */
    const COL_CANDONEMP = 'tblentemp.candonemp';

    /**
     * the column name for the temconemp field
     */
    const COL_TEMCONEMP = 'tblentemp.temconemp';

    /**
     * the column name for the horentemp field
     */
    const COL_HORENTEMP = 'tblentemp.horentemp';

    /**
     * the column name for the detentemo field
     */
    const COL_DETENTEMO = 'tblentemp.detentemo';

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
        self::TYPE_PHPNAME       => array('Idnentemp', 'Uuid', 'Idnentprs', 'Namentemp', 'Logentemp', 'Drcentemp', 'Lclentemp', 'Mncentemp', 'Ententemp', 'Pasentorg', 'Cdgpstemp', 'Cdgtrbemp', 'Girentemp', 'Tlfofiemp', 'Emlofiemp', 'Desaliemp', 'Candonemp', 'Temconemp', 'Horentemp', 'Detentemo', ),
        self::TYPE_CAMELNAME     => array('idnentemp', 'uuid', 'idnentprs', 'namentemp', 'logentemp', 'drcentemp', 'lclentemp', 'mncentemp', 'ententemp', 'pasentorg', 'cdgpstemp', 'cdgtrbemp', 'girentemp', 'tlfofiemp', 'emlofiemp', 'desaliemp', 'candonemp', 'temconemp', 'horentemp', 'detentemo', ),
        self::TYPE_COLNAME       => array(TblentempTableMap::COL_IDNENTEMP, TblentempTableMap::COL_UUID, TblentempTableMap::COL_IDNENTPRS, TblentempTableMap::COL_NAMENTEMP, TblentempTableMap::COL_LOGENTEMP, TblentempTableMap::COL_DRCENTEMP, TblentempTableMap::COL_LCLENTEMP, TblentempTableMap::COL_MNCENTEMP, TblentempTableMap::COL_ENTENTEMP, TblentempTableMap::COL_PASENTORG, TblentempTableMap::COL_CDGPSTEMP, TblentempTableMap::COL_CDGTRBEMP, TblentempTableMap::COL_GIRENTEMP, TblentempTableMap::COL_TLFOFIEMP, TblentempTableMap::COL_EMLOFIEMP, TblentempTableMap::COL_DESALIEMP, TblentempTableMap::COL_CANDONEMP, TblentempTableMap::COL_TEMCONEMP, TblentempTableMap::COL_HORENTEMP, TblentempTableMap::COL_DETENTEMO, ),
        self::TYPE_FIELDNAME     => array('idnentemp', 'uuid', 'idnentprs', 'namentemp', 'logentemp', 'drcentemp', 'lclentemp', 'mncentemp', 'ententemp', 'pasentorg', 'cdgpstemp', 'cdgtrbemp', 'girentemp', 'tlfofiemp', 'emlofiemp', 'desaliemp', 'candonemp', 'temconemp', 'horentemp', 'detentemo', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idnentemp' => 0, 'Uuid' => 1, 'Idnentprs' => 2, 'Namentemp' => 3, 'Logentemp' => 4, 'Drcentemp' => 5, 'Lclentemp' => 6, 'Mncentemp' => 7, 'Ententemp' => 8, 'Pasentorg' => 9, 'Cdgpstemp' => 10, 'Cdgtrbemp' => 11, 'Girentemp' => 12, 'Tlfofiemp' => 13, 'Emlofiemp' => 14, 'Desaliemp' => 15, 'Candonemp' => 16, 'Temconemp' => 17, 'Horentemp' => 18, 'Detentemo' => 19, ),
        self::TYPE_CAMELNAME     => array('idnentemp' => 0, 'uuid' => 1, 'idnentprs' => 2, 'namentemp' => 3, 'logentemp' => 4, 'drcentemp' => 5, 'lclentemp' => 6, 'mncentemp' => 7, 'ententemp' => 8, 'pasentorg' => 9, 'cdgpstemp' => 10, 'cdgtrbemp' => 11, 'girentemp' => 12, 'tlfofiemp' => 13, 'emlofiemp' => 14, 'desaliemp' => 15, 'candonemp' => 16, 'temconemp' => 17, 'horentemp' => 18, 'detentemo' => 19, ),
        self::TYPE_COLNAME       => array(TblentempTableMap::COL_IDNENTEMP => 0, TblentempTableMap::COL_UUID => 1, TblentempTableMap::COL_IDNENTPRS => 2, TblentempTableMap::COL_NAMENTEMP => 3, TblentempTableMap::COL_LOGENTEMP => 4, TblentempTableMap::COL_DRCENTEMP => 5, TblentempTableMap::COL_LCLENTEMP => 6, TblentempTableMap::COL_MNCENTEMP => 7, TblentempTableMap::COL_ENTENTEMP => 8, TblentempTableMap::COL_PASENTORG => 9, TblentempTableMap::COL_CDGPSTEMP => 10, TblentempTableMap::COL_CDGTRBEMP => 11, TblentempTableMap::COL_GIRENTEMP => 12, TblentempTableMap::COL_TLFOFIEMP => 13, TblentempTableMap::COL_EMLOFIEMP => 14, TblentempTableMap::COL_DESALIEMP => 15, TblentempTableMap::COL_CANDONEMP => 16, TblentempTableMap::COL_TEMCONEMP => 17, TblentempTableMap::COL_HORENTEMP => 18, TblentempTableMap::COL_DETENTEMO => 19, ),
        self::TYPE_FIELDNAME     => array('idnentemp' => 0, 'uuid' => 1, 'idnentprs' => 2, 'namentemp' => 3, 'logentemp' => 4, 'drcentemp' => 5, 'lclentemp' => 6, 'mncentemp' => 7, 'ententemp' => 8, 'pasentorg' => 9, 'cdgpstemp' => 10, 'cdgtrbemp' => 11, 'girentemp' => 12, 'tlfofiemp' => 13, 'emlofiemp' => 14, 'desaliemp' => 15, 'candonemp' => 16, 'temconemp' => 17, 'horentemp' => 18, 'detentemo' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('tblentemp');
        $this->setPhpName('Tblentemp');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentemp');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idnentemp', 'Idnentemp', 'BIGINT', true, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addForeignKey('idnentprs', 'Idnentprs', 'BIGINT', 'tblentprs', 'idnentprs', false, null, null);
        $this->addColumn('namentemp', 'Namentemp', 'VARCHAR', true, 255, '');
        $this->addColumn('logentemp', 'Logentemp', 'VARCHAR', true, 255, '');
        $this->addColumn('drcentemp', 'Drcentemp', 'VARCHAR', true, 255, '');
        $this->addColumn('lclentemp', 'Lclentemp', 'VARCHAR', true, 255, '');
        $this->addColumn('mncentemp', 'Mncentemp', 'VARCHAR', true, 255, '');
        $this->addColumn('ententemp', 'Ententemp', 'VARCHAR', true, 255, '');
        $this->addColumn('pasentorg', 'Pasentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('cdgpstemp', 'Cdgpstemp', 'INTEGER', true, null, 0);
        $this->addColumn('cdgtrbemp', 'Cdgtrbemp', 'VARCHAR', true, 255, '');
        $this->addColumn('girentemp', 'Girentemp', 'VARCHAR', true, 255, '');
        $this->addColumn('tlfofiemp', 'Tlfofiemp', 'VARCHAR', true, 255, '');
        $this->addColumn('emlofiemp', 'Emlofiemp', 'VARCHAR', true, 255, '');
        $this->addColumn('desaliemp', 'Desaliemp', 'VARCHAR', true, 255, '');
        $this->addColumn('candonemp', 'Candonemp', 'VARCHAR', true, 255, '');
        $this->addColumn('temconemp', 'Temconemp', 'TIMESTAMP', false, null, null);
        $this->addColumn('horentemp', 'Horentemp', 'TIMESTAMP', false, null, null);
        $this->addColumn('detentemo', 'Detentemo', 'VARCHAR', true, 255, '');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tblentprs', '\\Tblentprs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idnentprs',
    1 => ':idnentprs',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblentempTableMap::CLASS_DEFAULT : TblentempTableMap::OM_CLASS;
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
     * @return array           (Tblentemp object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentempTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentempTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentempTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentempTableMap::OM_CLASS;
            /** @var Tblentemp $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentempTableMap::addInstanceToPool($obj, $key);
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
            $key = TblentempTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentempTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentemp $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentempTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblentempTableMap::COL_IDNENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentempTableMap::COL_IDNENTPRS);
            $criteria->addSelectColumn(TblentempTableMap::COL_NAMENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_LOGENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_DRCENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_LCLENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_MNCENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_ENTENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_PASENTORG);
            $criteria->addSelectColumn(TblentempTableMap::COL_CDGPSTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_CDGTRBEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_GIRENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_TLFOFIEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_EMLOFIEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_DESALIEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_CANDONEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_TEMCONEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_HORENTEMP);
            $criteria->addSelectColumn(TblentempTableMap::COL_DETENTEMO);
        } else {
            $criteria->addSelectColumn($alias . '.idnentemp');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.idnentprs');
            $criteria->addSelectColumn($alias . '.namentemp');
            $criteria->addSelectColumn($alias . '.logentemp');
            $criteria->addSelectColumn($alias . '.drcentemp');
            $criteria->addSelectColumn($alias . '.lclentemp');
            $criteria->addSelectColumn($alias . '.mncentemp');
            $criteria->addSelectColumn($alias . '.ententemp');
            $criteria->addSelectColumn($alias . '.pasentorg');
            $criteria->addSelectColumn($alias . '.cdgpstemp');
            $criteria->addSelectColumn($alias . '.cdgtrbemp');
            $criteria->addSelectColumn($alias . '.girentemp');
            $criteria->addSelectColumn($alias . '.tlfofiemp');
            $criteria->addSelectColumn($alias . '.emlofiemp');
            $criteria->addSelectColumn($alias . '.desaliemp');
            $criteria->addSelectColumn($alias . '.candonemp');
            $criteria->addSelectColumn($alias . '.temconemp');
            $criteria->addSelectColumn($alias . '.horentemp');
            $criteria->addSelectColumn($alias . '.detentemo');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblentempTableMap::DATABASE_NAME)->getTable(TblentempTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentempTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentempTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentempTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentemp or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentemp object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentempTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentemp) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentempTableMap::DATABASE_NAME);
            $criteria->add(TblentempTableMap::COL_IDNENTEMP, (array) $values, Criteria::IN);
        }

        $query = TblentempQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentempTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentempTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentemp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentempQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentemp or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentemp object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentempTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentemp object
        }

        if ($criteria->containsKey(TblentempTableMap::COL_IDNENTEMP) && $criteria->keyContainsValue(TblentempTableMap::COL_IDNENTEMP) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentempTableMap::COL_IDNENTEMP.')');
        }


        // Set the correct dbName
        $query = TblentempQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentempTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentempTableMap::buildTableMap();
