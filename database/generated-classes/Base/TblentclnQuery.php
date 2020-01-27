<?php

namespace Base;

use \Tblentcln as ChildTblentcln;
use \TblentclnQuery as ChildTblentclnQuery;
use \Exception;
use \PDO;
use Map\TblentclnTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentcln' table.
 *
 *
 *
 * @method     ChildTblentclnQuery orderByIdnentcln($order = Criteria::ASC) Order by the idnentcln column
 * @method     ChildTblentclnQuery orderByIdnentemp($order = Criteria::ASC) Order by the idnentemp column
 * @method     ChildTblentclnQuery orderByIdnentorg($order = Criteria::ASC) Order by the idnentorg column
 * @method     ChildTblentclnQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentclnQuery orderByPrdentcln($order = Criteria::ASC) Order by the prdentcln column
 * @method     ChildTblentclnQuery orderByFchinccln($order = Criteria::ASC) Order by the fchinccln column
 * @method     ChildTblentclnQuery orderByFchfnlcln($order = Criteria::ASC) Order by the fchfnlcln column
 * @method     ChildTblentclnQuery orderByFnsentcln($order = Criteria::ASC) Order by the fnsentcln column
 * @method     ChildTblentclnQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentclnQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentclnQuery groupByIdnentcln() Group by the idnentcln column
 * @method     ChildTblentclnQuery groupByIdnentemp() Group by the idnentemp column
 * @method     ChildTblentclnQuery groupByIdnentorg() Group by the idnentorg column
 * @method     ChildTblentclnQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentclnQuery groupByPrdentcln() Group by the prdentcln column
 * @method     ChildTblentclnQuery groupByFchinccln() Group by the fchinccln column
 * @method     ChildTblentclnQuery groupByFchfnlcln() Group by the fchfnlcln column
 * @method     ChildTblentclnQuery groupByFnsentcln() Group by the fnsentcln column
 * @method     ChildTblentclnQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentclnQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentclnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentclnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentclnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentclnQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentclnQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentclnQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentclnQuery leftJoinTblentemp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentclnQuery rightJoinTblentemp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentclnQuery innerJoinTblentemp($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentemp relation
 *
 * @method     ChildTblentclnQuery joinWithTblentemp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentclnQuery leftJoinWithTblentemp() Adds a LEFT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentclnQuery rightJoinWithTblentemp() Adds a RIGHT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentclnQuery innerJoinWithTblentemp() Adds a INNER JOIN clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentclnQuery leftJoinTblentorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentclnQuery rightJoinTblentorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentclnQuery innerJoinTblentorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentorg relation
 *
 * @method     ChildTblentclnQuery joinWithTblentorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentorg relation
 *
 * @method     ChildTblentclnQuery leftJoinWithTblentorg() Adds a LEFT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentclnQuery rightJoinWithTblentorg() Adds a RIGHT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentclnQuery innerJoinWithTblentorg() Adds a INNER JOIN clause and with to the query using the Tblentorg relation
 *
 * @method     ChildTblentclnQuery leftJoinTblentrcp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentrcp relation
 * @method     ChildTblentclnQuery rightJoinTblentrcp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentrcp relation
 * @method     ChildTblentclnQuery innerJoinTblentrcp($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentrcp relation
 *
 * @method     ChildTblentclnQuery joinWithTblentrcp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentrcp relation
 *
 * @method     ChildTblentclnQuery leftJoinWithTblentrcp() Adds a LEFT JOIN clause and with to the query using the Tblentrcp relation
 * @method     ChildTblentclnQuery rightJoinWithTblentrcp() Adds a RIGHT JOIN clause and with to the query using the Tblentrcp relation
 * @method     ChildTblentclnQuery innerJoinWithTblentrcp() Adds a INNER JOIN clause and with to the query using the Tblentrcp relation
 *
 * @method     \TblentempQuery|\TblentorgQuery|\TblentrcpQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentcln findOne(ConnectionInterface $con = null) Return the first ChildTblentcln matching the query
 * @method     ChildTblentcln findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentcln matching the query, or a new ChildTblentcln object populated from the query conditions when no match is found
 *
 * @method     ChildTblentcln findOneByIdnentcln(string $idnentcln) Return the first ChildTblentcln filtered by the idnentcln column
 * @method     ChildTblentcln findOneByIdnentemp(string $idnentemp) Return the first ChildTblentcln filtered by the idnentemp column
 * @method     ChildTblentcln findOneByIdnentorg(string $idnentorg) Return the first ChildTblentcln filtered by the idnentorg column
 * @method     ChildTblentcln findOneByUuid(string $uuid) Return the first ChildTblentcln filtered by the uuid column
 * @method     ChildTblentcln findOneByPrdentcln(int $prdentcln) Return the first ChildTblentcln filtered by the prdentcln column
 * @method     ChildTblentcln findOneByFchinccln(string $fchinccln) Return the first ChildTblentcln filtered by the fchinccln column
 * @method     ChildTblentcln findOneByFchfnlcln(string $fchfnlcln) Return the first ChildTblentcln filtered by the fchfnlcln column
 * @method     ChildTblentcln findOneByFnsentcln(boolean $fnsentcln) Return the first ChildTblentcln filtered by the fnsentcln column
 * @method     ChildTblentcln findOneByCreatedAt(string $created_at) Return the first ChildTblentcln filtered by the created_at column
 * @method     ChildTblentcln findOneByUpdatedAt(string $updated_at) Return the first ChildTblentcln filtered by the updated_at column *

 * @method     ChildTblentcln requirePk($key, ConnectionInterface $con = null) Return the ChildTblentcln by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOne(ConnectionInterface $con = null) Return the first ChildTblentcln matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentcln requireOneByIdnentcln(string $idnentcln) Return the first ChildTblentcln filtered by the idnentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByIdnentemp(string $idnentemp) Return the first ChildTblentcln filtered by the idnentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByIdnentorg(string $idnentorg) Return the first ChildTblentcln filtered by the idnentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByUuid(string $uuid) Return the first ChildTblentcln filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByPrdentcln(int $prdentcln) Return the first ChildTblentcln filtered by the prdentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByFchinccln(string $fchinccln) Return the first ChildTblentcln filtered by the fchinccln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByFchfnlcln(string $fchfnlcln) Return the first ChildTblentcln filtered by the fchfnlcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByFnsentcln(boolean $fnsentcln) Return the first ChildTblentcln filtered by the fnsentcln column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByCreatedAt(string $created_at) Return the first ChildTblentcln filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentcln requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentcln filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentcln[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentcln objects based on current ModelCriteria
 * @method     ChildTblentcln[]|ObjectCollection findByIdnentcln(string $idnentcln) Return ChildTblentcln objects filtered by the idnentcln column
 * @method     ChildTblentcln[]|ObjectCollection findByIdnentemp(string $idnentemp) Return ChildTblentcln objects filtered by the idnentemp column
 * @method     ChildTblentcln[]|ObjectCollection findByIdnentorg(string $idnentorg) Return ChildTblentcln objects filtered by the idnentorg column
 * @method     ChildTblentcln[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentcln objects filtered by the uuid column
 * @method     ChildTblentcln[]|ObjectCollection findByPrdentcln(int $prdentcln) Return ChildTblentcln objects filtered by the prdentcln column
 * @method     ChildTblentcln[]|ObjectCollection findByFchinccln(string $fchinccln) Return ChildTblentcln objects filtered by the fchinccln column
 * @method     ChildTblentcln[]|ObjectCollection findByFchfnlcln(string $fchfnlcln) Return ChildTblentcln objects filtered by the fchfnlcln column
 * @method     ChildTblentcln[]|ObjectCollection findByFnsentcln(boolean $fnsentcln) Return ChildTblentcln objects filtered by the fnsentcln column
 * @method     ChildTblentcln[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentcln objects filtered by the created_at column
 * @method     ChildTblentcln[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentcln objects filtered by the updated_at column
 * @method     ChildTblentcln[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentclnQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentclnQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentcln', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentclnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentclnQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentclnQuery) {
            return $criteria;
        }
        $query = new ChildTblentclnQuery();
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
     * @return ChildTblentcln|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentclnTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentclnTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentcln A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentcln, idnentemp, idnentorg, uuid, prdentcln, fchinccln, fchfnlcln, fnsentcln, created_at, updated_at FROM tblentcln WHERE idnentcln = :p0';
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
            /** @var ChildTblentcln $obj */
            $obj = new ChildTblentcln();
            $obj->hydrate($row);
            TblentclnTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentcln|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $keys, Criteria::IN);
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
     * @param     mixed $idnentcln The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByIdnentcln($idnentcln = null, $comparison = null)
    {
        if (is_array($idnentcln)) {
            $useMinMax = false;
            if (isset($idnentcln['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $idnentcln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentcln['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $idnentcln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $idnentcln, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByIdnentemp($idnentemp = null, $comparison = null)
    {
        if (is_array($idnentemp)) {
            $useMinMax = false;
            if (isset($idnentemp['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_IDNENTEMP, $idnentemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentemp['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_IDNENTEMP, $idnentemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_IDNENTEMP, $idnentemp, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByIdnentorg($idnentorg = null, $comparison = null)
    {
        if (is_array($idnentorg)) {
            $useMinMax = false;
            if (isset($idnentorg['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_IDNENTORG, $idnentorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentorg['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_IDNENTORG, $idnentorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_IDNENTORG, $idnentorg, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the prdentcln column
     *
     * Example usage:
     * <code>
     * $query->filterByPrdentcln(1234); // WHERE prdentcln = 1234
     * $query->filterByPrdentcln(array(12, 34)); // WHERE prdentcln IN (12, 34)
     * $query->filterByPrdentcln(array('min' => 12)); // WHERE prdentcln > 12
     * </code>
     *
     * @param     mixed $prdentcln The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByPrdentcln($prdentcln = null, $comparison = null)
    {
        if (is_array($prdentcln)) {
            $useMinMax = false;
            if (isset($prdentcln['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_PRDENTCLN, $prdentcln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prdentcln['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_PRDENTCLN, $prdentcln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_PRDENTCLN, $prdentcln, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByFchinccln($fchinccln = null, $comparison = null)
    {
        if (is_array($fchinccln)) {
            $useMinMax = false;
            if (isset($fchinccln['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_FCHINCCLN, $fchinccln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fchinccln['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_FCHINCCLN, $fchinccln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_FCHINCCLN, $fchinccln, $comparison);
    }

    /**
     * Filter the query on the fchfnlcln column
     *
     * Example usage:
     * <code>
     * $query->filterByFchfnlcln('2011-03-14'); // WHERE fchfnlcln = '2011-03-14'
     * $query->filterByFchfnlcln('now'); // WHERE fchfnlcln = '2011-03-14'
     * $query->filterByFchfnlcln(array('max' => 'yesterday')); // WHERE fchfnlcln > '2011-03-13'
     * </code>
     *
     * @param     mixed $fchfnlcln The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByFchfnlcln($fchfnlcln = null, $comparison = null)
    {
        if (is_array($fchfnlcln)) {
            $useMinMax = false;
            if (isset($fchfnlcln['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_FCHFNLCLN, $fchfnlcln['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fchfnlcln['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_FCHFNLCLN, $fchfnlcln['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_FCHFNLCLN, $fchfnlcln, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByFnsentcln($fnsentcln = null, $comparison = null)
    {
        if (is_string($fnsentcln)) {
            $fnsentcln = in_array(strtolower($fnsentcln), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_FNSENTCLN, $fnsentcln, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentclnTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentclnTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Tblentemp object
     *
     * @param \Tblentemp|ObjectCollection $tblentemp The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByTblentemp($tblentemp, $comparison = null)
    {
        if ($tblentemp instanceof \Tblentemp) {
            return $this
                ->addUsingAlias(TblentclnTableMap::COL_IDNENTEMP, $tblentemp->getIdnentemp(), $comparison);
        } elseif ($tblentemp instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentclnTableMap::COL_IDNENTEMP, $tblentemp->toKeyValue('PrimaryKey', 'Idnentemp'), $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
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
     * @return ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByTblentorg($tblentorg, $comparison = null)
    {
        if ($tblentorg instanceof \Tblentorg) {
            return $this
                ->addUsingAlias(TblentclnTableMap::COL_IDNENTORG, $tblentorg->getIdnentorg(), $comparison);
        } elseif ($tblentorg instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentclnTableMap::COL_IDNENTORG, $tblentorg->toKeyValue('PrimaryKey', 'Idnentorg'), $comparison);
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
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
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
     * Filter the query by a related \Tblentrcp object
     *
     * @param \Tblentrcp|ObjectCollection $tblentrcp the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblentclnQuery The current query, for fluid interface
     */
    public function filterByTblentrcp($tblentrcp, $comparison = null)
    {
        if ($tblentrcp instanceof \Tblentrcp) {
            return $this
                ->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $tblentrcp->getIdnentcln(), $comparison);
        } elseif ($tblentrcp instanceof ObjectCollection) {
            return $this
                ->useTblentrcpQuery()
                ->filterByPrimaryKeys($tblentrcp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblentrcp() only accepts arguments of type \Tblentrcp or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentrcp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function joinTblentrcp($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentrcp');

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
            $this->addJoinObject($join, 'Tblentrcp');
        }

        return $this;
    }

    /**
     * Use the Tblentrcp relation Tblentrcp object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentrcpQuery A secondary query class using the current class as primary query
     */
    public function useTblentrcpQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentrcp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentrcp', '\TblentrcpQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblentcln $tblentcln Object to remove from the list of results
     *
     * @return $this|ChildTblentclnQuery The current query, for fluid interface
     */
    public function prune($tblentcln = null)
    {
        if ($tblentcln) {
            $this->addUsingAlias(TblentclnTableMap::COL_IDNENTCLN, $tblentcln->getIdnentcln(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentcln table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentclnTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentclnTableMap::clearInstancePool();
            TblentclnTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentclnTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentclnTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentclnTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentclnTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentclnQuery
