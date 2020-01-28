<?php

namespace Base;

use \TblentdncQuery as ChildTblentdncQuery;
use \Tblentemp as ChildTblentemp;
use \TblentempQuery as ChildTblentempQuery;
use \Tblentorg as ChildTblentorg;
use \TblentorgQuery as ChildTblentorgQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TblentdncTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'tblentdnc' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Tblentdnc implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TblentdncTableMap';


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
     * The value for the identdnc field.
     *
     * @var        string
     */
    protected $identdnc;

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
     * The value for the dscentdnc field.
     *
     * @var        string
     */
    protected $dscentdnc;

    /**
     * The value for the tipentdnc field.
     *
     * @var        string
     */
    protected $tipentdnc;

    /**
     * The value for the kgsentdnc field.
     *
     * @var        double
     */
    protected $kgsentdnc;

    /**
     * The value for the cntcjsdnc field.
     *
     * @var        int
     */
    protected $cntcjsdnc;

    /**
     * The value for the tmprstdnc field.
     *
     * @var        DateTime
     */
    protected $tmprstdnc;

    /**
     * The value for the idnentorg field.
     *
     * @var        string
     */
    protected $idnentorg;

    /**
     * The value for the ntrentdnc field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $ntrentdnc;

    /**
     * The value for the rqsentdnc field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $rqsentdnc;

    /**
     * The value for the clnentdnc field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $clnentdnc;

    /**
     * The value for the fnsentdnc field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $fnsentdnc;

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
     * @var        ChildTblentemp
     */
    protected $aTblentemp;

    /**
     * @var        ChildTblentorg
     */
    protected $aTblentorg;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->ntrentdnc = false;
        $this->rqsentdnc = false;
        $this->clnentdnc = false;
        $this->fnsentdnc = false;
    }

    /**
     * Initializes internal state of Base\Tblentdnc object.
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
     * Compares this with another <code>Tblentdnc</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblentdnc</code>, delegates to
     * <code>equals(Tblentdnc)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Tblentdnc The current object, for fluid interface
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
     * Get the [identdnc] column value.
     *
     * @return string
     */
    public function getIdentdnc()
    {
        return $this->identdnc;
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
     * Get the [dscentdnc] column value.
     *
     * @return string
     */
    public function getDscentdnc()
    {
        return $this->dscentdnc;
    }

    /**
     * Get the [tipentdnc] column value.
     *
     * @return string
     */
    public function getTipentdnc()
    {
        return $this->tipentdnc;
    }

    /**
     * Get the [kgsentdnc] column value.
     *
     * @return double
     */
    public function getKgsentdnc()
    {
        return $this->kgsentdnc;
    }

    /**
     * Get the [cntcjsdnc] column value.
     *
     * @return int
     */
    public function getCntcjsdnc()
    {
        return $this->cntcjsdnc;
    }

    /**
     * Get the [optionally formatted] temporal [tmprstdnc] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmprstdnc($format = 'Y-m-d H:i:s')
    {
        if ($format === null) {
            return $this->tmprstdnc;
        } else {
            return $this->tmprstdnc instanceof \DateTimeInterface ? $this->tmprstdnc->format($format) : null;
        }
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
     * Get the [ntrentdnc] column value.
     *
     * @return boolean
     */
    public function getNtrentdnc()
    {
        return $this->ntrentdnc;
    }

    /**
     * Get the [ntrentdnc] column value.
     *
     * @return boolean
     */
    public function isNtrentdnc()
    {
        return $this->getNtrentdnc();
    }

    /**
     * Get the [rqsentdnc] column value.
     *
     * @return boolean
     */
    public function getRqsentdnc()
    {
        return $this->rqsentdnc;
    }

    /**
     * Get the [rqsentdnc] column value.
     *
     * @return boolean
     */
    public function isRqsentdnc()
    {
        return $this->getRqsentdnc();
    }

    /**
     * Get the [clnentdnc] column value.
     *
     * @return boolean
     */
    public function getClnentdnc()
    {
        return $this->clnentdnc;
    }

    /**
     * Get the [clnentdnc] column value.
     *
     * @return boolean
     */
    public function isClnentdnc()
    {
        return $this->getClnentdnc();
    }

    /**
     * Get the [fnsentdnc] column value.
     *
     * @return boolean
     */
    public function getFnsentdnc()
    {
        return $this->fnsentdnc;
    }

    /**
     * Get the [fnsentdnc] column value.
     *
     * @return boolean
     */
    public function isFnsentdnc()
    {
        return $this->getFnsentdnc();
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
     * Set the value of [identdnc] column.
     *
     * @param string $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setIdentdnc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->identdnc !== $v) {
            $this->identdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_IDENTDNC] = true;
        }

        return $this;
    } // setIdentdnc()

    /**
     * Set the value of [idnentemp] column.
     *
     * @param string $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setIdnentemp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idnentemp !== $v) {
            $this->idnentemp = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_IDNENTEMP] = true;
        }

        if ($this->aTblentemp !== null && $this->aTblentemp->getIdnentemp() !== $v) {
            $this->aTblentemp = null;
        }

        return $this;
    } // setIdnentemp()

    /**
     * Set the value of [uuid] column.
     *
     * @param string $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setUuid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uuid !== $v) {
            $this->uuid = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_UUID] = true;
        }

        return $this;
    } // setUuid()

    /**
     * Set the value of [dscentdnc] column.
     *
     * @param string $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setDscentdnc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dscentdnc !== $v) {
            $this->dscentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_DSCENTDNC] = true;
        }

        return $this;
    } // setDscentdnc()

    /**
     * Set the value of [tipentdnc] column.
     *
     * @param string $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setTipentdnc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tipentdnc !== $v) {
            $this->tipentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_TIPENTDNC] = true;
        }

        return $this;
    } // setTipentdnc()

    /**
     * Set the value of [kgsentdnc] column.
     *
     * @param double $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setKgsentdnc($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->kgsentdnc !== $v) {
            $this->kgsentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_KGSENTDNC] = true;
        }

        return $this;
    } // setKgsentdnc()

    /**
     * Set the value of [cntcjsdnc] column.
     *
     * @param int $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setCntcjsdnc($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cntcjsdnc !== $v) {
            $this->cntcjsdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_CNTCJSDNC] = true;
        }

        return $this;
    } // setCntcjsdnc()

    /**
     * Sets the value of [tmprstdnc] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setTmprstdnc($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmprstdnc !== null || $dt !== null) {
            if ($this->tmprstdnc === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tmprstdnc->format("Y-m-d H:i:s.u")) {
                $this->tmprstdnc = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentdncTableMap::COL_TMPRSTDNC] = true;
            }
        } // if either are not null

        return $this;
    } // setTmprstdnc()

    /**
     * Set the value of [idnentorg] column.
     *
     * @param string $v new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setIdnentorg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->idnentorg !== $v) {
            $this->idnentorg = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_IDNENTORG] = true;
        }

        if ($this->aTblentorg !== null && $this->aTblentorg->getIdnentorg() !== $v) {
            $this->aTblentorg = null;
        }

        return $this;
    } // setIdnentorg()

    /**
     * Sets the value of the [ntrentdnc] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setNtrentdnc($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ntrentdnc !== $v) {
            $this->ntrentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_NTRENTDNC] = true;
        }

        return $this;
    } // setNtrentdnc()

    /**
     * Sets the value of the [rqsentdnc] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setRqsentdnc($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->rqsentdnc !== $v) {
            $this->rqsentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_RQSENTDNC] = true;
        }

        return $this;
    } // setRqsentdnc()

    /**
     * Sets the value of the [clnentdnc] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setClnentdnc($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->clnentdnc !== $v) {
            $this->clnentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_CLNENTDNC] = true;
        }

        return $this;
    } // setClnentdnc()

    /**
     * Sets the value of the [fnsentdnc] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setFnsentdnc($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->fnsentdnc !== $v) {
            $this->fnsentdnc = $v;
            $this->modifiedColumns[TblentdncTableMap::COL_FNSENTDNC] = true;
        }

        return $this;
    } // setFnsentdnc()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentdncTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentdnc The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentdncTableMap::COL_UPDATED_AT] = true;
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
            if ($this->ntrentdnc !== false) {
                return false;
            }

            if ($this->rqsentdnc !== false) {
                return false;
            }

            if ($this->clnentdnc !== false) {
                return false;
            }

            if ($this->fnsentdnc !== false) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblentdncTableMap::translateFieldName('Identdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->identdnc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblentdncTableMap::translateFieldName('Idnentemp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idnentemp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblentdncTableMap::translateFieldName('Uuid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uuid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblentdncTableMap::translateFieldName('Dscentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dscentdnc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TblentdncTableMap::translateFieldName('Tipentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipentdnc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TblentdncTableMap::translateFieldName('Kgsentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kgsentdnc = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TblentdncTableMap::translateFieldName('Cntcjsdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cntcjsdnc = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TblentdncTableMap::translateFieldName('Tmprstdnc', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tmprstdnc = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TblentdncTableMap::translateFieldName('Idnentorg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idnentorg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TblentdncTableMap::translateFieldName('Ntrentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ntrentdnc = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TblentdncTableMap::translateFieldName('Rqsentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rqsentdnc = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TblentdncTableMap::translateFieldName('Clnentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->clnentdnc = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TblentdncTableMap::translateFieldName('Fnsentdnc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fnsentdnc = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TblentdncTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TblentdncTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = TblentdncTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Tblentdnc'), 0, $e);
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
        if ($this->aTblentemp !== null && $this->idnentemp !== $this->aTblentemp->getIdnentemp()) {
            $this->aTblentemp = null;
        }
        if ($this->aTblentorg !== null && $this->idnentorg !== $this->aTblentorg->getIdnentorg()) {
            $this->aTblentorg = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(TblentdncTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblentdncQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTblentemp = null;
            $this->aTblentorg = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblentdnc::setDeleted()
     * @see Tblentdnc::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentdncTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblentdncQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentdncTableMap::DATABASE_NAME);
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
                TblentdncTableMap::addInstanceToPool($this);
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

            if ($this->aTblentemp !== null) {
                if ($this->aTblentemp->isModified() || $this->aTblentemp->isNew()) {
                    $affectedRows += $this->aTblentemp->save($con);
                }
                $this->setTblentemp($this->aTblentemp);
            }

            if ($this->aTblentorg !== null) {
                if ($this->aTblentorg->isModified() || $this->aTblentorg->isNew()) {
                    $affectedRows += $this->aTblentorg->save($con);
                }
                $this->setTblentorg($this->aTblentorg);
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

        $this->modifiedColumns[TblentdncTableMap::COL_IDENTDNC] = true;
        if (null !== $this->identdnc) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblentdncTableMap::COL_IDENTDNC . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblentdncTableMap::COL_IDENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'identdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_IDNENTEMP)) {
            $modifiedColumns[':p' . $index++]  = 'idnentemp';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_UUID)) {
            $modifiedColumns[':p' . $index++]  = 'uuid';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_DSCENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'dscentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_TIPENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'tipentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_KGSENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'kgsentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_CNTCJSDNC)) {
            $modifiedColumns[':p' . $index++]  = 'cntcjsdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_TMPRSTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'tmprstdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_IDNENTORG)) {
            $modifiedColumns[':p' . $index++]  = 'idnentorg';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_NTRENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'ntrentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_RQSENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'rqsentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_CLNENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'clnentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_FNSENTDNC)) {
            $modifiedColumns[':p' . $index++]  = 'fnsentdnc';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO tblentdnc (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'identdnc':
                        $stmt->bindValue($identifier, $this->identdnc, PDO::PARAM_INT);
                        break;
                    case 'idnentemp':
                        $stmt->bindValue($identifier, $this->idnentemp, PDO::PARAM_INT);
                        break;
                    case 'uuid':
                        $stmt->bindValue($identifier, $this->uuid, PDO::PARAM_STR);
                        break;
                    case 'dscentdnc':
                        $stmt->bindValue($identifier, $this->dscentdnc, PDO::PARAM_STR);
                        break;
                    case 'tipentdnc':
                        $stmt->bindValue($identifier, $this->tipentdnc, PDO::PARAM_STR);
                        break;
                    case 'kgsentdnc':
                        $stmt->bindValue($identifier, $this->kgsentdnc, PDO::PARAM_STR);
                        break;
                    case 'cntcjsdnc':
                        $stmt->bindValue($identifier, $this->cntcjsdnc, PDO::PARAM_INT);
                        break;
                    case 'tmprstdnc':
                        $stmt->bindValue($identifier, $this->tmprstdnc ? $this->tmprstdnc->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'idnentorg':
                        $stmt->bindValue($identifier, $this->idnentorg, PDO::PARAM_INT);
                        break;
                    case 'ntrentdnc':
                        $stmt->bindValue($identifier, (int) $this->ntrentdnc, PDO::PARAM_INT);
                        break;
                    case 'rqsentdnc':
                        $stmt->bindValue($identifier, (int) $this->rqsentdnc, PDO::PARAM_INT);
                        break;
                    case 'clnentdnc':
                        $stmt->bindValue($identifier, (int) $this->clnentdnc, PDO::PARAM_INT);
                        break;
                    case 'fnsentdnc':
                        $stmt->bindValue($identifier, (int) $this->fnsentdnc, PDO::PARAM_INT);
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
        $this->setIdentdnc($pk);

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
        $pos = TblentdncTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdentdnc();
                break;
            case 1:
                return $this->getIdnentemp();
                break;
            case 2:
                return $this->getUuid();
                break;
            case 3:
                return $this->getDscentdnc();
                break;
            case 4:
                return $this->getTipentdnc();
                break;
            case 5:
                return $this->getKgsentdnc();
                break;
            case 6:
                return $this->getCntcjsdnc();
                break;
            case 7:
                return $this->getTmprstdnc();
                break;
            case 8:
                return $this->getIdnentorg();
                break;
            case 9:
                return $this->getNtrentdnc();
                break;
            case 10:
                return $this->getRqsentdnc();
                break;
            case 11:
                return $this->getClnentdnc();
                break;
            case 12:
                return $this->getFnsentdnc();
                break;
            case 13:
                return $this->getCreatedAt();
                break;
            case 14:
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

        if (isset($alreadyDumpedObjects['Tblentdnc'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblentdnc'][$this->hashCode()] = true;
        $keys = TblentdncTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdentdnc(),
            $keys[1] => $this->getIdnentemp(),
            $keys[2] => $this->getUuid(),
            $keys[3] => $this->getDscentdnc(),
            $keys[4] => $this->getTipentdnc(),
            $keys[5] => $this->getKgsentdnc(),
            $keys[6] => $this->getCntcjsdnc(),
            $keys[7] => $this->getTmprstdnc(),
            $keys[8] => $this->getIdnentorg(),
            $keys[9] => $this->getNtrentdnc(),
            $keys[10] => $this->getRqsentdnc(),
            $keys[11] => $this->getClnentdnc(),
            $keys[12] => $this->getFnsentdnc(),
            $keys[13] => $this->getCreatedAt(),
            $keys[14] => $this->getUpdatedAt(),
        );
        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[13]] instanceof \DateTimeInterface) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

        if ($result[$keys[14]] instanceof \DateTimeInterface) {
            $result[$keys[14]] = $result[$keys[14]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTblentemp) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentemp';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentemp';
                        break;
                    default:
                        $key = 'Tblentemp';
                }

                $result[$key] = $this->aTblentemp->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTblentorg) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentorg';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentorg';
                        break;
                    default:
                        $key = 'Tblentorg';
                }

                $result[$key] = $this->aTblentorg->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Tblentdnc
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblentdncTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Tblentdnc
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdentdnc($value);
                break;
            case 1:
                $this->setIdnentemp($value);
                break;
            case 2:
                $this->setUuid($value);
                break;
            case 3:
                $this->setDscentdnc($value);
                break;
            case 4:
                $this->setTipentdnc($value);
                break;
            case 5:
                $this->setKgsentdnc($value);
                break;
            case 6:
                $this->setCntcjsdnc($value);
                break;
            case 7:
                $this->setTmprstdnc($value);
                break;
            case 8:
                $this->setIdnentorg($value);
                break;
            case 9:
                $this->setNtrentdnc($value);
                break;
            case 10:
                $this->setRqsentdnc($value);
                break;
            case 11:
                $this->setClnentdnc($value);
                break;
            case 12:
                $this->setFnsentdnc($value);
                break;
            case 13:
                $this->setCreatedAt($value);
                break;
            case 14:
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
        $keys = TblentdncTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdentdnc($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdnentemp($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUuid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDscentdnc($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTipentdnc($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setKgsentdnc($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCntcjsdnc($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTmprstdnc($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIdnentorg($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNtrentdnc($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setRqsentdnc($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setClnentdnc($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setFnsentdnc($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCreatedAt($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setUpdatedAt($arr[$keys[14]]);
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
     * @return $this|\Tblentdnc The current object, for fluid interface
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
        $criteria = new Criteria(TblentdncTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblentdncTableMap::COL_IDENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_IDENTDNC, $this->identdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_IDNENTEMP)) {
            $criteria->add(TblentdncTableMap::COL_IDNENTEMP, $this->idnentemp);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_UUID)) {
            $criteria->add(TblentdncTableMap::COL_UUID, $this->uuid);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_DSCENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_DSCENTDNC, $this->dscentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_TIPENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_TIPENTDNC, $this->tipentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_KGSENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_KGSENTDNC, $this->kgsentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_CNTCJSDNC)) {
            $criteria->add(TblentdncTableMap::COL_CNTCJSDNC, $this->cntcjsdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_TMPRSTDNC)) {
            $criteria->add(TblentdncTableMap::COL_TMPRSTDNC, $this->tmprstdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_IDNENTORG)) {
            $criteria->add(TblentdncTableMap::COL_IDNENTORG, $this->idnentorg);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_NTRENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_NTRENTDNC, $this->ntrentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_RQSENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_RQSENTDNC, $this->rqsentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_CLNENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_CLNENTDNC, $this->clnentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_FNSENTDNC)) {
            $criteria->add(TblentdncTableMap::COL_FNSENTDNC, $this->fnsentdnc);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_CREATED_AT)) {
            $criteria->add(TblentdncTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(TblentdncTableMap::COL_UPDATED_AT)) {
            $criteria->add(TblentdncTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildTblentdncQuery::create();
        $criteria->add(TblentdncTableMap::COL_IDENTDNC, $this->identdnc);

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
        $validPk = null !== $this->getIdentdnc();

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
        return $this->getIdentdnc();
    }

    /**
     * Generic method to set the primary key (identdnc column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdentdnc($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdentdnc();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Tblentdnc (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdnentemp($this->getIdnentemp());
        $copyObj->setUuid($this->getUuid());
        $copyObj->setDscentdnc($this->getDscentdnc());
        $copyObj->setTipentdnc($this->getTipentdnc());
        $copyObj->setKgsentdnc($this->getKgsentdnc());
        $copyObj->setCntcjsdnc($this->getCntcjsdnc());
        $copyObj->setTmprstdnc($this->getTmprstdnc());
        $copyObj->setIdnentorg($this->getIdnentorg());
        $copyObj->setNtrentdnc($this->getNtrentdnc());
        $copyObj->setRqsentdnc($this->getRqsentdnc());
        $copyObj->setClnentdnc($this->getClnentdnc());
        $copyObj->setFnsentdnc($this->getFnsentdnc());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdentdnc(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Tblentdnc Clone of current object.
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
     * Declares an association between this object and a ChildTblentemp object.
     *
     * @param  ChildTblentemp $v
     * @return $this|\Tblentdnc The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTblentemp(ChildTblentemp $v = null)
    {
        if ($v === null) {
            $this->setIdnentemp(NULL);
        } else {
            $this->setIdnentemp($v->getIdnentemp());
        }

        $this->aTblentemp = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTblentemp object, it will not be re-added.
        if ($v !== null) {
            $v->addTblentdnc($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTblentemp object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTblentemp The associated ChildTblentemp object.
     * @throws PropelException
     */
    public function getTblentemp(ConnectionInterface $con = null)
    {
        if ($this->aTblentemp === null && (($this->idnentemp !== "" && $this->idnentemp !== null))) {
            $this->aTblentemp = ChildTblentempQuery::create()->findPk($this->idnentemp, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTblentemp->addTblentdncs($this);
             */
        }

        return $this->aTblentemp;
    }

    /**
     * Declares an association between this object and a ChildTblentorg object.
     *
     * @param  ChildTblentorg $v
     * @return $this|\Tblentdnc The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTblentorg(ChildTblentorg $v = null)
    {
        if ($v === null) {
            $this->setIdnentorg(NULL);
        } else {
            $this->setIdnentorg($v->getIdnentorg());
        }

        $this->aTblentorg = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTblentorg object, it will not be re-added.
        if ($v !== null) {
            $v->addTblentdnc($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTblentorg object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTblentorg The associated ChildTblentorg object.
     * @throws PropelException
     */
    public function getTblentorg(ConnectionInterface $con = null)
    {
        if ($this->aTblentorg === null && (($this->idnentorg !== "" && $this->idnentorg !== null))) {
            $this->aTblentorg = ChildTblentorgQuery::create()->findPk($this->idnentorg, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTblentorg->addTblentdncs($this);
             */
        }

        return $this->aTblentorg;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTblentemp) {
            $this->aTblentemp->removeTblentdnc($this);
        }
        if (null !== $this->aTblentorg) {
            $this->aTblentorg->removeTblentdnc($this);
        }
        $this->identdnc = null;
        $this->idnentemp = null;
        $this->uuid = null;
        $this->dscentdnc = null;
        $this->tipentdnc = null;
        $this->kgsentdnc = null;
        $this->cntcjsdnc = null;
        $this->tmprstdnc = null;
        $this->idnentorg = null;
        $this->ntrentdnc = null;
        $this->rqsentdnc = null;
        $this->clnentdnc = null;
        $this->fnsentdnc = null;
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
        } // if ($deep)

        $this->aTblentemp = null;
        $this->aTblentorg = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblentdncTableMap::DEFAULT_STRING_FORMAT);
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
