<?php

namespace Base;

use \Tblentprs as ChildTblentprs;
use \TblentprsQuery as ChildTblentprsQuery;
use \Exception;
use \PDO;
use Map\TblentprsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentprs' table.
 *
 *
 *
 * @method     ChildTblentprsQuery orderByIdnentprs($order = Criteria::ASC) Order by the idnentprs column
 * @method     ChildTblentprsQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentprsQuery orderByIdnentusr($order = Criteria::ASC) Order by the idnentusr column
 * @method     ChildTblentprsQuery orderByNomentprs($order = Criteria::ASC) Order by the nomentprs column
 * @method     ChildTblentprsQuery orderByPrmaplprs($order = Criteria::ASC) Order by the prmaplprs column
 * @method     ChildTblentprsQuery orderBySgnaplprs($order = Criteria::ASC) Order by the sgnaplprs column
 * @method     ChildTblentprsQuery orderByCrpentprs($order = Criteria::ASC) Order by the crpentprs column
 * @method     ChildTblentprsQuery orderByRfcentprs($order = Criteria::ASC) Order by the rfcentprs column
 * @method     ChildTblentprsQuery orderByEmllbrprs($order = Criteria::ASC) Order by the emllbrprs column
 * @method     ChildTblentprsQuery orderByEmlprsprs($order = Criteria::ASC) Order by the emlprsprs column
 * @method     ChildTblentprsQuery orderByNcnentprs($order = Criteria::ASC) Order by the ncnentprs column
 * @method     ChildTblentprsQuery orderByPasentprs($order = Criteria::ASC) Order by the pasentprs column
 * @method     ChildTblentprsQuery orderByEntentprs($order = Criteria::ASC) Order by the ententprs column
 * @method     ChildTblentprsQuery orderByMncentprs($order = Criteria::ASC) Order by the mncentprs column
 * @method     ChildTblentprsQuery orderByLclentprs($order = Criteria::ASC) Order by the lclentprs column
 * @method     ChildTblentprsQuery orderByDmcentprs($order = Criteria::ASC) Order by the dmcentprs column
 * @method     ChildTblentprsQuery orderByCdgpstprs($order = Criteria::ASC) Order by the cdgpstprs column
 * @method     ChildTblentprsQuery orderByTlffijprs($order = Criteria::ASC) Order by the tlffijprs column
 * @method     ChildTblentprsQuery orderByTlfmvlprs($order = Criteria::ASC) Order by the tlfmvlprs column
 * @method     ChildTblentprsQuery orderByFotentprs($order = Criteria::ASC) Order by the fotentprs column
 * @method     ChildTblentprsQuery orderByTipentprs($order = Criteria::ASC) Order by the tipentprs column
 * @method     ChildTblentprsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentprsQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentprsQuery groupByIdnentprs() Group by the idnentprs column
 * @method     ChildTblentprsQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentprsQuery groupByIdnentusr() Group by the idnentusr column
 * @method     ChildTblentprsQuery groupByNomentprs() Group by the nomentprs column
 * @method     ChildTblentprsQuery groupByPrmaplprs() Group by the prmaplprs column
 * @method     ChildTblentprsQuery groupBySgnaplprs() Group by the sgnaplprs column
 * @method     ChildTblentprsQuery groupByCrpentprs() Group by the crpentprs column
 * @method     ChildTblentprsQuery groupByRfcentprs() Group by the rfcentprs column
 * @method     ChildTblentprsQuery groupByEmllbrprs() Group by the emllbrprs column
 * @method     ChildTblentprsQuery groupByEmlprsprs() Group by the emlprsprs column
 * @method     ChildTblentprsQuery groupByNcnentprs() Group by the ncnentprs column
 * @method     ChildTblentprsQuery groupByPasentprs() Group by the pasentprs column
 * @method     ChildTblentprsQuery groupByEntentprs() Group by the ententprs column
 * @method     ChildTblentprsQuery groupByMncentprs() Group by the mncentprs column
 * @method     ChildTblentprsQuery groupByLclentprs() Group by the lclentprs column
 * @method     ChildTblentprsQuery groupByDmcentprs() Group by the dmcentprs column
 * @method     ChildTblentprsQuery groupByCdgpstprs() Group by the cdgpstprs column
 * @method     ChildTblentprsQuery groupByTlffijprs() Group by the tlffijprs column
 * @method     ChildTblentprsQuery groupByTlfmvlprs() Group by the tlfmvlprs column
 * @method     ChildTblentprsQuery groupByFotentprs() Group by the fotentprs column
 * @method     ChildTblentprsQuery groupByTipentprs() Group by the tipentprs column
 * @method     ChildTblentprsQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentprsQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentprsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentprsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentprsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentprsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentprsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentprsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentprsQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildTblentprsQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildTblentprsQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildTblentprsQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildTblentprsQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentprsQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentprsQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     ChildTblentprsQuery leftJoinTblentemp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentprsQuery rightJoinTblentemp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentprsQuery innerJoinTblentemp($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentemp relation
 *
 * @method     ChildTblentprsQuery joinWithTblentemp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentprsQuery leftJoinWithTblentemp() Adds a LEFT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentprsQuery rightJoinWithTblentemp() Adds a RIGHT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentprsQuery innerJoinWithTblentemp() Adds a INNER JOIN clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentprsQuery leftJoinTblentorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentprsQuery rightJoinTblentorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentprsQuery innerJoinTblentorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentorg relation
 *
 * @method     ChildTblentprsQuery joinWithTblentorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentorg relation
 *
 * @method     ChildTblentprsQuery leftJoinWithTblentorg() Adds a LEFT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentprsQuery rightJoinWithTblentorg() Adds a RIGHT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentprsQuery innerJoinWithTblentorg() Adds a INNER JOIN clause and with to the query using the Tblentorg relation
 *
 * @method     \UsersQuery|\TblentempQuery|\TblentorgQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentprs findOne(ConnectionInterface $con = null) Return the first ChildTblentprs matching the query
 * @method     ChildTblentprs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentprs matching the query, or a new ChildTblentprs object populated from the query conditions when no match is found
 *
 * @method     ChildTblentprs findOneByIdnentprs(string $idnentprs) Return the first ChildTblentprs filtered by the idnentprs column
 * @method     ChildTblentprs findOneByUuid(string $uuid) Return the first ChildTblentprs filtered by the uuid column
 * @method     ChildTblentprs findOneByIdnentusr(string $idnentusr) Return the first ChildTblentprs filtered by the idnentusr column
 * @method     ChildTblentprs findOneByNomentprs(string $nomentprs) Return the first ChildTblentprs filtered by the nomentprs column
 * @method     ChildTblentprs findOneByPrmaplprs(string $prmaplprs) Return the first ChildTblentprs filtered by the prmaplprs column
 * @method     ChildTblentprs findOneBySgnaplprs(string $sgnaplprs) Return the first ChildTblentprs filtered by the sgnaplprs column
 * @method     ChildTblentprs findOneByCrpentprs(string $crpentprs) Return the first ChildTblentprs filtered by the crpentprs column
 * @method     ChildTblentprs findOneByRfcentprs(string $rfcentprs) Return the first ChildTblentprs filtered by the rfcentprs column
 * @method     ChildTblentprs findOneByEmllbrprs(string $emllbrprs) Return the first ChildTblentprs filtered by the emllbrprs column
 * @method     ChildTblentprs findOneByEmlprsprs(string $emlprsprs) Return the first ChildTblentprs filtered by the emlprsprs column
 * @method     ChildTblentprs findOneByNcnentprs(string $ncnentprs) Return the first ChildTblentprs filtered by the ncnentprs column
 * @method     ChildTblentprs findOneByPasentprs(string $pasentprs) Return the first ChildTblentprs filtered by the pasentprs column
 * @method     ChildTblentprs findOneByEntentprs(string $ententprs) Return the first ChildTblentprs filtered by the ententprs column
 * @method     ChildTblentprs findOneByMncentprs(string $mncentprs) Return the first ChildTblentprs filtered by the mncentprs column
 * @method     ChildTblentprs findOneByLclentprs(string $lclentprs) Return the first ChildTblentprs filtered by the lclentprs column
 * @method     ChildTblentprs findOneByDmcentprs(string $dmcentprs) Return the first ChildTblentprs filtered by the dmcentprs column
 * @method     ChildTblentprs findOneByCdgpstprs(string $cdgpstprs) Return the first ChildTblentprs filtered by the cdgpstprs column
 * @method     ChildTblentprs findOneByTlffijprs(string $tlffijprs) Return the first ChildTblentprs filtered by the tlffijprs column
 * @method     ChildTblentprs findOneByTlfmvlprs(string $tlfmvlprs) Return the first ChildTblentprs filtered by the tlfmvlprs column
 * @method     ChildTblentprs findOneByFotentprs(string $fotentprs) Return the first ChildTblentprs filtered by the fotentprs column
 * @method     ChildTblentprs findOneByTipentprs(string $tipentprs) Return the first ChildTblentprs filtered by the tipentprs column
 * @method     ChildTblentprs findOneByCreatedAt(string $created_at) Return the first ChildTblentprs filtered by the created_at column
 * @method     ChildTblentprs findOneByUpdatedAt(string $updated_at) Return the first ChildTblentprs filtered by the updated_at column *

 * @method     ChildTblentprs requirePk($key, ConnectionInterface $con = null) Return the ChildTblentprs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOne(ConnectionInterface $con = null) Return the first ChildTblentprs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentprs requireOneByIdnentprs(string $idnentprs) Return the first ChildTblentprs filtered by the idnentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByUuid(string $uuid) Return the first ChildTblentprs filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByIdnentusr(string $idnentusr) Return the first ChildTblentprs filtered by the idnentusr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByNomentprs(string $nomentprs) Return the first ChildTblentprs filtered by the nomentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByPrmaplprs(string $prmaplprs) Return the first ChildTblentprs filtered by the prmaplprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneBySgnaplprs(string $sgnaplprs) Return the first ChildTblentprs filtered by the sgnaplprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByCrpentprs(string $crpentprs) Return the first ChildTblentprs filtered by the crpentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByRfcentprs(string $rfcentprs) Return the first ChildTblentprs filtered by the rfcentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByEmllbrprs(string $emllbrprs) Return the first ChildTblentprs filtered by the emllbrprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByEmlprsprs(string $emlprsprs) Return the first ChildTblentprs filtered by the emlprsprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByNcnentprs(string $ncnentprs) Return the first ChildTblentprs filtered by the ncnentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByPasentprs(string $pasentprs) Return the first ChildTblentprs filtered by the pasentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByEntentprs(string $ententprs) Return the first ChildTblentprs filtered by the ententprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByMncentprs(string $mncentprs) Return the first ChildTblentprs filtered by the mncentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByLclentprs(string $lclentprs) Return the first ChildTblentprs filtered by the lclentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByDmcentprs(string $dmcentprs) Return the first ChildTblentprs filtered by the dmcentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByCdgpstprs(string $cdgpstprs) Return the first ChildTblentprs filtered by the cdgpstprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByTlffijprs(string $tlffijprs) Return the first ChildTblentprs filtered by the tlffijprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByTlfmvlprs(string $tlfmvlprs) Return the first ChildTblentprs filtered by the tlfmvlprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByFotentprs(string $fotentprs) Return the first ChildTblentprs filtered by the fotentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByTipentprs(string $tipentprs) Return the first ChildTblentprs filtered by the tipentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByCreatedAt(string $created_at) Return the first ChildTblentprs filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentprs requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentprs filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentprs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentprs objects based on current ModelCriteria
 * @method     ChildTblentprs[]|ObjectCollection findByIdnentprs(string $idnentprs) Return ChildTblentprs objects filtered by the idnentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentprs objects filtered by the uuid column
 * @method     ChildTblentprs[]|ObjectCollection findByIdnentusr(string $idnentusr) Return ChildTblentprs objects filtered by the idnentusr column
 * @method     ChildTblentprs[]|ObjectCollection findByNomentprs(string $nomentprs) Return ChildTblentprs objects filtered by the nomentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByPrmaplprs(string $prmaplprs) Return ChildTblentprs objects filtered by the prmaplprs column
 * @method     ChildTblentprs[]|ObjectCollection findBySgnaplprs(string $sgnaplprs) Return ChildTblentprs objects filtered by the sgnaplprs column
 * @method     ChildTblentprs[]|ObjectCollection findByCrpentprs(string $crpentprs) Return ChildTblentprs objects filtered by the crpentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByRfcentprs(string $rfcentprs) Return ChildTblentprs objects filtered by the rfcentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByEmllbrprs(string $emllbrprs) Return ChildTblentprs objects filtered by the emllbrprs column
 * @method     ChildTblentprs[]|ObjectCollection findByEmlprsprs(string $emlprsprs) Return ChildTblentprs objects filtered by the emlprsprs column
 * @method     ChildTblentprs[]|ObjectCollection findByNcnentprs(string $ncnentprs) Return ChildTblentprs objects filtered by the ncnentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByPasentprs(string $pasentprs) Return ChildTblentprs objects filtered by the pasentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByEntentprs(string $ententprs) Return ChildTblentprs objects filtered by the ententprs column
 * @method     ChildTblentprs[]|ObjectCollection findByMncentprs(string $mncentprs) Return ChildTblentprs objects filtered by the mncentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByLclentprs(string $lclentprs) Return ChildTblentprs objects filtered by the lclentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByDmcentprs(string $dmcentprs) Return ChildTblentprs objects filtered by the dmcentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByCdgpstprs(string $cdgpstprs) Return ChildTblentprs objects filtered by the cdgpstprs column
 * @method     ChildTblentprs[]|ObjectCollection findByTlffijprs(string $tlffijprs) Return ChildTblentprs objects filtered by the tlffijprs column
 * @method     ChildTblentprs[]|ObjectCollection findByTlfmvlprs(string $tlfmvlprs) Return ChildTblentprs objects filtered by the tlfmvlprs column
 * @method     ChildTblentprs[]|ObjectCollection findByFotentprs(string $fotentprs) Return ChildTblentprs objects filtered by the fotentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByTipentprs(string $tipentprs) Return ChildTblentprs objects filtered by the tipentprs column
 * @method     ChildTblentprs[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentprs objects filtered by the created_at column
 * @method     ChildTblentprs[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentprs objects filtered by the updated_at column
 * @method     ChildTblentprs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentprsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentprsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cerodb', $modelName = '\\Tblentprs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentprsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentprsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentprsQuery) {
            return $criteria;
        }
        $query = new ChildTblentprsQuery();
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
     * @return ChildTblentprs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentprsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentprsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentprs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentprs, uuid, idnentusr, nomentprs, prmaplprs, sgnaplprs, crpentprs, rfcentprs, emllbrprs, emlprsprs, ncnentprs, pasentprs, ententprs, mncentprs, lclentprs, dmcentprs, cdgpstprs, tlffijprs, tlfmvlprs, fotentprs, tipentprs, created_at, updated_at FROM tblentprs WHERE idnentprs = :p0';
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
            /** @var ChildTblentprs $obj */
            $obj = new ChildTblentprs();
            $obj->hydrate($row);
            TblentprsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentprs|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idnentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentprs(1234); // WHERE idnentprs = 1234
     * $query->filterByIdnentprs(array(12, 34)); // WHERE idnentprs IN (12, 34)
     * $query->filterByIdnentprs(array('min' => 12)); // WHERE idnentprs > 12
     * </code>
     *
     * @param     mixed $idnentprs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByIdnentprs($idnentprs = null, $comparison = null)
    {
        if (is_array($idnentprs)) {
            $useMinMax = false;
            if (isset($idnentprs['min'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $idnentprs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentprs['max'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $idnentprs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $idnentprs, $comparison);
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
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the idnentusr column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentusr(1234); // WHERE idnentusr = 1234
     * $query->filterByIdnentusr(array(12, 34)); // WHERE idnentusr IN (12, 34)
     * $query->filterByIdnentusr(array('min' => 12)); // WHERE idnentusr > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $idnentusr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByIdnentusr($idnentusr = null, $comparison = null)
    {
        if (is_array($idnentusr)) {
            $useMinMax = false;
            if (isset($idnentusr['min'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_IDNENTUSR, $idnentusr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentusr['max'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_IDNENTUSR, $idnentusr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_IDNENTUSR, $idnentusr, $comparison);
    }

    /**
     * Filter the query on the nomentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByNomentprs('fooValue');   // WHERE nomentprs = 'fooValue'
     * $query->filterByNomentprs('%fooValue%', Criteria::LIKE); // WHERE nomentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByNomentprs($nomentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_NOMENTPRS, $nomentprs, $comparison);
    }

    /**
     * Filter the query on the prmaplprs column
     *
     * Example usage:
     * <code>
     * $query->filterByPrmaplprs('fooValue');   // WHERE prmaplprs = 'fooValue'
     * $query->filterByPrmaplprs('%fooValue%', Criteria::LIKE); // WHERE prmaplprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prmaplprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByPrmaplprs($prmaplprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prmaplprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_PRMAPLPRS, $prmaplprs, $comparison);
    }

    /**
     * Filter the query on the sgnaplprs column
     *
     * Example usage:
     * <code>
     * $query->filterBySgnaplprs('fooValue');   // WHERE sgnaplprs = 'fooValue'
     * $query->filterBySgnaplprs('%fooValue%', Criteria::LIKE); // WHERE sgnaplprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sgnaplprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterBySgnaplprs($sgnaplprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sgnaplprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_SGNAPLPRS, $sgnaplprs, $comparison);
    }

    /**
     * Filter the query on the crpentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByCrpentprs('fooValue');   // WHERE crpentprs = 'fooValue'
     * $query->filterByCrpentprs('%fooValue%', Criteria::LIKE); // WHERE crpentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $crpentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByCrpentprs($crpentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($crpentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_CRPENTPRS, $crpentprs, $comparison);
    }

    /**
     * Filter the query on the rfcentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByRfcentprs('fooValue');   // WHERE rfcentprs = 'fooValue'
     * $query->filterByRfcentprs('%fooValue%', Criteria::LIKE); // WHERE rfcentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rfcentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByRfcentprs($rfcentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rfcentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_RFCENTPRS, $rfcentprs, $comparison);
    }

    /**
     * Filter the query on the emllbrprs column
     *
     * Example usage:
     * <code>
     * $query->filterByEmllbrprs('fooValue');   // WHERE emllbrprs = 'fooValue'
     * $query->filterByEmllbrprs('%fooValue%', Criteria::LIKE); // WHERE emllbrprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emllbrprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByEmllbrprs($emllbrprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emllbrprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_EMLLBRPRS, $emllbrprs, $comparison);
    }

    /**
     * Filter the query on the emlprsprs column
     *
     * Example usage:
     * <code>
     * $query->filterByEmlprsprs('fooValue');   // WHERE emlprsprs = 'fooValue'
     * $query->filterByEmlprsprs('%fooValue%', Criteria::LIKE); // WHERE emlprsprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emlprsprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByEmlprsprs($emlprsprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emlprsprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_EMLPRSPRS, $emlprsprs, $comparison);
    }

    /**
     * Filter the query on the ncnentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByNcnentprs('fooValue');   // WHERE ncnentprs = 'fooValue'
     * $query->filterByNcnentprs('%fooValue%', Criteria::LIKE); // WHERE ncnentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ncnentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByNcnentprs($ncnentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ncnentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_NCNENTPRS, $ncnentprs, $comparison);
    }

    /**
     * Filter the query on the pasentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByPasentprs('fooValue');   // WHERE pasentprs = 'fooValue'
     * $query->filterByPasentprs('%fooValue%', Criteria::LIKE); // WHERE pasentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pasentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByPasentprs($pasentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pasentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_PASENTPRS, $pasentprs, $comparison);
    }

    /**
     * Filter the query on the ententprs column
     *
     * Example usage:
     * <code>
     * $query->filterByEntentprs('fooValue');   // WHERE ententprs = 'fooValue'
     * $query->filterByEntentprs('%fooValue%', Criteria::LIKE); // WHERE ententprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ententprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByEntentprs($ententprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ententprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_ENTENTPRS, $ententprs, $comparison);
    }

    /**
     * Filter the query on the mncentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByMncentprs('fooValue');   // WHERE mncentprs = 'fooValue'
     * $query->filterByMncentprs('%fooValue%', Criteria::LIKE); // WHERE mncentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mncentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByMncentprs($mncentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mncentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_MNCENTPRS, $mncentprs, $comparison);
    }

    /**
     * Filter the query on the lclentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByLclentprs('fooValue');   // WHERE lclentprs = 'fooValue'
     * $query->filterByLclentprs('%fooValue%', Criteria::LIKE); // WHERE lclentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lclentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByLclentprs($lclentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lclentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_LCLENTPRS, $lclentprs, $comparison);
    }

    /**
     * Filter the query on the dmcentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByDmcentprs('fooValue');   // WHERE dmcentprs = 'fooValue'
     * $query->filterByDmcentprs('%fooValue%', Criteria::LIKE); // WHERE dmcentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dmcentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByDmcentprs($dmcentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dmcentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_DMCENTPRS, $dmcentprs, $comparison);
    }

    /**
     * Filter the query on the cdgpstprs column
     *
     * Example usage:
     * <code>
     * $query->filterByCdgpstprs('fooValue');   // WHERE cdgpstprs = 'fooValue'
     * $query->filterByCdgpstprs('%fooValue%', Criteria::LIKE); // WHERE cdgpstprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cdgpstprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByCdgpstprs($cdgpstprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdgpstprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_CDGPSTPRS, $cdgpstprs, $comparison);
    }

    /**
     * Filter the query on the tlffijprs column
     *
     * Example usage:
     * <code>
     * $query->filterByTlffijprs('fooValue');   // WHERE tlffijprs = 'fooValue'
     * $query->filterByTlffijprs('%fooValue%', Criteria::LIKE); // WHERE tlffijprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tlffijprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByTlffijprs($tlffijprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tlffijprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_TLFFIJPRS, $tlffijprs, $comparison);
    }

    /**
     * Filter the query on the tlfmvlprs column
     *
     * Example usage:
     * <code>
     * $query->filterByTlfmvlprs('fooValue');   // WHERE tlfmvlprs = 'fooValue'
     * $query->filterByTlfmvlprs('%fooValue%', Criteria::LIKE); // WHERE tlfmvlprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tlfmvlprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByTlfmvlprs($tlfmvlprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tlfmvlprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_TLFMVLPRS, $tlfmvlprs, $comparison);
    }

    /**
     * Filter the query on the fotentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByFotentprs('fooValue');   // WHERE fotentprs = 'fooValue'
     * $query->filterByFotentprs('%fooValue%', Criteria::LIKE); // WHERE fotentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fotentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByFotentprs($fotentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fotentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_FOTENTPRS, $fotentprs, $comparison);
    }

    /**
     * Filter the query on the tipentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByTipentprs('fooValue');   // WHERE tipentprs = 'fooValue'
     * $query->filterByTipentprs('%fooValue%', Criteria::LIKE); // WHERE tipentprs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipentprs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByTipentprs($tipentprs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipentprs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_TIPENTPRS, $tipentprs, $comparison);
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
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentprsTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentprsTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(TblentprsTableMap::COL_IDNENTUSR, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentprsTableMap::COL_IDNENTUSR, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsers() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Users relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Users');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Users');
        }

        return $this;
    }

    /**
     * Use the Users relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\UsersQuery');
    }

    /**
     * Filter the query by a related \Tblentemp object
     *
     * @param \Tblentemp|ObjectCollection $tblentemp the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByTblentemp($tblentemp, $comparison = null)
    {
        if ($tblentemp instanceof \Tblentemp) {
            return $this
                ->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $tblentemp->getIdnentprs(), $comparison);
        } elseif ($tblentemp instanceof ObjectCollection) {
            return $this
                ->useTblentempQuery()
                ->filterByPrimaryKeys($tblentemp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblentemp() only accepts arguments of type \Tblentemp or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentemp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function joinTblentemp($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentemp');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tblentemp');
        }

        return $this;
    }

    /**
     * Use the Tblentemp relation Tblentemp object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentempQuery A secondary query class using the current class as primary query
     */
    public function useTblentempQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentemp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentemp', '\TblentempQuery');
    }

    /**
     * Filter the query by a related \Tblentorg object
     *
     * @param \Tblentorg|ObjectCollection $tblentorg the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblentprsQuery The current query, for fluid interface
     */
    public function filterByTblentorg($tblentorg, $comparison = null)
    {
        if ($tblentorg instanceof \Tblentorg) {
            return $this
                ->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $tblentorg->getIdnentprs(), $comparison);
        } elseif ($tblentorg instanceof ObjectCollection) {
            return $this
                ->useTblentorgQuery()
                ->filterByPrimaryKeys($tblentorg->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblentorg() only accepts arguments of type \Tblentorg or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentorg relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function joinTblentorg($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentorg');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tblentorg');
        }

        return $this;
    }

    /**
     * Use the Tblentorg relation Tblentorg object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentorgQuery A secondary query class using the current class as primary query
     */
    public function useTblentorgQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentorg($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentorg', '\TblentorgQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblentprs $tblentprs Object to remove from the list of results
     *
     * @return $this|ChildTblentprsQuery The current query, for fluid interface
     */
    public function prune($tblentprs = null)
    {
        if ($tblentprs) {
            $this->addUsingAlias(TblentprsTableMap::COL_IDNENTPRS, $tblentprs->getIdnentprs(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentprs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentprsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentprsTableMap::clearInstancePool();
            TblentprsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentprsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentprsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentprsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentprsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentprsQuery
