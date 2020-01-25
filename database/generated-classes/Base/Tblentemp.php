<?php

namespace Base;

use \Catgirorg as ChildCatgirorg;
use \CatgirorgQuery as ChildCatgirorgQuery;
use \Tblentcln as ChildTblentcln;
use \TblentclnQuery as ChildTblentclnQuery;
use \Tblentdnc as ChildTblentdnc;
use \TblentdncQuery as ChildTblentdncQuery;
use \Tblentemp as ChildTblentemp;
use \TblentempQuery as ChildTblentempQuery;
use \Tblentprs as ChildTblentprs;
use \TblentprsQuery as ChildTblentprsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TblentclnTableMap;
use Map\TblentdncTableMap;
use Map\TblentempTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'tblentemp' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Tblentemp implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TblentempTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the idnentemp field.
     *
     * @var        string
     */
    protected $idnentemp;

    /**
     * The value for the uuid field.
     *
     * @var        string
     */
    protected $uuid;

    /**
     * The value for the idnentprs field.
     *
     * @var        string
     */
    protected $idnentprs;

    /**
     * The value for the idngirorg field.
     *
     * @var        string
     */
    protected $idngirorg;

    /**
     * The value for the namentemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $namentemp;

    /**
     * The value for the logentemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $logentemp;

    /**
     * The value for the drcentemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $drcentemp;

    /**
     * The value for the lclentemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lclentemp;

    /**
     * The value for the mncentemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mncentemp;

    /**
     * The value for the ententemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ententemp;

    /**
     * The value for the pasentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pasentorg;

    /**
     * The value for the cdgpstemp field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $cdgpstemp;

    /**
     * The value for the cdgtrbemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cdgtrbemp;

    /**
     * The value for the girentemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $girentemp;

    /**
     * The value for the tlfofiemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $tlfofiemp;

    /**
     * The value for the emlofiemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $emlofiemp;

    /**
     * The value for the desaliemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $desaliemp;

    /**
     * The value for the candonemp field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $candonemp;

    /**
     * The value for the temconemp field.
     *
     * @var        string
     */
    protected $temconemp;

    /**
     * The value for the horentemp field.
     *
     * @var        string
     */
    protected $horentemp;

    /**
     * The value for the detentemo field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $detentemo;

    /**
     * The value for the created_at field.
     *
     * @var        DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     *
     * @var        DateTime
     */
    protected $updated_at;

    /**
     * @var        ChildTblentprs
     */
    protected $aTblentprs;

    /**
     * @var        ChildCatgirorg
     */
    protected $aCatgirorg;

    /**
     * @var        ObjectCollection|ChildTblentcln[] Collection to store aggregation of ChildTblentcln objects.
     */
    protected $collTblentclns;
    protected $collTblentclnsPartial;

    /**
     * @var        ObjectCollection|ChildTblentdnc[] Collection to store aggregation of ChildTblentdnc objects.
     */
    protected $collTblentdncs;
    protected $collTblentdncsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblentcln[]
     */
    protected $tblentclnsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblentdnc[]
     */
    protected $tblentdncsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->namentemp = '';
        $this->logentemp = '';
        $this->drcentemp = '';
        $this->lclentemp = '';
        $this->mncentemp = '';
        $this->ententemp = '';
        $this->pasentorg = '';
        $this->cdgpstemp = 0;
        $this->cdgtrbemp = '';
        $this->girentemp = '';
        $this->tlfofiemp = '';
        $this->emlofiemp = '';
        $this->desaliemp = '';
        $this->candonemp = '';
        $this->detentemo = '';
    }

    /**
     * Initializes internal state of Base\Tblentemp object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Tblentemp</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblentemp</code>, delegates to
     * <code>equals(Tblentemp)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Tblentemp The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [idnentemp] column value.
     *
     * @return string
     */
    public function getIdnentemp()
    {
        return $this->idnentemp;
    }

    /**
     * Get the [uuid] column value.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Get the [idnentprs] column value.
     *
     * @return string
     */
    public function getIdnentprs()
    {
        return $this->idnentprs;
    }

    /**
     * Get the [idngirorg] column value.
     *
     * @return string
     */
    public function getIdngirorg()
    {
        return $this->idngirorg;
    }

    /**
     * Get the [namentemp] column value.
     *
     * @return string
     */
    public function getNamentemp()
    {
        return $this->namentemp;
    }

    /**
     * Get the [logentemp] column value.
     *
     * @return string
     */
    public function getLogentemp()
    {
        return $this->logentemp;
    }

    /**
     * Get the [drcentemp] column value.
     *
     * @return string
     */
    public function getDrcentemp()
    {
        return $this->drcentemp;
    }

    /**
     * Get the [lclentemp] column value.
     *
     * @return string
     */
    public function getLclentemp()
    {
        return $this->lclentemp;
    }

    /**
     * Get the [mncentemp] column value.
     *
     * @return string
     */
    public function getMncentemp()
    {
        return $this->mncentemp;
    }

    /**
     * Get the [ententemp] column value.
     *
     * @return string
     */
    public function getEntentemp()
    {
        return $this->ententemp;
    }

    /**
     * Get the [pasentorg] column value.
     *
     * @return string
     */
    public function getPasentorg()
    {
        return $this->pasentorg;
    }

    /**
     * Get the [cdgpstemp] column value.
     *
     * @return int
     */
    public function getCdgpstemp()
    {
        return $this->cdgpstemp;
    }

    /**
     * Get the [cdgtrbemp] column value.
     *
     * @return string
     */
    public function getCdgtrbemp()
    {
        return $this->cdgtrbemp;
    }

    /**
     * Get the [girentemp] column value.
     *
     * @return string
     */
    public function getGirentemp()
    {
        return $this->girentemp;
    }

    /**
     * Get the [tlfofiemp] column value.
     *
     * @return string
     */
    public function getTlfofiemp()
    {
        return $this->tlfofiemp;
    }

    /**
     * Get the [emlofiemp] column value.
     *
     * @return string
     */
    public function getEmlofiemp()
    {
        return $this->emlofiemp;
    }

    /**
     * Get the [desaliemp] column value.
     *
     * @return string
     */
    public function getDesaliemp()
    {
        return $this->desaliemp;
    }

    /**
     * Get the [candonemp] column value.
     *
     * @return string
     */
    public function getCandonemp()
    {
        return $this->candonemp;
    }

    /**
     * Get the [temconemp] column value.
     *
     * @return string
     */
    public function getTemconemp()
    {
        return $this->temconemp;
    }

    /**
     * Get the [horentemp] column value.
     *
     * @return string
     */
    public function getHorentemp()
    {
        return $this->horentemp;
    }

    /**
     * Get the [detentemo] column value.
     *
     * @return string
     */
    public function getDetentemo()
    {
        return $this->detentemo;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTimeInterface ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTimeInterface ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [idnentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setIdnentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idnentemp !== $v) {
            $this->idnentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_IDNENTEMP] = true;
        }

        return $this;
    } // setIdnentemp()

    /**
     * Set the value of [uuid] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setUuid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uuid !== $v) {
            $this->uuid = $v;
            $this->modifiedColumns[TblentempTableMap::COL_UUID] = true;
        }

        return $this;
    } // setUuid()

    /**
     * Set the value of [idnentprs] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setIdnentprs($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idnentprs !== $v) {
            $this->idnentprs = $v;
            $this->modifiedColumns[TblentempTableMap::COL_IDNENTPRS] = true;
        }

        if ($this->aTblentprs !== null && $this->aTblentprs->getIdnentprs() !== $v) {
            $this->aTblentprs = null;
        }

        return $this;
    } // setIdnentprs()

    /**
     * Set the value of [idngirorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setIdngirorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idngirorg !== $v) {
            $this->idngirorg = $v;
            $this->modifiedColumns[TblentempTableMap::COL_IDNGIRORG] = true;
        }

        if ($this->aCatgirorg !== null && $this->aCatgirorg->getIdngirorg() !== $v) {
            $this->aCatgirorg = null;
        }

        return $this;
    } // setIdngirorg()

    /**
     * Set the value of [namentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setNamentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->namentemp !== $v) {
            $this->namentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_NAMENTEMP] = true;
        }

        return $this;
    } // setNamentemp()

    /**
     * Set the value of [logentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setLogentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->logentemp !== $v) {
            $this->logentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_LOGENTEMP] = true;
        }

        return $this;
    } // setLogentemp()

    /**
     * Set the value of [drcentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setDrcentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->drcentemp !== $v) {
            $this->drcentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_DRCENTEMP] = true;
        }

        return $this;
    } // setDrcentemp()

    /**
     * Set the value of [lclentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setLclentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lclentemp !== $v) {
            $this->lclentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_LCLENTEMP] = true;
        }

        return $this;
    } // setLclentemp()

    /**
     * Set the value of [mncentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setMncentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mncentemp !== $v) {
            $this->mncentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_MNCENTEMP] = true;
        }

        return $this;
    } // setMncentemp()

    /**
     * Set the value of [ententemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setEntentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ententemp !== $v) {
            $this->ententemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_ENTENTEMP] = true;
        }

        return $this;
    } // setEntentemp()

    /**
     * Set the value of [pasentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setPasentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pasentorg !== $v) {
            $this->pasentorg = $v;
            $this->modifiedColumns[TblentempTableMap::COL_PASENTORG] = true;
        }

        return $this;
    } // setPasentorg()

    /**
     * Set the value of [cdgpstemp] column.
     *
     * @param int $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setCdgpstemp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cdgpstemp !== $v) {
            $this->cdgpstemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_CDGPSTEMP] = true;
        }

        return $this;
    } // setCdgpstemp()

    /**
     * Set the value of [cdgtrbemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setCdgtrbemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cdgtrbemp !== $v) {
            $this->cdgtrbemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_CDGTRBEMP] = true;
        }

        return $this;
    } // setCdgtrbemp()

    /**
     * Set the value of [girentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setGirentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->girentemp !== $v) {
            $this->girentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_GIRENTEMP] = true;
        }

        return $this;
    } // setGirentemp()

    /**
     * Set the value of [tlfofiemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setTlfofiemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tlfofiemp !== $v) {
            $this->tlfofiemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_TLFOFIEMP] = true;
        }

        return $this;
    } // setTlfofiemp()

    /**
     * Set the value of [emlofiemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setEmlofiemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emlofiemp !== $v) {
            $this->emlofiemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_EMLOFIEMP] = true;
        }

        return $this;
    } // setEmlofiemp()

    /**
     * Set the value of [desaliemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setDesaliemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desaliemp !== $v) {
            $this->desaliemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_DESALIEMP] = true;
        }

        return $this;
    } // setDesaliemp()

    /**
     * Set the value of [candonemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setCandonemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->candonemp !== $v) {
            $this->candonemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_CANDONEMP] = true;
        }

        return $this;
    } // setCandonemp()

    /**
     * Set the value of [temconemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setTemconemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->temconemp !== $v) {
            $this->temconemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_TEMCONEMP] = true;
        }

        return $this;
    } // setTemconemp()

    /**
     * Set the value of [horentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setHorentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->horentemp !== $v) {
            $this->horentemp = $v;
            $this->modifiedColumns[TblentempTableMap::COL_HORENTEMP] = true;
        }

        return $this;
    } // setHorentemp()

    /**
     * Set the value of [detentemo] column.
     *
     * @param string $v new value
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setDetentemo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->detentemo !== $v) {
            $this->detentemo = $v;
            $this->modifiedColumns[TblentempTableMap::COL_DETENTEMO] = true;
        }

        return $this;
    } // setDetentemo()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentempTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentempTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->namentemp !== '') {
                return false;
            }

            if ($this->logentemp !== '') {
                return false;
            }

            if ($this->drcentemp !== '') {
                return false;
            }

            if ($this->lclentemp !== '') {
                return false;
            }

            if ($this->mncentemp !== '') {
                return false;
            }

            if ($this->ententemp !== '') {
                return false;
            }

            if ($this->pasentorg !== '') {
                return false;
            }

            if ($this->cdgpstemp !== 0) {
                return false;
            }

            if ($this->cdgtrbemp !== '') {
                return false;
            }

            if ($this->girentemp !== '') {
                return false;
            }

            if ($this->tlfofiemp !== '') {
                return false;
            }

            if ($this->emlofiemp !== '') {
                return false;
            }

            if ($this->desaliemp !== '') {
                return false;
            }

            if ($this->candonemp !== '') {
                return false;
            }

            if ($this->detentemo !== '') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblentempTableMap::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idnentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblentempTableMap::translateFieldName('Uuid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uuid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblentempTableMap::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idnentprs = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblentempTableMap::translateFieldName('Idngirorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idngirorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TblentempTableMap::translateFieldName('Namentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->namentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TblentempTableMap::translateFieldName('Logentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->logentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TblentempTableMap::translateFieldName('Drcentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->drcentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TblentempTableMap::translateFieldName('Lclentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lclentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TblentempTableMap::translateFieldName('Mncentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mncentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TblentempTableMap::translateFieldName('Ententemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ententemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TblentempTableMap::translateFieldName('Pasentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pasentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TblentempTableMap::translateFieldName('Cdgpstemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdgpstemp = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TblentempTableMap::translateFieldName('Cdgtrbemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdgtrbemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TblentempTableMap::translateFieldName('Girentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->girentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TblentempTableMap::translateFieldName('Tlfofiemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tlfofiemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : TblentempTableMap::translateFieldName('Emlofiemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emlofiemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : TblentempTableMap::translateFieldName('Desaliemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desaliemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : TblentempTableMap::translateFieldName('Candonemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->candonemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : TblentempTableMap::translateFieldName('Temconemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->temconemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : TblentempTableMap::translateFieldName('Horentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->horentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : TblentempTableMap::translateFieldName('Detentemo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->detentemo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : TblentempTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : TblentempTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = TblentempTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Tblentemp'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aTblentprs !== null && $this->idnentprs !== $this->aTblentprs->getIdnentprs()) {
            $this->aTblentprs = null;
        }
        if ($this->aCatgirorg !== null && $this->idngirorg !== $this->aCatgirorg->getIdngirorg()) {
            $this->aCatgirorg = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentempTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblentempQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTblentprs = null;
            $this->aCatgirorg = null;
            $this->collTblentclns = null;

            $this->collTblentdncs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblentemp::setDeleted()
     * @see Tblentemp::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentempTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblentempQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentempTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TblentempTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aTblentprs !== null) {
                if ($this->aTblentprs->isModified() || $this->aTblentprs->isNew()) {
                    $affectedRows += $this->aTblentprs->save($con);
                }
                $this->setTblentprs($this->aTblentprs);
            }

            if ($this->aCatgirorg !== null) {
                if ($this->aCatgirorg->isModified() || $this->aCatgirorg->isNew()) {
                    $affectedRows += $this->aCatgirorg->save($con);
                }
                $this->setCatgirorg($this->aCatgirorg);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->tblentclnsScheduledForDeletion !== null) {
                if (!$this->tblentclnsScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblentclnsScheduledForDeletion as $tblentcln) {
                        // need to save related object because we set the relation to null
                        $tblentcln->save($con);
                    }
                    $this->tblentclnsScheduledForDeletion = null;
                }
            }

            if ($this->collTblentclns !== null) {
                foreach ($this->collTblentclns as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tblentdncsScheduledForDeletion !== null) {
                if (!$this->tblentdncsScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblentdncsScheduledForDeletion as $tblentdnc) {
                        // need to save related object because we set the relation to null
                        $tblentdnc->save($con);
                    }
                    $this->tblentdncsScheduledForDeletion = null;
                }
            }

            if ($this->collTblentdncs !== null) {
                foreach ($this->collTblentdncs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[TblentempTableMap::COL_IDNENTEMP] = true;
        if (null !== $this->idnentemp) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblentempTableMap::COL_IDNENTEMP . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblentempTableMap::COL_IDNENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'idnentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_UUID)) {
            $modifiedColumns[':p' . $index++]  = 'uuid';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_IDNENTPRS)) {
            $modifiedColumns[':p' . $index++]  = 'idnentprs';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_IDNGIRORG)) {
            $modifiedColumns[':p' . $index++]  = 'idngirorg';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_NAMENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'namentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_LOGENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'logentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_DRCENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'drcentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_LCLENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'lclentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_MNCENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'mncentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_ENTENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'ententemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_PASENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'pasentorg';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CDGPSTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'cdgpstemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CDGTRBEMP)) {
            $modifiedColumns[':p' . $index++]  = 'cdgtrbemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_GIRENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'girentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_TLFOFIEMP)) {
            $modifiedColumns[':p' . $index++]  = 'tlfofiemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_EMLOFIEMP)) {
            $modifiedColumns[':p' . $index++]  = 'emlofiemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_DESALIEMP)) {
            $modifiedColumns[':p' . $index++]  = 'desaliemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CANDONEMP)) {
            $modifiedColumns[':p' . $index++]  = 'candonemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_TEMCONEMP)) {
            $modifiedColumns[':p' . $index++]  = 'temconemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_HORENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'horentemp';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_DETENTEMO)) {
            $modifiedColumns[':p' . $index++]  = 'detentemo';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(TblentempTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO tblentemp (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idnentemp':
                        $stmt->bindValue($identifier, $this->idnentemp, PDO::PARAM_INT);
                        break;
                    case 'uuid':
                        $stmt->bindValue($identifier, $this->uuid, PDO::PARAM_STR);
                        break;
                    case 'idnentprs':
                        $stmt->bindValue($identifier, $this->idnentprs, PDO::PARAM_INT);
                        break;
                    case 'idngirorg':
                        $stmt->bindValue($identifier, $this->idngirorg, PDO::PARAM_INT);
                        break;
                    case 'namentemp':
                        $stmt->bindValue($identifier, $this->namentemp, PDO::PARAM_STR);
                        break;
                    case 'logentemp':
                        $stmt->bindValue($identifier, $this->logentemp, PDO::PARAM_STR);
                        break;
                    case 'drcentemp':
                        $stmt->bindValue($identifier, $this->drcentemp, PDO::PARAM_STR);
                        break;
                    case 'lclentemp':
                        $stmt->bindValue($identifier, $this->lclentemp, PDO::PARAM_STR);
                        break;
                    case 'mncentemp':
                        $stmt->bindValue($identifier, $this->mncentemp, PDO::PARAM_STR);
                        break;
                    case 'ententemp':
                        $stmt->bindValue($identifier, $this->ententemp, PDO::PARAM_STR);
                        break;
                    case 'pasentorg':
                        $stmt->bindValue($identifier, $this->pasentorg, PDO::PARAM_STR);
                        break;
                    case 'cdgpstemp':
                        $stmt->bindValue($identifier, $this->cdgpstemp, PDO::PARAM_INT);
                        break;
                    case 'cdgtrbemp':
                        $stmt->bindValue($identifier, $this->cdgtrbemp, PDO::PARAM_STR);
                        break;
                    case 'girentemp':
                        $stmt->bindValue($identifier, $this->girentemp, PDO::PARAM_STR);
                        break;
                    case 'tlfofiemp':
                        $stmt->bindValue($identifier, $this->tlfofiemp, PDO::PARAM_STR);
                        break;
                    case 'emlofiemp':
                        $stmt->bindValue($identifier, $this->emlofiemp, PDO::PARAM_STR);
                        break;
                    case 'desaliemp':
                        $stmt->bindValue($identifier, $this->desaliemp, PDO::PARAM_STR);
                        break;
                    case 'candonemp':
                        $stmt->bindValue($identifier, $this->candonemp, PDO::PARAM_STR);
                        break;
                    case 'temconemp':
                        $stmt->bindValue($identifier, $this->temconemp, PDO::PARAM_STR);
                        break;
                    case 'horentemp':
                        $stmt->bindValue($identifier, $this->horentemp, PDO::PARAM_STR);
                        break;
                    case 'detentemo':
                        $stmt->bindValue($identifier, $this->detentemo, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdnentemp($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblentempTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdnentemp();
                break;
            case 1:
                return $this->getUuid();
                break;
            case 2:
                return $this->getIdnentprs();
                break;
            case 3:
                return $this->getIdngirorg();
                break;
            case 4:
                return $this->getNamentemp();
                break;
            case 5:
                return $this->getLogentemp();
                break;
            case 6:
                return $this->getDrcentemp();
                break;
            case 7:
                return $this->getLclentemp();
                break;
            case 8:
                return $this->getMncentemp();
                break;
            case 9:
                return $this->getEntentemp();
                break;
            case 10:
                return $this->getPasentorg();
                break;
            case 11:
                return $this->getCdgpstemp();
                break;
            case 12:
                return $this->getCdgtrbemp();
                break;
            case 13:
                return $this->getGirentemp();
                break;
            case 14:
                return $this->getTlfofiemp();
                break;
            case 15:
                return $this->getEmlofiemp();
                break;
            case 16:
                return $this->getDesaliemp();
                break;
            case 17:
                return $this->getCandonemp();
                break;
            case 18:
                return $this->getTemconemp();
                break;
            case 19:
                return $this->getHorentemp();
                break;
            case 20:
                return $this->getDetentemo();
                break;
            case 21:
                return $this->getCreatedAt();
                break;
            case 22:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Tblentemp'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblentemp'][$this->hashCode()] = true;
        $keys = TblentempTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdnentemp(),
            $keys[1] => $this->getUuid(),
            $keys[2] => $this->getIdnentprs(),
            $keys[3] => $this->getIdngirorg(),
            $keys[4] => $this->getNamentemp(),
            $keys[5] => $this->getLogentemp(),
            $keys[6] => $this->getDrcentemp(),
            $keys[7] => $this->getLclentemp(),
            $keys[8] => $this->getMncentemp(),
            $keys[9] => $this->getEntentemp(),
            $keys[10] => $this->getPasentorg(),
            $keys[11] => $this->getCdgpstemp(),
            $keys[12] => $this->getCdgtrbemp(),
            $keys[13] => $this->getGirentemp(),
            $keys[14] => $this->getTlfofiemp(),
            $keys[15] => $this->getEmlofiemp(),
            $keys[16] => $this->getDesaliemp(),
            $keys[17] => $this->getCandonemp(),
            $keys[18] => $this->getTemconemp(),
            $keys[19] => $this->getHorentemp(),
            $keys[20] => $this->getDetentemo(),
            $keys[21] => $this->getCreatedAt(),
            $keys[22] => $this->getUpdatedAt(),
        );
        if ($result[$keys[21]] instanceof \DateTimeInterface) {
            $result[$keys[21]] = $result[$keys[21]]->format('c');
        }

        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTblentprs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentprs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentprs';
                        break;
                    default:
                        $key = 'Tblentprs';
                }

                $result[$key] = $this->aTblentprs->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCatgirorg) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'catgirorg';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'catgirorg';
                        break;
                    default:
                        $key = 'Catgirorg';
                }

                $result[$key] = $this->aCatgirorg->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTblentclns) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentclns';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentclns';
                        break;
                    default:
                        $key = 'Tblentclns';
                }

                $result[$key] = $this->collTblentclns->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTblentdncs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentdncs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentdncs';
                        break;
                    default:
                        $key = 'Tblentdncs';
                }

                $result[$key] = $this->collTblentdncs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Tblentemp
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblentempTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Tblentemp
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdnentemp($value);
                break;
            case 1:
                $this->setUuid($value);
                break;
            case 2:
                $this->setIdnentprs($value);
                break;
            case 3:
                $this->setIdngirorg($value);
                break;
            case 4:
                $this->setNamentemp($value);
                break;
            case 5:
                $this->setLogentemp($value);
                break;
            case 6:
                $this->setDrcentemp($value);
                break;
            case 7:
                $this->setLclentemp($value);
                break;
            case 8:
                $this->setMncentemp($value);
                break;
            case 9:
                $this->setEntentemp($value);
                break;
            case 10:
                $this->setPasentorg($value);
                break;
            case 11:
                $this->setCdgpstemp($value);
                break;
            case 12:
                $this->setCdgtrbemp($value);
                break;
            case 13:
                $this->setGirentemp($value);
                break;
            case 14:
                $this->setTlfofiemp($value);
                break;
            case 15:
                $this->setEmlofiemp($value);
                break;
            case 16:
                $this->setDesaliemp($value);
                break;
            case 17:
                $this->setCandonemp($value);
                break;
            case 18:
                $this->setTemconemp($value);
                break;
            case 19:
                $this->setHorentemp($value);
                break;
            case 20:
                $this->setDetentemo($value);
                break;
            case 21:
                $this->setCreatedAt($value);
                break;
            case 22:
                $this->setUpdatedAt($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = TblentempTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdnentemp($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUuid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdnentprs($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdngirorg($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNamentemp($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLogentemp($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDrcentemp($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLclentemp($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setMncentemp($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setEntentemp($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPasentorg($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCdgpstemp($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCdgtrbemp($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setGirentemp($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTlfofiemp($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setEmlofiemp($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDesaliemp($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCandonemp($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTemconemp($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setHorentemp($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDetentemo($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setCreatedAt($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setUpdatedAt($arr[$keys[22]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Tblentemp The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TblentempTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblentempTableMap::COL_IDNENTEMP)) {
            $criteria->add(TblentempTableMap::COL_IDNENTEMP, $this->idnentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_UUID)) {
            $criteria->add(TblentempTableMap::COL_UUID, $this->uuid);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_IDNENTPRS)) {
            $criteria->add(TblentempTableMap::COL_IDNENTPRS, $this->idnentprs);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_IDNGIRORG)) {
            $criteria->add(TblentempTableMap::COL_IDNGIRORG, $this->idngirorg);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_NAMENTEMP)) {
            $criteria->add(TblentempTableMap::COL_NAMENTEMP, $this->namentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_LOGENTEMP)) {
            $criteria->add(TblentempTableMap::COL_LOGENTEMP, $this->logentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_DRCENTEMP)) {
            $criteria->add(TblentempTableMap::COL_DRCENTEMP, $this->drcentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_LCLENTEMP)) {
            $criteria->add(TblentempTableMap::COL_LCLENTEMP, $this->lclentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_MNCENTEMP)) {
            $criteria->add(TblentempTableMap::COL_MNCENTEMP, $this->mncentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_ENTENTEMP)) {
            $criteria->add(TblentempTableMap::COL_ENTENTEMP, $this->ententemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_PASENTORG)) {
            $criteria->add(TblentempTableMap::COL_PASENTORG, $this->pasentorg);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CDGPSTEMP)) {
            $criteria->add(TblentempTableMap::COL_CDGPSTEMP, $this->cdgpstemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CDGTRBEMP)) {
            $criteria->add(TblentempTableMap::COL_CDGTRBEMP, $this->cdgtrbemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_GIRENTEMP)) {
            $criteria->add(TblentempTableMap::COL_GIRENTEMP, $this->girentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_TLFOFIEMP)) {
            $criteria->add(TblentempTableMap::COL_TLFOFIEMP, $this->tlfofiemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_EMLOFIEMP)) {
            $criteria->add(TblentempTableMap::COL_EMLOFIEMP, $this->emlofiemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_DESALIEMP)) {
            $criteria->add(TblentempTableMap::COL_DESALIEMP, $this->desaliemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CANDONEMP)) {
            $criteria->add(TblentempTableMap::COL_CANDONEMP, $this->candonemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_TEMCONEMP)) {
            $criteria->add(TblentempTableMap::COL_TEMCONEMP, $this->temconemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_HORENTEMP)) {
            $criteria->add(TblentempTableMap::COL_HORENTEMP, $this->horentemp);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_DETENTEMO)) {
            $criteria->add(TblentempTableMap::COL_DETENTEMO, $this->detentemo);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_CREATED_AT)) {
            $criteria->add(TblentempTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(TblentempTableMap::COL_UPDATED_AT)) {
            $criteria->add(TblentempTableMap::COL_UPDATED_AT, $this->updated_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildTblentempQuery::create();
        $criteria->add(TblentempTableMap::COL_IDNENTEMP, $this->idnentemp);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdnentemp();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdnentemp();
    }

    /**
     * Generic method to set the primary key (idnentemp column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdnentemp($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdnentemp();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Tblentemp (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUuid($this->getUuid());
        $copyObj->setIdnentprs($this->getIdnentprs());
        $copyObj->setIdngirorg($this->getIdngirorg());
        $copyObj->setNamentemp($this->getNamentemp());
        $copyObj->setLogentemp($this->getLogentemp());
        $copyObj->setDrcentemp($this->getDrcentemp());
        $copyObj->setLclentemp($this->getLclentemp());
        $copyObj->setMncentemp($this->getMncentemp());
        $copyObj->setEntentemp($this->getEntentemp());
        $copyObj->setPasentorg($this->getPasentorg());
        $copyObj->setCdgpstemp($this->getCdgpstemp());
        $copyObj->setCdgtrbemp($this->getCdgtrbemp());
        $copyObj->setGirentemp($this->getGirentemp());
        $copyObj->setTlfofiemp($this->getTlfofiemp());
        $copyObj->setEmlofiemp($this->getEmlofiemp());
        $copyObj->setDesaliemp($this->getDesaliemp());
        $copyObj->setCandonemp($this->getCandonemp());
        $copyObj->setTemconemp($this->getTemconemp());
        $copyObj->setHorentemp($this->getHorentemp());
        $copyObj->setDetentemo($this->getDetentemo());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTblentclns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblentcln($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTblentdncs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblentdnc($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdnentemp(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Tblentemp Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildTblentprs object.
     *
     * @param  ChildTblentprs $v
     * @return $this|\Tblentemp The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTblentprs(ChildTblentprs $v = null)
    {
        if ($v === null) {
            $this->setIdnentprs(NULL);
        } else {
            $this->setIdnentprs($v->getIdnentprs());
        }

        $this->aTblentprs = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTblentprs object, it will not be re-added.
        if ($v !== null) {
            $v->addTblentemp($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTblentprs object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTblentprs The associated ChildTblentprs object.
     * @throws PropelException
     */
    public function getTblentprs(ConnectionInterface $con = null)
    {
        if ($this->aTblentprs === null && (($this->idnentprs !== "" && $this->idnentprs !== null))) {
            $this->aTblentprs = ChildTblentprsQuery::create()->findPk($this->idnentprs, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTblentprs->addTblentemps($this);
             */
        }

        return $this->aTblentprs;
    }

    /**
     * Declares an association between this object and a ChildCatgirorg object.
     *
     * @param  ChildCatgirorg $v
     * @return $this|\Tblentemp The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCatgirorg(ChildCatgirorg $v = null)
    {
        if ($v === null) {
            $this->setIdngirorg(NULL);
        } else {
            $this->setIdngirorg($v->getIdngirorg());
        }

        $this->aCatgirorg = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCatgirorg object, it will not be re-added.
        if ($v !== null) {
            $v->addTblentemp($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCatgirorg object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCatgirorg The associated ChildCatgirorg object.
     * @throws PropelException
     */
    public function getCatgirorg(ConnectionInterface $con = null)
    {
        if ($this->aCatgirorg === null && (($this->idngirorg !== "" && $this->idngirorg !== null))) {
            $this->aCatgirorg = ChildCatgirorgQuery::create()->findPk($this->idngirorg, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCatgirorg->addTblentemps($this);
             */
        }

        return $this->aCatgirorg;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Tblentcln' == $relationName) {
            $this->initTblentclns();
            return;
        }
        if ('Tblentdnc' == $relationName) {
            $this->initTblentdncs();
            return;
        }
    }

    /**
     * Clears out the collTblentclns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblentclns()
     */
    public function clearTblentclns()
    {
        $this->collTblentclns = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblentclns collection loaded partially.
     */
    public function resetPartialTblentclns($v = true)
    {
        $this->collTblentclnsPartial = $v;
    }

    /**
     * Initializes the collTblentclns collection.
     *
     * By default this just sets the collTblentclns collection to an empty array (like clearcollTblentclns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblentclns($overrideExisting = true)
    {
        if (null !== $this->collTblentclns && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblentclnTableMap::getTableMap()->getCollectionClassName();

        $this->collTblentclns = new $collectionClassName;
        $this->collTblentclns->setModel('\Tblentcln');
    }

    /**
     * Gets an array of ChildTblentcln objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblentemp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblentcln[] List of ChildTblentcln objects
     * @throws PropelException
     */
    public function getTblentclns(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentclnsPartial && !$this->isNew();
        if (null === $this->collTblentclns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblentclns) {
                // return empty collection
                $this->initTblentclns();
            } else {
                $collTblentclns = ChildTblentclnQuery::create(null, $criteria)
                    ->filterByTblentemp($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblentclnsPartial && count($collTblentclns)) {
                        $this->initTblentclns(false);

                        foreach ($collTblentclns as $obj) {
                            if (false == $this->collTblentclns->contains($obj)) {
                                $this->collTblentclns->append($obj);
                            }
                        }

                        $this->collTblentclnsPartial = true;
                    }

                    return $collTblentclns;
                }

                if ($partial && $this->collTblentclns) {
                    foreach ($this->collTblentclns as $obj) {
                        if ($obj->isNew()) {
                            $collTblentclns[] = $obj;
                        }
                    }
                }

                $this->collTblentclns = $collTblentclns;
                $this->collTblentclnsPartial = false;
            }
        }

        return $this->collTblentclns;
    }

    /**
     * Sets a collection of ChildTblentcln objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblentclns A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblentemp The current object (for fluent API support)
     */
    public function setTblentclns(Collection $tblentclns, ConnectionInterface $con = null)
    {
        /** @var ChildTblentcln[] $tblentclnsToDelete */
        $tblentclnsToDelete = $this->getTblentclns(new Criteria(), $con)->diff($tblentclns);


        $this->tblentclnsScheduledForDeletion = $tblentclnsToDelete;

        foreach ($tblentclnsToDelete as $tblentclnRemoved) {
            $tblentclnRemoved->setTblentemp(null);
        }

        $this->collTblentclns = null;
        foreach ($tblentclns as $tblentcln) {
            $this->addTblentcln($tblentcln);
        }

        $this->collTblentclns = $tblentclns;
        $this->collTblentclnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblentcln objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblentcln objects.
     * @throws PropelException
     */
    public function countTblentclns(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentclnsPartial && !$this->isNew();
        if (null === $this->collTblentclns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblentclns) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblentclns());
            }

            $query = ChildTblentclnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblentemp($this)
                ->count($con);
        }

        return count($this->collTblentclns);
    }

    /**
     * Method called to associate a ChildTblentcln object to this object
     * through the ChildTblentcln foreign key attribute.
     *
     * @param  ChildTblentcln $l ChildTblentcln
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function addTblentcln(ChildTblentcln $l)
    {
        if ($this->collTblentclns === null) {
            $this->initTblentclns();
            $this->collTblentclnsPartial = true;
        }

        if (!$this->collTblentclns->contains($l)) {
            $this->doAddTblentcln($l);

            if ($this->tblentclnsScheduledForDeletion and $this->tblentclnsScheduledForDeletion->contains($l)) {
                $this->tblentclnsScheduledForDeletion->remove($this->tblentclnsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblentcln $tblentcln The ChildTblentcln object to add.
     */
    protected function doAddTblentcln(ChildTblentcln $tblentcln)
    {
        $this->collTblentclns[]= $tblentcln;
        $tblentcln->setTblentemp($this);
    }

    /**
     * @param  ChildTblentcln $tblentcln The ChildTblentcln object to remove.
     * @return $this|ChildTblentemp The current object (for fluent API support)
     */
    public function removeTblentcln(ChildTblentcln $tblentcln)
    {
        if ($this->getTblentclns()->contains($tblentcln)) {
            $pos = $this->collTblentclns->search($tblentcln);
            $this->collTblentclns->remove($pos);
            if (null === $this->tblentclnsScheduledForDeletion) {
                $this->tblentclnsScheduledForDeletion = clone $this->collTblentclns;
                $this->tblentclnsScheduledForDeletion->clear();
            }
            $this->tblentclnsScheduledForDeletion[]= $tblentcln;
            $tblentcln->setTblentemp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblentemp is new, it will return
     * an empty collection; or if this Tblentemp has previously
     * been saved, it will retrieve related Tblentclns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblentemp.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblentcln[] List of ChildTblentcln objects
     */
    public function getTblentclnsJoinTblentorg(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblentclnQuery::create(null, $criteria);
        $query->joinWith('Tblentorg', $joinBehavior);

        return $this->getTblentclns($query, $con);
    }

    /**
     * Clears out the collTblentdncs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblentdncs()
     */
    public function clearTblentdncs()
    {
        $this->collTblentdncs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblentdncs collection loaded partially.
     */
    public function resetPartialTblentdncs($v = true)
    {
        $this->collTblentdncsPartial = $v;
    }

    /**
     * Initializes the collTblentdncs collection.
     *
     * By default this just sets the collTblentdncs collection to an empty array (like clearcollTblentdncs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblentdncs($overrideExisting = true)
    {
        if (null !== $this->collTblentdncs && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblentdncTableMap::getTableMap()->getCollectionClassName();

        $this->collTblentdncs = new $collectionClassName;
        $this->collTblentdncs->setModel('\Tblentdnc');
    }

    /**
     * Gets an array of ChildTblentdnc objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblentemp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblentdnc[] List of ChildTblentdnc objects
     * @throws PropelException
     */
    public function getTblentdncs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentdncsPartial && !$this->isNew();
        if (null === $this->collTblentdncs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblentdncs) {
                // return empty collection
                $this->initTblentdncs();
            } else {
                $collTblentdncs = ChildTblentdncQuery::create(null, $criteria)
                    ->filterByTblentemp($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblentdncsPartial && count($collTblentdncs)) {
                        $this->initTblentdncs(false);

                        foreach ($collTblentdncs as $obj) {
                            if (false == $this->collTblentdncs->contains($obj)) {
                                $this->collTblentdncs->append($obj);
                            }
                        }

                        $this->collTblentdncsPartial = true;
                    }

                    return $collTblentdncs;
                }

                if ($partial && $this->collTblentdncs) {
                    foreach ($this->collTblentdncs as $obj) {
                        if ($obj->isNew()) {
                            $collTblentdncs[] = $obj;
                        }
                    }
                }

                $this->collTblentdncs = $collTblentdncs;
                $this->collTblentdncsPartial = false;
            }
        }

        return $this->collTblentdncs;
    }

    /**
     * Sets a collection of ChildTblentdnc objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblentdncs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblentemp The current object (for fluent API support)
     */
    public function setTblentdncs(Collection $tblentdncs, ConnectionInterface $con = null)
    {
        /** @var ChildTblentdnc[] $tblentdncsToDelete */
        $tblentdncsToDelete = $this->getTblentdncs(new Criteria(), $con)->diff($tblentdncs);


        $this->tblentdncsScheduledForDeletion = $tblentdncsToDelete;

        foreach ($tblentdncsToDelete as $tblentdncRemoved) {
            $tblentdncRemoved->setTblentemp(null);
        }

        $this->collTblentdncs = null;
        foreach ($tblentdncs as $tblentdnc) {
            $this->addTblentdnc($tblentdnc);
        }

        $this->collTblentdncs = $tblentdncs;
        $this->collTblentdncsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblentdnc objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblentdnc objects.
     * @throws PropelException
     */
    public function countTblentdncs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentdncsPartial && !$this->isNew();
        if (null === $this->collTblentdncs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblentdncs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblentdncs());
            }

            $query = ChildTblentdncQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblentemp($this)
                ->count($con);
        }

        return count($this->collTblentdncs);
    }

    /**
     * Method called to associate a ChildTblentdnc object to this object
     * through the ChildTblentdnc foreign key attribute.
     *
     * @param  ChildTblentdnc $l ChildTblentdnc
     * @return $this|\Tblentemp The current object (for fluent API support)
     */
    public function addTblentdnc(ChildTblentdnc $l)
    {
        if ($this->collTblentdncs === null) {
            $this->initTblentdncs();
            $this->collTblentdncsPartial = true;
        }

        if (!$this->collTblentdncs->contains($l)) {
            $this->doAddTblentdnc($l);

            if ($this->tblentdncsScheduledForDeletion and $this->tblentdncsScheduledForDeletion->contains($l)) {
                $this->tblentdncsScheduledForDeletion->remove($this->tblentdncsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblentdnc $tblentdnc The ChildTblentdnc object to add.
     */
    protected function doAddTblentdnc(ChildTblentdnc $tblentdnc)
    {
        $this->collTblentdncs[]= $tblentdnc;
        $tblentdnc->setTblentemp($this);
    }

    /**
     * @param  ChildTblentdnc $tblentdnc The ChildTblentdnc object to remove.
     * @return $this|ChildTblentemp The current object (for fluent API support)
     */
    public function removeTblentdnc(ChildTblentdnc $tblentdnc)
    {
        if ($this->getTblentdncs()->contains($tblentdnc)) {
            $pos = $this->collTblentdncs->search($tblentdnc);
            $this->collTblentdncs->remove($pos);
            if (null === $this->tblentdncsScheduledForDeletion) {
                $this->tblentdncsScheduledForDeletion = clone $this->collTblentdncs;
                $this->tblentdncsScheduledForDeletion->clear();
            }
            $this->tblentdncsScheduledForDeletion[]= $tblentdnc;
            $tblentdnc->setTblentemp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblentemp is new, it will return
     * an empty collection; or if this Tblentemp has previously
     * been saved, it will retrieve related Tblentdncs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblentemp.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblentdnc[] List of ChildTblentdnc objects
     */
    public function getTblentdncsJoinTblentorg(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblentdncQuery::create(null, $criteria);
        $query->joinWith('Tblentorg', $joinBehavior);

        return $this->getTblentdncs($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTblentprs) {
            $this->aTblentprs->removeTblentemp($this);
        }
        if (null !== $this->aCatgirorg) {
            $this->aCatgirorg->removeTblentemp($this);
        }
        $this->idnentemp = null;
        $this->uuid = null;
        $this->idnentprs = null;
        $this->idngirorg = null;
        $this->namentemp = null;
        $this->logentemp = null;
        $this->drcentemp = null;
        $this->lclentemp = null;
        $this->mncentemp = null;
        $this->ententemp = null;
        $this->pasentorg = null;
        $this->cdgpstemp = null;
        $this->cdgtrbemp = null;
        $this->girentemp = null;
        $this->tlfofiemp = null;
        $this->emlofiemp = null;
        $this->desaliemp = null;
        $this->candonemp = null;
        $this->temconemp = null;
        $this->horentemp = null;
        $this->detentemo = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collTblentclns) {
                foreach ($this->collTblentclns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTblentdncs) {
                foreach ($this->collTblentdncs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTblentclns = null;
        $this->collTblentdncs = null;
        $this->aTblentprs = null;
        $this->aCatgirorg = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblentempTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
