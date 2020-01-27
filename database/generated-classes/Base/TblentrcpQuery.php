<?php

namespace Base;

use \Tblentrcp as ChildTblentrcp;
use \TblentrcpQuery as ChildTblentrcpQuery;
use \Exception;
use \PDO;
use Map\TblentrcpTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentrcp' table.
 *
 *
 *
 * @method     ChildTblentrcpQuery orderByIdnentrcp($order = Criteria::ASC) Order by the idnentrcp column
 * @method     ChildTblentrcpQuery orderByIdnentemp($order = Criteria::ASC) Order by the idnentemp column
 * @method     ChildTblentrcpQuery orderByIdnentorg($order = Criteria::ASC) Order by the idnentorg column
 * @method     ChildTblentrcpQuery orderByIdnentcln($order = Criteria::ASC) Order by the idnentcln column
 * @method     ChildTblentrcpQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentrcpQuery orderByFchinccln($order = Criteria::ASC) Order by the fchinccln column
 * @method     ChildTblentrcpQuery orderByTipentrcp($order = Criteria::ASC) Order by the tipentrcp column
 * @method     ChildTblentrcpQuery orderByKgsentrcp($order = Criteria::ASC) Order by the kgsentrcp column
 * @method     ChildTblentrcpQuery orderByCntcjsrcp($order = Criteria::ASC) Order by the cntcjsrcp column
 * @method     ChildTblentrcpQuery orderByRtnentcln($order = Criteria::ASC) Order by the rtnentcln column
 * @method     ChildTblentrcpQuery orderByVldentcln($order = Criteria::ASC) Order by the vldentcln column
 * @method     ChildTblentrcpQuery orderByFnsentcln($order = Criteria::ASC) Order by the fnsentcln column
 * @method     ChildTblentrcpQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentrcpQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentrcpQuery groupByIdnentrcp() Group by the idnentrcp column
 * @method     ChildTblentrcpQuery groupByIdnentemp() Group by the idnentemp column
 * @method     ChildTblentrcpQuery groupByIdnentorg() Group by the idnentorg column
 * @method     ChildTblentrcpQuery groupByIdnentcln() Group by the idnentcln column
 * @method     ChildTblentrcpQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentrcpQuery groupByFchinccln() Group by the fchinccln column
 * @method     ChildTblentrcpQuery groupByTipentrcp() Group by the tipentrcp column
 * @method     ChildTblentrcpQuery groupByKgsentrcp() Group by the kgsentrcp column
 * @method     ChildTblentrcpQuery groupByCntcjsrcp() Group by the cntcjsrcp column
 * @method     ChildTblentrcpQuery groupByRtnentcln() Group by the rtnentcln column
 * @method     ChildTblentrcpQuery groupByVldentcln() Group by the vldentcln column
 * @method     ChildTblentrcpQuery groupByFnsentcln() Group by the fnsentcln column
 * @method     ChildTblentrcpQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentrcpQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentrcpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentrcpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentrcpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentrcpQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentrcpQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentrcpQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentrcpQuery leftJoinTblentcln($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentcln relation
 * @method     ChildTblentrcpQuery rightJoinTblentcln($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentcln relation
 * @method     ChildTblentrcpQuery innerJoinTblentcln($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentcln relation
 *
 * @method     ChildTblentrcpQuery joinWithTblentcln($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentcln relation
 *
 * @method     ChildTblentrcpQuery leftJoinWithTblentcln() Adds a LEFT JOIN clause and with to the query using the Tblentcln relation
 * @method     ChildTblentrcpQuery rightJoinWithTblentcln() Adds a RIGHT JOIN clause and with to the query using the Tblentcln relation
 * @method     ChildTblentrcpQuery innerJoinWithTblentcln() Adds a INNER JOIN clause and with to the query using the Tblentcln relation
 *
 * @method     ChildTblentrcpQuery leftJoinTblentemp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentrcpQuery rightJoinTblentemp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentrcpQuery innerJoinTblentemp($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentemp relation
 *
 * @method     ChildTblentrcpQuery joinWithTblentemp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentrcpQuery leftJoinWithTblentemp() Adds a LEFT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentrcpQuery rightJoinWithTblentemp() Adds a RIGHT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentrcpQuery innerJoinWithTblentemp() Adds a INNER JOIN clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentrcpQuery leftJoinTblentorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentrcpQuery rightJoinTblentorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentrcpQuery innerJoinTblentorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentorg relation
 *
 * @method     ChildTblentrcpQuery joinWithTblentorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentorg relation
 *
 * @method     ChildTblentrcpQuery leftJoinWithTblentorg() Adds a LEFT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentrcpQuery rightJoinWithTblentorg() Adds a RIGHT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentrcpQuery innerJoinWithTblentorg() Adds a INNER JOIN clause and with to the query using the Tblentorg relation
 *
 * @method     \TblentclnQuery|\TblentempQuery|\TblentorgQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentrcp findOne(ConnectionInterface $con = null) Return the first ChildTblentrcp matching the query
 * @method     ChildTblentrcp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentrcp matching the query, or a new ChildTblentrcp object populated from the query conditions when no match is found
 *
 * @method     ChildTblentrcp findOneByIdnentrcp(string $idnentrcp) Return the first ChildTblentrcp filtered by the idnentrcp column
 * @method     ChildTblentrcp findOneByIdnentemp(string $idnentemp) Return the first ChildTblentrcp filtered by the idnentemp column
 * @method     ChildTblentrcp findOneByIdnentorg(string $idnentorg) Return the first ChildTblentrcp filtered by the idnentorg column
 * @method     ChildTblentrcp findOneByIdnentcln(string $idnentcln) Return the first ChildTblentrcp filtered by the idnentcln column
 * @method     ChildTblentrcp findOneByUuid(string $uuid) Return the first ChildTblentrcp filtered by the uuid column
 * @method     ChildTblentrcp findOneByFchinccln(string $fchinccln) Return the first ChildTblentrcp filtered by the fchinccln column
 * @method     ChildTblentrcp findOneByTipentrcp(string $tipentrcp) Return the first ChildTblentrcp filtered by the tipentrcp column
 * @method     ChildTblentrcp findOneByKgsentrcp(double $kgsentrcp) Return the first ChildTblentrcp filtered by the kgsentrcp column
 * @method     ChildTblentrcp findOneByCntcjsrcp(int $cntcjsrcp) Return the first ChildTblentrcp filtered by the cntcjsrcp column
 * @method     ChildTblentrcp findOneByRtnentcln(double $rtnentcln) Return the first ChildTblentrcp filtered by the rtnentcln column
 * @method     ChildTblentrcp findOneByVldentcln(boolean $vldentcln) Return the first ChildTblentrcp filtered by the vldentcln column
 * @method     ChildTblentrcp findOneByFnsentcln(boolean $fnsentcln) Return the first ChildTblentrcp filtered by the fnsentcln column
 * @method     ChildTblentrcp findOneByCreatedAt(string $created_at) Return the first ChildTblentrcp filtered by the created_at column
 * @method     ChildTblentrcp findOneByUpdatedAt(string $updated_at) Return the first ChildTblentrcp filtered by the updated_at column *

 * @method     ChildTblentrcp requirePk($key, ConnectionInterface $con = null) Return the ChildTblentrcp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOne(ConnectionInterface $con = null) Return the first ChildTblentrcp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentrcp requireOneByIdnentrcp(string $idnentrcp) Return the first ChildTblentrcp filtered by the idnentrcp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByIdnentemp(string $idnentemp) Return the first ChildTblentrcp filtered by the idnentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByIdnentorg(string $idnentorg) Return the first ChildTblentrcp filtered by the idnentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByIdnentcln(string $idnentcln) Return the first ChildTblentrcp filtered by the idnentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByUuid(string $uuid) Return the first ChildTblentrcp filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByFchinccln(string $fchinccln) Return the first ChildTblentrcp filtered by the fchinccln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByTipentrcp(string $tipentrcp) Return the first ChildTblentrcp filtered by the tipentrcp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByKgsentrcp(double $kgsentrcp) Return the first ChildTblentrcp filtered by the kgsentrcp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByCntcjsrcp(int $cntcjsrcp) Return the first ChildTblentrcp filtered by the cntcjsrcp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByRtnentcln(double $rtnentcln) Return the first ChildTblentrcp filtered by the rtnentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByVldentcln(boolean $vldentcln) Return the first ChildTblentrcp filtered by the vldentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByFnsentcln(boolean $fnsentcln) Return the first ChildTblentrcp filtered by the fnsentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByCreatedAt(string $created_at) Return the first ChildTblentrcp filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentrcp requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentrcp filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentrcp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentrcp objects based on current ModelCriteria
 * @method     ChildTblentrcp[]|ObjectCollection findByIdnentrcp(string $idnentrcp) Return ChildTblentrcp objects filtered by the idnentrcp column
 * @method     ChildTblentrcp[]|ObjectCollection findByIdnentemp(string $idnentemp) Return ChildTblentrcp objects filtered by the idnentemp column
 * @method     ChildTblentrcp[]|ObjectCollection findByIdnentorg(string $idnentorg) Return ChildTblentrcp objects filtered by the idnentorg column
 * @method     ChildTblentrcp[]|ObjectCollection findByIdnentcln(string $idnentcln) Return ChildTblentrcp objects filtered by the idnentcln column
 * @method     ChildTblentrcp[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentrcp objects filtered by the uuid column
 * @method     ChildTblentrcp[]|ObjectCollection findByFchinccln(string $fchinccln) Return ChildTblentrcp objects filtered by the fchinccln column
 * @method     ChildTblentrcp[]|ObjectCollection findByTipentrcp(string $tipentrcp) Return ChildTblentrcp objects filtered by the tipentrcp column
 * @method     ChildTblentrcp[]|ObjectCollection findByKgsentrcp(double $kgsentrcp) Return ChildTblentrcp objects filtered by the kgsentrcp column
 * @method     ChildTblentrcp[]|ObjectCollection findByCntcjsrcp(int $cntcjsrcp) Return ChildTblentrcp objects filtered by the cntcjsrcp column
 * @method     ChildTblentrcp[]|ObjectCollection findByRtnentcln(double $rtnentcln) Return ChildTblentrcp objects filtered by the rtnentcln column
 * @method     ChildTblentrcp[]|ObjectCollection findByVldentcln(boolean $vldentcln) Return ChildTblentrcp objects filtered by the vldentcln column
 * @method     ChildTblentrcp[]|ObjectCollection findByFnsentcln(boolean $fnsentcln) Return ChildTblentrcp objects filtered by the fnsentcln column
 * @method     ChildTblentrcp[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentrcp objects filtered by the created_at column
 * @method     ChildTblentrcp[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentrcp objects filtered by the updated_at column
 * @method     ChildTblentrcp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentrcpQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentrcpQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentrcp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentrcpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentrcpQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentrcpQuery) {
            return $criteria;
        }
        $query = new ChildTblentrcpQuery();
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
     * @return ChildTblentrcp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentrcpTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentrcpTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentrcp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentrcp, idnentemp, idnentorg, idnentcln, uuid, fchinccln, tipentrcp, kgsentrcp, cntcjsrcp, rtnentcln, vldentcln, fnsentcln, created_at, updated_at FROM tblentrcp WHERE idnentrcp = :p0';
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
            /** @var ChildTblentrcp $obj */
            $obj = new ChildTblentrcp();
            $obj->hydrate($row);
            TblentrcpTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentrcp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTRCP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTRCP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idnentrcp column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentrcp(1234); // WHERE idnentrcp = 1234
     * $query->filterByIdnentrcp(array(12, 34)); // WHERE idnentrcp IN (12, 34)
     * $query->filterByIdnentrcp(array('min' => 12)); // WHERE idnentrcp > 12
     * </code>
     *
     * @param     mixed $idnentrcp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByIdnentrcp($idnentrcp = null, $comparison = null)
    {
        if (is_array($idnentrcp)) {
            $useMinMax = false;
            if (isset($idnentrcp['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTRCP, $idnentrcp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentrcp['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTRCP, $idnentrcp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTRCP, $idnentrcp, $comparison);
    }

    /**
     * Filter the query on the idnentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentemp(1234); // WHERE idnentemp = 1234
     * $query->filterByIdnentemp(array(12, 34)); // WHERE idnentemp IN (12, 34)
     * $query->filterByIdnentemp(array('min' => 12)); // WHERE idnentemp > 12
     * </code>
     *
     * @see       filterByTblentemp()
     *
     * @param     mixed $idnentemp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByIdnentemp($idnentemp = null, $comparison = null)
    {
        if (is_array($idnentemp)) {
            $useMinMax = false;
            if (isset($idnentemp['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTEMP, $idnentemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentemp['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTEMP, $idnentemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTEMP, $idnentemp, $comparison);
    }

    /**
     * Filter the query on the idnentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentorg(1234); // WHERE idnentorg = 1234
     * $query->filterByIdnentorg(array(12, 34)); // WHERE idnentorg IN (12, 34)
     * $query->filterByIdnentorg(array('min' => 12)); // WHERE idnentorg > 12
     * </code>
     *
     * @see       filterByTblentorg()
     *
     * @param     mixed $idnentorg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByIdnentorg($idnentorg = null, $comparison = null)
    {
        if (is_array($idnentorg)) {
            $useMinMax = false;
            if (isset($idnentorg['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTORG, $idnentorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentorg['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTORG, $idnentorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTORG, $idnentorg, $comparison);
    }

    /**
     * Filter the query on the idnentcln column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentcln(1234); // WHERE idnentcln = 1234
     * $query->filterByIdnentcln(array(12, 34)); // WHERE idnentcln IN (12, 34)
     * $query->filterByIdnentcln(array('min' => 12)); // WHERE idnentcln > 12
     * </code>
     *
     * @see       filterByTblentcln()
     *
     * @param     mixed $idnentcln The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByIdnentcln($idnentcln = null, $comparison = null)
    {
        if (is_array($idnentcln)) {
            $useMinMax = false;
            if (isset($idnentcln['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTCLN, $idnentcln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentcln['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTCLN, $idnentcln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTCLN, $idnentcln, $comparison);
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
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the fchinccln column
     *
     * Example usage:
     * <code>
     * $query->filterByFchinccln('2011-03-14'); // WHERE fchinccln = '2011-03-14'
     * $query->filterByFchinccln('now'); // WHERE fchinccln = '2011-03-14'
     * $query->filterByFchinccln(array('max' => 'yesterday')); // WHERE fchinccln > '2011-03-13'
     * </code>
     *
     * @param     mixed $fchinccln The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByFchinccln($fchinccln = null, $comparison = null)
    {
        if (is_array($fchinccln)) {
            $useMinMax = false;
            if (isset($fchinccln['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_FCHINCCLN, $fchinccln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fchinccln['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_FCHINCCLN, $fchinccln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_FCHINCCLN, $fchinccln, $comparison);
    }

    /**
     * Filter the query on the tipentrcp column
     *
     * Example usage:
     * <code>
     * $query->filterByTipentrcp('fooValue');   // WHERE tipentrcp = 'fooValue'
     * $query->filterByTipentrcp('%fooValue%', Criteria::LIKE); // WHERE tipentrcp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipentrcp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByTipentrcp($tipentrcp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipentrcp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_TIPENTRCP, $tipentrcp, $comparison);
    }

    /**
     * Filter the query on the kgsentrcp column
     *
     * Example usage:
     * <code>
     * $query->filterByKgsentrcp(1234); // WHERE kgsentrcp = 1234
     * $query->filterByKgsentrcp(array(12, 34)); // WHERE kgsentrcp IN (12, 34)
     * $query->filterByKgsentrcp(array('min' => 12)); // WHERE kgsentrcp > 12
     * </code>
     *
     * @param     mixed $kgsentrcp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByKgsentrcp($kgsentrcp = null, $comparison = null)
    {
        if (is_array($kgsentrcp)) {
            $useMinMax = false;
            if (isset($kgsentrcp['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_KGSENTRCP, $kgsentrcp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kgsentrcp['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_KGSENTRCP, $kgsentrcp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_KGSENTRCP, $kgsentrcp, $comparison);
    }

    /**
     * Filter the query on the cntcjsrcp column
     *
     * Example usage:
     * <code>
     * $query->filterByCntcjsrcp(1234); // WHERE cntcjsrcp = 1234
     * $query->filterByCntcjsrcp(array(12, 34)); // WHERE cntcjsrcp IN (12, 34)
     * $query->filterByCntcjsrcp(array('min' => 12)); // WHERE cntcjsrcp > 12
     * </code>
     *
     * @param     mixed $cntcjsrcp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByCntcjsrcp($cntcjsrcp = null, $comparison = null)
    {
        if (is_array($cntcjsrcp)) {
            $useMinMax = false;
            if (isset($cntcjsrcp['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_CNTCJSRCP, $cntcjsrcp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cntcjsrcp['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_CNTCJSRCP, $cntcjsrcp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_CNTCJSRCP, $cntcjsrcp, $comparison);
    }

    /**
     * Filter the query on the rtnentcln column
     *
     * Example usage:
     * <code>
     * $query->filterByRtnentcln(1234); // WHERE rtnentcln = 1234
     * $query->filterByRtnentcln(array(12, 34)); // WHERE rtnentcln IN (12, 34)
     * $query->filterByRtnentcln(array('min' => 12)); // WHERE rtnentcln > 12
     * </code>
     *
     * @param     mixed $rtnentcln The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByRtnentcln($rtnentcln = null, $comparison = null)
    {
        if (is_array($rtnentcln)) {
            $useMinMax = false;
            if (isset($rtnentcln['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_RTNENTCLN, $rtnentcln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rtnentcln['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_RTNENTCLN, $rtnentcln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_RTNENTCLN, $rtnentcln, $comparison);
    }

    /**
     * Filter the query on the vldentcln column
     *
     * Example usage:
     * <code>
     * $query->filterByVldentcln(true); // WHERE vldentcln = true
     * $query->filterByVldentcln('yes'); // WHERE vldentcln = true
     * </code>
     *
     * @param     boolean|string $vldentcln The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByVldentcln($vldentcln = null, $comparison = null)
    {
        if (is_string($vldentcln)) {
            $vldentcln = in_array(strtolower($vldentcln), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_VLDENTCLN, $vldentcln, $comparison);
    }

    /**
     * Filter the query on the fnsentcln column
     *
     * Example usage:
     * <code>
     * $query->filterByFnsentcln(true); // WHERE fnsentcln = true
     * $query->filterByFnsentcln('yes'); // WHERE fnsentcln = true
     * </code>
     *
     * @param     boolean|string $fnsentcln The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByFnsentcln($fnsentcln = null, $comparison = null)
    {
        if (is_string($fnsentcln)) {
            $fnsentcln = in_array(strtolower($fnsentcln), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_FNSENTCLN, $fnsentcln, $comparison);
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
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentrcpTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentrcpTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Tblentcln object
     *
     * @param \Tblentcln|ObjectCollection $tblentcln The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByTblentcln($tblentcln, $comparison = null)
    {
        if ($tblentcln instanceof \Tblentcln) {
            return $this
                ->addUsingAlias(TblentrcpTableMap::COL_IDNENTCLN, $tblentcln->getIdnentcln(), $comparison);
        } elseif ($tblentcln instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentrcpTableMap::COL_IDNENTCLN, $tblentcln->toKeyValue('PrimaryKey', 'Idnentcln'), $comparison);
        } else {
            throw new PropelException('filterByTblentcln() only accepts arguments of type \Tblentcln or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentcln relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function joinTblentcln($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentcln');

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
            $this->addJoinObject($join, 'Tblentcln');
        }

        return $this;
    }

    /**
     * Use the Tblentcln relation Tblentcln object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentclnQuery A secondary query class using the current class as primary query
     */
    public function useTblentclnQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentcln($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentcln', '\TblentclnQuery');
    }

    /**
     * Filter the query by a related \Tblentemp object
     *
     * @param \Tblentemp|ObjectCollection $tblentemp The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByTblentemp($tblentemp, $comparison = null)
    {
        if ($tblentemp instanceof \Tblentemp) {
            return $this
                ->addUsingAlias(TblentrcpTableMap::COL_IDNENTEMP, $tblentemp->getIdnentemp(), $comparison);
        } elseif ($tblentemp instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentrcpTableMap::COL_IDNENTEMP, $tblentemp->toKeyValue('PrimaryKey', 'Idnentemp'), $comparison);
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
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
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
     * @param \Tblentorg|ObjectCollection $tblentorg The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentrcpQuery The current query, for fluid interface
     */
    public function filterByTblentorg($tblentorg, $comparison = null)
    {
        if ($tblentorg instanceof \Tblentorg) {
            return $this
                ->addUsingAlias(TblentrcpTableMap::COL_IDNENTORG, $tblentorg->getIdnentorg(), $comparison);
        } elseif ($tblentorg instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentrcpTableMap::COL_IDNENTORG, $tblentorg->toKeyValue('PrimaryKey', 'Idnentorg'), $comparison);
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
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
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
     * @param   ChildTblentrcp $tblentrcp Object to remove from the list of results
     *
     * @return $this|ChildTblentrcpQuery The current query, for fluid interface
     */
    public function prune($tblentrcp = null)
    {
        if ($tblentrcp) {
            $this->addUsingAlias(TblentrcpTableMap::COL_IDNENTRCP, $tblentrcp->getIdnentrcp(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentrcp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrcpTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentrcpTableMap::clearInstancePool();
            TblentrcpTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentrcpTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentrcpTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentrcpTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentrcpTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentrcpQuery
