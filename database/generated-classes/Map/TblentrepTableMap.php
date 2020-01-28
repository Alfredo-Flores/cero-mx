<?php

namespace Map;

use \Tblentrep;
use \TblentrepQuery;
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
 * This class defines the structure of the 'tblentrep' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblentrepTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TblentrepTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'cero';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblentrep';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Tblentrep';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Tblentrep';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 28;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 28;

    /**
     * the column name for the id field
     */
    const COL_ID = 'tblentrep.id';

    /**
     * the column name for the uuid field
     */
    const COL_UUID = 'tblentrep.uuid';

    /**
     * the column name for the crpdtsgnr field
     */
    const COL_CRPDTSGNR = 'tblentrep.crpdtsgnr';

    /**
     * the column name for the rfcdtsgnr field
     */
    const COL_RFCDTSGNR = 'tblentrep.rfcdtsgnr';

    /**
     * the column name for the emllbrgnr field
     */
    const COL_EMLLBRGNR = 'tblentrep.emllbrgnr';

    /**
     * the column name for the emlprsgnr field
     */
    const COL_EMLPRSGNR = 'tblentrep.emlprsgnr';

    /**
     * the column name for the estcvlgnr field
     */
    const COL_ESTCVLGNR = 'tblentrep.estcvlgnr';

    /**
     * the column name for the rgmcnygnr field
     */
    const COL_RGMCNYGNR = 'tblentrep.rgmcnygnr';

    /**
     * the column name for the ncndtsgnr field
     */
    const COL_NCNDTSGNR = 'tblentrep.ncndtsgnr';

    /**
     * the column name for the pasnacgnr field
     */
    const COL_PASNACGNR = 'tblentrep.pasnacgnr';

    /**
     * the column name for the estnacgnr field
     */
    const COL_ESTNACGNR = 'tblentrep.estnacgnr';

    /**
     * the column name for the lgrubcgnr field
     */
    const COL_LGRUBCGNR = 'tblentrep.lgrubcgnr';

    /**
     * the column name for the entdtsgnr field
     */
    const COL_ENTDTSGNR = 'tblentrep.entdtsgnr';

    /**
     * the column name for the mncdtsgnr field
     */
    const COL_MNCDTSGNR = 'tblentrep.mncdtsgnr';

    /**
     * the column name for the lcldtsgnr field
     */
    const COL_LCLDTSGNR = 'tblentrep.lcldtsgnr';

    /**
     * the column name for the dmcdtsgnr field
     */
    const COL_DMCDTSGNR = 'tblentrep.dmcdtsgnr';

    /**
     * the column name for the cdgpstgnr field
     */
    const COL_CDGPSTGNR = 'tblentrep.cdgpstgnr';

    /**
     * the column name for the tlffijgnr field
     */
    const COL_TLFFIJGNR = 'tblentrep.tlffijgnr';

    /**
     * the column name for the tlfmvlgnr field
     */
    const COL_TLFMVLGNR = 'tblentrep.tlfmvlgnr';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tblentrep.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tblentrep.updated_at';

    /**
     * the column name for the finished_at field
     */
    const COL_FINISHED_AT = 'tblentrep.finished_at';

    /**
     * the column name for the phoentprs field
     */
    const COL_PHOENTPRS = 'tblentrep.phoentprs';

    /**
     * the column name for the typentprs field
     */
    const COL_TYPENTPRS = 'tblentrep.typentprs';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'tblentrep.email';

    /**
     * the column name for the email_verified_at field
     */
    const COL_EMAIL_VERIFIED_AT = 'tblentrep.email_verified_at';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'tblentrep.password';

    /**
     * the column name for the remember_token field
     */
    const COL_REMEMBER_TOKEN = 'tblentrep.remember_token';

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
        self::TYPE_PHPNAME       => array('Id', 'Uuid', 'Crpdtsgnr', 'Rfcdtsgnr', 'Emllbrgnr', 'Emlprsgnr', 'Estcvlgnr', 'Rgmcnygnr', 'Ncndtsgnr', 'Pasnacgnr', 'Estnacgnr', 'Lgrubcgnr', 'Entdtsgnr', 'Mncdtsgnr', 'Lcldtsgnr', 'Dmcdtsgnr', 'Cdgpstgnr', 'Tlffijgnr', 'Tlfmvlgnr', 'CreatedAt', 'UpdatedAt', 'FinishedAt', 'Phoentprs', 'Typentprs', 'Email', 'EmailVerifiedAt', 'Password', 'RememberToken', ),
        self::TYPE_CAMELNAME     => array('id', 'uuid', 'crpdtsgnr', 'rfcdtsgnr', 'emllbrgnr', 'emlprsgnr', 'estcvlgnr', 'rgmcnygnr', 'ncndtsgnr', 'pasnacgnr', 'estnacgnr', 'lgrubcgnr', 'entdtsgnr', 'mncdtsgnr', 'lcldtsgnr', 'dmcdtsgnr', 'cdgpstgnr', 'tlffijgnr', 'tlfmvlgnr', 'createdAt', 'updatedAt', 'finishedAt', 'phoentprs', 'typentprs', 'email', 'emailVerifiedAt', 'password', 'rememberToken', ),
        self::TYPE_COLNAME       => array(TblentrepTableMap::COL_ID, TblentrepTableMap::COL_UUID, TblentrepTableMap::COL_CRPDTSGNR, TblentrepTableMap::COL_RFCDTSGNR, TblentrepTableMap::COL_EMLLBRGNR, TblentrepTableMap::COL_EMLPRSGNR, TblentrepTableMap::COL_ESTCVLGNR, TblentrepTableMap::COL_RGMCNYGNR, TblentrepTableMap::COL_NCNDTSGNR, TblentrepTableMap::COL_PASNACGNR, TblentrepTableMap::COL_ESTNACGNR, TblentrepTableMap::COL_LGRUBCGNR, TblentrepTableMap::COL_ENTDTSGNR, TblentrepTableMap::COL_MNCDTSGNR, TblentrepTableMap::COL_LCLDTSGNR, TblentrepTableMap::COL_DMCDTSGNR, TblentrepTableMap::COL_CDGPSTGNR, TblentrepTableMap::COL_TLFFIJGNR, TblentrepTableMap::COL_TLFMVLGNR, TblentrepTableMap::COL_CREATED_AT, TblentrepTableMap::COL_UPDATED_AT, TblentrepTableMap::COL_FINISHED_AT, TblentrepTableMap::COL_PHOENTPRS, TblentrepTableMap::COL_TYPENTPRS, TblentrepTableMap::COL_EMAIL, TblentrepTableMap::COL_EMAIL_VERIFIED_AT, TblentrepTableMap::COL_PASSWORD, TblentrepTableMap::COL_REMEMBER_TOKEN, ),
        self::TYPE_FIELDNAME     => array('id', 'uuid', 'crpdtsgnr', 'rfcdtsgnr', 'emllbrgnr', 'emlprsgnr', 'estcvlgnr', 'rgmcnygnr', 'ncndtsgnr', 'pasnacgnr', 'estnacgnr', 'lgrubcgnr', 'entdtsgnr', 'mncdtsgnr', 'lcldtsgnr', 'dmcdtsgnr', 'cdgpstgnr', 'tlffijgnr', 'tlfmvlgnr', 'created_at', 'updated_at', 'finished_at', 'phoentprs', 'typentprs', 'email', 'email_verified_at', 'password', 'remember_token', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Uuid' => 1, 'Crpdtsgnr' => 2, 'Rfcdtsgnr' => 3, 'Emllbrgnr' => 4, 'Emlprsgnr' => 5, 'Estcvlgnr' => 6, 'Rgmcnygnr' => 7, 'Ncndtsgnr' => 8, 'Pasnacgnr' => 9, 'Estnacgnr' => 10, 'Lgrubcgnr' => 11, 'Entdtsgnr' => 12, 'Mncdtsgnr' => 13, 'Lcldtsgnr' => 14, 'Dmcdtsgnr' => 15, 'Cdgpstgnr' => 16, 'Tlffijgnr' => 17, 'Tlfmvlgnr' => 18, 'CreatedAt' => 19, 'UpdatedAt' => 20, 'FinishedAt' => 21, 'Phoentprs' => 22, 'Typentprs' => 23, 'Email' => 24, 'EmailVerifiedAt' => 25, 'Password' => 26, 'RememberToken' => 27, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'uuid' => 1, 'crpdtsgnr' => 2, 'rfcdtsgnr' => 3, 'emllbrgnr' => 4, 'emlprsgnr' => 5, 'estcvlgnr' => 6, 'rgmcnygnr' => 7, 'ncndtsgnr' => 8, 'pasnacgnr' => 9, 'estnacgnr' => 10, 'lgrubcgnr' => 11, 'entdtsgnr' => 12, 'mncdtsgnr' => 13, 'lcldtsgnr' => 14, 'dmcdtsgnr' => 15, 'cdgpstgnr' => 16, 'tlffijgnr' => 17, 'tlfmvlgnr' => 18, 'createdAt' => 19, 'updatedAt' => 20, 'finishedAt' => 21, 'phoentprs' => 22, 'typentprs' => 23, 'email' => 24, 'emailVerifiedAt' => 25, 'password' => 26, 'rememberToken' => 27, ),
        self::TYPE_COLNAME       => array(TblentrepTableMap::COL_ID => 0, TblentrepTableMap::COL_UUID => 1, TblentrepTableMap::COL_CRPDTSGNR => 2, TblentrepTableMap::COL_RFCDTSGNR => 3, TblentrepTableMap::COL_EMLLBRGNR => 4, TblentrepTableMap::COL_EMLPRSGNR => 5, TblentrepTableMap::COL_ESTCVLGNR => 6, TblentrepTableMap::COL_RGMCNYGNR => 7, TblentrepTableMap::COL_NCNDTSGNR => 8, TblentrepTableMap::COL_PASNACGNR => 9, TblentrepTableMap::COL_ESTNACGNR => 10, TblentrepTableMap::COL_LGRUBCGNR => 11, TblentrepTableMap::COL_ENTDTSGNR => 12, TblentrepTableMap::COL_MNCDTSGNR => 13, TblentrepTableMap::COL_LCLDTSGNR => 14, TblentrepTableMap::COL_DMCDTSGNR => 15, TblentrepTableMap::COL_CDGPSTGNR => 16, TblentrepTableMap::COL_TLFFIJGNR => 17, TblentrepTableMap::COL_TLFMVLGNR => 18, TblentrepTableMap::COL_CREATED_AT => 19, TblentrepTableMap::COL_UPDATED_AT => 20, TblentrepTableMap::COL_FINISHED_AT => 21, TblentrepTableMap::COL_PHOENTPRS => 22, TblentrepTableMap::COL_TYPENTPRS => 23, TblentrepTableMap::COL_EMAIL => 24, TblentrepTableMap::COL_EMAIL_VERIFIED_AT => 25, TblentrepTableMap::COL_PASSWORD => 26, TblentrepTableMap::COL_REMEMBER_TOKEN => 27, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'uuid' => 1, 'crpdtsgnr' => 2, 'rfcdtsgnr' => 3, 'emllbrgnr' => 4, 'emlprsgnr' => 5, 'estcvlgnr' => 6, 'rgmcnygnr' => 7, 'ncndtsgnr' => 8, 'pasnacgnr' => 9, 'estnacgnr' => 10, 'lgrubcgnr' => 11, 'entdtsgnr' => 12, 'mncdtsgnr' => 13, 'lcldtsgnr' => 14, 'dmcdtsgnr' => 15, 'cdgpstgnr' => 16, 'tlffijgnr' => 17, 'tlfmvlgnr' => 18, 'created_at' => 19, 'updated_at' => 20, 'finished_at' => 21, 'phoentprs' => 22, 'typentprs' => 23, 'email' => 24, 'email_verified_at' => 25, 'password' => 26, 'remember_token' => 27, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
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
        $this->setName('tblentrep');
        $this->setPhpName('Tblentrep');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Tblentrep');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('uuid', 'Uuid', 'CHAR', true, 36, null);
        $this->addColumn('crpdtsgnr', 'Crpdtsgnr', 'VARCHAR', true, 18, '');
        $this->addColumn('rfcdtsgnr', 'Rfcdtsgnr', 'VARCHAR', true, 13, '');
        $this->addColumn('emllbrgnr', 'Emllbrgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('emlprsgnr', 'Emlprsgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('estcvlgnr', 'Estcvlgnr', 'VARCHAR', true, 1, '');
        $this->addColumn('rgmcnygnr', 'Rgmcnygnr', 'VARCHAR', true, 1, '');
        $this->addColumn('ncndtsgnr', 'Ncndtsgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('pasnacgnr', 'Pasnacgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('estnacgnr', 'Estnacgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('lgrubcgnr', 'Lgrubcgnr', 'VARCHAR', true, 1, '');
        $this->addColumn('entdtsgnr', 'Entdtsgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('mncdtsgnr', 'Mncdtsgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('lcldtsgnr', 'Lcldtsgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('dmcdtsgnr', 'Dmcdtsgnr', 'VARCHAR', true, 255, '');
        $this->addColumn('cdgpstgnr', 'Cdgpstgnr', 'VARCHAR', true, 5, '');
        $this->addColumn('tlffijgnr', 'Tlffijgnr', 'VARCHAR', true, 12, '');
        $this->addColumn('tlfmvlgnr', 'Tlfmvlgnr', 'VARCHAR', true, 12, '');
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('finished_at', 'FinishedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('phoentprs', 'Phoentprs', 'VARCHAR', false, 255, null);
        $this->addColumn('typentprs', 'Typentprs', 'INTEGER', true, null, 0);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('email_verified_at', 'EmailVerifiedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('remember_token', 'RememberToken', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblentrepTableMap::CLASS_DEFAULT : TblentrepTableMap::OM_CLASS;
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
     * @return array           (Tblentrep object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblentrepTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblentrepTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblentrepTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblentrepTableMap::OM_CLASS;
            /** @var Tblentrep $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblentrepTableMap::addInstanceToPool($obj, $key);
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
            $key = TblentrepTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblentrepTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblentrep $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblentrepTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblentrepTableMap::COL_ID);
            $criteria->addSelectColumn(TblentrepTableMap::COL_UUID);
            $criteria->addSelectColumn(TblentrepTableMap::COL_CRPDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_RFCDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_EMLLBRGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_EMLPRSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_ESTCVLGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_RGMCNYGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_NCNDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_PASNACGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_ESTNACGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_LGRUBCGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_ENTDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_MNCDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_LCLDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_DMCDTSGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_CDGPSTGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_TLFFIJGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_TLFMVLGNR);
            $criteria->addSelectColumn(TblentrepTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TblentrepTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(TblentrepTableMap::COL_FINISHED_AT);
            $criteria->addSelectColumn(TblentrepTableMap::COL_PHOENTPRS);
            $criteria->addSelectColumn(TblentrepTableMap::COL_TYPENTPRS);
            $criteria->addSelectColumn(TblentrepTableMap::COL_EMAIL);
            $criteria->addSelectColumn(TblentrepTableMap::COL_EMAIL_VERIFIED_AT);
            $criteria->addSelectColumn(TblentrepTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(TblentrepTableMap::COL_REMEMBER_TOKEN);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.uuid');
            $criteria->addSelectColumn($alias . '.crpdtsgnr');
            $criteria->addSelectColumn($alias . '.rfcdtsgnr');
            $criteria->addSelectColumn($alias . '.emllbrgnr');
            $criteria->addSelectColumn($alias . '.emlprsgnr');
            $criteria->addSelectColumn($alias . '.estcvlgnr');
            $criteria->addSelectColumn($alias . '.rgmcnygnr');
            $criteria->addSelectColumn($alias . '.ncndtsgnr');
            $criteria->addSelectColumn($alias . '.pasnacgnr');
            $criteria->addSelectColumn($alias . '.estnacgnr');
            $criteria->addSelectColumn($alias . '.lgrubcgnr');
            $criteria->addSelectColumn($alias . '.entdtsgnr');
            $criteria->addSelectColumn($alias . '.mncdtsgnr');
            $criteria->addSelectColumn($alias . '.lcldtsgnr');
            $criteria->addSelectColumn($alias . '.dmcdtsgnr');
            $criteria->addSelectColumn($alias . '.cdgpstgnr');
            $criteria->addSelectColumn($alias . '.tlffijgnr');
            $criteria->addSelectColumn($alias . '.tlfmvlgnr');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.finished_at');
            $criteria->addSelectColumn($alias . '.phoentprs');
            $criteria->addSelectColumn($alias . '.typentprs');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.email_verified_at');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.remember_token');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblentrepTableMap::DATABASE_NAME)->getTable(TblentrepTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblentrepTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblentrepTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblentrepTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblentrep or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblentrep object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrepTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Tblentrep) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblentrepTableMap::DATABASE_NAME);
            $criteria->add(TblentrepTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TblentrepQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblentrepTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblentrepTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblentrep table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblentrepQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblentrep or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblentrep object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrepTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblentrep object
        }

        if ($criteria->containsKey(TblentrepTableMap::COL_ID) && $criteria->keyContainsValue(TblentrepTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblentrepTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TblentrepQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblentrepTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblentrepTableMap::buildTableMap();
