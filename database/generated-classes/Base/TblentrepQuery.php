<?php

namespace Base;

use \Tblentrep as ChildTblentrep;
use \TblentrepQuery as ChildTblentrepQuery;
use \Exception;
use \PDO;
use Map\TblentrepTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentrep' table.
 *
 *
 *
 * @method     ChildTblentrepQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTblentrepQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentrepQuery orderByCrpdtsgnr($order = Criteria::ASC) Order by the crpdtsgnr column
 * @method     ChildTblentrepQuery orderByRfcdtsgnr($order = Criteria::ASC) Order by the rfcdtsgnr column
 * @method     ChildTblentrepQuery orderByEmllbrgnr($order = Criteria::ASC) Order by the emllbrgnr column
 * @method     ChildTblentrepQuery orderByEmlprsgnr($order = Criteria::ASC) Order by the emlprsgnr column
 * @method     ChildTblentrepQuery orderByEstcvlgnr($order = Criteria::ASC) Order by the estcvlgnr column
 * @method     ChildTblentrepQuery orderByRgmcnygnr($order = Criteria::ASC) Order by the rgmcnygnr column
 * @method     ChildTblentrepQuery orderByNcndtsgnr($order = Criteria::ASC) Order by the ncndtsgnr column
 * @method     ChildTblentrepQuery orderByPasnacgnr($order = Criteria::ASC) Order by the pasnacgnr column
 * @method     ChildTblentrepQuery orderByEstnacgnr($order = Criteria::ASC) Order by the estnacgnr column
 * @method     ChildTblentrepQuery orderByLgrubcgnr($order = Criteria::ASC) Order by the lgrubcgnr column
 * @method     ChildTblentrepQuery orderByEntdtsgnr($order = Criteria::ASC) Order by the entdtsgnr column
 * @method     ChildTblentrepQuery orderByMncdtsgnr($order = Criteria::ASC) Order by the mncdtsgnr column
 * @method     ChildTblentrepQuery orderByLcldtsgnr($order = Criteria::ASC) Order by the lcldtsgnr column
 * @method     ChildTblentrepQuery orderByDmcdtsgnr($order = Criteria::ASC) Order by the dmcdtsgnr column
 * @method     ChildTblentrepQuery orderByCdgpstgnr($order = Criteria::ASC) Order by the cdgpstgnr column
 * @method     ChildTblentrepQuery orderByTlffijgnr($order = Criteria::ASC) Order by the tlffijgnr column
 * @method     ChildTblentrepQuery orderByTlfmvlgnr($order = Criteria::ASC) Order by the tlfmvlgnr column
 * @method     ChildTblentrepQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentrepQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildTblentrepQuery orderByFinishedAt($order = Criteria::ASC) Order by the finished_at column
 * @method     ChildTblentrepQuery orderByPhoentprs($order = Criteria::ASC) Order by the phoentprs column
 * @method     ChildTblentrepQuery orderByTypentprs($order = Criteria::ASC) Order by the typentprs column
 * @method     ChildTblentrepQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildTblentrepQuery orderByEmailVerifiedAt($order = Criteria::ASC) Order by the email_verified_at column
 * @method     ChildTblentrepQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildTblentrepQuery orderByRememberToken($order = Criteria::ASC) Order by the remember_token column
 *
 * @method     ChildTblentrepQuery groupById() Group by the id column
 * @method     ChildTblentrepQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentrepQuery groupByCrpdtsgnr() Group by the crpdtsgnr column
 * @method     ChildTblentrepQuery groupByRfcdtsgnr() Group by the rfcdtsgnr column
 * @method     ChildTblentrepQuery groupByEmllbrgnr() Group by the emllbrgnr column
 * @method     ChildTblentrepQuery groupByEmlprsgnr() Group by the emlprsgnr column
 * @method     ChildTblentrepQuery groupByEstcvlgnr() Group by the estcvlgnr column
 * @method     ChildTblentrepQuery groupByRgmcnygnr() Group by the rgmcnygnr column
 * @method     ChildTblentrepQuery groupByNcndtsgnr() Group by the ncndtsgnr column
 * @method     ChildTblentrepQuery groupByPasnacgnr() Group by the pasnacgnr column
 * @method     ChildTblentrepQuery groupByEstnacgnr() Group by the estnacgnr column
 * @method     ChildTblentrepQuery groupByLgrubcgnr() Group by the lgrubcgnr column
 * @method     ChildTblentrepQuery groupByEntdtsgnr() Group by the entdtsgnr column
 * @method     ChildTblentrepQuery groupByMncdtsgnr() Group by the mncdtsgnr column
 * @method     ChildTblentrepQuery groupByLcldtsgnr() Group by the lcldtsgnr column
 * @method     ChildTblentrepQuery groupByDmcdtsgnr() Group by the dmcdtsgnr column
 * @method     ChildTblentrepQuery groupByCdgpstgnr() Group by the cdgpstgnr column
 * @method     ChildTblentrepQuery groupByTlffijgnr() Group by the tlffijgnr column
 * @method     ChildTblentrepQuery groupByTlfmvlgnr() Group by the tlfmvlgnr column
 * @method     ChildTblentrepQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentrepQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildTblentrepQuery groupByFinishedAt() Group by the finished_at column
 * @method     ChildTblentrepQuery groupByPhoentprs() Group by the phoentprs column
 * @method     ChildTblentrepQuery groupByTypentprs() Group by the typentprs column
 * @method     ChildTblentrepQuery groupByEmail() Group by the email column
 * @method     ChildTblentrepQuery groupByEmailVerifiedAt() Group by the email_verified_at column
 * @method     ChildTblentrepQuery groupByPassword() Group by the password column
 * @method     ChildTblentrepQuery groupByRememberToken() Group by the remember_token column
 *
 * @method     ChildTblentrepQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentrepQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentrepQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentrepQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentrepQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentrepQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentrep findOne(ConnectionInterface $con = null) Return the first ChildTblentrep matching the query
 * @method     ChildTblentrep findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentrep matching the query, or a new ChildTblentrep object populated from the query conditions when no match is found
 *
 * @method     ChildTblentrep findOneById(string $id) Return the first ChildTblentrep filtered by the id column
 * @method     ChildTblentrep findOneByUuid(string $uuid) Return the first ChildTblentrep filtered by the uuid column
 * @method     ChildTblentrep findOneByCrpdtsgnr(string $crpdtsgnr) Return the first ChildTblentrep filtered by the crpdtsgnr column
 * @method     ChildTblentrep findOneByRfcdtsgnr(string $rfcdtsgnr) Return the first ChildTblentrep filtered by the rfcdtsgnr column
 * @method     ChildTblentrep findOneByEmllbrgnr(string $emllbrgnr) Return the first ChildTblentrep filtered by the emllbrgnr column
 * @method     ChildTblentrep findOneByEmlprsgnr(string $emlprsgnr) Return the first ChildTblentrep filtered by the emlprsgnr column
 * @method     ChildTblentrep findOneByEstcvlgnr(string $estcvlgnr) Return the first ChildTblentrep filtered by the estcvlgnr column
 * @method     ChildTblentrep findOneByRgmcnygnr(string $rgmcnygnr) Return the first ChildTblentrep filtered by the rgmcnygnr column
 * @method     ChildTblentrep findOneByNcndtsgnr(string $ncndtsgnr) Return the first ChildTblentrep filtered by the ncndtsgnr column
 * @method     ChildTblentrep findOneByPasnacgnr(string $pasnacgnr) Return the first ChildTblentrep filtered by the pasnacgnr column
 * @method     ChildTblentrep findOneByEstnacgnr(string $estnacgnr) Return the first ChildTblentrep filtered by the estnacgnr column
 * @method     ChildTblentrep findOneByLgrubcgnr(string $lgrubcgnr) Return the first ChildTblentrep filtered by the lgrubcgnr column
 * @method     ChildTblentrep findOneByEntdtsgnr(string $entdtsgnr) Return the first ChildTblentrep filtered by the entdtsgnr column
 * @method     ChildTblentrep findOneByMncdtsgnr(string $mncdtsgnr) Return the first ChildTblentrep filtered by the mncdtsgnr column
 * @method     ChildTblentrep findOneByLcldtsgnr(string $lcldtsgnr) Return the first ChildTblentrep filtered by the lcldtsgnr column
 * @method     ChildTblentrep findOneByDmcdtsgnr(string $dmcdtsgnr) Return the first ChildTblentrep filtered by the dmcdtsgnr column
 * @method     ChildTblentrep findOneByCdgpstgnr(string $cdgpstgnr) Return the first ChildTblentrep filtered by the cdgpstgnr column
 * @method     ChildTblentrep findOneByTlffijgnr(string $tlffijgnr) Return the first ChildTblentrep filtered by the tlffijgnr column
 * @method     ChildTblentrep findOneByTlfmvlgnr(string $tlfmvlgnr) Return the first ChildTblentrep filtered by the tlfmvlgnr column
 * @method     ChildTblentrep findOneByCreatedAt(string $created_at) Return the first ChildTblentrep filtered by the created_at column
 * @method     ChildTblentrep findOneByUpdatedAt(string $updated_at) Return the first ChildTblentrep filtered by the updated_at column
 * @method     ChildTblentrep findOneByFinishedAt(string $finished_at) Return the first ChildTblentrep filtered by the finished_at column
 * @method     ChildTblentrep findOneByPhoentprs(string $phoentprs) Return the first ChildTblentrep filtered by the phoentprs column
 * @method     ChildTblentrep findOneByTypentprs(int $typentprs) Return the first ChildTblentrep filtered by the typentprs column
 * @method     ChildTblentrep findOneByEmail(string $email) Return the first ChildTblentrep filtered by the email column
 * @method     ChildTblentrep findOneByEmailVerifiedAt(string $email_verified_at) Return the first ChildTblentrep filtered by the email_verified_at column
 * @method     ChildTblentrep findOneByPassword(string $password) Return the first ChildTblentrep filtered by the password column
 * @method     ChildTblentrep findOneByRememberToken(string $remember_token) Return the first ChildTblentrep filtered by the remember_token column *

 * @method     ChildTblentrep requirePk($key, ConnectionInterface $con = null) Return the ChildTblentrep by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOne(ConnectionInterface $con = null) Return the first ChildTblentrep matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentrep requireOneById(string $id) Return the first ChildTblentrep filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByUuid(string $uuid) Return the first ChildTblentrep filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByCrpdtsgnr(string $crpdtsgnr) Return the first ChildTblentrep filtered by the crpdtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByRfcdtsgnr(string $rfcdtsgnr) Return the first ChildTblentrep filtered by the rfcdtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEmllbrgnr(string $emllbrgnr) Return the first ChildTblentrep filtered by the emllbrgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEmlprsgnr(string $emlprsgnr) Return the first ChildTblentrep filtered by the emlprsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEstcvlgnr(string $estcvlgnr) Return the first ChildTblentrep filtered by the estcvlgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByRgmcnygnr(string $rgmcnygnr) Return the first ChildTblentrep filtered by the rgmcnygnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByNcndtsgnr(string $ncndtsgnr) Return the first ChildTblentrep filtered by the ncndtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByPasnacgnr(string $pasnacgnr) Return the first ChildTblentrep filtered by the pasnacgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEstnacgnr(string $estnacgnr) Return the first ChildTblentrep filtered by the estnacgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByLgrubcgnr(string $lgrubcgnr) Return the first ChildTblentrep filtered by the lgrubcgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEntdtsgnr(string $entdtsgnr) Return the first ChildTblentrep filtered by the entdtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByMncdtsgnr(string $mncdtsgnr) Return the first ChildTblentrep filtered by the mncdtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByLcldtsgnr(string $lcldtsgnr) Return the first ChildTblentrep filtered by the lcldtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByDmcdtsgnr(string $dmcdtsgnr) Return the first ChildTblentrep filtered by the dmcdtsgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByCdgpstgnr(string $cdgpstgnr) Return the first ChildTblentrep filtered by the cdgpstgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByTlffijgnr(string $tlffijgnr) Return the first ChildTblentrep filtered by the tlffijgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByTlfmvlgnr(string $tlfmvlgnr) Return the first ChildTblentrep filtered by the tlfmvlgnr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByCreatedAt(string $created_at) Return the first ChildTblentrep filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentrep filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByFinishedAt(string $finished_at) Return the first ChildTblentrep filtered by the finished_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByPhoentprs(string $phoentprs) Return the first ChildTblentrep filtered by the phoentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByTypentprs(int $typentprs) Return the first ChildTblentrep filtered by the typentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEmail(string $email) Return the first ChildTblentrep filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByEmailVerifiedAt(string $email_verified_at) Return the first ChildTblentrep filtered by the email_verified_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByPassword(string $password) Return the first ChildTblentrep filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrep requireOneByRememberToken(string $remember_token) Return the first ChildTblentrep filtered by the remember_token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentrep[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentrep objects based on current ModelCriteria
 * @method     ChildTblentrep[]|ObjectCollection findById(string $id) Return ChildTblentrep objects filtered by the id column
 * @method     ChildTblentrep[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentrep objects filtered by the uuid column
 * @method     ChildTblentrep[]|ObjectCollection findByCrpdtsgnr(string $crpdtsgnr) Return ChildTblentrep objects filtered by the crpdtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByRfcdtsgnr(string $rfcdtsgnr) Return ChildTblentrep objects filtered by the rfcdtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByEmllbrgnr(string $emllbrgnr) Return ChildTblentrep objects filtered by the emllbrgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByEmlprsgnr(string $emlprsgnr) Return ChildTblentrep objects filtered by the emlprsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByEstcvlgnr(string $estcvlgnr) Return ChildTblentrep objects filtered by the estcvlgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByRgmcnygnr(string $rgmcnygnr) Return ChildTblentrep objects filtered by the rgmcnygnr column
 * @method     ChildTblentrep[]|ObjectCollection findByNcndtsgnr(string $ncndtsgnr) Return ChildTblentrep objects filtered by the ncndtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByPasnacgnr(string $pasnacgnr) Return ChildTblentrep objects filtered by the pasnacgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByEstnacgnr(string $estnacgnr) Return ChildTblentrep objects filtered by the estnacgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByLgrubcgnr(string $lgrubcgnr) Return ChildTblentrep objects filtered by the lgrubcgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByEntdtsgnr(string $entdtsgnr) Return ChildTblentrep objects filtered by the entdtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByMncdtsgnr(string $mncdtsgnr) Return ChildTblentrep objects filtered by the mncdtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByLcldtsgnr(string $lcldtsgnr) Return ChildTblentrep objects filtered by the lcldtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByDmcdtsgnr(string $dmcdtsgnr) Return ChildTblentrep objects filtered by the dmcdtsgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByCdgpstgnr(string $cdgpstgnr) Return ChildTblentrep objects filtered by the cdgpstgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByTlffijgnr(string $tlffijgnr) Return ChildTblentrep objects filtered by the tlffijgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByTlfmvlgnr(string $tlfmvlgnr) Return ChildTblentrep objects filtered by the tlfmvlgnr column
 * @method     ChildTblentrep[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentrep objects filtered by the created_at column
 * @method     ChildTblentrep[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentrep objects filtered by the updated_at column
 * @method     ChildTblentrep[]|ObjectCollection findByFinishedAt(string $finished_at) Return ChildTblentrep objects filtered by the finished_at column
 * @method     ChildTblentrep[]|ObjectCollection findByPhoentprs(string $phoentprs) Return ChildTblentrep objects filtered by the phoentprs column
 * @method     ChildTblentrep[]|ObjectCollection findByTypentprs(int $typentprs) Return ChildTblentrep objects filtered by the typentprs column
 * @method     ChildTblentrep[]|ObjectCollection findByEmail(string $email) Return ChildTblentrep objects filtered by the email column
 * @method     ChildTblentrep[]|ObjectCollection findByEmailVerifiedAt(string $email_verified_at) Return ChildTblentrep objects filtered by the email_verified_at column
 * @method     ChildTblentrep[]|ObjectCollection findByPassword(string $password) Return ChildTblentrep objects filtered by the password column
 * @method     ChildTblentrep[]|ObjectCollection findByRememberToken(string $remember_token) Return ChildTblentrep objects filtered by the remember_token column
 * @method     ChildTblentrep[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentrepQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentrepQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentrep', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentrepQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentrepQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentrepQuery) {
            return $criteria;
        }
        $query = new ChildTblentrepQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTblentrep|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentrepTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentrepTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentrep A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, uuid, crpdtsgnr, rfcdtsgnr, emllbrgnr, emlprsgnr, estcvlgnr, rgmcnygnr, ncndtsgnr, pasnacgnr, estnacgnr, lgrubcgnr, entdtsgnr, mncdtsgnr, lcldtsgnr, dmcdtsgnr, cdgpstgnr, tlffijgnr, tlfmvlgnr, created_at, updated_at, finished_at, phoentprs, typentprs, email, email_verified_at, password, remember_token FROM tblentrep WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTblentrep $obj */
            $obj = new ChildTblentrep();
            $obj->hydrate($row);
            TblentrepTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTblentrep|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentrepTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentrepTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the uuid column
     *
     * Example usage:
     * <code>
     * $query->filterByUuid('fooValue');   // WHERE uuid = 'fooValue'
     * $query->filterByUuid('%fooValue%', Criteria::LIKE); // WHERE uuid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uuid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the crpdtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByCrpdtsgnr('fooValue');   // WHERE crpdtsgnr = 'fooValue'
     * $query->filterByCrpdtsgnr('%fooValue%', Criteria::LIKE); // WHERE crpdtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $crpdtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByCrpdtsgnr($crpdtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($crpdtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_CRPDTSGNR, $crpdtsgnr, $comparison);
    }

    /**
     * Filter the query on the rfcdtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByRfcdtsgnr('fooValue');   // WHERE rfcdtsgnr = 'fooValue'
     * $query->filterByRfcdtsgnr('%fooValue%', Criteria::LIKE); // WHERE rfcdtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rfcdtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByRfcdtsgnr($rfcdtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rfcdtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_RFCDTSGNR, $rfcdtsgnr, $comparison);
    }

    /**
     * Filter the query on the emllbrgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByEmllbrgnr('fooValue');   // WHERE emllbrgnr = 'fooValue'
     * $query->filterByEmllbrgnr('%fooValue%', Criteria::LIKE); // WHERE emllbrgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emllbrgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEmllbrgnr($emllbrgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emllbrgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_EMLLBRGNR, $emllbrgnr, $comparison);
    }

    /**
     * Filter the query on the emlprsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByEmlprsgnr('fooValue');   // WHERE emlprsgnr = 'fooValue'
     * $query->filterByEmlprsgnr('%fooValue%', Criteria::LIKE); // WHERE emlprsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emlprsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEmlprsgnr($emlprsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emlprsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_EMLPRSGNR, $emlprsgnr, $comparison);
    }

    /**
     * Filter the query on the estcvlgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByEstcvlgnr('fooValue');   // WHERE estcvlgnr = 'fooValue'
     * $query->filterByEstcvlgnr('%fooValue%', Criteria::LIKE); // WHERE estcvlgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estcvlgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEstcvlgnr($estcvlgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estcvlgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_ESTCVLGNR, $estcvlgnr, $comparison);
    }

    /**
     * Filter the query on the rgmcnygnr column
     *
     * Example usage:
     * <code>
     * $query->filterByRgmcnygnr('fooValue');   // WHERE rgmcnygnr = 'fooValue'
     * $query->filterByRgmcnygnr('%fooValue%', Criteria::LIKE); // WHERE rgmcnygnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rgmcnygnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByRgmcnygnr($rgmcnygnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rgmcnygnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_RGMCNYGNR, $rgmcnygnr, $comparison);
    }

    /**
     * Filter the query on the ncndtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByNcndtsgnr('fooValue');   // WHERE ncndtsgnr = 'fooValue'
     * $query->filterByNcndtsgnr('%fooValue%', Criteria::LIKE); // WHERE ncndtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ncndtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByNcndtsgnr($ncndtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ncndtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_NCNDTSGNR, $ncndtsgnr, $comparison);
    }

    /**
     * Filter the query on the pasnacgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByPasnacgnr('fooValue');   // WHERE pasnacgnr = 'fooValue'
     * $query->filterByPasnacgnr('%fooValue%', Criteria::LIKE); // WHERE pasnacgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pasnacgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByPasnacgnr($pasnacgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pasnacgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_PASNACGNR, $pasnacgnr, $comparison);
    }

    /**
     * Filter the query on the estnacgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByEstnacgnr('fooValue');   // WHERE estnacgnr = 'fooValue'
     * $query->filterByEstnacgnr('%fooValue%', Criteria::LIKE); // WHERE estnacgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estnacgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEstnacgnr($estnacgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estnacgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_ESTNACGNR, $estnacgnr, $comparison);
    }

    /**
     * Filter the query on the lgrubcgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByLgrubcgnr('fooValue');   // WHERE lgrubcgnr = 'fooValue'
     * $query->filterByLgrubcgnr('%fooValue%', Criteria::LIKE); // WHERE lgrubcgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lgrubcgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByLgrubcgnr($lgrubcgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lgrubcgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_LGRUBCGNR, $lgrubcgnr, $comparison);
    }

    /**
     * Filter the query on the entdtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByEntdtsgnr('fooValue');   // WHERE entdtsgnr = 'fooValue'
     * $query->filterByEntdtsgnr('%fooValue%', Criteria::LIKE); // WHERE entdtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $entdtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEntdtsgnr($entdtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($entdtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_ENTDTSGNR, $entdtsgnr, $comparison);
    }

    /**
     * Filter the query on the mncdtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByMncdtsgnr('fooValue');   // WHERE mncdtsgnr = 'fooValue'
     * $query->filterByMncdtsgnr('%fooValue%', Criteria::LIKE); // WHERE mncdtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mncdtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByMncdtsgnr($mncdtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mncdtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_MNCDTSGNR, $mncdtsgnr, $comparison);
    }

    /**
     * Filter the query on the lcldtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByLcldtsgnr('fooValue');   // WHERE lcldtsgnr = 'fooValue'
     * $query->filterByLcldtsgnr('%fooValue%', Criteria::LIKE); // WHERE lcldtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lcldtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByLcldtsgnr($lcldtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lcldtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_LCLDTSGNR, $lcldtsgnr, $comparison);
    }

    /**
     * Filter the query on the dmcdtsgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByDmcdtsgnr('fooValue');   // WHERE dmcdtsgnr = 'fooValue'
     * $query->filterByDmcdtsgnr('%fooValue%', Criteria::LIKE); // WHERE dmcdtsgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dmcdtsgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByDmcdtsgnr($dmcdtsgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dmcdtsgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_DMCDTSGNR, $dmcdtsgnr, $comparison);
    }

    /**
     * Filter the query on the cdgpstgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByCdgpstgnr('fooValue');   // WHERE cdgpstgnr = 'fooValue'
     * $query->filterByCdgpstgnr('%fooValue%', Criteria::LIKE); // WHERE cdgpstgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cdgpstgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByCdgpstgnr($cdgpstgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdgpstgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_CDGPSTGNR, $cdgpstgnr, $comparison);
    }

    /**
     * Filter the query on the tlffijgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByTlffijgnr('fooValue');   // WHERE tlffijgnr = 'fooValue'
     * $query->filterByTlffijgnr('%fooValue%', Criteria::LIKE); // WHERE tlffijgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tlffijgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByTlffijgnr($tlffijgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tlffijgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_TLFFIJGNR, $tlffijgnr, $comparison);
    }

    /**
     * Filter the query on the tlfmvlgnr column
     *
     * Example usage:
     * <code>
     * $query->filterByTlfmvlgnr('fooValue');   // WHERE tlfmvlgnr = 'fooValue'
     * $query->filterByTlfmvlgnr('%fooValue%', Criteria::LIKE); // WHERE tlfmvlgnr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tlfmvlgnr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByTlfmvlgnr($tlfmvlgnr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tlfmvlgnr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_TLFMVLGNR, $tlfmvlgnr, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the finished_at column
     *
     * Example usage:
     * <code>
     * $query->filterByFinishedAt('2011-03-14'); // WHERE finished_at = '2011-03-14'
     * $query->filterByFinishedAt('now'); // WHERE finished_at = '2011-03-14'
     * $query->filterByFinishedAt(array('max' => 'yesterday')); // WHERE finished_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $finishedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByFinishedAt($finishedAt = null, $comparison = null)
    {
        if (is_array($finishedAt)) {
            $useMinMax = false;
            if (isset($finishedAt['min'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_FINISHED_AT, $finishedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($finishedAt['max'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_FINISHED_AT, $finishedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_FINISHED_AT, $finishedAt, $comparison);
    }

    /**
     * Filter the query on the phoentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoentprs('fooValue');   // WHERE phoentprs = 'fooValue'
     * $query->filterByPhoentprs('%fooValue%', Criteria::LIKE); // WHERE phoentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByPhoentprs($phoentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_PHOENTPRS, $phoentprs, $comparison);
    }

    /**
     * Filter the query on the typentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByTypentprs(1234); // WHERE typentprs = 1234
     * $query->filterByTypentprs(array(12, 34)); // WHERE typentprs IN (12, 34)
     * $query->filterByTypentprs(array('min' => 12)); // WHERE typentprs > 12
     * </code>
     *
     * @param     mixed $typentprs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByTypentprs($typentprs = null, $comparison = null)
    {
        if (is_array($typentprs)) {
            $useMinMax = false;
            if (isset($typentprs['min'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_TYPENTPRS, $typentprs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typentprs['max'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_TYPENTPRS, $typentprs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_TYPENTPRS, $typentprs, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the email_verified_at column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailVerifiedAt('2011-03-14'); // WHERE email_verified_at = '2011-03-14'
     * $query->filterByEmailVerifiedAt('now'); // WHERE email_verified_at = '2011-03-14'
     * $query->filterByEmailVerifiedAt(array('max' => 'yesterday')); // WHERE email_verified_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $emailVerifiedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByEmailVerifiedAt($emailVerifiedAt = null, $comparison = null)
    {
        if (is_array($emailVerifiedAt)) {
            $useMinMax = false;
            if (isset($emailVerifiedAt['min'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_EMAIL_VERIFIED_AT, $emailVerifiedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($emailVerifiedAt['max'])) {
                $this->addUsingAlias(TblentrepTableMap::COL_EMAIL_VERIFIED_AT, $emailVerifiedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_EMAIL_VERIFIED_AT, $emailVerifiedAt, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the remember_token column
     *
     * Example usage:
     * <code>
     * $query->filterByRememberToken('fooValue');   // WHERE remember_token = 'fooValue'
     * $query->filterByRememberToken('%fooValue%', Criteria::LIKE); // WHERE remember_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rememberToken The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function filterByRememberToken($rememberToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rememberToken)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrepTableMap::COL_REMEMBER_TOKEN, $rememberToken, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblentrep $tblentrep Object to remove from the list of results
     *
     * @return $this|ChildTblentrepQuery The current query, for fluid interface
     */
    public function prune($tblentrep = null)
    {
        if ($tblentrep) {
            $this->addUsingAlias(TblentrepTableMap::COL_ID, $tblentrep->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentrep table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrepTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentrepTableMap::clearInstancePool();
            TblentrepTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrepTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentrepTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentrepTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentrepTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentrepQuery
