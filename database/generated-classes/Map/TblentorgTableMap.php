<?php

namespace Map;

use \Tblentorg;
use \TblentorgQuery;
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
 * This class defines the structure of the 'tblentorg' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentorgTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentorgTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cerodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentorg';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentorg';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentorg';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the idnentorg field
     */
    const COL_IDNENTORG = 'tblentorg.idnentorg';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentorg.uuid';

    /**
     * the column name for the idnentprs field
     */
    const COL_IDNENTPRS = 'tblentorg.idnentprs';

    /**
     * the column name for the sgmentorg field
     */
    const COL_SGMENTORG = 'tblentorg.sgmentorg';

    /**
     * the column name for the bnfentorg field
     */
    const COL_BNFENTORG = 'tblentorg.bnfentorg';

    /**
     * the column name for the nmbentorg field
     */
    const COL_NMBENTORG = 'tblentorg.nmbentorg';

    /**
     * the column name for the logentorg field
     */
    const COL_LOGENTORG = 'tblentorg.logentorg';

    /**
     * the column name for the rfcentorg field
     */
    const COL_RFCENTORG = 'tblentorg.rfcentorg';

    /**
     * the column name for the dmcentorg field
     */
    const COL_DMCENTORG = 'tblentorg.dmcentorg';

    /**
     * the column name for the lclentorg field
     */
    const COL_LCLENTORG = 'tblentorg.lclentorg';

    /**
     * the column name for the mncentorg field
     */
    const COL_MNCENTORG = 'tblentorg.mncentorg';

    /**
     * the column name for the etdentorg field
     */
    const COL_ETDENTORG = 'tblentorg.etdentorg';

    /**
     * the column name for the pasentorg field
     */
    const COL_PASENTORG = 'tblentorg.pasentorg';

    /**
     * the column name for the cdgpstorg field
     */
    const COL_CDGPSTORG = 'tblentorg.cdgpstorg';

    /**
     * the column name for the tlffcnorg field
     */
    const COL_TLFFCNORG = 'tblentorg.tlffcnorg';

    /**
     * the column name for the emlfcnorg field
     */
    const COL_EMLFCNORG = 'tblentorg.emlfcnorg';

    /**
     * the column name for the plntrborg field
     */
    const COL_PLNTRBORG = 'tblentorg.plntrborg';

    /**
     * the column name for the actcnsorg field
     */
    const COL_ACTCNSORG = 'tblentorg.actcnsorg';

    /**
     * the column name for the cnsdntorg field
     */
    const COL_CNSDNTORG = 'tblentorg.cnsdntorg';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tblentorg.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tblentorg.updated_at';

    /**
     * the column name for the hstentorg field
     */
    const COL_HSTENTORG = 'tblentorg.hstentorg';

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
        self::TYPE_PHPNAME       => array('Idnentorg', 'Uuid', 'Idnentprs', 'Sgmentorg', 'Bnfentorg', 'Nmbentorg', 'Logentorg', 'Rfcentorg', 'Dmcentorg', 'Lclentorg', 'Mncentorg', 'Etdentorg', 'Pasentorg', 'Cdgpstorg', 'Tlffcnorg', 'Emlfcnorg', 'Plntrborg', 'Actcnsorg', 'Cnsdntorg', 'CreatedAt', 'UpdatedAt', 'Hstentorg', ),
        self::TYPE_CAMELNAME     => array('idnentorg', 'uuid', 'idnentprs', 'sgmentorg', 'bnfentorg', 'nmbentorg', 'logentorg', 'rfcentorg', 'dmcentorg', 'lclentorg', 'mncentorg', 'etdentorg', 'pasentorg', 'cdgpstorg', 'tlffcnorg', 'emlfcnorg', 'plntrborg', 'actcnsorg', 'cnsdntorg', 'createdAt', 'updatedAt', 'hstentorg', ),
        self::TYPE_COLNAME       => array(TblentorgTableMap::COL_IDNENTORG, TblentorgTableMap::COL_UUID, TblentorgTableMap::COL_IDNENTPRS, TblentorgTableMap::COL_SGMENTORG, TblentorgTableMap::COL_BNFENTORG, TblentorgTableMap::COL_NMBENTORG, TblentorgTableMap::COL_LOGENTORG, TblentorgTableMap::COL_RFCENTORG, TblentorgTableMap::COL_DMCENTORG, TblentorgTableMap::COL_LCLENTORG, TblentorgTableMap::COL_MNCENTORG, TblentorgTableMap::COL_ETDENTORG, TblentorgTableMap::COL_PASENTORG, TblentorgTableMap::COL_CDGPSTORG, TblentorgTableMap::COL_TLFFCNORG, TblentorgTableMap::COL_EMLFCNORG, TblentorgTableMap::COL_PLNTRBORG, TblentorgTableMap::COL_ACTCNSORG, TblentorgTableMap::COL_CNSDNTORG, TblentorgTableMap::COL_CREATED_AT, TblentorgTableMap::COL_UPDATED_AT, TblentorgTableMap::COL_HSTENTORG, ),
        self::TYPE_FIELDNAME     => array('idnentorg', 'uuid', 'idnentprs', 'sgmentorg', 'bnfentorg', 'nmbentorg', 'logentorg', 'rfcentorg', 'dmcentorg', 'lclentorg', 'mncentorg', 'etdentorg', 'pasentorg', 'cdgpstorg', 'tlffcnorg', 'emlfcnorg', 'plntrborg', 'actcnsorg', 'cnsdntorg', 'created_at', 'updated_at', 'hstentorg', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idnentorg' => 0, 'Uuid' => 1, 'Idnentprs' => 2, 'Sgmentorg' => 3, 'Bnfentorg' => 4, 'Nmbentorg' => 5, 'Logentorg' => 6, 'Rfcentorg' => 7, 'Dmcentorg' => 8, 'Lclentorg' => 9, 'Mncentorg' => 10, 'Etdentorg' => 11, 'Pasentorg' => 12, 'Cdgpstorg' => 13, 'Tlffcnorg' => 14, 'Emlfcnorg' => 15, 'Plntrborg' => 16, 'Actcnsorg' => 17, 'Cnsdntorg' => 18, 'CreatedAt' => 19, 'UpdatedAt' => 20, 'Hstentorg' => 21, ),
        self::TYPE_CAMELNAME     => array('idnentorg' => 0, 'uuid' => 1, 'idnentprs' => 2, 'sgmentorg' => 3, 'bnfentorg' => 4, 'nmbentorg' => 5, 'logentorg' => 6, 'rfcentorg' => 7, 'dmcentorg' => 8, 'lclentorg' => 9, 'mncentorg' => 10, 'etdentorg' => 11, 'pasentorg' => 12, 'cdgpstorg' => 13, 'tlffcnorg' => 14, 'emlfcnorg' => 15, 'plntrborg' => 16, 'actcnsorg' => 17, 'cnsdntorg' => 18, 'createdAt' => 19, 'updatedAt' => 20, 'hstentorg' => 21, ),
        self::TYPE_COLNAME       => array(TblentorgTableMap::COL_IDNENTORG => 0, TblentorgTableMap::COL_UUID => 1, TblentorgTableMap::COL_IDNENTPRS => 2, TblentorgTableMap::COL_SGMENTORG => 3, TblentorgTableMap::COL_BNFENTORG => 4, TblentorgTableMap::COL_NMBENTORG => 5, TblentorgTableMap::COL_LOGENTORG => 6, TblentorgTableMap::COL_RFCENTORG => 7, TblentorgTableMap::COL_DMCENTORG => 8, TblentorgTableMap::COL_LCLENTORG => 9, TblentorgTableMap::COL_MNCENTORG => 10, TblentorgTableMap::COL_ETDENTORG => 11, TblentorgTableMap::COL_PASENTORG => 12, TblentorgTableMap::COL_CDGPSTORG => 13, TblentorgTableMap::COL_TLFFCNORG => 14, TblentorgTableMap::COL_EMLFCNORG => 15, TblentorgTableMap::COL_PLNTRBORG => 16, TblentorgTableMap::COL_ACTCNSORG => 17, TblentorgTableMap::COL_CNSDNTORG => 18, TblentorgTableMap::COL_CREATED_AT => 19, TblentorgTableMap::COL_UPDATED_AT => 20, TblentorgTableMap::COL_HSTENTORG => 21, ),
        self::TYPE_FIELDNAME     => array('idnentorg' => 0, 'uuid' => 1, 'idnentprs' => 2, 'sgmentorg' => 3, 'bnfentorg' => 4, 'nmbentorg' => 5, 'logentorg' => 6, 'rfcentorg' => 7, 'dmcentorg' => 8, 'lclentorg' => 9, 'mncentorg' => 10, 'etdentorg' => 11, 'pasentorg' => 12, 'cdgpstorg' => 13, 'tlffcnorg' => 14, 'emlfcnorg' => 15, 'plntrborg' => 16, 'actcnsorg' => 17, 'cnsdntorg' => 18, 'created_at' => 19, 'updated_at' => 20, 'hstentorg' => 21, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $this->setName('tblentorg');
        $this->setPhpName('Tblentorg');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentorg');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idnentorg', 'Idnentorg', 'BIGINT', true, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addForeignKey('idnentprs', 'Idnentprs', 'BIGINT', 'tblentprs', 'idnentprs', false, null, null);
        $this->addColumn('sgmentorg', 'Sgmentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('bnfentorg', 'Bnfentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('nmbentorg', 'Nmbentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('logentorg', 'Logentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('rfcentorg', 'Rfcentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('dmcentorg', 'Dmcentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('lclentorg', 'Lclentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('mncentorg', 'Mncentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('etdentorg', 'Etdentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('pasentorg', 'Pasentorg', 'VARCHAR', true, 255, '');
        $this->addColumn('cdgpstorg', 'Cdgpstorg', 'VARCHAR', true, 255, '');
        $this->addColumn('tlffcnorg', 'Tlffcnorg', 'VARCHAR', true, 255, '');
        $this->addColumn('emlfcnorg', 'Emlfcnorg', 'VARCHAR', true, 255, '');
        $this->addColumn('plntrborg', 'Plntrborg', 'VARCHAR', true, 255, '');
        $this->addColumn('actcnsorg', 'Actcnsorg', 'VARCHAR', true, 255, '');
        $this->addColumn('cnsdntorg', 'Cnsdntorg', 'VARCHAR', true, 255, '');
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('hstentorg', 'Hstentorg', 'VARCHAR', false, null, null);
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
        $this->addRelation('Tblentcln', '\\Tblentcln', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idnentorg',
    1 => ':idnentorg',
  ),
), null, null, 'Tblentclns', false);
        $this->addRelation('Tblentdnc', '\\Tblentdnc', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idnentorg',
    1 => ':idnentorg',
  ),
), null, null, 'Tblentdncs', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblentorgTableMap::CLASS_DEFAULT : TblentorgTableMap::OM_CLASS;
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
     * @return array           (Tblentorg object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentorgTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentorgTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentorgTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentorgTableMap::OM_CLASS;
            /** @var Tblentorg $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentorgTableMap::addInstanceToPool($obj, $key);
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
            $key = TblentorgTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentorgTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentorg $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentorgTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblentorgTableMap::COL_IDNENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentorgTableMap::COL_IDNENTPRS);
            $criteria->addSelectColumn(TblentorgTableMap::COL_SGMENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_BNFENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_NMBENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_LOGENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_RFCENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_DMCENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_LCLENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_MNCENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_ETDENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_PASENTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_CDGPSTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_TLFFCNORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_EMLFCNORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_PLNTRBORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_ACTCNSORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_CNSDNTORG);
            $criteria->addSelectColumn(TblentorgTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TblentorgTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(TblentorgTableMap::COL_HSTENTORG);
        } else {
            $criteria->addSelectColumn($alias . '.idnentorg');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.idnentprs');
            $criteria->addSelectColumn($alias . '.sgmentorg');
            $criteria->addSelectColumn($alias . '.bnfentorg');
            $criteria->addSelectColumn($alias . '.nmbentorg');
            $criteria->addSelectColumn($alias . '.logentorg');
            $criteria->addSelectColumn($alias . '.rfcentorg');
            $criteria->addSelectColumn($alias . '.dmcentorg');
            $criteria->addSelectColumn($alias . '.lclentorg');
            $criteria->addSelectColumn($alias . '.mncentorg');
            $criteria->addSelectColumn($alias . '.etdentorg');
            $criteria->addSelectColumn($alias . '.pasentorg');
            $criteria->addSelectColumn($alias . '.cdgpstorg');
            $criteria->addSelectColumn($alias . '.tlffcnorg');
            $criteria->addSelectColumn($alias . '.emlfcnorg');
            $criteria->addSelectColumn($alias . '.plntrborg');
            $criteria->addSelectColumn($alias . '.actcnsorg');
            $criteria->addSelectColumn($alias . '.cnsdntorg');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.hstentorg');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblentorgTableMap::DATABASE_NAME)->getTable(TblentorgTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentorgTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentorgTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentorgTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentorg or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentorg object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentorgTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentorg) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentorgTableMap::DATABASE_NAME);
            $criteria->add(TblentorgTableMap::COL_IDNENTORG, (array) $values, Criteria::IN);
        }

        $query = TblentorgQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentorgTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentorgTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentorg table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentorgQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentorg or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentorg object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentorgTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentorg object
        }

        if ($criteria->containsKey(TblentorgTableMap::COL_IDNENTORG) && $criteria->keyContainsValue(TblentorgTableMap::COL_IDNENTORG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentorgTableMap::COL_IDNENTORG.')');
        }


        // Set the correct dbName
        $query = TblentorgQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentorgTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentorgTableMap::buildTableMap();
