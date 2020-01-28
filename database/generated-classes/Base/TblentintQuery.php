<?php

namespace Base;

use \Tblentint as ChildTblentint;
use \TblentintQuery as ChildTblentintQuery;
use \Exception;
use \PDO;
use Map\TblentintTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentint' table.
 *
 *
 *
 * @method     ChildTblentintQuery orderByIdnentint($order = Criteria::ASC) Order by the idnentint column
 * @method     ChildTblentintQuery orderByIdnusers($order = Criteria::ASC) Order by the idnusers column
 * @method     ChildTblentintQuery orderByNamentint($order = Criteria::ASC) Order by the namentint column
 * @method     ChildTblentintQuery orderByDirentint($order = Criteria::ASC) Order by the direntint column
 * @method     ChildTblentintQuery orderByTelentint($order = Criteria::ASC) Order by the telentint column
 * @method     ChildTblentintQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentintQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentintQuery groupByIdnentint() Group by the idnentint column
 * @method     ChildTblentintQuery groupByIdnusers() Group by the idnusers column
 * @method     ChildTblentintQuery groupByNamentint() Group by the namentint column
 * @method     ChildTblentintQuery groupByDirentint() Group by the direntint column
 * @method     ChildTblentintQuery groupByTelentint() Group by the telentint column
 * @method     ChildTblentintQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentintQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentintQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentintQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentintQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentintQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentintQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentintQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentintQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildTblentintQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildTblentintQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildTblentintQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildTblentintQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentintQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentintQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentint findOne(ConnectionInterface $con = null) Return the first ChildTblentint matching the query
 * @method     ChildTblentint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentint matching the query, or a new ChildTblentint object populated from the query conditions when no match is found
 *
 * @method     ChildTblentint findOneByIdnentint(int $idnentint) Return the first ChildTblentint filtered by the idnentint column
 * @method     ChildTblentint findOneByIdnusers(int $idnusers) Return the first ChildTblentint filtered by the idnusers column
 * @method     ChildTblentint findOneByNamentint(string $namentint) Return the first ChildTblentint filtered by the namentint column
 * @method     ChildTblentint findOneByDirentint(string $direntint) Return the first ChildTblentint filtered by the direntint column
 * @method     ChildTblentint findOneByTelentint(string $telentint) Return the first ChildTblentint filtered by the telentint column
 * @method     ChildTblentint findOneByCreatedAt(string $created_at) Return the first ChildTblentint filtered by the created_at column
 * @method     ChildTblentint findOneByUpdatedAt(string $updated_at) Return the first ChildTblentint filtered by the updated_at column *

 * @method     ChildTblentint requirePk($key, ConnectionInterface $con = null) Return the ChildTblentint by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOne(ConnectionInterface $con = null) Return the first ChildTblentint matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentint requireOneByIdnentint(int $idnentint) Return the first ChildTblentint filtered by the idnentint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOneByIdnusers(int $idnusers) Return the first ChildTblentint filtered by the idnusers column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOneByNamentint(string $namentint) Return the first ChildTblentint filtered by the namentint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOneByDirentint(string $direntint) Return the first ChildTblentint filtered by the direntint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOneByTelentint(string $telentint) Return the first ChildTblentint filtered by the telentint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOneByCreatedAt(string $created_at) Return the first ChildTblentint filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentint requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentint filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentint[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentint objects based on current ModelCriteria
 * @method     ChildTblentint[]|ObjectCollection findByIdnentint(int $idnentint) Return ChildTblentint objects filtered by the idnentint column
 * @method     ChildTblentint[]|ObjectCollection findByIdnusers(int $idnusers) Return ChildTblentint objects filtered by the idnusers column
 * @method     ChildTblentint[]|ObjectCollection findByNamentint(string $namentint) Return ChildTblentint objects filtered by the namentint column
 * @method     ChildTblentint[]|ObjectCollection findByDirentint(string $direntint) Return ChildTblentint objects filtered by the direntint column
 * @method     ChildTblentint[]|ObjectCollection findByTelentint(string $telentint) Return ChildTblentint objects filtered by the telentint column
 * @method     ChildTblentint[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentint objects filtered by the created_at column
 * @method     ChildTblentint[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentint objects filtered by the updated_at column
 * @method     ChildTblentint[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentintQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentintQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentintQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentintQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentintQuery) {
            return $criteria;
        }
        $query = new ChildTblentintQuery();
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
     * @return ChildTblentint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentintTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentintTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentint A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentint, idnusers, namentint, direntint, telentint, created_at, updated_at FROM tblentint WHERE idnentint = :p0';
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
            /** @var ChildTblentint $obj */
            $obj = new ChildTblentint();
            $obj->hydrate($row);
            TblentintTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentint|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentintTableMap::COL_IDNENTINT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentintTableMap::COL_IDNENTINT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idnentint column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentint(1234); // WHERE idnentint = 1234
     * $query->filterByIdnentint(array(12, 34)); // WHERE idnentint IN (12, 34)
     * $query->filterByIdnentint(array('min' => 12)); // WHERE idnentint > 12
     * </code>
     *
     * @param     mixed $idnentint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByIdnentint($idnentint = null, $comparison = null)
    {
        if (is_array($idnentint)) {
            $useMinMax = false;
            if (isset($idnentint['min'])) {
                $this->addUsingAlias(TblentintTableMap::COL_IDNENTINT, $idnentint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentint['max'])) {
                $this->addUsingAlias(TblentintTableMap::COL_IDNENTINT, $idnentint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_IDNENTINT, $idnentint, $comparison);
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
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByIdnusers($idnusers = null, $comparison = null)
    {
        if (is_array($idnusers)) {
            $useMinMax = false;
            if (isset($idnusers['min'])) {
                $this->addUsingAlias(TblentintTableMap::COL_IDNUSERS, $idnusers['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnusers['max'])) {
                $this->addUsingAlias(TblentintTableMap::COL_IDNUSERS, $idnusers['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_IDNUSERS, $idnusers, $comparison);
    }

    /**
     * Filter the query on the namentint column
     *
     * Example usage:
     * <code>
     * $query->filterByNamentint('fooValue');   // WHERE namentint = 'fooValue'
     * $query->filterByNamentint('%fooValue%', Criteria::LIKE); // WHERE namentint LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namentint The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByNamentint($namentint = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namentint)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_NAMENTINT, $namentint, $comparison);
    }

    /**
     * Filter the query on the direntint column
     *
     * Example usage:
     * <code>
     * $query->filterByDirentint('fooValue');   // WHERE direntint = 'fooValue'
     * $query->filterByDirentint('%fooValue%', Criteria::LIKE); // WHERE direntint LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direntint The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByDirentint($direntint = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direntint)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_DIRENTINT, $direntint, $comparison);
    }

    /**
     * Filter the query on the telentint column
     *
     * Example usage:
     * <code>
     * $query->filterByTelentint('fooValue');   // WHERE telentint = 'fooValue'
     * $query->filterByTelentint('%fooValue%', Criteria::LIKE); // WHERE telentint LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telentint The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByTelentint($telentint = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telentint)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_TELENTINT, $telentint, $comparison);
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
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentintTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentintTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentintTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentintTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentintTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentintQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(TblentintTableMap::COL_IDNUSERS, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentintTableMap::COL_IDNUSERS, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildTblentintQuery The current query, for fluid interface
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
     * @param   ChildTblentint $tblentint Object to remove from the list of results
     *
     * @return $this|ChildTblentintQuery The current query, for fluid interface
     */
    public function prune($tblentint = null)
    {
        if ($tblentint) {
            $this->addUsingAlias(TblentintTableMap::COL_IDNENTINT, $tblentint->getIdnentint(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentintTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentintTableMap::clearInstancePool();
            TblentintTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentintTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentintTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentintTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentintTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentintQuery
