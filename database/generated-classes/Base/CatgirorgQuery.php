<?php

namespace Base;

use \Catgirorg as ChildCatgirorg;
use \CatgirorgQuery as ChildCatgirorgQuery;
use \Exception;
use \PDO;
use Map\CatgirorgTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'catgirorg' table.
 *
 *
 *
 * @method     ChildCatgirorgQuery orderByIdngirorg($order = Criteria::ASC) Order by the idngirorg column
 * @method     ChildCatgirorgQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildCatgirorgQuery orderByDscgirorg($order = Criteria::ASC) Order by the dscgirorg column
 * @method     ChildCatgirorgQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildCatgirorgQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildCatgirorgQuery groupByIdngirorg() Group by the idngirorg column
 * @method     ChildCatgirorgQuery groupByUuid() Group by the uuid column
 * @method     ChildCatgirorgQuery groupByDscgirorg() Group by the dscgirorg column
 * @method     ChildCatgirorgQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildCatgirorgQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildCatgirorgQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCatgirorgQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCatgirorgQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCatgirorgQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCatgirorgQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCatgirorgQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCatgirorgQuery leftJoinTblentemp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentemp relation
 * @method     ChildCatgirorgQuery rightJoinTblentemp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentemp relation
 * @method     ChildCatgirorgQuery innerJoinTblentemp($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentemp relation
 *
 * @method     ChildCatgirorgQuery joinWithTblentemp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentemp relation
 *
 * @method     ChildCatgirorgQuery leftJoinWithTblentemp() Adds a LEFT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildCatgirorgQuery rightJoinWithTblentemp() Adds a RIGHT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildCatgirorgQuery innerJoinWithTblentemp() Adds a INNER JOIN clause and with to the query using the Tblentemp relation
 *
 * @method     ChildCatgirorgQuery leftJoinTblentorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentorg relation
 * @method     ChildCatgirorgQuery rightJoinTblentorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentorg relation
 * @method     ChildCatgirorgQuery innerJoinTblentorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentorg relation
 *
 * @method     ChildCatgirorgQuery joinWithTblentorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentorg relation
 *
 * @method     ChildCatgirorgQuery leftJoinWithTblentorg() Adds a LEFT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildCatgirorgQuery rightJoinWithTblentorg() Adds a RIGHT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildCatgirorgQuery innerJoinWithTblentorg() Adds a INNER JOIN clause and with to the query using the Tblentorg relation
 *
 * @method     ChildCatgirorgQuery leftJoinTblentsrv($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentsrv relation
 * @method     ChildCatgirorgQuery rightJoinTblentsrv($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentsrv relation
 * @method     ChildCatgirorgQuery innerJoinTblentsrv($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentsrv relation
 *
 * @method     ChildCatgirorgQuery joinWithTblentsrv($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentsrv relation
 *
 * @method     ChildCatgirorgQuery leftJoinWithTblentsrv() Adds a LEFT JOIN clause and with to the query using the Tblentsrv relation
 * @method     ChildCatgirorgQuery rightJoinWithTblentsrv() Adds a RIGHT JOIN clause and with to the query using the Tblentsrv relation
 * @method     ChildCatgirorgQuery innerJoinWithTblentsrv() Adds a INNER JOIN clause and with to the query using the Tblentsrv relation
 *
 * @method     \TblentempQuery|\TblentorgQuery|\TblentsrvQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCatgirorg findOne(ConnectionInterface $con = null) Return the first ChildCatgirorg matching the query
 * @method     ChildCatgirorg findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCatgirorg matching the query, or a new ChildCatgirorg object populated from the query conditions when no match is found
 *
 * @method     ChildCatgirorg findOneByIdngirorg(string $idngirorg) Return the first ChildCatgirorg filtered by the idngirorg column
 * @method     ChildCatgirorg findOneByUuid(string $uuid) Return the first ChildCatgirorg filtered by the uuid column
 * @method     ChildCatgirorg findOneByDscgirorg(string $dscgirorg) Return the first ChildCatgirorg filtered by the dscgirorg column
 * @method     ChildCatgirorg findOneByCreatedAt(string $created_at) Return the first ChildCatgirorg filtered by the created_at column
 * @method     ChildCatgirorg findOneByUpdatedAt(string $updated_at) Return the first ChildCatgirorg filtered by the updated_at column *

 * @method     ChildCatgirorg requirePk($key, ConnectionInterface $con = null) Return the ChildCatgirorg by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatgirorg requireOne(ConnectionInterface $con = null) Return the first ChildCatgirorg matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCatgirorg requireOneByIdngirorg(string $idngirorg) Return the first ChildCatgirorg filtered by the idngirorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatgirorg requireOneByUuid(string $uuid) Return the first ChildCatgirorg filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatgirorg requireOneByDscgirorg(string $dscgirorg) Return the first ChildCatgirorg filtered by the dscgirorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatgirorg requireOneByCreatedAt(string $created_at) Return the first ChildCatgirorg filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCatgirorg requireOneByUpdatedAt(string $updated_at) Return the first ChildCatgirorg filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCatgirorg[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCatgirorg objects based on current ModelCriteria
 * @method     ChildCatgirorg[]|ObjectCollection findByIdngirorg(string $idngirorg) Return ChildCatgirorg objects filtered by the idngirorg column
 * @method     ChildCatgirorg[]|ObjectCollection findByUuid(string $uuid) Return ChildCatgirorg objects filtered by the uuid column
 * @method     ChildCatgirorg[]|ObjectCollection findByDscgirorg(string $dscgirorg) Return ChildCatgirorg objects filtered by the dscgirorg column
 * @method     ChildCatgirorg[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildCatgirorg objects filtered by the created_at column
 * @method     ChildCatgirorg[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildCatgirorg objects filtered by the updated_at column
 * @method     ChildCatgirorg[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CatgirorgQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CatgirorgQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Catgirorg', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCatgirorgQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCatgirorgQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCatgirorgQuery) {
            return $criteria;
        }
        $query = new ChildCatgirorgQuery();
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
     * @return ChildCatgirorg|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CatgirorgTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CatgirorgTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCatgirorg A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idngirorg, uuid, dscgirorg, created_at, updated_at FROM catgirorg WHERE idngirorg = :p0';
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
            /** @var ChildCatgirorg $obj */
            $obj = new ChildCatgirorg();
            $obj->hydrate($row);
            CatgirorgTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCatgirorg|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $keys, Criteria::IN);
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
     * @param     mixed $idngirorg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByIdngirorg($idngirorg = null, $comparison = null)
    {
        if (is_array($idngirorg)) {
            $useMinMax = false;
            if (isset($idngirorg['min'])) {
                $this->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $idngirorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idngirorg['max'])) {
                $this->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $idngirorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $idngirorg, $comparison);
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
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatgirorgTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the dscgirorg column
     *
     * Example usage:
     * <code>
     * $query->filterByDscgirorg('fooValue');   // WHERE dscgirorg = 'fooValue'
     * $query->filterByDscgirorg('%fooValue%', Criteria::LIKE); // WHERE dscgirorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dscgirorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByDscgirorg($dscgirorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dscgirorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatgirorgTableMap::COL_DSCGIRORG, $dscgirorg, $comparison);
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
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CatgirorgTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CatgirorgTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatgirorgTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CatgirorgTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CatgirorgTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CatgirorgTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Tblentemp object
     *
     * @param \Tblentemp|ObjectCollection $tblentemp the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByTblentemp($tblentemp, $comparison = null)
    {
        if ($tblentemp instanceof \Tblentemp) {
            return $this
                ->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $tblentemp->getIdngirorg(), $comparison);
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
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
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
     * @return ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByTblentorg($tblentorg, $comparison = null)
    {
        if ($tblentorg instanceof \Tblentorg) {
            return $this
                ->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $tblentorg->getIdngirorg(), $comparison);
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
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
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
     * Filter the query by a related \Tblentsrv object
     *
     * @param \Tblentsrv|ObjectCollection $tblentsrv the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCatgirorgQuery The current query, for fluid interface
     */
    public function filterByTblentsrv($tblentsrv, $comparison = null)
    {
        if ($tblentsrv instanceof \Tblentsrv) {
            return $this
                ->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $tblentsrv->getIdngirorg(), $comparison);
        } elseif ($tblentsrv instanceof ObjectCollection) {
            return $this
                ->useTblentsrvQuery()
                ->filterByPrimaryKeys($tblentsrv->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblentsrv() only accepts arguments of type \Tblentsrv or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentsrv relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function joinTblentsrv($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentsrv');

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
            $this->addJoinObject($join, 'Tblentsrv');
        }

        return $this;
    }

    /**
     * Use the Tblentsrv relation Tblentsrv object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentsrvQuery A secondary query class using the current class as primary query
     */
    public function useTblentsrvQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentsrv($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentsrv', '\TblentsrvQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCatgirorg $catgirorg Object to remove from the list of results
     *
     * @return $this|ChildCatgirorgQuery The current query, for fluid interface
     */
    public function prune($catgirorg = null)
    {
        if ($catgirorg) {
            $this->addUsingAlias(CatgirorgTableMap::COL_IDNGIRORG, $catgirorg->getIdngirorg(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the catgirorg table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CatgirorgTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CatgirorgTableMap::clearInstancePool();
            CatgirorgTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CatgirorgTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CatgirorgTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CatgirorgTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CatgirorgTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CatgirorgQuery
