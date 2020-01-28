<?php

namespace Base;

use \Cattipsrv as ChildCattipsrv;
use \CattipsrvQuery as ChildCattipsrvQuery;
use \Exception;
use \PDO;
use Map\CattipsrvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cattipsrv' table.
 *
 *
 *
 * @method     ChildCattipsrvQuery orderByIdntipsrv($order = Criteria::ASC) Order by the idntipsrv column
 * @method     ChildCattipsrvQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildCattipsrvQuery orderByDsctipsrv($order = Criteria::ASC) Order by the dsctipsrv column
 * @method     ChildCattipsrvQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildCattipsrvQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildCattipsrvQuery groupByIdntipsrv() Group by the idntipsrv column
 * @method     ChildCattipsrvQuery groupByUuid() Group by the uuid column
 * @method     ChildCattipsrvQuery groupByDsctipsrv() Group by the dsctipsrv column
 * @method     ChildCattipsrvQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildCattipsrvQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildCattipsrvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCattipsrvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCattipsrvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCattipsrvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCattipsrvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCattipsrvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCattipsrvQuery leftJoinTblentsrv($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentsrv relation
 * @method     ChildCattipsrvQuery rightJoinTblentsrv($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentsrv relation
 * @method     ChildCattipsrvQuery innerJoinTblentsrv($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentsrv relation
 *
 * @method     ChildCattipsrvQuery joinWithTblentsrv($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentsrv relation
 *
 * @method     ChildCattipsrvQuery leftJoinWithTblentsrv() Adds a LEFT JOIN clause and with to the query using the Tblentsrv relation
 * @method     ChildCattipsrvQuery rightJoinWithTblentsrv() Adds a RIGHT JOIN clause and with to the query using the Tblentsrv relation
 * @method     ChildCattipsrvQuery innerJoinWithTblentsrv() Adds a INNER JOIN clause and with to the query using the Tblentsrv relation
 *
 * @method     \TblentsrvQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCattipsrv findOne(ConnectionInterface $con = null) Return the first ChildCattipsrv matching the query
 * @method     ChildCattipsrv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCattipsrv matching the query, or a new ChildCattipsrv object populated from the query conditions when no match is found
 *
 * @method     ChildCattipsrv findOneByIdntipsrv(string $idntipsrv) Return the first ChildCattipsrv filtered by the idntipsrv column
 * @method     ChildCattipsrv findOneByUuid(string $uuid) Return the first ChildCattipsrv filtered by the uuid column
 * @method     ChildCattipsrv findOneByDsctipsrv(string $dsctipsrv) Return the first ChildCattipsrv filtered by the dsctipsrv column
 * @method     ChildCattipsrv findOneByCreatedAt(string $created_at) Return the first ChildCattipsrv filtered by the created_at column
 * @method     ChildCattipsrv findOneByUpdatedAt(string $updated_at) Return the first ChildCattipsrv filtered by the updated_at column *

 * @method     ChildCattipsrv requirePk($key, ConnectionInterface $con = null) Return the ChildCattipsrv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCattipsrv requireOne(ConnectionInterface $con = null) Return the first ChildCattipsrv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCattipsrv requireOneByIdntipsrv(string $idntipsrv) Return the first ChildCattipsrv filtered by the idntipsrv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCattipsrv requireOneByUuid(string $uuid) Return the first ChildCattipsrv filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCattipsrv requireOneByDsctipsrv(string $dsctipsrv) Return the first ChildCattipsrv filtered by the dsctipsrv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCattipsrv requireOneByCreatedAt(string $created_at) Return the first ChildCattipsrv filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCattipsrv requireOneByUpdatedAt(string $updated_at) Return the first ChildCattipsrv filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCattipsrv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCattipsrv objects based on current ModelCriteria
 * @method     ChildCattipsrv[]|ObjectCollection findByIdntipsrv(string $idntipsrv) Return ChildCattipsrv objects filtered by the idntipsrv column
 * @method     ChildCattipsrv[]|ObjectCollection findByUuid(string $uuid) Return ChildCattipsrv objects filtered by the uuid column
 * @method     ChildCattipsrv[]|ObjectCollection findByDsctipsrv(string $dsctipsrv) Return ChildCattipsrv objects filtered by the dsctipsrv column
 * @method     ChildCattipsrv[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildCattipsrv objects filtered by the created_at column
 * @method     ChildCattipsrv[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildCattipsrv objects filtered by the updated_at column
 * @method     ChildCattipsrv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CattipsrvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CattipsrvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cerodb', $modelName = '\\Cattipsrv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCattipsrvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCattipsrvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCattipsrvQuery) {
            return $criteria;
        }
        $query = new ChildCattipsrvQuery();
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
     * @return ChildCattipsrv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CattipsrvTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CattipsrvTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCattipsrv A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idntipsrv, uuid, dsctipsrv, created_at, updated_at FROM cattipsrv WHERE idntipsrv = :p0';
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
            /** @var ChildCattipsrv $obj */
            $obj = new ChildCattipsrv();
            $obj->hydrate($row);
            CattipsrvTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCattipsrv|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $keys, Criteria::IN);
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
     * @param     mixed $idntipsrv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByIdntipsrv($idntipsrv = null, $comparison = null)
    {
        if (is_array($idntipsrv)) {
            $useMinMax = false;
            if (isset($idntipsrv['min'])) {
                $this->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $idntipsrv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idntipsrv['max'])) {
                $this->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $idntipsrv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $idntipsrv, $comparison);
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
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CattipsrvTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the dsctipsrv column
     *
     * Example usage:
     * <code>
     * $query->filterByDsctipsrv('fooValue');   // WHERE dsctipsrv = 'fooValue'
     * $query->filterByDsctipsrv('%fooValue%', Criteria::LIKE); // WHERE dsctipsrv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dsctipsrv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByDsctipsrv($dsctipsrv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dsctipsrv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CattipsrvTableMap::COL_DSCTIPSRV, $dsctipsrv, $comparison);
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
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CattipsrvTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CattipsrvTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CattipsrvTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CattipsrvTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CattipsrvTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CattipsrvTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Tblentsrv object
     *
     * @param \Tblentsrv|ObjectCollection $tblentsrv the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCattipsrvQuery The current query, for fluid interface
     */
    public function filterByTblentsrv($tblentsrv, $comparison = null)
    {
        if ($tblentsrv instanceof \Tblentsrv) {
            return $this
                ->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $tblentsrv->getIdntipsrv(), $comparison);
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
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
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
     * @param   ChildCattipsrv $cattipsrv Object to remove from the list of results
     *
     * @return $this|ChildCattipsrvQuery The current query, for fluid interface
     */
    public function prune($cattipsrv = null)
    {
        if ($cattipsrv) {
            $this->addUsingAlias(CattipsrvTableMap::COL_IDNTIPSRV, $cattipsrv->getIdntipsrv(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cattipsrv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CattipsrvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CattipsrvTableMap::clearInstancePool();
            CattipsrvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CattipsrvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CattipsrvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CattipsrvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CattipsrvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CattipsrvQuery
