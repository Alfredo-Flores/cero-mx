<?php

namespace Base;

use \Tblentsrv as ChildTblentsrv;
use \TblentsrvQuery as ChildTblentsrvQuery;
use \Exception;
use \PDO;
use Map\TblentsrvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentsrv' table.
 *
 *
 *
 * @method     ChildTblentsrvQuery orderByIdnentsrv($order = Criteria::ASC) Order by the idnentsrv column
 * @method     ChildTblentsrvQuery orderByIdntipsrv($order = Criteria::ASC) Order by the idntipsrv column
 * @method     ChildTblentsrvQuery orderByIdngirorg($order = Criteria::ASC) Order by the idngirorg column
 * @method     ChildTblentsrvQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentsrvQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentsrvQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentsrvQuery groupByIdnentsrv() Group by the idnentsrv column
 * @method     ChildTblentsrvQuery groupByIdntipsrv() Group by the idntipsrv column
 * @method     ChildTblentsrvQuery groupByIdngirorg() Group by the idngirorg column
 * @method     ChildTblentsrvQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentsrvQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentsrvQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentsrvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentsrvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentsrvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentsrvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentsrvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentsrvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentsrvQuery leftJoinCatgirorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Catgirorg relation
 * @method     ChildTblentsrvQuery rightJoinCatgirorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Catgirorg relation
 * @method     ChildTblentsrvQuery innerJoinCatgirorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Catgirorg relation
 *
 * @method     ChildTblentsrvQuery joinWithCatgirorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Catgirorg relation
 *
 * @method     ChildTblentsrvQuery leftJoinWithCatgirorg() Adds a LEFT JOIN clause and with to the query using the Catgirorg relation
 * @method     ChildTblentsrvQuery rightJoinWithCatgirorg() Adds a RIGHT JOIN clause and with to the query using the Catgirorg relation
 * @method     ChildTblentsrvQuery innerJoinWithCatgirorg() Adds a INNER JOIN clause and with to the query using the Catgirorg relation
 *
 * @method     ChildTblentsrvQuery leftJoinCattipsrv($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cattipsrv relation
 * @method     ChildTblentsrvQuery rightJoinCattipsrv($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cattipsrv relation
 * @method     ChildTblentsrvQuery innerJoinCattipsrv($relationAlias = null) Adds a INNER JOIN clause to the query using the Cattipsrv relation
 *
 * @method     ChildTblentsrvQuery joinWithCattipsrv($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cattipsrv relation
 *
 * @method     ChildTblentsrvQuery leftJoinWithCattipsrv() Adds a LEFT JOIN clause and with to the query using the Cattipsrv relation
 * @method     ChildTblentsrvQuery rightJoinWithCattipsrv() Adds a RIGHT JOIN clause and with to the query using the Cattipsrv relation
 * @method     ChildTblentsrvQuery innerJoinWithCattipsrv() Adds a INNER JOIN clause and with to the query using the Cattipsrv relation
 *
 * @method     \CatgirorgQuery|\CattipsrvQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentsrv findOne(ConnectionInterface $con = null) Return the first ChildTblentsrv matching the query
 * @method     ChildTblentsrv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentsrv matching the query, or a new ChildTblentsrv object populated from the query conditions when no match is found
 *
 * @method     ChildTblentsrv findOneByIdnentsrv(string $idnentsrv) Return the first ChildTblentsrv filtered by the idnentsrv column
 * @method     ChildTblentsrv findOneByIdntipsrv(string $idntipsrv) Return the first ChildTblentsrv filtered by the idntipsrv column
 * @method     ChildTblentsrv findOneByIdngirorg(string $idngirorg) Return the first ChildTblentsrv filtered by the idngirorg column
 * @method     ChildTblentsrv findOneByUuid(string $uuid) Return the first ChildTblentsrv filtered by the uuid column
 * @method     ChildTblentsrv findOneByCreatedAt(string $created_at) Return the first ChildTblentsrv filtered by the created_at column
 * @method     ChildTblentsrv findOneByUpdatedAt(string $updated_at) Return the first ChildTblentsrv filtered by the updated_at column *

 * @method     ChildTblentsrv requirePk($key, ConnectionInterface $con = null) Return the ChildTblentsrv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentsrv requireOne(ConnectionInterface $con = null) Return the first ChildTblentsrv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentsrv requireOneByIdnentsrv(string $idnentsrv) Return the first ChildTblentsrv filtered by the idnentsrv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentsrv requireOneByIdntipsrv(string $idntipsrv) Return the first ChildTblentsrv filtered by the idntipsrv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentsrv requireOneByIdngirorg(string $idngirorg) Return the first ChildTblentsrv filtered by the idngirorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentsrv requireOneByUuid(string $uuid) Return the first ChildTblentsrv filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentsrv requireOneByCreatedAt(string $created_at) Return the first ChildTblentsrv filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentsrv requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentsrv filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentsrv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentsrv objects based on current ModelCriteria
 * @method     ChildTblentsrv[]|ObjectCollection findByIdnentsrv(string $idnentsrv) Return ChildTblentsrv objects filtered by the idnentsrv column
 * @method     ChildTblentsrv[]|ObjectCollection findByIdntipsrv(string $idntipsrv) Return ChildTblentsrv objects filtered by the idntipsrv column
 * @method     ChildTblentsrv[]|ObjectCollection findByIdngirorg(string $idngirorg) Return ChildTblentsrv objects filtered by the idngirorg column
 * @method     ChildTblentsrv[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentsrv objects filtered by the uuid column
 * @method     ChildTblentsrv[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentsrv objects filtered by the created_at column
 * @method     ChildTblentsrv[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentsrv objects filtered by the updated_at column
 * @method     ChildTblentsrv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentsrvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentsrvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentsrv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentsrvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentsrvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentsrvQuery) {
            return $criteria;
        }
        $query = new ChildTblentsrvQuery();
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
     * @return ChildTblentsrv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentsrvTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentsrvTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentsrv A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentsrv, idntipsrv, idngirorg, uuid, created_at, updated_at FROM tblentsrv WHERE idnentsrv = :p0';
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
            /** @var ChildTblentsrv $obj */
            $obj = new ChildTblentsrv();
            $obj->hydrate($row);
            TblentsrvTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentsrv|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentsrvTableMap::COL_IDNENTSRV, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentsrvTableMap::COL_IDNENTSRV, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idnentsrv column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentsrv(1234); // WHERE idnentsrv = 1234
     * $query->filterByIdnentsrv(array(12, 34)); // WHERE idnentsrv IN (12, 34)
     * $query->filterByIdnentsrv(array('min' => 12)); // WHERE idnentsrv > 12
     * </code>
     *
     * @param     mixed $idnentsrv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByIdnentsrv($idnentsrv = null, $comparison = null)
    {
        if (is_array($idnentsrv)) {
            $useMinMax = false;
            if (isset($idnentsrv['min'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_IDNENTSRV, $idnentsrv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentsrv['max'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_IDNENTSRV, $idnentsrv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentsrvTableMap::COL_IDNENTSRV, $idnentsrv, $comparison);
    }

    /**
     * Filter the query on the idntipsrv column
     *
     * Example usage:
     * <code>
     * $query->filterByIdntipsrv(1234); // WHERE idntipsrv = 1234
     * $query->filterByIdntipsrv(array(12, 34)); // WHERE idntipsrv IN (12, 34)
     * $query->filterByIdntipsrv(array('min' => 12)); // WHERE idntipsrv > 12
     * </code>
     *
     * @see       filterByCattipsrv()
     *
     * @param     mixed $idntipsrv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByIdntipsrv($idntipsrv = null, $comparison = null)
    {
        if (is_array($idntipsrv)) {
            $useMinMax = false;
            if (isset($idntipsrv['min'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_IDNTIPSRV, $idntipsrv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idntipsrv['max'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_IDNTIPSRV, $idntipsrv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentsrvTableMap::COL_IDNTIPSRV, $idntipsrv, $comparison);
    }

    /**
     * Filter the query on the idngirorg column
     *
     * Example usage:
     * <code>
     * $query->filterByIdngirorg(1234); // WHERE idngirorg = 1234
     * $query->filterByIdngirorg(array(12, 34)); // WHERE idngirorg IN (12, 34)
     * $query->filterByIdngirorg(array('min' => 12)); // WHERE idngirorg > 12
     * </code>
     *
     * @see       filterByCatgirorg()
     *
     * @param     mixed $idngirorg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByIdngirorg($idngirorg = null, $comparison = null)
    {
        if (is_array($idngirorg)) {
            $useMinMax = false;
            if (isset($idngirorg['min'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_IDNGIRORG, $idngirorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idngirorg['max'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_IDNGIRORG, $idngirorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentsrvTableMap::COL_IDNGIRORG, $idngirorg, $comparison);
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
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentsrvTableMap::COL_UUID, $uuid, $comparison);
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
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentsrvTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentsrvTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentsrvTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Catgirorg object
     *
     * @param \Catgirorg|ObjectCollection $catgirorg The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByCatgirorg($catgirorg, $comparison = null)
    {
        if ($catgirorg instanceof \Catgirorg) {
            return $this
                ->addUsingAlias(TblentsrvTableMap::COL_IDNGIRORG, $catgirorg->getIdngirorg(), $comparison);
        } elseif ($catgirorg instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentsrvTableMap::COL_IDNGIRORG, $catgirorg->toKeyValue('PrimaryKey', 'Idngirorg'), $comparison);
        } else {
            throw new PropelException('filterByCatgirorg() only accepts arguments of type \Catgirorg or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Catgirorg relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function joinCatgirorg($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Catgirorg');

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
            $this->addJoinObject($join, 'Catgirorg');
        }

        return $this;
    }

    /**
     * Use the Catgirorg relation Catgirorg object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CatgirorgQuery A secondary query class using the current class as primary query
     */
    public function useCatgirorgQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCatgirorg($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Catgirorg', '\CatgirorgQuery');
    }

    /**
     * Filter the query by a related \Cattipsrv object
     *
     * @param \Cattipsrv|ObjectCollection $cattipsrv The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentsrvQuery The current query, for fluid interface
     */
    public function filterByCattipsrv($cattipsrv, $comparison = null)
    {
        if ($cattipsrv instanceof \Cattipsrv) {
            return $this
                ->addUsingAlias(TblentsrvTableMap::COL_IDNTIPSRV, $cattipsrv->getIdntipsrv(), $comparison);
        } elseif ($cattipsrv instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentsrvTableMap::COL_IDNTIPSRV, $cattipsrv->toKeyValue('PrimaryKey', 'Idntipsrv'), $comparison);
        } else {
            throw new PropelException('filterByCattipsrv() only accepts arguments of type \Cattipsrv or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cattipsrv relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function joinCattipsrv($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cattipsrv');

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
            $this->addJoinObject($join, 'Cattipsrv');
        }

        return $this;
    }

    /**
     * Use the Cattipsrv relation Cattipsrv object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CattipsrvQuery A secondary query class using the current class as primary query
     */
    public function useCattipsrvQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCattipsrv($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cattipsrv', '\CattipsrvQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblentsrv $tblentsrv Object to remove from the list of results
     *
     * @return $this|ChildTblentsrvQuery The current query, for fluid interface
     */
    public function prune($tblentsrv = null)
    {
        if ($tblentsrv) {
            $this->addUsingAlias(TblentsrvTableMap::COL_IDNENTSRV, $tblentsrv->getIdnentsrv(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentsrv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentsrvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentsrvTableMap::clearInstancePool();
            TblentsrvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentsrvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentsrvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentsrvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentsrvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentsrvQuery
