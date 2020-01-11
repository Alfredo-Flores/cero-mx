<?php

namespace Base;

use \Tblentemp as ChildTblentemp;
use \TblentempQuery as ChildTblentempQuery;
use \Tblentorg as ChildTblentorg;
use \TblentorgQuery as ChildTblentorgQuery;
use \Users as ChildUsers;
use \UsersQuery as ChildUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TblentempTableMap;
use Map\TblentorgTableMap;
use Map\UsersTableMap;
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
 * Base class that represents a row from the 'users' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Users implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UsersTableMap';


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
     * The value for the namdtsgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $namdtsgnr;

    /**
     * The value for the prmaplgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $prmaplgnr;

    /**
     * The value for the sgnaplgnr field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sgnaplgnr;

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
     * The value for the remember_token field.
     *
     * @var        string
     */
    protected $remember_token;

    /**
     * @var        ObjectCollection|ChildTblentemp[] Collection to store aggregation of ChildTblentemp objects.
     */
    protected $collTblentemps;
    protected $collTblentempsPartial;

    /**
     * @var        ObjectCollection|ChildTblentorg[] Collection to store aggregation of ChildTblentorg objects.
     */
    protected $collTblentorgs;
    protected $collTblentorgsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblentemp[]
     */
    protected $tblentempsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblentorg[]
     */
    protected $tblentorgsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->namdtsgnr = '';
        $this->prmaplgnr = '';
        $this->sgnaplgnr = '';
    }

    /**
     * Initializes internal state of Base\Users object.
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
     * Compares this with another <code>Users</code> instance.  If
     * <code>obj</code> is an instance of <code>Users</code>, delegates to
     * <code>equals(Users)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Users The current object, for fluid interface
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
     * Get the [namdtsgnr] column value.
     *
     * @return string
     */
    public function getNamdtsgnr()
    {
        return $this->namdtsgnr;
    }

    /**
     * Get the [prmaplgnr] column value.
     *
     * @return string
     */
    public function getPrmaplgnr()
    {
        return $this->prmaplgnr;
    }

    /**
     * Get the [sgnaplgnr] column value.
     *
     * @return string
     */
    public function getSgnaplgnr()
    {
        return $this->sgnaplgnr;
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
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[UsersTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [uuid] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setUuid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uuid !== $v) {
            $this->uuid = $v;
            $this->modifiedColumns[UsersTableMap::COL_UUID] = true;
        }

        return $this;
    } // setUuid()

    /**
     * Set the value of [namdtsgnr] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setNamdtsgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->namdtsgnr !== $v) {
            $this->namdtsgnr = $v;
            $this->modifiedColumns[UsersTableMap::COL_NAMDTSGNR] = true;
        }

        return $this;
    } // setNamdtsgnr()

    /**
     * Set the value of [prmaplgnr] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setPrmaplgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prmaplgnr !== $v) {
            $this->prmaplgnr = $v;
            $this->modifiedColumns[UsersTableMap::COL_PRMAPLGNR] = true;
        }

        return $this;
    } // setPrmaplgnr()

    /**
     * Set the value of [sgnaplgnr] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setSgnaplgnr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sgnaplgnr !== $v) {
            $this->sgnaplgnr = $v;
            $this->modifiedColumns[UsersTableMap::COL_SGNAPLGNR] = true;
        }

        return $this;
    } // setSgnaplgnr()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[UsersTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Sets the value of [email_verified_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setEmailVerifiedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->email_verified_at !== null || $dt !== null) {
            if ($this->email_verified_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->email_verified_at->format("Y-m-d H:i:s.u")) {
                $this->email_verified_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_EMAIL_VERIFIED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setEmailVerifiedAt()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[UsersTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Sets the value of [finished_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setFinishedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->finished_at !== null || $dt !== null) {
            if ($this->finished_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->finished_at->format("Y-m-d H:i:s.u")) {
                $this->finished_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_FINISHED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setFinishedAt()

    /**
     * Set the value of [remember_token] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setRememberToken($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remember_token !== $v) {
            $this->remember_token = $v;
            $this->modifiedColumns[UsersTableMap::COL_REMEMBER_TOKEN] = true;
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
            if ($this->namdtsgnr !== '') {
                return false;
            }

            if ($this->prmaplgnr !== '') {
                return false;
            }

            if ($this->sgnaplgnr !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UsersTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UsersTableMap::translateFieldName('Uuid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uuid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UsersTableMap::translateFieldName('Namdtsgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->namdtsgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UsersTableMap::translateFieldName('Prmaplgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prmaplgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UsersTableMap::translateFieldName('Sgnaplgnr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sgnaplgnr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UsersTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UsersTableMap::translateFieldName('EmailVerifiedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->email_verified_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UsersTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : UsersTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : UsersTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : UsersTableMap::translateFieldName('FinishedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->finished_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : UsersTableMap::translateFieldName('RememberToken', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remember_token = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = UsersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Users'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(UsersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUsersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTblentemps = null;

            $this->collTblentorgs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Users::setDeleted()
     * @see Users::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUsersQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
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
                UsersTableMap::addInstanceToPool($this);
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

            if ($this->tblentempsScheduledForDeletion !== null) {
                if (!$this->tblentempsScheduledForDeletion->isEmpty()) {
                    \TblentempQuery::create()
                        ->filterByPrimaryKeys($this->tblentempsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tblentempsScheduledForDeletion = null;
                }
            }

            if ($this->collTblentemps !== null) {
                foreach ($this->collTblentemps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tblentorgsScheduledForDeletion !== null) {
                if (!$this->tblentorgsScheduledForDeletion->isEmpty()) {
                    \TblentorgQuery::create()
                        ->filterByPrimaryKeys($this->tblentorgsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tblentorgsScheduledForDeletion = null;
                }
            }

            if ($this->collTblentorgs !== null) {
                foreach ($this->collTblentorgs as $referrerFK) {
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

        $this->modifiedColumns[UsersTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsersTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UsersTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(UsersTableMap::COL_UUID)) {
            $modifiedColumns[':p' . $index++]  = 'uuid';
        }
        if ($this->isColumnModified(UsersTableMap::COL_NAMDTSGNR)) {
            $modifiedColumns[':p' . $index++]  = 'namdtsgnr';
        }
        if ($this->isColumnModified(UsersTableMap::COL_PRMAPLGNR)) {
            $modifiedColumns[':p' . $index++]  = 'prmaplgnr';
        }
        if ($this->isColumnModified(UsersTableMap::COL_SGNAPLGNR)) {
            $modifiedColumns[':p' . $index++]  = 'sgnaplgnr';
        }
        if ($this->isColumnModified(UsersTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(UsersTableMap::COL_EMAIL_VERIFIED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'email_verified_at';
        }
        if ($this->isColumnModified(UsersTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(UsersTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(UsersTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }
        if ($this->isColumnModified(UsersTableMap::COL_FINISHED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'finished_at';
        }
        if ($this->isColumnModified(UsersTableMap::COL_REMEMBER_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = 'remember_token';
        }

        $sql = sprintf(
            'INSERT INTO users (%s) VALUES (%s)',
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
                    case 'namdtsgnr':
                        $stmt->bindValue($identifier, $this->namdtsgnr, PDO::PARAM_STR);
                        break;
                    case 'prmaplgnr':
                        $stmt->bindValue($identifier, $this->prmaplgnr, PDO::PARAM_STR);
                        break;
                    case 'sgnaplgnr':
                        $stmt->bindValue($identifier, $this->sgnaplgnr, PDO::PARAM_STR);
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
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'finished_at':
                        $stmt->bindValue($identifier, $this->finished_at ? $this->finished_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $pos = UsersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getNamdtsgnr();
                break;
            case 3:
                return $this->getPrmaplgnr();
                break;
            case 4:
                return $this->getSgnaplgnr();
                break;
            case 5:
                return $this->getEmail();
                break;
            case 6:
                return $this->getEmailVerifiedAt();
                break;
            case 7:
                return $this->getPassword();
                break;
            case 8:
                return $this->getCreatedAt();
                break;
            case 9:
                return $this->getUpdatedAt();
                break;
            case 10:
                return $this->getFinishedAt();
                break;
            case 11:
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
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Users'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Users'][$this->hashCode()] = true;
        $keys = UsersTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUuid(),
            $keys[2] => $this->getNamdtsgnr(),
            $keys[3] => $this->getPrmaplgnr(),
            $keys[4] => $this->getSgnaplgnr(),
            $keys[5] => $this->getEmail(),
            $keys[6] => $this->getEmailVerifiedAt(),
            $keys[7] => $this->getPassword(),
            $keys[8] => $this->getCreatedAt(),
            $keys[9] => $this->getUpdatedAt(),
            $keys[10] => $this->getFinishedAt(),
            $keys[11] => $this->getRememberToken(),
        );
        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collTblentemps) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentemps';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentemps';
                        break;
                    default:
                        $key = 'Tblentemps';
                }

                $result[$key] = $this->collTblentemps->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTblentorgs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblentorgs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblentorgs';
                        break;
                    default:
                        $key = 'Tblentorgs';
                }

                $result[$key] = $this->collTblentorgs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Users
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UsersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Users
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
                $this->setNamdtsgnr($value);
                break;
            case 3:
                $this->setPrmaplgnr($value);
                break;
            case 4:
                $this->setSgnaplgnr($value);
                break;
            case 5:
                $this->setEmail($value);
                break;
            case 6:
                $this->setEmailVerifiedAt($value);
                break;
            case 7:
                $this->setPassword($value);
                break;
            case 8:
                $this->setCreatedAt($value);
                break;
            case 9:
                $this->setUpdatedAt($value);
                break;
            case 10:
                $this->setFinishedAt($value);
                break;
            case 11:
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
        $keys = UsersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUuid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNamdtsgnr($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPrmaplgnr($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setSgnaplgnr($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEmail($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEmailVerifiedAt($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPassword($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCreatedAt($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setUpdatedAt($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setFinishedAt($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRememberToken($arr[$keys[11]]);
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
     * @return $this|\Users The current object, for fluid interface
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
        $criteria = new Criteria(UsersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UsersTableMap::COL_ID)) {
            $criteria->add(UsersTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(UsersTableMap::COL_UUID)) {
            $criteria->add(UsersTableMap::COL_UUID, $this->uuid);
        }
        if ($this->isColumnModified(UsersTableMap::COL_NAMDTSGNR)) {
            $criteria->add(UsersTableMap::COL_NAMDTSGNR, $this->namdtsgnr);
        }
        if ($this->isColumnModified(UsersTableMap::COL_PRMAPLGNR)) {
            $criteria->add(UsersTableMap::COL_PRMAPLGNR, $this->prmaplgnr);
        }
        if ($this->isColumnModified(UsersTableMap::COL_SGNAPLGNR)) {
            $criteria->add(UsersTableMap::COL_SGNAPLGNR, $this->sgnaplgnr);
        }
        if ($this->isColumnModified(UsersTableMap::COL_EMAIL)) {
            $criteria->add(UsersTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(UsersTableMap::COL_EMAIL_VERIFIED_AT)) {
            $criteria->add(UsersTableMap::COL_EMAIL_VERIFIED_AT, $this->email_verified_at);
        }
        if ($this->isColumnModified(UsersTableMap::COL_PASSWORD)) {
            $criteria->add(UsersTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(UsersTableMap::COL_CREATED_AT)) {
            $criteria->add(UsersTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(UsersTableMap::COL_UPDATED_AT)) {
            $criteria->add(UsersTableMap::COL_UPDATED_AT, $this->updated_at);
        }
        if ($this->isColumnModified(UsersTableMap::COL_FINISHED_AT)) {
            $criteria->add(UsersTableMap::COL_FINISHED_AT, $this->finished_at);
        }
        if ($this->isColumnModified(UsersTableMap::COL_REMEMBER_TOKEN)) {
            $criteria->add(UsersTableMap::COL_REMEMBER_TOKEN, $this->remember_token);
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
        $criteria = ChildUsersQuery::create();
        $criteria->add(UsersTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Users (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUuid($this->getUuid());
        $copyObj->setNamdtsgnr($this->getNamdtsgnr());
        $copyObj->setPrmaplgnr($this->getPrmaplgnr());
        $copyObj->setSgnaplgnr($this->getSgnaplgnr());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setEmailVerifiedAt($this->getEmailVerifiedAt());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setFinishedAt($this->getFinishedAt());
        $copyObj->setRememberToken($this->getRememberToken());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTblentemps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblentemp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTblentorgs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblentorg($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

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
     * @return \Users Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Tblentemp' == $relationName) {
            $this->initTblentemps();
            return;
        }
        if ('Tblentorg' == $relationName) {
            $this->initTblentorgs();
            return;
        }
    }

    /**
     * Clears out the collTblentemps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblentemps()
     */
    public function clearTblentemps()
    {
        $this->collTblentemps = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblentemps collection loaded partially.
     */
    public function resetPartialTblentemps($v = true)
    {
        $this->collTblentempsPartial = $v;
    }

    /**
     * Initializes the collTblentemps collection.
     *
     * By default this just sets the collTblentemps collection to an empty array (like clearcollTblentemps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblentemps($overrideExisting = true)
    {
        if (null !== $this->collTblentemps && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblentempTableMap::getTableMap()->getCollectionClassName();

        $this->collTblentemps = new $collectionClassName;
        $this->collTblentemps->setModel('\Tblentemp');
    }

    /**
     * Gets an array of ChildTblentemp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblentemp[] List of ChildTblentemp objects
     * @throws PropelException
     */
    public function getTblentemps(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentempsPartial && !$this->isNew();
        if (null === $this->collTblentemps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblentemps) {
                // return empty collection
                $this->initTblentemps();
            } else {
                $collTblentemps = ChildTblentempQuery::create(null, $criteria)
                    ->filterByUsers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblentempsPartial && count($collTblentemps)) {
                        $this->initTblentemps(false);

                        foreach ($collTblentemps as $obj) {
                            if (false == $this->collTblentemps->contains($obj)) {
                                $this->collTblentemps->append($obj);
                            }
                        }

                        $this->collTblentempsPartial = true;
                    }

                    return $collTblentemps;
                }

                if ($partial && $this->collTblentemps) {
                    foreach ($this->collTblentemps as $obj) {
                        if ($obj->isNew()) {
                            $collTblentemps[] = $obj;
                        }
                    }
                }

                $this->collTblentemps = $collTblentemps;
                $this->collTblentempsPartial = false;
            }
        }

        return $this->collTblentemps;
    }

    /**
     * Sets a collection of ChildTblentemp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblentemps A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setTblentemps(Collection $tblentemps, ConnectionInterface $con = null)
    {
        /** @var ChildTblentemp[] $tblentempsToDelete */
        $tblentempsToDelete = $this->getTblentemps(new Criteria(), $con)->diff($tblentemps);


        $this->tblentempsScheduledForDeletion = $tblentempsToDelete;

        foreach ($tblentempsToDelete as $tblentempRemoved) {
            $tblentempRemoved->setUsers(null);
        }

        $this->collTblentemps = null;
        foreach ($tblentemps as $tblentemp) {
            $this->addTblentemp($tblentemp);
        }

        $this->collTblentemps = $tblentemps;
        $this->collTblentempsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblentemp objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblentemp objects.
     * @throws PropelException
     */
    public function countTblentemps(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentempsPartial && !$this->isNew();
        if (null === $this->collTblentemps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblentemps) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblentemps());
            }

            $query = ChildTblentempQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collTblentemps);
    }

    /**
     * Method called to associate a ChildTblentemp object to this object
     * through the ChildTblentemp foreign key attribute.
     *
     * @param  ChildTblentemp $l ChildTblentemp
     * @return $this|\Users The current object (for fluent API support)
     */
    public function addTblentemp(ChildTblentemp $l)
    {
        if ($this->collTblentemps === null) {
            $this->initTblentemps();
            $this->collTblentempsPartial = true;
        }

        if (!$this->collTblentemps->contains($l)) {
            $this->doAddTblentemp($l);

            if ($this->tblentempsScheduledForDeletion and $this->tblentempsScheduledForDeletion->contains($l)) {
                $this->tblentempsScheduledForDeletion->remove($this->tblentempsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblentemp $tblentemp The ChildTblentemp object to add.
     */
    protected function doAddTblentemp(ChildTblentemp $tblentemp)
    {
        $this->collTblentemps[]= $tblentemp;
        $tblentemp->setUsers($this);
    }

    /**
     * @param  ChildTblentemp $tblentemp The ChildTblentemp object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function removeTblentemp(ChildTblentemp $tblentemp)
    {
        if ($this->getTblentemps()->contains($tblentemp)) {
            $pos = $this->collTblentemps->search($tblentemp);
            $this->collTblentemps->remove($pos);
            if (null === $this->tblentempsScheduledForDeletion) {
                $this->tblentempsScheduledForDeletion = clone $this->collTblentemps;
                $this->tblentempsScheduledForDeletion->clear();
            }
            $this->tblentempsScheduledForDeletion[]= clone $tblentemp;
            $tblentemp->setUsers(null);
        }

        return $this;
    }

    /**
     * Clears out the collTblentorgs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblentorgs()
     */
    public function clearTblentorgs()
    {
        $this->collTblentorgs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblentorgs collection loaded partially.
     */
    public function resetPartialTblentorgs($v = true)
    {
        $this->collTblentorgsPartial = $v;
    }

    /**
     * Initializes the collTblentorgs collection.
     *
     * By default this just sets the collTblentorgs collection to an empty array (like clearcollTblentorgs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblentorgs($overrideExisting = true)
    {
        if (null !== $this->collTblentorgs && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblentorgTableMap::getTableMap()->getCollectionClassName();

        $this->collTblentorgs = new $collectionClassName;
        $this->collTblentorgs->setModel('\Tblentorg');
    }

    /**
     * Gets an array of ChildTblentorg objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblentorg[] List of ChildTblentorg objects
     * @throws PropelException
     */
    public function getTblentorgs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentorgsPartial && !$this->isNew();
        if (null === $this->collTblentorgs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblentorgs) {
                // return empty collection
                $this->initTblentorgs();
            } else {
                $collTblentorgs = ChildTblentorgQuery::create(null, $criteria)
                    ->filterByUsers($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblentorgsPartial && count($collTblentorgs)) {
                        $this->initTblentorgs(false);

                        foreach ($collTblentorgs as $obj) {
                            if (false == $this->collTblentorgs->contains($obj)) {
                                $this->collTblentorgs->append($obj);
                            }
                        }

                        $this->collTblentorgsPartial = true;
                    }

                    return $collTblentorgs;
                }

                if ($partial && $this->collTblentorgs) {
                    foreach ($this->collTblentorgs as $obj) {
                        if ($obj->isNew()) {
                            $collTblentorgs[] = $obj;
                        }
                    }
                }

                $this->collTblentorgs = $collTblentorgs;
                $this->collTblentorgsPartial = false;
            }
        }

        return $this->collTblentorgs;
    }

    /**
     * Sets a collection of ChildTblentorg objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblentorgs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setTblentorgs(Collection $tblentorgs, ConnectionInterface $con = null)
    {
        /** @var ChildTblentorg[] $tblentorgsToDelete */
        $tblentorgsToDelete = $this->getTblentorgs(new Criteria(), $con)->diff($tblentorgs);


        $this->tblentorgsScheduledForDeletion = $tblentorgsToDelete;

        foreach ($tblentorgsToDelete as $tblentorgRemoved) {
            $tblentorgRemoved->setUsers(null);
        }

        $this->collTblentorgs = null;
        foreach ($tblentorgs as $tblentorg) {
            $this->addTblentorg($tblentorg);
        }

        $this->collTblentorgs = $tblentorgs;
        $this->collTblentorgsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblentorg objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblentorg objects.
     * @throws PropelException
     */
    public function countTblentorgs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblentorgsPartial && !$this->isNew();
        if (null === $this->collTblentorgs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblentorgs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblentorgs());
            }

            $query = ChildTblentorgQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collTblentorgs);
    }

    /**
     * Method called to associate a ChildTblentorg object to this object
     * through the ChildTblentorg foreign key attribute.
     *
     * @param  ChildTblentorg $l ChildTblentorg
     * @return $this|\Users The current object (for fluent API support)
     */
    public function addTblentorg(ChildTblentorg $l)
    {
        if ($this->collTblentorgs === null) {
            $this->initTblentorgs();
            $this->collTblentorgsPartial = true;
        }

        if (!$this->collTblentorgs->contains($l)) {
            $this->doAddTblentorg($l);

            if ($this->tblentorgsScheduledForDeletion and $this->tblentorgsScheduledForDeletion->contains($l)) {
                $this->tblentorgsScheduledForDeletion->remove($this->tblentorgsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblentorg $tblentorg The ChildTblentorg object to add.
     */
    protected function doAddTblentorg(ChildTblentorg $tblentorg)
    {
        $this->collTblentorgs[]= $tblentorg;
        $tblentorg->setUsers($this);
    }

    /**
     * @param  ChildTblentorg $tblentorg The ChildTblentorg object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function removeTblentorg(ChildTblentorg $tblentorg)
    {
        if ($this->getTblentorgs()->contains($tblentorg)) {
            $pos = $this->collTblentorgs->search($tblentorg);
            $this->collTblentorgs->remove($pos);
            if (null === $this->tblentorgsScheduledForDeletion) {
                $this->tblentorgsScheduledForDeletion = clone $this->collTblentorgs;
                $this->tblentorgsScheduledForDeletion->clear();
            }
            $this->tblentorgsScheduledForDeletion[]= clone $tblentorg;
            $tblentorg->setUsers(null);
        }

        return $this;
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
        $this->namdtsgnr = null;
        $this->prmaplgnr = null;
        $this->sgnaplgnr = null;
        $this->email = null;
        $this->email_verified_at = null;
        $this->password = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->finished_at = null;
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
            if ($this->collTblentemps) {
                foreach ($this->collTblentemps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTblentorgs) {
                foreach ($this->collTblentorgs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTblentemps = null;
        $this->collTblentorgs = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UsersTableMap::DEFAULT_STRING_FORMAT);
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
