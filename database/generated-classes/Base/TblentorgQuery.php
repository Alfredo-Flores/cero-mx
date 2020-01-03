<?php

namespace Base;

use \Tblentorg as ChildTblentorg;
use \TblentorgQuery as ChildTblentorgQuery;
use \Exception;
use \PDO;
use Map\TblentorgTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentorg' table.
 *
 *
 *
 * @method     ChildTblentorgQuery orderByIdnentorg($order = Criteria::ASC) Order by the idnentorg column
 * @method     ChildTblentorgQuery orderByIdnusers($order = Criteria::ASC) Order by the idnusers column
 * @method     ChildTblentorgQuery orderByNamentorg($order = Criteria::ASC) Order by the namentorg column
 * @method     ChildTblentorgQuery orderByDirentorg($order = Criteria::ASC) Order by the direntorg column
 * @method     ChildTblentorgQuery orderByTelentorg($order = Criteria::ASC) Order by the telentorg column
 * @method     ChildTblentorgQuery orderByRfcentorg($order = Criteria::ASC) Order by the rfcentorg column
 * @method     ChildTblentorgQuery orderByCluentorg($order = Criteria::ASC) Order by the cluentorg column
 * @method     ChildTblentorgQuery orderByDonentorg($order = Criteria::ASC) Order by the donentorg column
 * @method     ChildTblentorgQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentorgQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentorgQuery groupByIdnentorg() Group by the idnentorg column
 * @method     ChildTblentorgQuery groupByIdnusers() Group by the idnusers column
 * @method     ChildTblentorgQuery groupByNamentorg() Group by the namentorg column
 * @method     ChildTblentorgQuery groupByDirentorg() Group by the direntorg column
 * @method     ChildTblentorgQuery groupByTelentorg() Group by the telentorg column
 * @method     ChildTblentorgQuery groupByRfcentorg() Group by the rfcentorg column
 * @method     ChildTblentorgQuery groupByCluentorg() Group by the cluentorg column
 * @method     ChildTblentorgQuery groupByDonentorg() Group by the donentorg column
 * @method     ChildTblentorgQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentorgQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentorgQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentorgQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentorgQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentorgQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentorgQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentorgQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentorgQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildTblentorgQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildTblentorgQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildTblentorgQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildTblentorgQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentorgQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentorgQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentorg findOne(ConnectionInterface $con = null) Return the first ChildTblentorg matching the query
 * @method     ChildTblentorg findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentorg matching the query, or a new ChildTblentorg object populated from the query conditions when no match is found
 *
 * @method     ChildTblentorg findOneByIdnentorg(int $idnentorg) Return the first ChildTblentorg filtered by the idnentorg column
 * @method     ChildTblentorg findOneByIdnusers(int $idnusers) Return the first ChildTblentorg filtered by the idnusers column
 * @method     ChildTblentorg findOneByNamentorg(string $namentorg) Return the first ChildTblentorg filtered by the namentorg column
 * @method     ChildTblentorg findOneByDirentorg(string $direntorg) Return the first ChildTblentorg filtered by the direntorg column
 * @method     ChildTblentorg findOneByTelentorg(string $telentorg) Return the first ChildTblentorg filtered by the telentorg column
 * @method     ChildTblentorg findOneByRfcentorg(string $rfcentorg) Return the first ChildTblentorg filtered by the rfcentorg column
 * @method     ChildTblentorg findOneByCluentorg(string $cluentorg) Return the first ChildTblentorg filtered by the cluentorg column
 * @method     ChildTblentorg findOneByDonentorg(string $donentorg) Return the first ChildTblentorg filtered by the donentorg column
 * @method     ChildTblentorg findOneByCreatedAt(string $created_at) Return the first ChildTblentorg filtered by the created_at column
 * @method     ChildTblentorg findOneByUpdatedAt(string $updated_at) Return the first ChildTblentorg filtered by the updated_at column *

 * @method     ChildTblentorg requirePk($key, ConnectionInterface $con = null) Return the ChildTblentorg by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOne(ConnectionInterface $con = null) Return the first ChildTblentorg matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentorg requireOneByIdnentorg(int $idnentorg) Return the first ChildTblentorg filtered by the idnentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByIdnusers(int $idnusers) Return the first ChildTblentorg filtered by the idnusers column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByNamentorg(string $namentorg) Return the first ChildTblentorg filtered by the namentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByDirentorg(string $direntorg) Return the first ChildTblentorg filtered by the direntorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByTelentorg(string $telentorg) Return the first ChildTblentorg filtered by the telentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByRfcentorg(string $rfcentorg) Return the first ChildTblentorg filtered by the rfcentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByCluentorg(string $cluentorg) Return the first ChildTblentorg filtered by the cluentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByDonentorg(string $donentorg) Return the first ChildTblentorg filtered by the donentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByCreatedAt(string $created_at) Return the first ChildTblentorg filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentorg filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentorg[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentorg objects based on current ModelCriteria
 * @method     ChildTblentorg[]|ObjectCollection findByIdnentorg(int $idnentorg) Return ChildTblentorg objects filtered by the idnentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByIdnusers(int $idnusers) Return ChildTblentorg objects filtered by the idnusers column
 * @method     ChildTblentorg[]|ObjectCollection findByNamentorg(string $namentorg) Return ChildTblentorg objects filtered by the namentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByDirentorg(string $direntorg) Return ChildTblentorg objects filtered by the direntorg column
 * @method     ChildTblentorg[]|ObjectCollection findByTelentorg(string $telentorg) Return ChildTblentorg objects filtered by the telentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByRfcentorg(string $rfcentorg) Return ChildTblentorg objects filtered by the rfcentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByCluentorg(string $cluentorg) Return ChildTblentorg objects filtered by the cluentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByDonentorg(string $donentorg) Return ChildTblentorg objects filtered by the donentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentorg objects filtered by the created_at column
 * @method     ChildTblentorg[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentorg objects filtered by the updated_at column
 * @method     ChildTblentorg[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentorgQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentorgQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentorg', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentorgQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentorgQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentorgQuery) {
            return $criteria;
        }
        $query = new ChildTblentorgQuery();
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
     * @return ChildTblentorg|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentorgTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentorgTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentorg A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentorg, idnusers, namentorg, direntorg, telentorg, rfcentorg, cluentorg, donentorg, created_at, updated_at FROM tblentorg WHERE idnentorg = :p0';
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
            /** @var ChildTblentorg $obj */
            $obj = new ChildTblentorg();
            $obj->hydrate($row);
            TblentorgTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentorg|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $keys, Criteria::IN);
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
     * @param     mixed $idnentorg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByIdnentorg($idnentorg = null, $comparison = null)
    {
        if (is_array($idnentorg)) {
            $useMinMax = false;
            if (isset($idnentorg['min'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $idnentorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentorg['max'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $idnentorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $idnentorg, $comparison);
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByIdnusers($idnusers = null, $comparison = null)
    {
        if (is_array($idnusers)) {
            $useMinMax = false;
            if (isset($idnusers['min'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_IDNUSERS, $idnusers['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnusers['max'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_IDNUSERS, $idnusers['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_IDNUSERS, $idnusers, $comparison);
    }

    /**
     * Filter the query on the namentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByNamentorg('fooValue');   // WHERE namentorg = 'fooValue'
     * $query->filterByNamentorg('%fooValue%', Criteria::LIKE); // WHERE namentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByNamentorg($namentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_NAMENTORG, $namentorg, $comparison);
    }

    /**
     * Filter the query on the direntorg column
     *
     * Example usage:
     * <code>
     * $query->filterByDirentorg('fooValue');   // WHERE direntorg = 'fooValue'
     * $query->filterByDirentorg('%fooValue%', Criteria::LIKE); // WHERE direntorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direntorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByDirentorg($direntorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direntorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_DIRENTORG, $direntorg, $comparison);
    }

    /**
     * Filter the query on the telentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByTelentorg('fooValue');   // WHERE telentorg = 'fooValue'
     * $query->filterByTelentorg('%fooValue%', Criteria::LIKE); // WHERE telentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByTelentorg($telentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_TELENTORG, $telentorg, $comparison);
    }

    /**
     * Filter the query on the rfcentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByRfcentorg('fooValue');   // WHERE rfcentorg = 'fooValue'
     * $query->filterByRfcentorg('%fooValue%', Criteria::LIKE); // WHERE rfcentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rfcentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByRfcentorg($rfcentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rfcentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_RFCENTORG, $rfcentorg, $comparison);
    }

    /**
     * Filter the query on the cluentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByCluentorg('fooValue');   // WHERE cluentorg = 'fooValue'
     * $query->filterByCluentorg('%fooValue%', Criteria::LIKE); // WHERE cluentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cluentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByCluentorg($cluentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cluentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_CLUENTORG, $cluentorg, $comparison);
    }

    /**
     * Filter the query on the donentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByDonentorg('fooValue');   // WHERE donentorg = 'fooValue'
     * $query->filterByDonentorg('%fooValue%', Criteria::LIKE); // WHERE donentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $donentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByDonentorg($donentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($donentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_DONENTORG, $donentorg, $comparison);
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(TblentorgTableMap::COL_IDNUSERS, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentorgTableMap::COL_IDNUSERS, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
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
     * @param   ChildTblentorg $tblentorg Object to remove from the list of results
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function prune($tblentorg = null)
    {
        if ($tblentorg) {
            $this->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $tblentorg->getIdnentorg(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentorg table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentorgTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentorgTableMap::clearInstancePool();
            TblentorgTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentorgTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentorgTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentorgTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentorgTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentorgQuery
