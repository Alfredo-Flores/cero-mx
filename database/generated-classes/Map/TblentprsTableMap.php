<?php

namespace Map;

use \Tblentprs;
use \TblentprsQuery;
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
 * This class defines the structure of the 'tblentprs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentprsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentprsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cerodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentprs';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentprs';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentprs';

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
     * the column name for the idnentprs field
     */
    const COL_IDNENTPRS = 'tblentprs.idnentprs';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentprs.uuid';

    /**
     * the column name for the idnentusr field
     */
    const COL_IDNENTUSR = 'tblentprs.idnentusr';

    /**
     * the column name for the nomentprs field
     */
    const COL_NOMENTPRS = 'tblentprs.nomentprs';

    /**
     * the column name for the prmaplprs field
     */
    const COL_PRMAPLPRS = 'tblentprs.prmaplprs';

    /**
     * the column name for the sgnaplprs field
     */
    const COL_SGNAPLPRS = 'tblentprs.sgnaplprs';

    /**
     * the column name for the crpentprs field
     */
    const COL_CRPENTPRS = 'tblentprs.crpentprs';

    /**
     * the column name for the rfcentprs field
     */
    const COL_RFCENTPRS = 'tblentprs.rfcentprs';

    /**
     * the column name for the emllbrprs field
     */
    const COL_EMLLBRPRS = 'tblentprs.emllbrprs';

    /**
     * the column name for the emlprsprs field
     */
    const COL_EMLPRSPRS = 'tblentprs.emlprsprs';

    /**
     * the column name for the ncnentprs field
     */
    const COL_NCNENTPRS = 'tblentprs.ncnentprs';

    /**
     * the column name for the pasentprs field
     */
    const COL_PASENTPRS = 'tblentprs.pasentprs';

    /**
     * the column name for the ententprs field
     */
    const COL_ENTENTPRS = 'tblentprs.ententprs';

    /**
     * the column name for the mncentprs field
     */
    const COL_MNCENTPRS = 'tblentprs.mncentprs';

    /**
     * the column name for the lclentprs field
     */
    const COL_LCLENTPRS = 'tblentprs.lclentprs';

    /**
     * the column name for the dmcentprs field
     */
    const COL_DMCENTPRS = 'tblentprs.dmcentprs';

    /**
     * the column name for the cdgpstprs field
     */
    const COL_CDGPSTPRS = 'tblentprs.cdgpstprs';

    /**
     * the column name for the tlffijprs field
     */
    const COL_TLFFIJPRS = 'tblentprs.tlffijprs';

    /**
     * the column name for the tlfmvlprs field
     */
    const COL_TLFMVLPRS = 'tblentprs.tlfmvlprs';

    /**
     * the column name for the fotentprs field
     */
    const COL_FOTENTPRS = 'tblentprs.fotentprs';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tblentprs.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tblentprs.updated_at';

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
        self::TYPE_PHPNAME       => array('Idnentprs', 'Uuid', 'Idnentusr', 'Nomentprs', 'Prmaplprs', 'Sgnaplprs', 'Crpentprs', 'Rfcentprs', 'Emllbrprs', 'Emlprsprs', 'Ncnentprs', 'Pasentprs', 'Ententprs', 'Mncentprs', 'Lclentprs', 'Dmcentprs', 'Cdgpstprs', 'Tlffijprs', 'Tlfmvlprs', 'Fotentprs', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idnentprs', 'uuid', 'idnentusr', 'nomentprs', 'prmaplprs', 'sgnaplprs', 'crpentprs', 'rfcentprs', 'emllbrprs', 'emlprsprs', 'ncnentprs', 'pasentprs', 'ententprs', 'mncentprs', 'lclentprs', 'dmcentprs', 'cdgpstprs', 'tlffijprs', 'tlfmvlprs', 'fotentprs', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(TblentprsTableMap::COL_IDNENTPRS, TblentprsTableMap::COL_UUID, TblentprsTableMap::COL_IDNENTUSR, TblentprsTableMap::COL_NOMENTPRS, TblentprsTableMap::COL_PRMAPLPRS, TblentprsTableMap::COL_SGNAPLPRS, TblentprsTableMap::COL_CRPENTPRS, TblentprsTableMap::COL_RFCENTPRS, TblentprsTableMap::COL_EMLLBRPRS, TblentprsTableMap::COL_EMLPRSPRS, TblentprsTableMap::COL_NCNENTPRS, TblentprsTableMap::COL_PASENTPRS, TblentprsTableMap::COL_ENTENTPRS, TblentprsTableMap::COL_MNCENTPRS, TblentprsTableMap::COL_LCLENTPRS, TblentprsTableMap::COL_DMCENTPRS, TblentprsTableMap::COL_CDGPSTPRS, TblentprsTableMap::COL_TLFFIJPRS, TblentprsTableMap::COL_TLFMVLPRS, TblentprsTableMap::COL_FOTENTPRS, TblentprsTableMap::COL_CREATED_AT, TblentprsTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('idnentprs', 'uuid', 'idnentusr', 'nomentprs', 'prmaplprs', 'sgnaplprs', 'crpentprs', 'rfcentprs', 'emllbrprs', 'emlprsprs', 'ncnentprs', 'pasentprs', 'ententprs', 'mncentprs', 'lclentprs', 'dmcentprs', 'cdgpstprs', 'tlffijprs', 'tlfmvlprs', 'fotentprs', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idnentprs' => 0, 'Uuid' => 1, 'Idnentusr' => 2, 'Nomentprs' => 3, 'Prmaplprs' => 4, 'Sgnaplprs' => 5, 'Crpentprs' => 6, 'Rfcentprs' => 7, 'Emllbrprs' => 8, 'Emlprsprs' => 9, 'Ncnentprs' => 10, 'Pasentprs' => 11, 'Ententprs' => 12, 'Mncentprs' => 13, 'Lclentprs' => 14, 'Dmcentprs' => 15, 'Cdgpstprs' => 16, 'Tlffijprs' => 17, 'Tlfmvlprs' => 18, 'Fotentprs' => 19, 'CreatedAt' => 20, 'UpdatedAt' => 21, ),
        self::TYPE_CAMELNAME     => array('idnentprs' => 0, 'uuid' => 1, 'idnentusr' => 2, 'nomentprs' => 3, 'prmaplprs' => 4, 'sgnaplprs' => 5, 'crpentprs' => 6, 'rfcentprs' => 7, 'emllbrprs' => 8, 'emlprsprs' => 9, 'ncnentprs' => 10, 'pasentprs' => 11, 'ententprs' => 12, 'mncentprs' => 13, 'lclentprs' => 14, 'dmcentprs' => 15, 'cdgpstprs' => 16, 'tlffijprs' => 17, 'tlfmvlprs' => 18, 'fotentprs' => 19, 'createdAt' => 20, 'updatedAt' => 21, ),
        self::TYPE_COLNAME       => array(TblentprsTableMap::COL_IDNENTPRS => 0, TblentprsTableMap::COL_UUID => 1, TblentprsTableMap::COL_IDNENTUSR => 2, TblentprsTableMap::COL_NOMENTPRS => 3, TblentprsTableMap::COL_PRMAPLPRS => 4, TblentprsTableMap::COL_SGNAPLPRS => 5, TblentprsTableMap::COL_CRPENTPRS => 6, TblentprsTableMap::COL_RFCENTPRS => 7, TblentprsTableMap::COL_EMLLBRPRS => 8, TblentprsTableMap::COL_EMLPRSPRS => 9, TblentprsTableMap::COL_NCNENTPRS => 10, TblentprsTableMap::COL_PASENTPRS => 11, TblentprsTableMap::COL_ENTENTPRS => 12, TblentprsTableMap::COL_MNCENTPRS => 13, TblentprsTableMap::COL_LCLENTPRS => 14, TblentprsTableMap::COL_DMCENTPRS => 15, TblentprsTableMap::COL_CDGPSTPRS => 16, TblentprsTableMap::COL_TLFFIJPRS => 17, TblentprsTableMap::COL_TLFMVLPRS => 18, TblentprsTableMap::COL_FOTENTPRS => 19, TblentprsTableMap::COL_CREATED_AT => 20, TblentprsTableMap::COL_UPDATED_AT => 21, ),
        self::TYPE_FIELDNAME     => array('idnentprs' => 0, 'uuid' => 1, 'idnentusr' => 2, 'nomentprs' => 3, 'prmaplprs' => 4, 'sgnaplprs' => 5, 'crpentprs' => 6, 'rfcentprs' => 7, 'emllbrprs' => 8, 'emlprsprs' => 9, 'ncnentprs' => 10, 'pasentprs' => 11, 'ententprs' => 12, 'mncentprs' => 13, 'lclentprs' => 14, 'dmcentprs' => 15, 'cdgpstprs' => 16, 'tlffijprs' => 17, 'tlfmvlprs' => 18, 'fotentprs' => 19, 'created_at' => 20, 'updated_at' => 21, ),
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
        $this->setName('tblentprs');
        $this->setPhpName('Tblentprs');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentprs');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idnentprs', 'Idnentprs', 'BIGINT', true, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addForeignKey('idnentusr', 'Idnentusr', 'BIGINT', 'users', 'id', false, null, null);
        $this->addColumn('nomentprs', 'Nomentprs', 'VARCHAR', true, 255, '');
        $this->addColumn('prmaplprs', 'Prmaplprs', 'VARCHAR', true, 255, '');
        $this->addColumn('sgnaplprs', 'Sgnaplprs', 'VARCHAR', true, 255, '');
        $this->addColumn('crpentprs', 'Crpentprs', 'VARCHAR', true, 18, '');
        $this->addColumn('rfcentprs', 'Rfcentprs', 'VARCHAR', true, 13, '');
        $this->addColumn('emllbrprs', 'Emllbrprs', 'VARCHAR', true, 255, '');
        $this->addColumn('emlprsprs', 'Emlprsprs', 'VARCHAR', true, 255, '');
        $this->addColumn('ncnentprs', 'Ncnentprs', 'VARCHAR', true, 255, '');
        $this->addColumn('pasentprs', 'Pasentprs', 'VARCHAR', true, 255, '');
        $this->addColumn('ententprs', 'Ententprs', 'VARCHAR', true, 255, '');
        $this->addColumn('mncentprs', 'Mncentprs', 'VARCHAR', true, 255, '');
        $this->addColumn('lclentprs', 'Lclentprs', 'VARCHAR', true, 255, '');
        $this->addColumn('dmcentprs', 'Dmcentprs', 'VARCHAR', true, 255, '');
        $this->addColumn('cdgpstprs', 'Cdgpstprs', 'VARCHAR', true, 5, '');
        $this->addColumn('tlffijprs', 'Tlffijprs', 'VARCHAR', true, 12, '');
        $this->addColumn('tlfmvlprs', 'Tlfmvlprs', 'VARCHAR', true, 12, '');
        $this->addColumn('fotentprs', 'Fotentprs', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Users', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idnentusr',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Tblentemp', '\\Tblentemp', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idnentprs',
    1 => ':idnentprs',
  ),
), null, null, 'Tblentemps', false);
        $this->addRelation('Tblentorg', '\\Tblentorg', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idnentprs',
    1 => ':idnentprs',
  ),
), null, null, 'Tblentorgs', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblentprsTableMap::CLASS_DEFAULT : TblentprsTableMap::OM_CLASS;
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
     * @return array           (Tblentprs object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentprsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentprsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentprsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentprsTableMap::OM_CLASS;
            /** @var Tblentprs $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentprsTableMap::addInstanceToPool($obj, $key);
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
            $key = TblentprsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentprsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentprs $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentprsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblentprsTableMap::COL_IDNENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentprsTableMap::COL_IDNENTUSR);
            $criteria->addSelectColumn(TblentprsTableMap::COL_NOMENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_PRMAPLPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_SGNAPLPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_CRPENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_RFCENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_EMLLBRPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_EMLPRSPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_NCNENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_PASENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_ENTENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_MNCENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_LCLENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_DMCENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_CDGPSTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_TLFFIJPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_TLFMVLPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_FOTENTPRS);
            $criteria->addSelectColumn(TblentprsTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TblentprsTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.idnentprs');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.idnentusr');
            $criteria->addSelectColumn($alias . '.nomentprs');
            $criteria->addSelectColumn($alias . '.prmaplprs');
            $criteria->addSelectColumn($alias . '.sgnaplprs');
            $criteria->addSelectColumn($alias . '.crpentprs');
            $criteria->addSelectColumn($alias . '.rfcentprs');
            $criteria->addSelectColumn($alias . '.emllbrprs');
            $criteria->addSelectColumn($alias . '.emlprsprs');
            $criteria->addSelectColumn($alias . '.ncnentprs');
            $criteria->addSelectColumn($alias . '.pasentprs');
            $criteria->addSelectColumn($alias . '.ententprs');
            $criteria->addSelectColumn($alias . '.mncentprs');
            $criteria->addSelectColumn($alias . '.lclentprs');
            $criteria->addSelectColumn($alias . '.dmcentprs');
            $criteria->addSelectColumn($alias . '.cdgpstprs');
            $criteria->addSelectColumn($alias . '.tlffijprs');
            $criteria->addSelectColumn($alias . '.tlfmvlprs');
            $criteria->addSelectColumn($alias . '.fotentprs');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblentprsTableMap::DATABASE_NAME)->getTable(TblentprsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentprsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentprsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentprsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentprs or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentprs object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentprsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentprs) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentprsTableMap::DATABASE_NAME);
            $criteria->add(TblentprsTableMap::COL_IDNENTPRS, (array) $values, Criteria::IN);
        }

        $query = TblentprsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentprsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentprsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentprs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentprsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentprs or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentprs object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentprsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentprs object
        }

        if ($criteria->containsKey(TblentprsTableMap::COL_IDNENTPRS) && $criteria->keyContainsValue(TblentprsTableMap::COL_IDNENTPRS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentprsTableMap::COL_IDNENTPRS.')');
        }


        // Set the correct dbName
        $query = TblentprsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentprsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentprsTableMap::buildTableMap();
