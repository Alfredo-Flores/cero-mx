<?php

namespace Base;

use \Tblentdnc as ChildTblentdnc;
use \TblentdncQuery as ChildTblentdncQuery;
use \Exception;
use \PDO;
use Map\TblentdncTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentdnc' table.
 *
 *
 *
 * @method     ChildTblentdncQuery orderByIdentdnc($order = Criteria::ASC) Order by the identdnc column
 * @method     ChildTblentdncQuery orderByIdnentemp($order = Criteria::ASC) Order by the idnentemp column
 * @method     ChildTblentdncQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentdncQuery orderByDscentdnc($order = Criteria::ASC) Order by the dscentdnc column
 * @method     ChildTblentdncQuery orderByTipentdnc($order = Criteria::ASC) Order by the tipentdnc column
 * @method     ChildTblentdncQuery orderByKgsentdnc($order = Criteria::ASC) Order by the kgsentdnc column
 * @method     ChildTblentdncQuery orderByCntcjsdnc($order = Criteria::ASC) Order by the cntcjsdnc column
 * @method     ChildTblentdncQuery orderByTmprstdnc($order = Criteria::ASC) Order by the tmprstdnc column
 * @method     ChildTblentdncQuery orderByIdnentorg($order = Criteria::ASC) Order by the idnentorg column
 * @method     ChildTblentdncQuery orderByRqsentdnc($order = Criteria::ASC) Order by the rqsentdnc column
 * @method     ChildTblentdncQuery orderByClnentdnc($order = Criteria::ASC) Order by the clnentdnc column
 * @method     ChildTblentdncQuery orderByFnsentdnc($order = Criteria::ASC) Order by the fnsentdnc column
 * @method     ChildTblentdncQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentdncQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentdncQuery groupByIdentdnc() Group by the identdnc column
 * @method     ChildTblentdncQuery groupByIdnentemp() Group by the idnentemp column
 * @method     ChildTblentdncQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentdncQuery groupByDscentdnc() Group by the dscentdnc column
 * @method     ChildTblentdncQuery groupByTipentdnc() Group by the tipentdnc column
 * @method     ChildTblentdncQuery groupByKgsentdnc() Group by the kgsentdnc column
 * @method     ChildTblentdncQuery groupByCntcjsdnc() Group by the cntcjsdnc column
 * @method     ChildTblentdncQuery groupByTmprstdnc() Group by the tmprstdnc column
 * @method     ChildTblentdncQuery groupByIdnentorg() Group by the idnentorg column
 * @method     ChildTblentdncQuery groupByRqsentdnc() Group by the rqsentdnc column
 * @method     ChildTblentdncQuery groupByClnentdnc() Group by the clnentdnc column
 * @method     ChildTblentdncQuery groupByFnsentdnc() Group by the fnsentdnc column
 * @method     ChildTblentdncQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentdncQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentdncQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentdncQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentdncQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentdncQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentdncQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentdncQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentdncQuery leftJoinTblentemp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentdncQuery rightJoinTblentemp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentemp relation
 * @method     ChildTblentdncQuery innerJoinTblentemp($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentemp relation
 *
 * @method     ChildTblentdncQuery joinWithTblentemp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentdncQuery leftJoinWithTblentemp() Adds a LEFT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentdncQuery rightJoinWithTblentemp() Adds a RIGHT JOIN clause and with to the query using the Tblentemp relation
 * @method     ChildTblentdncQuery innerJoinWithTblentemp() Adds a INNER JOIN clause and with to the query using the Tblentemp relation
 *
 * @method     ChildTblentdncQuery leftJoinTblentorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentdncQuery rightJoinTblentorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentorg relation
 * @method     ChildTblentdncQuery innerJoinTblentorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentorg relation
 *
 * @method     ChildTblentdncQuery joinWithTblentorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentorg relation
 *
 * @method     ChildTblentdncQuery leftJoinWithTblentorg() Adds a LEFT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentdncQuery rightJoinWithTblentorg() Adds a RIGHT JOIN clause and with to the query using the Tblentorg relation
 * @method     ChildTblentdncQuery innerJoinWithTblentorg() Adds a INNER JOIN clause and with to the query using the Tblentorg relation
 *
 * @method     \TblentempQuery|\TblentorgQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentdnc findOne(ConnectionInterface $con = null) Return the first ChildTblentdnc matching the query
 * @method     ChildTblentdnc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentdnc matching the query, or a new ChildTblentdnc object populated from the query conditions when no match is found
 *
 * @method     ChildTblentdnc findOneByIdentdnc(string $identdnc) Return the first ChildTblentdnc filtered by the identdnc column
 * @method     ChildTblentdnc findOneByIdnentemp(string $idnentemp) Return the first ChildTblentdnc filtered by the idnentemp column
 * @method     ChildTblentdnc findOneByUuid(string $uuid) Return the first ChildTblentdnc filtered by the uuid column
 * @method     ChildTblentdnc findOneByDscentdnc(string $dscentdnc) Return the first ChildTblentdnc filtered by the dscentdnc column
 * @method     ChildTblentdnc findOneByTipentdnc(string $tipentdnc) Return the first ChildTblentdnc filtered by the tipentdnc column
 * @method     ChildTblentdnc findOneByKgsentdnc(double $kgsentdnc) Return the first ChildTblentdnc filtered by the kgsentdnc column
 * @method     ChildTblentdnc findOneByCntcjsdnc(int $cntcjsdnc) Return the first ChildTblentdnc filtered by the cntcjsdnc column
 * @method     ChildTblentdnc findOneByTmprstdnc(string $tmprstdnc) Return the first ChildTblentdnc filtered by the tmprstdnc column
 * @method     ChildTblentdnc findOneByIdnentorg(string $idnentorg) Return the first ChildTblentdnc filtered by the idnentorg column
 * @method     ChildTblentdnc findOneByRqsentdnc(boolean $rqsentdnc) Return the first ChildTblentdnc filtered by the rqsentdnc column
 * @method     ChildTblentdnc findOneByClnentdnc(boolean $clnentdnc) Return the first ChildTblentdnc filtered by the clnentdnc column
 * @method     ChildTblentdnc findOneByFnsentdnc(boolean $fnsentdnc) Return the first ChildTblentdnc filtered by the fnsentdnc column
 * @method     ChildTblentdnc findOneByCreatedAt(string $created_at) Return the first ChildTblentdnc filtered by the created_at column
 * @method     ChildTblentdnc findOneByUpdatedAt(string $updated_at) Return the first ChildTblentdnc filtered by the updated_at column *

 * @method     ChildTblentdnc requirePk($key, ConnectionInterface $con = null) Return the ChildTblentdnc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOne(ConnectionInterface $con = null) Return the first ChildTblentdnc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentdnc requireOneByIdentdnc(string $identdnc) Return the first ChildTblentdnc filtered by the identdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByIdnentemp(string $idnentemp) Return the first ChildTblentdnc filtered by the idnentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByUuid(string $uuid) Return the first ChildTblentdnc filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByDscentdnc(string $dscentdnc) Return the first ChildTblentdnc filtered by the dscentdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByTipentdnc(string $tipentdnc) Return the first ChildTblentdnc filtered by the tipentdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByKgsentdnc(double $kgsentdnc) Return the first ChildTblentdnc filtered by the kgsentdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByCntcjsdnc(int $cntcjsdnc) Return the first ChildTblentdnc filtered by the cntcjsdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByTmprstdnc(string $tmprstdnc) Return the first ChildTblentdnc filtered by the tmprstdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByIdnentorg(string $idnentorg) Return the first ChildTblentdnc filtered by the idnentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByRqsentdnc(boolean $rqsentdnc) Return the first ChildTblentdnc filtered by the rqsentdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByClnentdnc(boolean $clnentdnc) Return the first ChildTblentdnc filtered by the clnentdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByFnsentdnc(boolean $fnsentdnc) Return the first ChildTblentdnc filtered by the fnsentdnc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByCreatedAt(string $created_at) Return the first ChildTblentdnc filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentdnc requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentdnc filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentdnc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentdnc objects based on current ModelCriteria
 * @method     ChildTblentdnc[]|ObjectCollection findByIdentdnc(string $identdnc) Return ChildTblentdnc objects filtered by the identdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByIdnentemp(string $idnentemp) Return ChildTblentdnc objects filtered by the idnentemp column
 * @method     ChildTblentdnc[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentdnc objects filtered by the uuid column
 * @method     ChildTblentdnc[]|ObjectCollection findByDscentdnc(string $dscentdnc) Return ChildTblentdnc objects filtered by the dscentdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByTipentdnc(string $tipentdnc) Return ChildTblentdnc objects filtered by the tipentdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByKgsentdnc(double $kgsentdnc) Return ChildTblentdnc objects filtered by the kgsentdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByCntcjsdnc(int $cntcjsdnc) Return ChildTblentdnc objects filtered by the cntcjsdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByTmprstdnc(string $tmprstdnc) Return ChildTblentdnc objects filtered by the tmprstdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByIdnentorg(string $idnentorg) Return ChildTblentdnc objects filtered by the idnentorg column
 * @method     ChildTblentdnc[]|ObjectCollection findByRqsentdnc(boolean $rqsentdnc) Return ChildTblentdnc objects filtered by the rqsentdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByClnentdnc(boolean $clnentdnc) Return ChildTblentdnc objects filtered by the clnentdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByFnsentdnc(boolean $fnsentdnc) Return ChildTblentdnc objects filtered by the fnsentdnc column
 * @method     ChildTblentdnc[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentdnc objects filtered by the created_at column
 * @method     ChildTblentdnc[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentdnc objects filtered by the updated_at column
 * @method     ChildTblentdnc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentdncQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentdncQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentdnc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentdncQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentdncQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentdncQuery) {
            return $criteria;
        }
        $query = new ChildTblentdncQuery();
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
     * @return ChildTblentdnc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentdncTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentdncTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentdnc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT identdnc, idnentemp, uuid, dscentdnc, tipentdnc, kgsentdnc, cntcjsdnc, tmprstdnc, idnentorg, rqsentdnc, clnentdnc, fnsentdnc, created_at, updated_at FROM tblentdnc WHERE identdnc = :p0';
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
            /** @var ChildTblentdnc $obj */
            $obj = new ChildTblentdnc();
            $obj->hydrate($row);
            TblentdncTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentdnc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentdncTableMap::COL_IDENTDNC, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentdncTableMap::COL_IDENTDNC, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the identdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentdnc(1234); // WHERE identdnc = 1234
     * $query->filterByIdentdnc(array(12, 34)); // WHERE identdnc IN (12, 34)
     * $query->filterByIdentdnc(array('min' => 12)); // WHERE identdnc > 12
     * </code>
     *
     * @param     mixed $identdnc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByIdentdnc($identdnc = null, $comparison = null)
    {
        if (is_array($identdnc)) {
            $useMinMax = false;
            if (isset($identdnc['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_IDENTDNC, $identdnc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($identdnc['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_IDENTDNC, $identdnc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_IDENTDNC, $identdnc, $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByIdnentemp($idnentemp = null, $comparison = null)
    {
        if (is_array($idnentemp)) {
            $useMinMax = false;
            if (isset($idnentemp['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_IDNENTEMP, $idnentemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentemp['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_IDNENTEMP, $idnentemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_IDNENTEMP, $idnentemp, $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the dscentdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByDscentdnc('fooValue');   // WHERE dscentdnc = 'fooValue'
     * $query->filterByDscentdnc('%fooValue%', Criteria::LIKE); // WHERE dscentdnc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dscentdnc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByDscentdnc($dscentdnc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dscentdnc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_DSCENTDNC, $dscentdnc, $comparison);
    }

    /**
     * Filter the query on the tipentdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByTipentdnc('fooValue');   // WHERE tipentdnc = 'fooValue'
     * $query->filterByTipentdnc('%fooValue%', Criteria::LIKE); // WHERE tipentdnc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipentdnc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByTipentdnc($tipentdnc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipentdnc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_TIPENTDNC, $tipentdnc, $comparison);
    }

    /**
     * Filter the query on the kgsentdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByKgsentdnc(1234); // WHERE kgsentdnc = 1234
     * $query->filterByKgsentdnc(array(12, 34)); // WHERE kgsentdnc IN (12, 34)
     * $query->filterByKgsentdnc(array('min' => 12)); // WHERE kgsentdnc > 12
     * </code>
     *
     * @param     mixed $kgsentdnc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByKgsentdnc($kgsentdnc = null, $comparison = null)
    {
        if (is_array($kgsentdnc)) {
            $useMinMax = false;
            if (isset($kgsentdnc['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_KGSENTDNC, $kgsentdnc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kgsentdnc['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_KGSENTDNC, $kgsentdnc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_KGSENTDNC, $kgsentdnc, $comparison);
    }

    /**
     * Filter the query on the cntcjsdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByCntcjsdnc(1234); // WHERE cntcjsdnc = 1234
     * $query->filterByCntcjsdnc(array(12, 34)); // WHERE cntcjsdnc IN (12, 34)
     * $query->filterByCntcjsdnc(array('min' => 12)); // WHERE cntcjsdnc > 12
     * </code>
     *
     * @param     mixed $cntcjsdnc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByCntcjsdnc($cntcjsdnc = null, $comparison = null)
    {
        if (is_array($cntcjsdnc)) {
            $useMinMax = false;
            if (isset($cntcjsdnc['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_CNTCJSDNC, $cntcjsdnc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cntcjsdnc['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_CNTCJSDNC, $cntcjsdnc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_CNTCJSDNC, $cntcjsdnc, $comparison);
    }

    /**
     * Filter the query on the tmprstdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByTmprstdnc('2011-03-14'); // WHERE tmprstdnc = '2011-03-14'
     * $query->filterByTmprstdnc('now'); // WHERE tmprstdnc = '2011-03-14'
     * $query->filterByTmprstdnc(array('max' => 'yesterday')); // WHERE tmprstdnc > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmprstdnc The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByTmprstdnc($tmprstdnc = null, $comparison = null)
    {
        if (is_array($tmprstdnc)) {
            $useMinMax = false;
            if (isset($tmprstdnc['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_TMPRSTDNC, $tmprstdnc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmprstdnc['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_TMPRSTDNC, $tmprstdnc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_TMPRSTDNC, $tmprstdnc, $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByIdnentorg($idnentorg = null, $comparison = null)
    {
        if (is_array($idnentorg)) {
            $useMinMax = false;
            if (isset($idnentorg['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_IDNENTORG, $idnentorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentorg['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_IDNENTORG, $idnentorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_IDNENTORG, $idnentorg, $comparison);
    }

    /**
     * Filter the query on the rqsentdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByRqsentdnc(true); // WHERE rqsentdnc = true
     * $query->filterByRqsentdnc('yes'); // WHERE rqsentdnc = true
     * </code>
     *
     * @param     boolean|string $rqsentdnc The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByRqsentdnc($rqsentdnc = null, $comparison = null)
    {
        if (is_string($rqsentdnc)) {
            $rqsentdnc = in_array(strtolower($rqsentdnc), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_RQSENTDNC, $rqsentdnc, $comparison);
    }

    /**
     * Filter the query on the clnentdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByClnentdnc(true); // WHERE clnentdnc = true
     * $query->filterByClnentdnc('yes'); // WHERE clnentdnc = true
     * </code>
     *
     * @param     boolean|string $clnentdnc The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByClnentdnc($clnentdnc = null, $comparison = null)
    {
        if (is_string($clnentdnc)) {
            $clnentdnc = in_array(strtolower($clnentdnc), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_CLNENTDNC, $clnentdnc, $comparison);
    }

    /**
     * Filter the query on the fnsentdnc column
     *
     * Example usage:
     * <code>
     * $query->filterByFnsentdnc(true); // WHERE fnsentdnc = true
     * $query->filterByFnsentdnc('yes'); // WHERE fnsentdnc = true
     * </code>
     *
     * @param     boolean|string $fnsentdnc The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByFnsentdnc($fnsentdnc = null, $comparison = null)
    {
        if (is_string($fnsentdnc)) {
            $fnsentdnc = in_array(strtolower($fnsentdnc), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_FNSENTDNC, $fnsentdnc, $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentdncTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentdncTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Tblentemp object
     *
     * @param \Tblentemp|ObjectCollection $tblentemp The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByTblentemp($tblentemp, $comparison = null)
    {
        if ($tblentemp instanceof \Tblentemp) {
            return $this
                ->addUsingAlias(TblentdncTableMap::COL_IDNENTEMP, $tblentemp->getIdnentemp(), $comparison);
        } elseif ($tblentemp instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentdncTableMap::COL_IDNENTEMP, $tblentemp->toKeyValue('PrimaryKey', 'Idnentemp'), $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
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
     * @return ChildTblentdncQuery The current query, for fluid interface
     */
    public function filterByTblentorg($tblentorg, $comparison = null)
    {
        if ($tblentorg instanceof \Tblentorg) {
            return $this
                ->addUsingAlias(TblentdncTableMap::COL_IDNENTORG, $tblentorg->getIdnentorg(), $comparison);
        } elseif ($tblentorg instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentdncTableMap::COL_IDNENTORG, $tblentorg->toKeyValue('PrimaryKey', 'Idnentorg'), $comparison);
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
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
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
     * @param   ChildTblentdnc $tblentdnc Object to remove from the list of results
     *
     * @return $this|ChildTblentdncQuery The current query, for fluid interface
     */
    public function prune($tblentdnc = null)
    {
        if ($tblentdnc) {
            $this->addUsingAlias(TblentdncTableMap::COL_IDENTDNC, $tblentdnc->getIdentdnc(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentdnc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentdncTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentdncTableMap::clearInstancePool();
            TblentdncTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentdncTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentdncTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentdncTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentdncTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentdncQuery
