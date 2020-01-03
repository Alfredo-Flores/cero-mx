<?php

namespace Base;

use \Tblentbsn as ChildTblentbsn;
use \TblentbsnQuery as ChildTblentbsnQuery;
use \Exception;
use \PDO;
use Map\TblentbsnTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentbsn' table.
 *
 *
 *
 * @method     ChildTblentbsnQuery orderByIdnentbsn($order = Criteria::ASC) Order by the idnentbsn column
 * @method     ChildTblentbsnQuery orderByIdnusers($order = Criteria::ASC) Order by the idnusers column
 * @method     ChildTblentbsnQuery orderByNamentbsn($order = Criteria::ASC) Order by the namentbsn column
 * @method     ChildTblentbsnQuery orderByDirentbsn($order = Criteria::ASC) Order by the direntbsn column
 * @method     ChildTblentbsnQuery orderByTelentbsn($order = Criteria::ASC) Order by the telentbsn column
 * @method     ChildTblentbsnQuery orderByRfcentbsn($order = Criteria::ASC) Order by the rfcentbsn column
 * @method     ChildTblentbsnQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentbsnQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentbsnQuery groupByIdnentbsn() Group by the idnentbsn column
 * @method     ChildTblentbsnQuery groupByIdnusers() Group by the idnusers column
 * @method     ChildTblentbsnQuery groupByNamentbsn() Group by the namentbsn column
 * @method     ChildTblentbsnQuery groupByDirentbsn() Group by the direntbsn column
 * @method     ChildTblentbsnQuery groupByTelentbsn() Group by the telentbsn column
 * @method     ChildTblentbsnQuery groupByRfcentbsn() Group by the rfcentbsn column
 * @method     ChildTblentbsnQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentbsnQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentbsnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentbsnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentbsnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentbsnQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentbsnQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentbsnQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentbsnQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildTblentbsnQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildTblentbsnQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildTblentbsnQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildTblentbsnQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentbsnQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentbsnQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentbsn findOne(ConnectionInterface $con = null) Return the first ChildTblentbsn matching the query
 * @method     ChildTblentbsn findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentbsn matching the query, or a new ChildTblentbsn object populated from the query conditions when no match is found
 *
 * @method     ChildTblentbsn findOneByIdnentbsn(int $idnentbsn) Return the first ChildTblentbsn filtered by the idnentbsn column
 * @method     ChildTblentbsn findOneByIdnusers(int $idnusers) Return the first ChildTblentbsn filtered by the idnusers column
 * @method     ChildTblentbsn findOneByNamentbsn(string $namentbsn) Return the first ChildTblentbsn filtered by the namentbsn column
 * @method     ChildTblentbsn findOneByDirentbsn(string $direntbsn) Return the first ChildTblentbsn filtered by the direntbsn column
 * @method     ChildTblentbsn findOneByTelentbsn(string $telentbsn) Return the first ChildTblentbsn filtered by the telentbsn column
 * @method     ChildTblentbsn findOneByRfcentbsn(string $rfcentbsn) Return the first ChildTblentbsn filtered by the rfcentbsn column
 * @method     ChildTblentbsn findOneByCreatedAt(string $created_at) Return the first ChildTblentbsn filtered by the created_at column
 * @method     ChildTblentbsn findOneByUpdatedAt(string $updated_at) Return the first ChildTblentbsn filtered by the updated_at column *

 * @method     ChildTblentbsn requirePk($key, ConnectionInterface $con = null) Return the ChildTblentbsn by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOne(ConnectionInterface $con = null) Return the first ChildTblentbsn matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentbsn requireOneByIdnentbsn(int $idnentbsn) Return the first ChildTblentbsn filtered by the idnentbsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByIdnusers(int $idnusers) Return the first ChildTblentbsn filtered by the idnusers column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByNamentbsn(string $namentbsn) Return the first ChildTblentbsn filtered by the namentbsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByDirentbsn(string $direntbsn) Return the first ChildTblentbsn filtered by the direntbsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByTelentbsn(string $telentbsn) Return the first ChildTblentbsn filtered by the telentbsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByRfcentbsn(string $rfcentbsn) Return the first ChildTblentbsn filtered by the rfcentbsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByCreatedAt(string $created_at) Return the first ChildTblentbsn filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentbsn requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentbsn filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentbsn[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentbsn objects based on current ModelCriteria
 * @method     ChildTblentbsn[]|ObjectCollection findByIdnentbsn(int $idnentbsn) Return ChildTblentbsn objects filtered by the idnentbsn column
 * @method     ChildTblentbsn[]|ObjectCollection findByIdnusers(int $idnusers) Return ChildTblentbsn objects filtered by the idnusers column
 * @method     ChildTblentbsn[]|ObjectCollection findByNamentbsn(string $namentbsn) Return ChildTblentbsn objects filtered by the namentbsn column
 * @method     ChildTblentbsn[]|ObjectCollection findByDirentbsn(string $direntbsn) Return ChildTblentbsn objects filtered by the direntbsn column
 * @method     ChildTblentbsn[]|ObjectCollection findByTelentbsn(string $telentbsn) Return ChildTblentbsn objects filtered by the telentbsn column
 * @method     ChildTblentbsn[]|ObjectCollection findByRfcentbsn(string $rfcentbsn) Return ChildTblentbsn objects filtered by the rfcentbsn column
 * @method     ChildTblentbsn[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentbsn objects filtered by the created_at column
 * @method     ChildTblentbsn[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentbsn objects filtered by the updated_at column
 * @method     ChildTblentbsn[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentbsnQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentbsnQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentbsn', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentbsnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentbsnQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentbsnQuery) {
            return $criteria;
        }
        $query = new ChildTblentbsnQuery();
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
     * @return ChildTblentbsn|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentbsnTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentbsnTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentbsn A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentbsn, idnusers, namentbsn, direntbsn, telentbsn, rfcentbsn, created_at, updated_at FROM tblentbsn WHERE idnentbsn = :p0';
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
            /** @var ChildTblentbsn $obj */
            $obj = new ChildTblentbsn();
            $obj->hydrate($row);
            TblentbsnTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentbsn|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentbsnTableMap::COL_IDNENTBSN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentbsnTableMap::COL_IDNENTBSN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idnentbsn column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentbsn(1234); // WHERE idnentbsn = 1234
     * $query->filterByIdnentbsn(array(12, 34)); // WHERE idnentbsn IN (12, 34)
     * $query->filterByIdnentbsn(array('min' => 12)); // WHERE idnentbsn > 12
     * </code>
     *
     * @param     mixed $idnentbsn The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByIdnentbsn($idnentbsn = null, $comparison = null)
    {
        if (is_array($idnentbsn)) {
            $useMinMax = false;
            if (isset($idnentbsn['min'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_IDNENTBSN, $idnentbsn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentbsn['max'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_IDNENTBSN, $idnentbsn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_IDNENTBSN, $idnentbsn, $comparison);
    }

    /**
     * Filter the query on the idnusers column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnusers(1234); // WHERE idnusers = 1234
     * $query->filterByIdnusers(array(12, 34)); // WHERE idnusers IN (12, 34)
     * $query->filterByIdnusers(array('min' => 12)); // WHERE idnusers > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $idnusers The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByIdnusers($idnusers = null, $comparison = null)
    {
        if (is_array($idnusers)) {
            $useMinMax = false;
            if (isset($idnusers['min'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_IDNUSERS, $idnusers['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnusers['max'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_IDNUSERS, $idnusers['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_IDNUSERS, $idnusers, $comparison);
    }

    /**
     * Filter the query on the namentbsn column
     *
     * Example usage:
     * <code>
     * $query->filterByNamentbsn('fooValue');   // WHERE namentbsn = 'fooValue'
     * $query->filterByNamentbsn('%fooValue%', Criteria::LIKE); // WHERE namentbsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namentbsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByNamentbsn($namentbsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namentbsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_NAMENTBSN, $namentbsn, $comparison);
    }

    /**
     * Filter the query on the direntbsn column
     *
     * Example usage:
     * <code>
     * $query->filterByDirentbsn('fooValue');   // WHERE direntbsn = 'fooValue'
     * $query->filterByDirentbsn('%fooValue%', Criteria::LIKE); // WHERE direntbsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direntbsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByDirentbsn($direntbsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direntbsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_DIRENTBSN, $direntbsn, $comparison);
    }

    /**
     * Filter the query on the telentbsn column
     *
     * Example usage:
     * <code>
     * $query->filterByTelentbsn('fooValue');   // WHERE telentbsn = 'fooValue'
     * $query->filterByTelentbsn('%fooValue%', Criteria::LIKE); // WHERE telentbsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telentbsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByTelentbsn($telentbsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telentbsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_TELENTBSN, $telentbsn, $comparison);
    }

    /**
     * Filter the query on the rfcentbsn column
     *
     * Example usage:
     * <code>
     * $query->filterByRfcentbsn('fooValue');   // WHERE rfcentbsn = 'fooValue'
     * $query->filterByRfcentbsn('%fooValue%', Criteria::LIKE); // WHERE rfcentbsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rfcentbsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByRfcentbsn($rfcentbsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rfcentbsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_RFCENTBSN, $rfcentbsn, $comparison);
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
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentbsnTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentbsnTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentbsnQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(TblentbsnTableMap::COL_IDNUSERS, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentbsnTableMap::COL_IDNUSERS, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\UsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblentbsn $tblentbsn Object to remove from the list of results
     *
     * @return $this|ChildTblentbsnQuery The current query, for fluid interface
     */
    public function prune($tblentbsn = null)
    {
        if ($tblentbsn) {
            $this->addUsingAlias(TblentbsnTableMap::COL_IDNENTBSN, $tblentbsn->getIdnentbsn(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentbsn table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentbsnTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentbsnTableMap::clearInstancePool();
            TblentbsnTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentbsnTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentbsnTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentbsnTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentbsnTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentbsnQuery
