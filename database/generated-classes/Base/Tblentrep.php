<?php

namespace Base;

use \TblentrepQuery as ChildTblentrepQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TblentrepTableMap;
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
 * Base class that represents a row from the 'tblentrep' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Tblentrep implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TblentrepTableMap';


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
     * The value for the id field.
     *
     * @var        string
     */
    protected $id;

    /**
     * The value for the uuid field.
     *
     * @var        string
     */
    protected $uuid;

    /**
     * The value for the crpdtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $crpdtsgnr;

    /**
     * The value for the rfcdtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rfcdtsgnr;

    /**
     * The value for the emllbrgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $emllbrgnr;

    /**
     * The value for the emlprsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $emlprsgnr;

    /**
     * The value for the estcvlgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $estcvlgnr;

    /**
     * The value for the rgmcnygnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $rgmcnygnr;

    /**
     * The value for the ncndtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $ncndtsgnr;

    /**
     * The value for the pasnacgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pasnacgnr;

    /**
     * The value for the estnacgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $estnacgnr;

    /**
     * The value for the lgrubcgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lgrubcgnr;

    /**
     * The value for the entdtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $entdtsgnr;

    /**
     * The value for the mncdtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mncdtsgnr;

    /**
     * The value for the lcldtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lcldtsgnr;

    /**
     * The value for the dmcdtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $dmcdtsgnr;

    /**
     * The value for the cdgpstgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cdgpstgnr;

    /**
     * The value for the tlffijgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $tlffijgnr;

    /**
     * The value for the tlfmvlgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $tlfmvlgnr;

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
     * The value for the finished_at field.
     *
     * @var        DateTime
     */
    protected $finished_at;

    /**
     * The value for the phoentprs field.
     *
     * @var        string
     */
    protected $phoentprs;

    /**
     * The value for the typentprs field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $typentprs;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the email_verified_at field.
     *
     * @var        DateTime
     */
    protected $email_verified_at;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the remember_token field.
     *
     * @var        string
     */
    protected $remember_token;

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
        $this->crpdtsgnr = '';
        $this->rfcdtsgnr = '';
        $this->emllbrgnr = '';
        $this->emlprsgnr = '';
        $this->estcvlgnr = '';
        $this->rgmcnygnr = '';
        $this->ncndtsgnr = '';
        $this->pasnacgnr = '';
        $this->estnacgnr = '';
        $this->lgrubcgnr = '';
        $this->entdtsgnr = '';
        $this->mncdtsgnr = '';
        $this->lcldtsgnr = '';
        $this->dmcdtsgnr = '';
        $this->cdgpstgnr = '';
        $this->tlffijgnr = '';
        $this->tlfmvlgnr = '';
        $this->typentprs = 0;
    }

    /**
     * Initializes internal state of Base\Tblentrep object.
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
     * Compares this with another <code>Tblentrep</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblentrep</code>, delegates to
     * <code>equals(Tblentrep)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Tblentrep The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     * Get the [crpdtsgnr] column value.
     *
     * @return string
     */
    public function getCrpdtsgnr()
    {
        return $this->crpdtsgnr;
    }

    /**
     * Get the [rfcdtsgnr] column value.
     *
     * @return string
     */
    public function getRfcdtsgnr()
    {
        return $this->rfcdtsgnr;
    }

    /**
     * Get the [emllbrgnr] column value.
     *
     * @return string
     */
    public function getEmllbrgnr()
    {
        return $this->emllbrgnr;
    }

    /**
     * Get the [emlprsgnr] column value.
     *
     * @return string
     */
    public function getEmlprsgnr()
    {
        return $this->emlprsgnr;
    }

    /**
     * Get the [estcvlgnr] column value.
     *
     * @return string
     */
    public function getEstcvlgnr()
    {
        return $this->estcvlgnr;
    }

    /**
     * Get the [rgmcnygnr] column value.
     *
     * @return string
     */
    public function getRgmcnygnr()
    {
        return $this->rgmcnygnr;
    }

    /**
     * Get the [ncndtsgnr] column value.
     *
     * @return string
     */
    public function getNcndtsgnr()
    {
        return $this->ncndtsgnr;
    }

    /**
     * Get the [pasnacgnr] column value.
     *
     * @return string
     */
    public function getPasnacgnr()
    {
        return $this->pasnacgnr;
    }

    /**
     * Get the [estnacgnr] column value.
     *
     * @return string
     */
    public function getEstnacgnr()
    {
        return $this->estnacgnr;
    }

    /**
     * Get the [lgrubcgnr] column value.
     *
     * @return string
     */
    public function getLgrubcgnr()
    {
        return $this->lgrubcgnr;
    }

    /**
     * Get the [entdtsgnr] column value.
     *
     * @return string
     */
    public function getEntdtsgnr()
    {
        return $this->entdtsgnr;
    }

    /**
     * Get the [mncdtsgnr] column value.
     *
     * @return string
     */
    public function getMncdtsgnr()
    {
        return $this->mncdtsgnr;
    }

    /**
     * Get the [lcldtsgnr] column value.
     *
     * @return string
     */
    public function getLcldtsgnr()
    {
        return $this->lcldtsgnr;
    }

    /**
     * Get the [dmcdtsgnr] column value.
     *
     * @return string
     */
    public function getDmcdtsgnr()
    {
        return $this->dmcdtsgnr;
    }

    /**
     * Get the [cdgpstgnr] column value.
     *
     * @return string
     */
    public function getCdgpstgnr()
    {
        return $this->cdgpstgnr;
    }

    /**
     * Get the [tlffijgnr] column value.
     *
     * @return string
     */
    public function getTlffijgnr()
    {
        return $this->tlffijgnr;
    }

    /**
     * Get the [tlfmvlgnr] column value.
     *
     * @return string
     */
    public function getTlfmvlgnr()
    {
        return $this->tlfmvlgnr;
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
     * Get the [optionally formatted] temporal [finished_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFinishedAt($format = 'Y-m-d H:i:s')
    {
        if ($format === null) {
            return $this->finished_at;
        } else {
            return $this->finished_at instanceof \DateTimeInterface ? $this->finished_at->format($format) : null;
        }
    }

    /**
     * Get the [phoentprs] column value.
     *
     * @return string
     */
    public function getPhoentprs()
    {
        return $this->phoentprs;
    }

    /**
     * Get the [typentprs] column value.
     *
     * @return int
     */
    public function getTypentprs()
    {
        return $this->typentprs;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [optionally formatted] temporal [email_verified_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEmailVerifiedAt($format = 'Y-m-d H:i:s')
    {
        if ($format === null) {
            return $this->email_verified_at;
        } else {
            return $this->email_verified_at instanceof \DateTimeInterface ? $this->email_verified_at->format($format) : null;
        }
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [remember_token] column value.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [uuid] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setUuid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uuid !== $v) {
            $this->uuid = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_UUID] = true;
        }

        return $this;
    } // setUuid()

    /**
     * Set the value of [crpdtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setCrpdtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crpdtsgnr !== $v) {
            $this->crpdtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_CRPDTSGNR] = true;
        }

        return $this;
    } // setCrpdtsgnr()

    /**
     * Set the value of [rfcdtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setRfcdtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rfcdtsgnr !== $v) {
            $this->rfcdtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_RFCDTSGNR] = true;
        }

        return $this;
    } // setRfcdtsgnr()

    /**
     * Set the value of [emllbrgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEmllbrgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emllbrgnr !== $v) {
            $this->emllbrgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_EMLLBRGNR] = true;
        }

        return $this;
    } // setEmllbrgnr()

    /**
     * Set the value of [emlprsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEmlprsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emlprsgnr !== $v) {
            $this->emlprsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_EMLPRSGNR] = true;
        }

        return $this;
    } // setEmlprsgnr()

    /**
     * Set the value of [estcvlgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEstcvlgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estcvlgnr !== $v) {
            $this->estcvlgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_ESTCVLGNR] = true;
        }

        return $this;
    } // setEstcvlgnr()

    /**
     * Set the value of [rgmcnygnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setRgmcnygnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rgmcnygnr !== $v) {
            $this->rgmcnygnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_RGMCNYGNR] = true;
        }

        return $this;
    } // setRgmcnygnr()

    /**
     * Set the value of [ncndtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setNcndtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ncndtsgnr !== $v) {
            $this->ncndtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_NCNDTSGNR] = true;
        }

        return $this;
    } // setNcndtsgnr()

    /**
     * Set the value of [pasnacgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setPasnacgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pasnacgnr !== $v) {
            $this->pasnacgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_PASNACGNR] = true;
        }

        return $this;
    } // setPasnacgnr()

    /**
     * Set the value of [estnacgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEstnacgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->estnacgnr !== $v) {
            $this->estnacgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_ESTNACGNR] = true;
        }

        return $this;
    } // setEstnacgnr()

    /**
     * Set the value of [lgrubcgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setLgrubcgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lgrubcgnr !== $v) {
            $this->lgrubcgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_LGRUBCGNR] = true;
        }

        return $this;
    } // setLgrubcgnr()

    /**
     * Set the value of [entdtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEntdtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->entdtsgnr !== $v) {
            $this->entdtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_ENTDTSGNR] = true;
        }

        return $this;
    } // setEntdtsgnr()

    /**
     * Set the value of [mncdtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setMncdtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mncdtsgnr !== $v) {
            $this->mncdtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_MNCDTSGNR] = true;
        }

        return $this;
    } // setMncdtsgnr()

    /**
     * Set the value of [lcldtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setLcldtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lcldtsgnr !== $v) {
            $this->lcldtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_LCLDTSGNR] = true;
        }

        return $this;
    } // setLcldtsgnr()

    /**
     * Set the value of [dmcdtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setDmcdtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dmcdtsgnr !== $v) {
            $this->dmcdtsgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_DMCDTSGNR] = true;
        }

        return $this;
    } // setDmcdtsgnr()

    /**
     * Set the value of [cdgpstgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setCdgpstgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cdgpstgnr !== $v) {
            $this->cdgpstgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_CDGPSTGNR] = true;
        }

        return $this;
    } // setCdgpstgnr()

    /**
     * Set the value of [tlffijgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setTlffijgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tlffijgnr !== $v) {
            $this->tlffijgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_TLFFIJGNR] = true;
        }

        return $this;
    } // setTlffijgnr()

    /**
     * Set the value of [tlfmvlgnr] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setTlfmvlgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tlfmvlgnr !== $v) {
            $this->tlfmvlgnr = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_TLFMVLGNR] = true;
        }

        return $this;
    } // setTlfmvlgnr()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentrepTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentrepTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Sets the value of [finished_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setFinishedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->finished_at !== null || $dt !== null) {
            if ($this->finished_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->finished_at->format("Y-m-d H:i:s.u")) {
                $this->finished_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentrepTableMap::COL_FINISHED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setFinishedAt()

    /**
     * Set the value of [phoentprs] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setPhoentprs($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phoentprs !== $v) {
            $this->phoentprs = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_PHOENTPRS] = true;
        }

        return $this;
    } // setPhoentprs()

    /**
     * Set the value of [typentprs] column.
     *
     * @param int $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setTypentprs($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->typentprs !== $v) {
            $this->typentprs = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_TYPENTPRS] = true;
        }

        return $this;
    } // setTypentprs()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Sets the value of [email_verified_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setEmailVerifiedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->email_verified_at !== null || $dt !== null) {
            if ($this->email_verified_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->email_verified_at->format("Y-m-d H:i:s.u")) {
                $this->email_verified_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblentrepTableMap::COL_EMAIL_VERIFIED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setEmailVerifiedAt()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [remember_token] column.
     *
     * @param string $v new value
     * @return $this|\Tblentrep The current object (for fluent API support)
     */
    public function setRememberToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remember_token !== $v) {
            $this->remember_token = $v;
            $this->modifiedColumns[TblentrepTableMap::COL_REMEMBER_TOKEN] = true;
        }

        return $this;
    } // setRememberToken()

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
            if ($this->crpdtsgnr !== '') {
                return false;
            }

            if ($this->rfcdtsgnr !== '') {
                return false;
            }

            if ($this->emllbrgnr !== '') {
                return false;
            }

            if ($this->emlprsgnr !== '') {
                return false;
            }

            if ($this->estcvlgnr !== '') {
                return false;
            }

            if ($this->rgmcnygnr !== '') {
                return false;
            }

            if ($this->ncndtsgnr !== '') {
                return false;
            }

            if ($this->pasnacgnr !== '') {
                return false;
            }

            if ($this->estnacgnr !== '') {
                return false;
            }

            if ($this->lgrubcgnr !== '') {
                return false;
            }

            if ($this->entdtsgnr !== '') {
                return false;
            }

            if ($this->mncdtsgnr !== '') {
                return false;
            }

            if ($this->lcldtsgnr !== '') {
                return false;
            }

            if ($this->dmcdtsgnr !== '') {
                return false;
            }

            if ($this->cdgpstgnr !== '') {
                return false;
            }

            if ($this->tlffijgnr !== '') {
                return false;
            }

            if ($this->tlfmvlgnr !== '') {
                return false;
            }

            if ($this->typentprs !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblentrepTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblentrepTableMap::translateFieldName('Uuid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uuid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblentrepTableMap::translateFieldName('Crpdtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crpdtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblentrepTableMap::translateFieldName('Rfcdtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rfcdtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TblentrepTableMap::translateFieldName('Emllbrgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emllbrgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TblentrepTableMap::translateFieldName('Emlprsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emlprsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TblentrepTableMap::translateFieldName('Estcvlgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estcvlgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TblentrepTableMap::translateFieldName('Rgmcnygnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rgmcnygnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TblentrepTableMap::translateFieldName('Ncndtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ncndtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TblentrepTableMap::translateFieldName('Pasnacgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pasnacgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TblentrepTableMap::translateFieldName('Estnacgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estnacgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TblentrepTableMap::translateFieldName('Lgrubcgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lgrubcgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TblentrepTableMap::translateFieldName('Entdtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->entdtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TblentrepTableMap::translateFieldName('Mncdtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mncdtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TblentrepTableMap::translateFieldName('Lcldtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lcldtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : TblentrepTableMap::translateFieldName('Dmcdtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dmcdtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : TblentrepTableMap::translateFieldName('Cdgpstgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdgpstgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : TblentrepTableMap::translateFieldName('Tlffijgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tlffijgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : TblentrepTableMap::translateFieldName('Tlfmvlgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tlfmvlgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : TblentrepTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : TblentrepTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : TblentrepTableMap::translateFieldName('FinishedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->finished_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : TblentrepTableMap::translateFieldName('Phoentprs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phoentprs = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : TblentrepTableMap::translateFieldName('Typentprs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->typentprs = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : TblentrepTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : TblentrepTableMap::translateFieldName('EmailVerifiedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->email_verified_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : TblentrepTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : TblentrepTableMap::translateFieldName('RememberToken', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remember_token = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 28; // 28 = TblentrepTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Tblentrep'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(TblentrepTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblentrepQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblentrep::setDeleted()
     * @see Tblentrep::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrepTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblentrepQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrepTableMap::DATABASE_NAME);
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
                TblentrepTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[TblentrepTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblentrepTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblentrepTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_UUID)) {
            $modifiedColumns[':p' . $index++]  = 'uuid';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_CRPDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'crpdtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_RFCDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'rfcdtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMLLBRGNR)) {
            $modifiedColumns[':p' . $index++]  = 'emllbrgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMLPRSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'emlprsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_ESTCVLGNR)) {
            $modifiedColumns[':p' . $index++]  = 'estcvlgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_RGMCNYGNR)) {
            $modifiedColumns[':p' . $index++]  = 'rgmcnygnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_NCNDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'ncndtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_PASNACGNR)) {
            $modifiedColumns[':p' . $index++]  = 'pasnacgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_ESTNACGNR)) {
            $modifiedColumns[':p' . $index++]  = 'estnacgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_LGRUBCGNR)) {
            $modifiedColumns[':p' . $index++]  = 'lgrubcgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_ENTDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'entdtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_MNCDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'mncdtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_LCLDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'lcldtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_DMCDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'dmcdtsgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_CDGPSTGNR)) {
            $modifiedColumns[':p' . $index++]  = 'cdgpstgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_TLFFIJGNR)) {
            $modifiedColumns[':p' . $index++]  = 'tlffijgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_TLFMVLGNR)) {
            $modifiedColumns[':p' . $index++]  = 'tlfmvlgnr';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_FINISHED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'finished_at';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_PHOENTPRS)) {
            $modifiedColumns[':p' . $index++]  = 'phoentprs';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_TYPENTPRS)) {
            $modifiedColumns[':p' . $index++]  = 'typentprs';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMAIL_VERIFIED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'email_verified_at';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_REMEMBER_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = 'remember_token';
        }

        $sql = sprintf(
            'INSERT INTO tblentrep (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'uuid':
                        $stmt->bindValue($identifier, $this->uuid, PDO::PARAM_STR);
                        break;
                    case 'crpdtsgnr':
                        $stmt->bindValue($identifier, $this->crpdtsgnr, PDO::PARAM_STR);
                        break;
                    case 'rfcdtsgnr':
                        $stmt->bindValue($identifier, $this->rfcdtsgnr, PDO::PARAM_STR);
                        break;
                    case 'emllbrgnr':
                        $stmt->bindValue($identifier, $this->emllbrgnr, PDO::PARAM_STR);
                        break;
                    case 'emlprsgnr':
                        $stmt->bindValue($identifier, $this->emlprsgnr, PDO::PARAM_STR);
                        break;
                    case 'estcvlgnr':
                        $stmt->bindValue($identifier, $this->estcvlgnr, PDO::PARAM_STR);
                        break;
                    case 'rgmcnygnr':
                        $stmt->bindValue($identifier, $this->rgmcnygnr, PDO::PARAM_STR);
                        break;
                    case 'ncndtsgnr':
                        $stmt->bindValue($identifier, $this->ncndtsgnr, PDO::PARAM_STR);
                        break;
                    case 'pasnacgnr':
                        $stmt->bindValue($identifier, $this->pasnacgnr, PDO::PARAM_STR);
                        break;
                    case 'estnacgnr':
                        $stmt->bindValue($identifier, $this->estnacgnr, PDO::PARAM_STR);
                        break;
                    case 'lgrubcgnr':
                        $stmt->bindValue($identifier, $this->lgrubcgnr, PDO::PARAM_STR);
                        break;
                    case 'entdtsgnr':
                        $stmt->bindValue($identifier, $this->entdtsgnr, PDO::PARAM_STR);
                        break;
                    case 'mncdtsgnr':
                        $stmt->bindValue($identifier, $this->mncdtsgnr, PDO::PARAM_STR);
                        break;
                    case 'lcldtsgnr':
                        $stmt->bindValue($identifier, $this->lcldtsgnr, PDO::PARAM_STR);
                        break;
                    case 'dmcdtsgnr':
                        $stmt->bindValue($identifier, $this->dmcdtsgnr, PDO::PARAM_STR);
                        break;
                    case 'cdgpstgnr':
                        $stmt->bindValue($identifier, $this->cdgpstgnr, PDO::PARAM_STR);
                        break;
                    case 'tlffijgnr':
                        $stmt->bindValue($identifier, $this->tlffijgnr, PDO::PARAM_STR);
                        break;
                    case 'tlfmvlgnr':
                        $stmt->bindValue($identifier, $this->tlfmvlgnr, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'finished_at':
                        $stmt->bindValue($identifier, $this->finished_at ? $this->finished_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'phoentprs':
                        $stmt->bindValue($identifier, $this->phoentprs, PDO::PARAM_STR);
                        break;
                    case 'typentprs':
                        $stmt->bindValue($identifier, $this->typentprs, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'email_verified_at':
                        $stmt->bindValue($identifier, $this->email_verified_at ? $this->email_verified_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'remember_token':
                        $stmt->bindValue($identifier, $this->remember_token, PDO::PARAM_STR);
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
        $this->setId($pk);

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
        $pos = TblentrepTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getUuid();
                break;
            case 2:
                return $this->getCrpdtsgnr();
                break;
            case 3:
                return $this->getRfcdtsgnr();
                break;
            case 4:
                return $this->getEmllbrgnr();
                break;
            case 5:
                return $this->getEmlprsgnr();
                break;
            case 6:
                return $this->getEstcvlgnr();
                break;
            case 7:
                return $this->getRgmcnygnr();
                break;
            case 8:
                return $this->getNcndtsgnr();
                break;
            case 9:
                return $this->getPasnacgnr();
                break;
            case 10:
                return $this->getEstnacgnr();
                break;
            case 11:
                return $this->getLgrubcgnr();
                break;
            case 12:
                return $this->getEntdtsgnr();
                break;
            case 13:
                return $this->getMncdtsgnr();
                break;
            case 14:
                return $this->getLcldtsgnr();
                break;
            case 15:
                return $this->getDmcdtsgnr();
                break;
            case 16:
                return $this->getCdgpstgnr();
                break;
            case 17:
                return $this->getTlffijgnr();
                break;
            case 18:
                return $this->getTlfmvlgnr();
                break;
            case 19:
                return $this->getCreatedAt();
                break;
            case 20:
                return $this->getUpdatedAt();
                break;
            case 21:
                return $this->getFinishedAt();
                break;
            case 22:
                return $this->getPhoentprs();
                break;
            case 23:
                return $this->getTypentprs();
                break;
            case 24:
                return $this->getEmail();
                break;
            case 25:
                return $this->getEmailVerifiedAt();
                break;
            case 26:
                return $this->getPassword();
                break;
            case 27:
                return $this->getRememberToken();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Tblentrep'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblentrep'][$this->hashCode()] = true;
        $keys = TblentrepTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUuid(),
            $keys[2] => $this->getCrpdtsgnr(),
            $keys[3] => $this->getRfcdtsgnr(),
            $keys[4] => $this->getEmllbrgnr(),
            $keys[5] => $this->getEmlprsgnr(),
            $keys[6] => $this->getEstcvlgnr(),
            $keys[7] => $this->getRgmcnygnr(),
            $keys[8] => $this->getNcndtsgnr(),
            $keys[9] => $this->getPasnacgnr(),
            $keys[10] => $this->getEstnacgnr(),
            $keys[11] => $this->getLgrubcgnr(),
            $keys[12] => $this->getEntdtsgnr(),
            $keys[13] => $this->getMncdtsgnr(),
            $keys[14] => $this->getLcldtsgnr(),
            $keys[15] => $this->getDmcdtsgnr(),
            $keys[16] => $this->getCdgpstgnr(),
            $keys[17] => $this->getTlffijgnr(),
            $keys[18] => $this->getTlfmvlgnr(),
            $keys[19] => $this->getCreatedAt(),
            $keys[20] => $this->getUpdatedAt(),
            $keys[21] => $this->getFinishedAt(),
            $keys[22] => $this->getPhoentprs(),
            $keys[23] => $this->getTypentprs(),
            $keys[24] => $this->getEmail(),
            $keys[25] => $this->getEmailVerifiedAt(),
            $keys[26] => $this->getPassword(),
            $keys[27] => $this->getRememberToken(),
        );
        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        if ($result[$keys[21]] instanceof \DateTimeInterface) {
            $result[$keys[21]] = $result[$keys[21]]->format('c');
        }

        if ($result[$keys[25]] instanceof \DateTimeInterface) {
            $result[$keys[25]] = $result[$keys[25]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\Tblentrep
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblentrepTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Tblentrep
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setUuid($value);
                break;
            case 2:
                $this->setCrpdtsgnr($value);
                break;
            case 3:
                $this->setRfcdtsgnr($value);
                break;
            case 4:
                $this->setEmllbrgnr($value);
                break;
            case 5:
                $this->setEmlprsgnr($value);
                break;
            case 6:
                $this->setEstcvlgnr($value);
                break;
            case 7:
                $this->setRgmcnygnr($value);
                break;
            case 8:
                $this->setNcndtsgnr($value);
                break;
            case 9:
                $this->setPasnacgnr($value);
                break;
            case 10:
                $this->setEstnacgnr($value);
                break;
            case 11:
                $this->setLgrubcgnr($value);
                break;
            case 12:
                $this->setEntdtsgnr($value);
                break;
            case 13:
                $this->setMncdtsgnr($value);
                break;
            case 14:
                $this->setLcldtsgnr($value);
                break;
            case 15:
                $this->setDmcdtsgnr($value);
                break;
            case 16:
                $this->setCdgpstgnr($value);
                break;
            case 17:
                $this->setTlffijgnr($value);
                break;
            case 18:
                $this->setTlfmvlgnr($value);
                break;
            case 19:
                $this->setCreatedAt($value);
                break;
            case 20:
                $this->setUpdatedAt($value);
                break;
            case 21:
                $this->setFinishedAt($value);
                break;
            case 22:
                $this->setPhoentprs($value);
                break;
            case 23:
                $this->setTypentprs($value);
                break;
            case 24:
                $this->setEmail($value);
                break;
            case 25:
                $this->setEmailVerifiedAt($value);
                break;
            case 26:
                $this->setPassword($value);
                break;
            case 27:
                $this->setRememberToken($value);
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
        $keys = TblentrepTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUuid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCrpdtsgnr($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRfcdtsgnr($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmllbrgnr($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEmlprsgnr($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEstcvlgnr($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setRgmcnygnr($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setNcndtsgnr($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPasnacgnr($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setEstnacgnr($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setLgrubcgnr($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setEntdtsgnr($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setMncdtsgnr($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setLcldtsgnr($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDmcdtsgnr($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCdgpstgnr($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTlffijgnr($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTlfmvlgnr($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCreatedAt($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setUpdatedAt($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setFinishedAt($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPhoentprs($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setTypentprs($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setEmail($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setEmailVerifiedAt($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPassword($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setRememberToken($arr[$keys[27]]);
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
     * @return $this|\Tblentrep The current object, for fluid interface
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
        $criteria = new Criteria(TblentrepTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblentrepTableMap::COL_ID)) {
            $criteria->add(TblentrepTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_UUID)) {
            $criteria->add(TblentrepTableMap::COL_UUID, $this->uuid);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_CRPDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_CRPDTSGNR, $this->crpdtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_RFCDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_RFCDTSGNR, $this->rfcdtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMLLBRGNR)) {
            $criteria->add(TblentrepTableMap::COL_EMLLBRGNR, $this->emllbrgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMLPRSGNR)) {
            $criteria->add(TblentrepTableMap::COL_EMLPRSGNR, $this->emlprsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_ESTCVLGNR)) {
            $criteria->add(TblentrepTableMap::COL_ESTCVLGNR, $this->estcvlgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_RGMCNYGNR)) {
            $criteria->add(TblentrepTableMap::COL_RGMCNYGNR, $this->rgmcnygnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_NCNDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_NCNDTSGNR, $this->ncndtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_PASNACGNR)) {
            $criteria->add(TblentrepTableMap::COL_PASNACGNR, $this->pasnacgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_ESTNACGNR)) {
            $criteria->add(TblentrepTableMap::COL_ESTNACGNR, $this->estnacgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_LGRUBCGNR)) {
            $criteria->add(TblentrepTableMap::COL_LGRUBCGNR, $this->lgrubcgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_ENTDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_ENTDTSGNR, $this->entdtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_MNCDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_MNCDTSGNR, $this->mncdtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_LCLDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_LCLDTSGNR, $this->lcldtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_DMCDTSGNR)) {
            $criteria->add(TblentrepTableMap::COL_DMCDTSGNR, $this->dmcdtsgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_CDGPSTGNR)) {
            $criteria->add(TblentrepTableMap::COL_CDGPSTGNR, $this->cdgpstgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_TLFFIJGNR)) {
            $criteria->add(TblentrepTableMap::COL_TLFFIJGNR, $this->tlffijgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_TLFMVLGNR)) {
            $criteria->add(TblentrepTableMap::COL_TLFMVLGNR, $this->tlfmvlgnr);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_CREATED_AT)) {
            $criteria->add(TblentrepTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_UPDATED_AT)) {
            $criteria->add(TblentrepTableMap::COL_UPDATED_AT, $this->updated_at);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_FINISHED_AT)) {
            $criteria->add(TblentrepTableMap::COL_FINISHED_AT, $this->finished_at);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_PHOENTPRS)) {
            $criteria->add(TblentrepTableMap::COL_PHOENTPRS, $this->phoentprs);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_TYPENTPRS)) {
            $criteria->add(TblentrepTableMap::COL_TYPENTPRS, $this->typentprs);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMAIL)) {
            $criteria->add(TblentrepTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_EMAIL_VERIFIED_AT)) {
            $criteria->add(TblentrepTableMap::COL_EMAIL_VERIFIED_AT, $this->email_verified_at);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_PASSWORD)) {
            $criteria->add(TblentrepTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(TblentrepTableMap::COL_REMEMBER_TOKEN)) {
            $criteria->add(TblentrepTableMap::COL_REMEMBER_TOKEN, $this->remember_token);
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
        $criteria = ChildTblentrepQuery::create();
        $criteria->add(TblentrepTableMap::COL_ID, $this->id);

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
        $validPk = null !== $this->getId();

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
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Tblentrep (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUuid($this->getUuid());
        $copyObj->setCrpdtsgnr($this->getCrpdtsgnr());
        $copyObj->setRfcdtsgnr($this->getRfcdtsgnr());
        $copyObj->setEmllbrgnr($this->getEmllbrgnr());
        $copyObj->setEmlprsgnr($this->getEmlprsgnr());
        $copyObj->setEstcvlgnr($this->getEstcvlgnr());
        $copyObj->setRgmcnygnr($this->getRgmcnygnr());
        $copyObj->setNcndtsgnr($this->getNcndtsgnr());
        $copyObj->setPasnacgnr($this->getPasnacgnr());
        $copyObj->setEstnacgnr($this->getEstnacgnr());
        $copyObj->setLgrubcgnr($this->getLgrubcgnr());
        $copyObj->setEntdtsgnr($this->getEntdtsgnr());
        $copyObj->setMncdtsgnr($this->getMncdtsgnr());
        $copyObj->setLcldtsgnr($this->getLcldtsgnr());
        $copyObj->setDmcdtsgnr($this->getDmcdtsgnr());
        $copyObj->setCdgpstgnr($this->getCdgpstgnr());
        $copyObj->setTlffijgnr($this->getTlffijgnr());
        $copyObj->setTlfmvlgnr($this->getTlfmvlgnr());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setFinishedAt($this->getFinishedAt());
        $copyObj->setPhoentprs($this->getPhoentprs());
        $copyObj->setTypentprs($this->getTypentprs());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setEmailVerifiedAt($this->getEmailVerifiedAt());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setRememberToken($this->getRememberToken());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Tblentrep Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->uuid = null;
        $this->crpdtsgnr = null;
        $this->rfcdtsgnr = null;
        $this->emllbrgnr = null;
        $this->emlprsgnr = null;
        $this->estcvlgnr = null;
        $this->rgmcnygnr = null;
        $this->ncndtsgnr = null;
        $this->pasnacgnr = null;
        $this->estnacgnr = null;
        $this->lgrubcgnr = null;
        $this->entdtsgnr = null;
        $this->mncdtsgnr = null;
        $this->lcldtsgnr = null;
        $this->dmcdtsgnr = null;
        $this->cdgpstgnr = null;
        $this->tlffijgnr = null;
        $this->tlfmvlgnr = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->finished_at = null;
        $this->phoentprs = null;
        $this->typentprs = null;
        $this->email = null;
        $this->email_verified_at = null;
        $this->password = null;
        $this->remember_token = null;
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

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblentrepTableMap::DEFAULT_STRING_FORMAT);
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
