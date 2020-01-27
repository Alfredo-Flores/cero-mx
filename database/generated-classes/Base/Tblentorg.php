<?php

namespace Base;

use \Tblentcln as ChildTblentcln;
use \TblentclnQuery as ChildTblentclnQuery;
use \Tblentdnc as ChildTblentdnc;
use \TblentdncQuery as ChildTblentdncQuery;
use \Tblentorg as ChildTblentorg;
use \TblentorgQuery as ChildTblentorgQuery;
use \Tblentprs as ChildTblentprs;
use \TblentprsQuery as ChildTblentprsQuery;
use \Tblentrcp as ChildTblentrcp;
use \TblentrcpQuery as ChildTblentrcpQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TblentclnTableMap;
use Map\TblentdncTableMap;
use Map\TblentorgTableMap;
use Map\TblentrcpTableMap;
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
 * Base class that represents a row from the 'tblentorg' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Tblentorg implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TblentorgTableMap';


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
     * The value for the idnentorg field.
     *
     * @var        string
     */
    protected $idnentorg;

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
     * The value for the sgmentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sgmentorg;

    /**
     * The value for the bnfentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $bnfentorg;

    /**
     * The value for the nmbentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $nmbentorg;

    /**
     * The value for the logentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $logentorg;

    /**
     * The value for the rfcentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rfcentorg;

    /**
     * The value for the dmcentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $dmcentorg;

    /**
     * The value for the lclentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lclentorg;

    /**
     * The value for the mncentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mncentorg;

    /**
     * The value for the etdentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $etdentorg;

    /**
     * The value for the pasentorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pasentorg;

    /**
     * The value for the cdgpstorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cdgpstorg;

    /**
     * The value for the tlffcnorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $tlffcnorg;

    /**
     * The value for the emlfcnorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $emlfcnorg;

    /**
     * The value for the plntrborg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $plntrborg;

    /**
     * The value for the actcnsorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $actcnsorg;

    /**
     * The value for the cnsdntorg field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cnsdntorg;

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
     * The value for the hstentorg field.
     *
     * @var        string
     */
    protected $hstentorg;

    /**
     * @var        ChildTblentprs
     */
    protected $aTblentprs;

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
     * @var        ObjectCollection|ChildTblentrcp[] Collection to store aggregation of ChildTblentrcp objects.
     */
    protected $collTblentrcps;
    protected $collTblentrcpsPartial;

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
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblentrcp[]
     */
    protected $tblentrcpsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->sgmentorg = '';
        $this->bnfentorg = '';
        $this->nmbentorg = '';
        $this->logentorg = '';
        $this->rfcentorg = '';
        $this->dmcentorg = '';
        $this->lclentorg = '';
        $this->mncentorg = '';
        $this->etdentorg = '';
        $this->pasentorg = '';
        $this->cdgpstorg = '';
        $this->tlffcnorg = '';
        $this->emlfcnorg = '';
        $this->plntrborg = '';
        $this->actcnsorg = '';
        $this->cnsdntorg = '';
    }

    /**
     * Initializes internal state of Base\Tblentorg object.
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
     * Compares this with another <code>Tblentorg</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblentorg</code>, delegates to
     * <code>equals(Tblentorg)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Tblentorg The current object, for fluid interface
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
     * Get the [idnentorg] column value.
     *
     * @return string
     */
    public function getIdnentorg()
    {
        return $this->idnentorg;
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
     * Get the [sgmentorg] column value.
     *
     * @return string
     */
    public function getSgmentorg()
    {
        return $this->sgmentorg;
    }

    /**
     * Get the [bnfentorg] column value.
     *
     * @return string
     */
    public function getBnfentorg()
    {
        return $this->bnfentorg;
    }

    /**
     * Get the [nmbentorg] column value.
     *
     * @return string
     */
    public function getNmbentorg()
    {
        return $this->nmbentorg;
    }

    /**
     * Get the [logentorg] column value.
     *
     * @return string
     */
    public function getLogentorg()
    {
        return $this->logentorg;
    }

    /**
     * Get the [rfcentorg] column value.
     *
     * @return string
     */
    public function getRfcentorg()
    {
        return $this->rfcentorg;
    }

    /**
     * Get the [dmcentorg] column value.
     *
     * @return string
     */
    public function getDmcentorg()
    {
        return $this->dmcentorg;
    }

    /**
     * Get the [lclentorg] column value.
     *
     * @return string
     */
    public function getLclentorg()
    {
        return $this->lclentorg;
    }

    /**
     * Get the [mncentorg] column value.
     *
     * @return string
     */
    public function getMncentorg()
    {
        return $this->mncentorg;
    }

    /**
     * Get the [etdentorg] column value.
     *
     * @return string
     */
    public function getEtdentorg()
    {
        return $this->etdentorg;
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
     * Get the [cdgpstorg] column value.
     *
     * @return string
     */
    public function getCdgpstorg()
    {
        return $this->cdgpstorg;
    }

    /**
     * Get the [tlffcnorg] column value.
     *
     * @return string
     */
    public function getTlffcnorg()
    {
        return $this->tlffcnorg;
    }

    /**
     * Get the [emlfcnorg] column value.
     *
     * @return string
     */
    public function getEmlfcnorg()
    {
        return $this->emlfcnorg;
    }

    /**
     * Get the [plntrborg] column value.
     *
     * @return string
     */
    public function getPlntrborg()
    {
        return $this->plntrborg;
    }

    /**
     * Get the [actcnsorg] column value.
     *
     * @return string
     */
    public function getActcnsorg()
    {
        return $this->actcnsorg;
    }

    /**
     * Get the [cnsdntorg] column value.
     *
     * @return string
     */
    public function getCnsdntorg()
    {
        return $this->cnsdntorg;
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
     * Get the [hstentorg] column value.
     *
     * @return string
     */
    public function getHstentorg()
    {
        return $this->hstentorg;
    }

    /**
     * Set the value of [idnentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setIdnentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idnentorg !== $v) {
            $this->idnentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_IDNENTORG] = true;
        }

        return $this;
    } // setIdnentorg()

    /**
     * Set the value of [uuid] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setUuid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uuid !== $v) {
            $this->uuid = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_UUID] = true;
        }

        return $this;
    } // setUuid()

    /**
     * Set the value of [idnentprs] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setIdnentprs($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idnentprs !== $v) {
            $this->idnentprs = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_IDNENTPRS] = true;
        }

        if ($this->aTblentprs !== null && $this->aTblentprs->getIdnentprs() !== $v) {
            $this->aTblentprs = null;
        }

        return $this;
    } // setIdnentprs()

    /**
     * Set the value of [sgmentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setSgmentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sgmentorg !== $v) {
            $this->sgmentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_SGMENTORG] = true;
        }

        return $this;
    } // setSgmentorg()

    /**
     * Set the value of [bnfentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setBnfentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bnfentorg !== $v) {
            $this->bnfentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_BNFENTORG] = true;
        }

        return $this;
    } // setBnfentorg()

    /**
     * Set the value of [nmbentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setNmbentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nmbentorg !== $v) {
            $this->nmbentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_NMBENTORG] = true;
        }

        return $this;
    } // setNmbentorg()

    /**
     * Set the value of [logentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setLogentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->logentorg !== $v) {
            $this->logentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_LOGENTORG] = true;
        }

        return $this;
    } // setLogentorg()

    /**
     * Set the value of [rfcentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setRfcentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rfcentorg !== $v) {
            $this->rfcentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_RFCENTORG] = true;
        }

        return $this;
    } // setRfcentorg()

    /**
     * Set the value of [dmcentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setDmcentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dmcentorg !== $v) {
            $this->dmcentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_DMCENTORG] = true;
        }

        return $this;
    } // setDmcentorg()

    /**
     * Set the value of [lclentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setLclentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lclentorg !== $v) {
            $this->lclentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_LCLENTORG] = true;
        }

        return $this;
    } // setLclentorg()

    /**
     * Set the value of [mncentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setMncentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mncentorg !== $v) {
            $this->mncentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_MNCENTORG] = true;
        }

        return $this;
    } // setMncentorg()

    /**
     * Set the value of [etdentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setEtdentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->etdentorg !== $v) {
            $this->etdentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_ETDENTORG] = true;
        }

        return $this;
    } // setEtdentorg()

    /**
     * Set the value of [pasentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setPasentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pasentorg !== $v) {
            $this->pasentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_PASENTORG] = true;
        }

        return $this;
    } // setPasentorg()

    /**
     * Set the value of [cdgpstorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setCdgpstorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cdgpstorg !== $v) {
            $this->cdgpstorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_CDGPSTORG] = true;
        }

        return $this;
    } // setCdgpstorg()

    /**
     * Set the value of [tlffcnorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setTlffcnorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tlffcnorg !== $v) {
            $this->tlffcnorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_TLFFCNORG] = true;
        }

        return $this;
    } // setTlffcnorg()

    /**
     * Set the value of [emlfcnorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setEmlfcnorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emlfcnorg !== $v) {
            $this->emlfcnorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_EMLFCNORG] = true;
        }

        return $this;
    } // setEmlfcnorg()

    /**
     * Set the value of [plntrborg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setPlntrborg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->plntrborg !== $v) {
            $this->plntrborg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_PLNTRBORG] = true;
        }

        return $this;
    } // setPlntrborg()

    /**
     * Set the value of [actcnsorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setActcnsorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->actcnsorg !== $v) {
            $this->actcnsorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_ACTCNSORG] = true;
        }

        return $this;
    } // setActcnsorg()

    /**
     * Set the value of [cnsdntorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setCnsdntorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cnsdntorg !== $v) {
            $this->cnsdntorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_CNSDNTORG] = true;
        }

        return $this;
    } // setCnsdntorg()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentorgTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentorgTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [hstentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function setHstentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hstentorg !== $v) {
            $this->hstentorg = $v;
            $this->modifiedColumns[TblentorgTableMap::COL_HSTENTORG] = true;
        }

        return $this;
    } // setHstentorg()

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
            if ($this->sgmentorg !== '') {
                return false;
            }

            if ($this->bnfentorg !== '') {
                return false;
            }

            if ($this->nmbentorg !== '') {
                return false;
            }

            if ($this->logentorg !== '') {
                return false;
            }

            if ($this->rfcentorg !== '') {
                return false;
            }

            if ($this->dmcentorg !== '') {
                return false;
            }

            if ($this->lclentorg !== '') {
                return false;
            }

            if ($this->mncentorg !== '') {
                return false;
            }

            if ($this->etdentorg !== '') {
                return false;
            }

            if ($this->pasentorg !== '') {
                return false;
            }

            if ($this->cdgpstorg !== '') {
                return false;
            }

            if ($this->tlffcnorg !== '') {
                return false;
            }

            if ($this->emlfcnorg !== '') {
                return false;
            }

            if ($this->plntrborg !== '') {
                return false;
            }

            if ($this->actcnsorg !== '') {
                return false;
            }

            if ($this->cnsdntorg !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblentorgTableMap::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idnentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblentorgTableMap::translateFieldName('Uuid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uuid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblentorgTableMap::translateFieldName('Idnentprs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idnentprs = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblentorgTableMap::translateFieldName('Sgmentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sgmentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TblentorgTableMap::translateFieldName('Bnfentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bnfentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TblentorgTableMap::translateFieldName('Nmbentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nmbentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TblentorgTableMap::translateFieldName('Logentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->logentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TblentorgTableMap::translateFieldName('Rfcentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rfcentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TblentorgTableMap::translateFieldName('Dmcentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dmcentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TblentorgTableMap::translateFieldName('Lclentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lclentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TblentorgTableMap::translateFieldName('Mncentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mncentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TblentorgTableMap::translateFieldName('Etdentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->etdentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TblentorgTableMap::translateFieldName('Pasentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pasentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TblentorgTableMap::translateFieldName('Cdgpstorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdgpstorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TblentorgTableMap::translateFieldName('Tlffcnorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tlffcnorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : TblentorgTableMap::translateFieldName('Emlfcnorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emlfcnorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : TblentorgTableMap::translateFieldName('Plntrborg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->plntrborg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : TblentorgTableMap::translateFieldName('Actcnsorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->actcnsorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : TblentorgTableMap::translateFieldName('Cnsdntorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cnsdntorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : TblentorgTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : TblentorgTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : TblentorgTableMap::translateFieldName('Hstentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hstentorg = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 22; // 22 = TblentorgTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Tblentorg'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(TblentorgTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblentorgQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTblentprs = null;
            $this->collTblentclns = null;

            $this->collTblentdncs = null;

            $this->collTblentrcps = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblentorg::setDeleted()
     * @see Tblentorg::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentorgTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblentorgQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentorgTableMap::DATABASE_NAME);
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
                TblentorgTableMap::addInstanceToPool($this);
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

            if ($this->tblentrcpsScheduledForDeletion !== null) {
                if (!$this->tblentrcpsScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblentrcpsScheduledForDeletion as $tblentrcp) {
                        // need to save related object because we set the relation to null
                        $tblentrcp->save($con);
                    }
                    $this->tblentrcpsScheduledForDeletion = null;
                }
            }

            if ($this->collTblentrcps !== null) {
                foreach ($this->collTblentrcps as $referrerFK) {
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

        $this->modifiedColumns[TblentorgTableMap::COL_IDNENTORG] = true;
        if (null !== $this->idnentorg) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblentorgTableMap::COL_IDNENTORG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblentorgTableMap::COL_IDNENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'idnentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_UUID)) {
            $modifiedColumns[':p' . $index++]  = 'uuid';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_IDNENTPRS)) {
            $modifiedColumns[':p' . $index++]  = 'idnentprs';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_SGMENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'sgmentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_BNFENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'bnfentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_NMBENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'nmbentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_LOGENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'logentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_RFCENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'rfcentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_DMCENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'dmcentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_LCLENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'lclentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_MNCENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'mncentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_ETDENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'etdentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_PASENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'pasentorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_CDGPSTORG)) {
            $modifiedColumns[':p' . $index++]  = 'cdgpstorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_TLFFCNORG)) {
            $modifiedColumns[':p' . $index++]  = 'tlffcnorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_EMLFCNORG)) {
            $modifiedColumns[':p' . $index++]  = 'emlfcnorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_PLNTRBORG)) {
            $modifiedColumns[':p' . $index++]  = 'plntrborg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_ACTCNSORG)) {
            $modifiedColumns[':p' . $index++]  = 'actcnsorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_CNSDNTORG)) {
            $modifiedColumns[':p' . $index++]  = 'cnsdntorg';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_HSTENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'hstentorg';
        }

        $sql = sprintf(
            'INSERT INTO tblentorg (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idnentorg':
                        $stmt->bindValue($identifier, $this->idnentorg, PDO::PARAM_INT);
                        break;
                    case 'uuid':
                        $stmt->bindValue($identifier, $this->uuid, PDO::PARAM_STR);
                        break;
                    case 'idnentprs':
                        $stmt->bindValue($identifier, $this->idnentprs, PDO::PARAM_INT);
                        break;
                    case 'sgmentorg':
                        $stmt->bindValue($identifier, $this->sgmentorg, PDO::PARAM_STR);
                        break;
                    case 'bnfentorg':
                        $stmt->bindValue($identifier, $this->bnfentorg, PDO::PARAM_STR);
                        break;
                    case 'nmbentorg':
                        $stmt->bindValue($identifier, $this->nmbentorg, PDO::PARAM_STR);
                        break;
                    case 'logentorg':
                        $stmt->bindValue($identifier, $this->logentorg, PDO::PARAM_STR);
                        break;
                    case 'rfcentorg':
                        $stmt->bindValue($identifier, $this->rfcentorg, PDO::PARAM_STR);
                        break;
                    case 'dmcentorg':
                        $stmt->bindValue($identifier, $this->dmcentorg, PDO::PARAM_STR);
                        break;
                    case 'lclentorg':
                        $stmt->bindValue($identifier, $this->lclentorg, PDO::PARAM_STR);
                        break;
                    case 'mncentorg':
                        $stmt->bindValue($identifier, $this->mncentorg, PDO::PARAM_STR);
                        break;
                    case 'etdentorg':
                        $stmt->bindValue($identifier, $this->etdentorg, PDO::PARAM_STR);
                        break;
                    case 'pasentorg':
                        $stmt->bindValue($identifier, $this->pasentorg, PDO::PARAM_STR);
                        break;
                    case 'cdgpstorg':
                        $stmt->bindValue($identifier, $this->cdgpstorg, PDO::PARAM_STR);
                        break;
                    case 'tlffcnorg':
                        $stmt->bindValue($identifier, $this->tlffcnorg, PDO::PARAM_STR);
                        break;
                    case 'emlfcnorg':
                        $stmt->bindValue($identifier, $this->emlfcnorg, PDO::PARAM_STR);
                        break;
                    case 'plntrborg':
                        $stmt->bindValue($identifier, $this->plntrborg, PDO::PARAM_STR);
                        break;
                    case 'actcnsorg':
                        $stmt->bindValue($identifier, $this->actcnsorg, PDO::PARAM_STR);
                        break;
                    case 'cnsdntorg':
                        $stmt->bindValue($identifier, $this->cnsdntorg, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'hstentorg':
                        $stmt->bindValue($identifier, $this->hstentorg, PDO::PARAM_STR);
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
        $this->setIdnentorg($pk);

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
        $pos = TblentorgTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdnentorg();
                break;
            case 1:
                return $this->getUuid();
                break;
            case 2:
                return $this->getIdnentprs();
                break;
            case 3:
                return $this->getSgmentorg();
                break;
            case 4:
                return $this->getBnfentorg();
                break;
            case 5:
                return $this->getNmbentorg();
                break;
            case 6:
                return $this->getLogentorg();
                break;
            case 7:
                return $this->getRfcentorg();
                break;
            case 8:
                return $this->getDmcentorg();
                break;
            case 9:
                return $this->getLclentorg();
                break;
            case 10:
                return $this->getMncentorg();
                break;
            case 11:
                return $this->getEtdentorg();
                break;
            case 12:
                return $this->getPasentorg();
                break;
            case 13:
                return $this->getCdgpstorg();
                break;
            case 14:
                return $this->getTlffcnorg();
                break;
            case 15:
                return $this->getEmlfcnorg();
                break;
            case 16:
                return $this->getPlntrborg();
                break;
            case 17:
                return $this->getActcnsorg();
                break;
            case 18:
                return $this->getCnsdntorg();
                break;
            case 19:
                return $this->getCreatedAt();
                break;
            case 20:
                return $this->getUpdatedAt();
                break;
            case 21:
                return $this->getHstentorg();
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

        if (isset($alreadyDumpedObjects['Tblentorg'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblentorg'][$this->hashCode()] = true;
        $keys = TblentorgTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdnentorg(),
            $keys[1] => $this->getUuid(),
            $keys[2] => $this->getIdnentprs(),
            $keys[3] => $this->getSgmentorg(),
            $keys[4] => $this->getBnfentorg(),
            $keys[5] => $this->getNmbentorg(),
            $keys[6] => $this->getLogentorg(),
            $keys[7] => $this->getRfcentorg(),
            $keys[8] => $this->getDmcentorg(),
            $keys[9] => $this->getLclentorg(),
            $keys[10] => $this->getMncentorg(),
            $keys[11] => $this->getEtdentorg(),
            $keys[12] => $this->getPasentorg(),
            $keys[13] => $this->getCdgpstorg(),
            $keys[14] => $this->getTlffcnorg(),
            $keys[15] => $this->getEmlfcnorg(),
            $keys[16] => $this->getPlntrborg(),
            $keys[17] => $this->getActcnsorg(),
            $keys[18] => $this->getCnsdntorg(),
            $keys[19] => $this->getCreatedAt(),
            $keys[20] => $this->getUpdatedAt(),
            $keys[21] => $this->getHstentorg(),
        );
        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
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
            if (null !== $this->collTblentrcps) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentrcps';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentrcps';
                        break;
                    default:
                        $key = 'Tblentrcps';
                }

                $result[$key] = $this->collTblentrcps->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Tblentorg
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblentorgTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Tblentorg
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdnentorg($value);
                break;
            case 1:
                $this->setUuid($value);
                break;
            case 2:
                $this->setIdnentprs($value);
                break;
            case 3:
                $this->setSgmentorg($value);
                break;
            case 4:
                $this->setBnfentorg($value);
                break;
            case 5:
                $this->setNmbentorg($value);
                break;
            case 6:
                $this->setLogentorg($value);
                break;
            case 7:
                $this->setRfcentorg($value);
                break;
            case 8:
                $this->setDmcentorg($value);
                break;
            case 9:
                $this->setLclentorg($value);
                break;
            case 10:
                $this->setMncentorg($value);
                break;
            case 11:
                $this->setEtdentorg($value);
                break;
            case 12:
                $this->setPasentorg($value);
                break;
            case 13:
                $this->setCdgpstorg($value);
                break;
            case 14:
                $this->setTlffcnorg($value);
                break;
            case 15:
                $this->setEmlfcnorg($value);
                break;
            case 16:
                $this->setPlntrborg($value);
                break;
            case 17:
                $this->setActcnsorg($value);
                break;
            case 18:
                $this->setCnsdntorg($value);
                break;
            case 19:
                $this->setCreatedAt($value);
                break;
            case 20:
                $this->setUpdatedAt($value);
                break;
            case 21:
                $this->setHstentorg($value);
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
        $keys = TblentorgTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdnentorg($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUuid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdnentprs($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSgmentorg($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setBnfentorg($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setNmbentorg($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLogentorg($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setRfcentorg($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDmcentorg($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setLclentorg($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setMncentorg($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEtdentorg($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPasentorg($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCdgpstorg($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTlffcnorg($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setEmlfcnorg($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPlntrborg($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setActcnsorg($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCnsdntorg($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCreatedAt($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setUpdatedAt($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setHstentorg($arr[$keys[21]]);
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
     * @return $this|\Tblentorg The current object, for fluid interface
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
        $criteria = new Criteria(TblentorgTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblentorgTableMap::COL_IDNENTORG)) {
            $criteria->add(TblentorgTableMap::COL_IDNENTORG, $this->idnentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_UUID)) {
            $criteria->add(TblentorgTableMap::COL_UUID, $this->uuid);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_IDNENTPRS)) {
            $criteria->add(TblentorgTableMap::COL_IDNENTPRS, $this->idnentprs);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_SGMENTORG)) {
            $criteria->add(TblentorgTableMap::COL_SGMENTORG, $this->sgmentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_BNFENTORG)) {
            $criteria->add(TblentorgTableMap::COL_BNFENTORG, $this->bnfentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_NMBENTORG)) {
            $criteria->add(TblentorgTableMap::COL_NMBENTORG, $this->nmbentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_LOGENTORG)) {
            $criteria->add(TblentorgTableMap::COL_LOGENTORG, $this->logentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_RFCENTORG)) {
            $criteria->add(TblentorgTableMap::COL_RFCENTORG, $this->rfcentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_DMCENTORG)) {
            $criteria->add(TblentorgTableMap::COL_DMCENTORG, $this->dmcentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_LCLENTORG)) {
            $criteria->add(TblentorgTableMap::COL_LCLENTORG, $this->lclentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_MNCENTORG)) {
            $criteria->add(TblentorgTableMap::COL_MNCENTORG, $this->mncentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_ETDENTORG)) {
            $criteria->add(TblentorgTableMap::COL_ETDENTORG, $this->etdentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_PASENTORG)) {
            $criteria->add(TblentorgTableMap::COL_PASENTORG, $this->pasentorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_CDGPSTORG)) {
            $criteria->add(TblentorgTableMap::COL_CDGPSTORG, $this->cdgpstorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_TLFFCNORG)) {
            $criteria->add(TblentorgTableMap::COL_TLFFCNORG, $this->tlffcnorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_EMLFCNORG)) {
            $criteria->add(TblentorgTableMap::COL_EMLFCNORG, $this->emlfcnorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_PLNTRBORG)) {
            $criteria->add(TblentorgTableMap::COL_PLNTRBORG, $this->plntrborg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_ACTCNSORG)) {
            $criteria->add(TblentorgTableMap::COL_ACTCNSORG, $this->actcnsorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_CNSDNTORG)) {
            $criteria->add(TblentorgTableMap::COL_CNSDNTORG, $this->cnsdntorg);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_CREATED_AT)) {
            $criteria->add(TblentorgTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_UPDATED_AT)) {
            $criteria->add(TblentorgTableMap::COL_UPDATED_AT, $this->updated_at);
        }
        if ($this->isColumnModified(TblentorgTableMap::COL_HSTENTORG)) {
            $criteria->add(TblentorgTableMap::COL_HSTENTORG, $this->hstentorg);
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
        $criteria = ChildTblentorgQuery::create();
        $criteria->add(TblentorgTableMap::COL_IDNENTORG, $this->idnentorg);

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
        $validPk = null !== $this->getIdnentorg();

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
        return $this->getIdnentorg();
    }

    /**
     * Generic method to set the primary key (idnentorg column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdnentorg($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdnentorg();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Tblentorg (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUuid($this->getUuid());
        $copyObj->setIdnentprs($this->getIdnentprs());
        $copyObj->setSgmentorg($this->getSgmentorg());
        $copyObj->setBnfentorg($this->getBnfentorg());
        $copyObj->setNmbentorg($this->getNmbentorg());
        $copyObj->setLogentorg($this->getLogentorg());
        $copyObj->setRfcentorg($this->getRfcentorg());
        $copyObj->setDmcentorg($this->getDmcentorg());
        $copyObj->setLclentorg($this->getLclentorg());
        $copyObj->setMncentorg($this->getMncentorg());
        $copyObj->setEtdentorg($this->getEtdentorg());
        $copyObj->setPasentorg($this->getPasentorg());
        $copyObj->setCdgpstorg($this->getCdgpstorg());
        $copyObj->setTlffcnorg($this->getTlffcnorg());
        $copyObj->setEmlfcnorg($this->getEmlfcnorg());
        $copyObj->setPlntrborg($this->getPlntrborg());
        $copyObj->setActcnsorg($this->getActcnsorg());
        $copyObj->setCnsdntorg($this->getCnsdntorg());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setHstentorg($this->getHstentorg());

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

            foreach ($this->getTblentrcps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblentrcp($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdnentorg(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Tblentorg Clone of current object.
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
     * @return $this|\Tblentorg The current object (for fluent API support)
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
            $v->addTblentorg($this);
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
                $this->aTblentprs->addTblentorgs($this);
             */
        }

        return $this->aTblentprs;
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
        if ('Tblentrcp' == $relationName) {
            $this->initTblentrcps();
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
     * If this ChildTblentorg is new, it will return
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
                    ->filterByTblentorg($this)
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
     * @return $this|ChildTblentorg The current object (for fluent API support)
     */
    public function setTblentclns(Collection $tblentclns, ConnectionInterface $con = null)
    {
        /** @var ChildTblentcln[] $tblentclnsToDelete */
        $tblentclnsToDelete = $this->getTblentclns(new Criteria(), $con)->diff($tblentclns);


        $this->tblentclnsScheduledForDeletion = $tblentclnsToDelete;

        foreach ($tblentclnsToDelete as $tblentclnRemoved) {
            $tblentclnRemoved->setTblentorg(null);
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
                ->filterByTblentorg($this)
                ->count($con);
        }

        return count($this->collTblentclns);
    }

    /**
     * Method called to associate a ChildTblentcln object to this object
     * through the ChildTblentcln foreign key attribute.
     *
     * @param  ChildTblentcln $l ChildTblentcln
     * @return $this|\Tblentorg The current object (for fluent API support)
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
        $tblentcln->setTblentorg($this);
    }

    /**
     * @param  ChildTblentcln $tblentcln The ChildTblentcln object to remove.
     * @return $this|ChildTblentorg The current object (for fluent API support)
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
            $tblentcln->setTblentorg(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblentorg is new, it will return
     * an empty collection; or if this Tblentorg has previously
     * been saved, it will retrieve related Tblentclns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblentorg.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblentcln[] List of ChildTblentcln objects
     */
    public function getTblentclnsJoinTblentemp(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblentclnQuery::create(null, $criteria);
        $query->joinWith('Tblentemp', $joinBehavior);

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
     * If this ChildTblentorg is new, it will return
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
                    ->filterByTblentorg($this)
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
     * @return $this|ChildTblentorg The current object (for fluent API support)
     */
    public function setTblentdncs(Collection $tblentdncs, ConnectionInterface $con = null)
    {
        /** @var ChildTblentdnc[] $tblentdncsToDelete */
        $tblentdncsToDelete = $this->getTblentdncs(new Criteria(), $con)->diff($tblentdncs);


        $this->tblentdncsScheduledForDeletion = $tblentdncsToDelete;

        foreach ($tblentdncsToDelete as $tblentdncRemoved) {
            $tblentdncRemoved->setTblentorg(null);
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
                ->filterByTblentorg($this)
                ->count($con);
        }

        return count($this->collTblentdncs);
    }

    /**
     * Method called to associate a ChildTblentdnc object to this object
     * through the ChildTblentdnc foreign key attribute.
     *
     * @param  ChildTblentdnc $l ChildTblentdnc
     * @return $this|\Tblentorg The current object (for fluent API support)
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
        $tblentdnc->setTblentorg($this);
    }

    /**
     * @param  ChildTblentdnc $tblentdnc The ChildTblentdnc object to remove.
     * @return $this|ChildTblentorg The current object (for fluent API support)
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
            $tblentdnc->setTblentorg(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblentorg is new, it will return
     * an empty collection; or if this Tblentorg has previously
     * been saved, it will retrieve related Tblentdncs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblentorg.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblentdnc[] List of ChildTblentdnc objects
     */
    public function getTblentdncsJoinTblentemp(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblentdncQuery::create(null, $criteria);
        $query->joinWith('Tblentemp', $joinBehavior);

        return $this->getTblentdncs($query, $con);
    }

    /**
     * Clears out the collTblentrcps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblentrcps()
     */
    public function clearTblentrcps()
    {
        $this->collTblentrcps = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblentrcps collection loaded partially.
     */
    public function resetPartialTblentrcps($v = true)
    {
        $this->collTblentrcpsPartial = $v;
    }

    /**
     * Initializes the collTblentrcps collection.
     *
     * By default this just sets the collTblentrcps collection to an empty array (like clearcollTblentrcps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblentrcps($overrideExisting = true)
    {
        if (null !== $this->collTblentrcps && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblentrcpTableMap::getTableMap()->getCollectionClassName();

        $this->collTblentrcps = new $collectionClassName;
        $this->collTblentrcps->setModel('\Tblentrcp');
    }

    /**
     * Gets an array of ChildTblentrcp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblentorg is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblentrcp[] List of ChildTblentrcp objects
     * @throws PropelException
     */
    public function getTblentrcps(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentrcpsPartial && !$this->isNew();
        if (null === $this->collTblentrcps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblentrcps) {
                // return empty collection
                $this->initTblentrcps();
            } else {
                $collTblentrcps = ChildTblentrcpQuery::create(null, $criteria)
                    ->filterByTblentorg($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblentrcpsPartial && count($collTblentrcps)) {
                        $this->initTblentrcps(false);

                        foreach ($collTblentrcps as $obj) {
                            if (false == $this->collTblentrcps->contains($obj)) {
                                $this->collTblentrcps->append($obj);
                            }
                        }

                        $this->collTblentrcpsPartial = true;
                    }

                    return $collTblentrcps;
                }

                if ($partial && $this->collTblentrcps) {
                    foreach ($this->collTblentrcps as $obj) {
                        if ($obj->isNew()) {
                            $collTblentrcps[] = $obj;
                        }
                    }
                }

                $this->collTblentrcps = $collTblentrcps;
                $this->collTblentrcpsPartial = false;
            }
        }

        return $this->collTblentrcps;
    }

    /**
     * Sets a collection of ChildTblentrcp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblentrcps A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblentorg The current object (for fluent API support)
     */
    public function setTblentrcps(Collection $tblentrcps, ConnectionInterface $con = null)
    {
        /** @var ChildTblentrcp[] $tblentrcpsToDelete */
        $tblentrcpsToDelete = $this->getTblentrcps(new Criteria(), $con)->diff($tblentrcps);


        $this->tblentrcpsScheduledForDeletion = $tblentrcpsToDelete;

        foreach ($tblentrcpsToDelete as $tblentrcpRemoved) {
            $tblentrcpRemoved->setTblentorg(null);
        }

        $this->collTblentrcps = null;
        foreach ($tblentrcps as $tblentrcp) {
            $this->addTblentrcp($tblentrcp);
        }

        $this->collTblentrcps = $tblentrcps;
        $this->collTblentrcpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblentrcp objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblentrcp objects.
     * @throws PropelException
     */
    public function countTblentrcps(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentrcpsPartial && !$this->isNew();
        if (null === $this->collTblentrcps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblentrcps) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblentrcps());
            }

            $query = ChildTblentrcpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblentorg($this)
                ->count($con);
        }

        return count($this->collTblentrcps);
    }

    /**
     * Method called to associate a ChildTblentrcp object to this object
     * through the ChildTblentrcp foreign key attribute.
     *
     * @param  ChildTblentrcp $l ChildTblentrcp
     * @return $this|\Tblentorg The current object (for fluent API support)
     */
    public function addTblentrcp(ChildTblentrcp $l)
    {
        if ($this->collTblentrcps === null) {
            $this->initTblentrcps();
            $this->collTblentrcpsPartial = true;
        }

        if (!$this->collTblentrcps->contains($l)) {
            $this->doAddTblentrcp($l);

            if ($this->tblentrcpsScheduledForDeletion and $this->tblentrcpsScheduledForDeletion->contains($l)) {
                $this->tblentrcpsScheduledForDeletion->remove($this->tblentrcpsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblentrcp $tblentrcp The ChildTblentrcp object to add.
     */
    protected function doAddTblentrcp(ChildTblentrcp $tblentrcp)
    {
        $this->collTblentrcps[]= $tblentrcp;
        $tblentrcp->setTblentorg($this);
    }

    /**
     * @param  ChildTblentrcp $tblentrcp The ChildTblentrcp object to remove.
     * @return $this|ChildTblentorg The current object (for fluent API support)
     */
    public function removeTblentrcp(ChildTblentrcp $tblentrcp)
    {
        if ($this->getTblentrcps()->contains($tblentrcp)) {
            $pos = $this->collTblentrcps->search($tblentrcp);
            $this->collTblentrcps->remove($pos);
            if (null === $this->tblentrcpsScheduledForDeletion) {
                $this->tblentrcpsScheduledForDeletion = clone $this->collTblentrcps;
                $this->tblentrcpsScheduledForDeletion->clear();
            }
            $this->tblentrcpsScheduledForDeletion[]= $tblentrcp;
            $tblentrcp->setTblentorg(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblentorg is new, it will return
     * an empty collection; or if this Tblentorg has previously
     * been saved, it will retrieve related Tblentrcps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblentorg.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblentrcp[] List of ChildTblentrcp objects
     */
    public function getTblentrcpsJoinTblentcln(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblentrcpQuery::create(null, $criteria);
        $query->joinWith('Tblentcln', $joinBehavior);

        return $this->getTblentrcps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblentorg is new, it will return
     * an empty collection; or if this Tblentorg has previously
     * been saved, it will retrieve related Tblentrcps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblentorg.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblentrcp[] List of ChildTblentrcp objects
     */
    public function getTblentrcpsJoinTblentemp(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblentrcpQuery::create(null, $criteria);
        $query->joinWith('Tblentemp', $joinBehavior);

        return $this->getTblentrcps($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTblentprs) {
            $this->aTblentprs->removeTblentorg($this);
        }
        $this->idnentorg = null;
        $this->uuid = null;
        $this->idnentprs = null;
        $this->sgmentorg = null;
        $this->bnfentorg = null;
        $this->nmbentorg = null;
        $this->logentorg = null;
        $this->rfcentorg = null;
        $this->dmcentorg = null;
        $this->lclentorg = null;
        $this->mncentorg = null;
        $this->etdentorg = null;
        $this->pasentorg = null;
        $this->cdgpstorg = null;
        $this->tlffcnorg = null;
        $this->emlfcnorg = null;
        $this->plntrborg = null;
        $this->actcnsorg = null;
        $this->cnsdntorg = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->hstentorg = null;
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
            if ($this->collTblentrcps) {
                foreach ($this->collTblentrcps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTblentclns = null;
        $this->collTblentdncs = null;
        $this->collTblentrcps = null;
        $this->aTblentprs = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblentorgTableMap::DEFAULT_STRING_FORMAT);
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
