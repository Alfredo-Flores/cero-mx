<?php

namespace Base;

use \Tblentemp as ChildTblentemp;
use \TblentempQuery as ChildTblentempQuery;
use \Exception;
use \PDO;
use Map\TblentempTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tblentemp' table.
 *
 *
 *
 * @method     ChildTblentempQuery orderByIdnentemp($order = Criteria::ASC) Order by the idnentemp column
 * @method     ChildTblentempQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentempQuery orderByIdnentrep($order = Criteria::ASC) Order by the idnentrep column
 * @method     ChildTblentempQuery orderByNamentemp($order = Criteria::ASC) Order by the namentemp column
 * @method     ChildTblentempQuery orderByLogentemp($order = Criteria::ASC) Order by the logentemp column
 * @method     ChildTblentempQuery orderByDrcentemp($order = Criteria::ASC) Order by the drcentemp column
 * @method     ChildTblentempQuery orderByLclentemp($order = Criteria::ASC) Order by the lclentemp column
 * @method     ChildTblentempQuery orderByMncentemp($order = Criteria::ASC) Order by the mncentemp column
 * @method     ChildTblentempQuery orderByEntentemp($order = Criteria::ASC) Order by the ententemp column
 * @method     ChildTblentempQuery orderByPasentorg($order = Criteria::ASC) Order by the pasentorg column
 * @method     ChildTblentempQuery orderByCdgpstemp($order = Criteria::ASC) Order by the cdgpstemp column
 * @method     ChildTblentempQuery orderByCdgtrbemp($order = Criteria::ASC) Order by the cdgtrbemp column
 * @method     ChildTblentempQuery orderByGirentemp($order = Criteria::ASC) Order by the girentemp column
 * @method     ChildTblentempQuery orderByTlfofiemp($order = Criteria::ASC) Order by the tlfofiemp column
 * @method     ChildTblentempQuery orderByEmlofiemp($order = Criteria::ASC) Order by the emlofiemp column
 * @method     ChildTblentempQuery orderByDesaliemp($order = Criteria::ASC) Order by the desaliemp column
 * @method     ChildTblentempQuery orderByCandonemp($order = Criteria::ASC) Order by the candonemp column
 * @method     ChildTblentempQuery orderByTemconemp($order = Criteria::ASC) Order by the temconemp column
 * @method     ChildTblentempQuery orderByHorentemp($order = Criteria::ASC) Order by the horentemp column
 * @method     ChildTblentempQuery orderByDetentemo($order = Criteria::ASC) Order by the detentemo column
 *
 * @method     ChildTblentempQuery groupByIdnentemp() Group by the idnentemp column
 * @method     ChildTblentempQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentempQuery groupByIdnentrep() Group by the idnentrep column
 * @method     ChildTblentempQuery groupByNamentemp() Group by the namentemp column
 * @method     ChildTblentempQuery groupByLogentemp() Group by the logentemp column
 * @method     ChildTblentempQuery groupByDrcentemp() Group by the drcentemp column
 * @method     ChildTblentempQuery groupByLclentemp() Group by the lclentemp column
 * @method     ChildTblentempQuery groupByMncentemp() Group by the mncentemp column
 * @method     ChildTblentempQuery groupByEntentemp() Group by the ententemp column
 * @method     ChildTblentempQuery groupByPasentorg() Group by the pasentorg column
 * @method     ChildTblentempQuery groupByCdgpstemp() Group by the cdgpstemp column
 * @method     ChildTblentempQuery groupByCdgtrbemp() Group by the cdgtrbemp column
 * @method     ChildTblentempQuery groupByGirentemp() Group by the girentemp column
 * @method     ChildTblentempQuery groupByTlfofiemp() Group by the tlfofiemp column
 * @method     ChildTblentempQuery groupByEmlofiemp() Group by the emlofiemp column
 * @method     ChildTblentempQuery groupByDesaliemp() Group by the desaliemp column
 * @method     ChildTblentempQuery groupByCandonemp() Group by the candonemp column
 * @method     ChildTblentempQuery groupByTemconemp() Group by the temconemp column
 * @method     ChildTblentempQuery groupByHorentemp() Group by the horentemp column
 * @method     ChildTblentempQuery groupByDetentemo() Group by the detentemo column
 *
 * @method     ChildTblentempQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentempQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentempQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentempQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentempQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentempQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentempQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildTblentempQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildTblentempQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildTblentempQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildTblentempQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentempQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildTblentempQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentemp findOne(ConnectionInterface $con = null) Return the first ChildTblentemp matching the query
 * @method     ChildTblentemp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentemp matching the query, or a new ChildTblentemp object populated from the query conditions when no match is found
 *
 * @method     ChildTblentemp findOneByIdnentemp(string $idnentemp) Return the first ChildTblentemp filtered by the idnentemp column
 * @method     ChildTblentemp findOneByUuid(string $uuid) Return the first ChildTblentemp filtered by the uuid column
 * @method     ChildTblentemp findOneByIdnentrep(string $idnentrep) Return the first ChildTblentemp filtered by the idnentrep column
 * @method     ChildTblentemp findOneByNamentemp(string $namentemp) Return the first ChildTblentemp filtered by the namentemp column
 * @method     ChildTblentemp findOneByLogentemp(string $logentemp) Return the first ChildTblentemp filtered by the logentemp column
 * @method     ChildTblentemp findOneByDrcentemp(string $drcentemp) Return the first ChildTblentemp filtered by the drcentemp column
 * @method     ChildTblentemp findOneByLclentemp(string $lclentemp) Return the first ChildTblentemp filtered by the lclentemp column
 * @method     ChildTblentemp findOneByMncentemp(string $mncentemp) Return the first ChildTblentemp filtered by the mncentemp column
 * @method     ChildTblentemp findOneByEntentemp(string $ententemp) Return the first ChildTblentemp filtered by the ententemp column
 * @method     ChildTblentemp findOneByPasentorg(string $pasentorg) Return the first ChildTblentemp filtered by the pasentorg column
 * @method     ChildTblentemp findOneByCdgpstemp(int $cdgpstemp) Return the first ChildTblentemp filtered by the cdgpstemp column
 * @method     ChildTblentemp findOneByCdgtrbemp(string $cdgtrbemp) Return the first ChildTblentemp filtered by the cdgtrbemp column
 * @method     ChildTblentemp findOneByGirentemp(string $girentemp) Return the first ChildTblentemp filtered by the girentemp column
 * @method     ChildTblentemp findOneByTlfofiemp(string $tlfofiemp) Return the first ChildTblentemp filtered by the tlfofiemp column
 * @method     ChildTblentemp findOneByEmlofiemp(string $emlofiemp) Return the first ChildTblentemp filtered by the emlofiemp column
 * @method     ChildTblentemp findOneByDesaliemp(string $desaliemp) Return the first ChildTblentemp filtered by the desaliemp column
 * @method     ChildTblentemp findOneByCandonemp(string $candonemp) Return the first ChildTblentemp filtered by the candonemp column
 * @method     ChildTblentemp findOneByTemconemp(string $temconemp) Return the first ChildTblentemp filtered by the temconemp column
 * @method     ChildTblentemp findOneByHorentemp(string $horentemp) Return the first ChildTblentemp filtered by the horentemp column
 * @method     ChildTblentemp findOneByDetentemo(string $detentemo) Return the first ChildTblentemp filtered by the detentemo column *

 * @method     ChildTblentemp requirePk($key, ConnectionInterface $con = null) Return the ChildTblentemp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOne(ConnectionInterface $con = null) Return the first ChildTblentemp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentemp requireOneByIdnentemp(string $idnentemp) Return the first ChildTblentemp filtered by the idnentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByUuid(string $uuid) Return the first ChildTblentemp filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByIdnentrep(string $idnentrep) Return the first ChildTblentemp filtered by the idnentrep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByNamentemp(string $namentemp) Return the first ChildTblentemp filtered by the namentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByLogentemp(string $logentemp) Return the first ChildTblentemp filtered by the logentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByDrcentemp(string $drcentemp) Return the first ChildTblentemp filtered by the drcentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByLclentemp(string $lclentemp) Return the first ChildTblentemp filtered by the lclentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByMncentemp(string $mncentemp) Return the first ChildTblentemp filtered by the mncentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByEntentemp(string $ententemp) Return the first ChildTblentemp filtered by the ententemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByPasentorg(string $pasentorg) Return the first ChildTblentemp filtered by the pasentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByCdgpstemp(int $cdgpstemp) Return the first ChildTblentemp filtered by the cdgpstemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByCdgtrbemp(string $cdgtrbemp) Return the first ChildTblentemp filtered by the cdgtrbemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByGirentemp(string $girentemp) Return the first ChildTblentemp filtered by the girentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByTlfofiemp(string $tlfofiemp) Return the first ChildTblentemp filtered by the tlfofiemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByEmlofiemp(string $emlofiemp) Return the first ChildTblentemp filtered by the emlofiemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByDesaliemp(string $desaliemp) Return the first ChildTblentemp filtered by the desaliemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByCandonemp(string $candonemp) Return the first ChildTblentemp filtered by the candonemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByTemconemp(string $temconemp) Return the first ChildTblentemp filtered by the temconemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByHorentemp(string $horentemp) Return the first ChildTblentemp filtered by the horentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByDetentemo(string $detentemo) Return the first ChildTblentemp filtered by the detentemo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentemp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentemp objects based on current ModelCriteria
 * @method     ChildTblentemp[]|ObjectCollection findByIdnentemp(string $idnentemp) Return ChildTblentemp objects filtered by the idnentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentemp objects filtered by the uuid column
 * @method     ChildTblentemp[]|ObjectCollection findByIdnentrep(string $idnentrep) Return ChildTblentemp objects filtered by the idnentrep column
 * @method     ChildTblentemp[]|ObjectCollection findByNamentemp(string $namentemp) Return ChildTblentemp objects filtered by the namentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByLogentemp(string $logentemp) Return ChildTblentemp objects filtered by the logentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByDrcentemp(string $drcentemp) Return ChildTblentemp objects filtered by the drcentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByLclentemp(string $lclentemp) Return ChildTblentemp objects filtered by the lclentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByMncentemp(string $mncentemp) Return ChildTblentemp objects filtered by the mncentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByEntentemp(string $ententemp) Return ChildTblentemp objects filtered by the ententemp column
 * @method     ChildTblentemp[]|ObjectCollection findByPasentorg(string $pasentorg) Return ChildTblentemp objects filtered by the pasentorg column
 * @method     ChildTblentemp[]|ObjectCollection findByCdgpstemp(int $cdgpstemp) Return ChildTblentemp objects filtered by the cdgpstemp column
 * @method     ChildTblentemp[]|ObjectCollection findByCdgtrbemp(string $cdgtrbemp) Return ChildTblentemp objects filtered by the cdgtrbemp column
 * @method     ChildTblentemp[]|ObjectCollection findByGirentemp(string $girentemp) Return ChildTblentemp objects filtered by the girentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByTlfofiemp(string $tlfofiemp) Return ChildTblentemp objects filtered by the tlfofiemp column
 * @method     ChildTblentemp[]|ObjectCollection findByEmlofiemp(string $emlofiemp) Return ChildTblentemp objects filtered by the emlofiemp column
 * @method     ChildTblentemp[]|ObjectCollection findByDesaliemp(string $desaliemp) Return ChildTblentemp objects filtered by the desaliemp column
 * @method     ChildTblentemp[]|ObjectCollection findByCandonemp(string $candonemp) Return ChildTblentemp objects filtered by the candonemp column
 * @method     ChildTblentemp[]|ObjectCollection findByTemconemp(string $temconemp) Return ChildTblentemp objects filtered by the temconemp column
 * @method     ChildTblentemp[]|ObjectCollection findByHorentemp(string $horentemp) Return ChildTblentemp objects filtered by the horentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByDetentemo(string $detentemo) Return ChildTblentemp objects filtered by the detentemo column
 * @method     ChildTblentemp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblentempQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TblentempQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'cero', $modelName = '\\Tblentemp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblentempQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblentempQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblentempQuery) {
            return $criteria;
        }
        $query = new ChildTblentempQuery();
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
     * @return ChildTblentemp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblentempTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblentempTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblentemp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idnentemp, uuid, idnentrep, namentemp, logentemp, drcentemp, lclentemp, mncentemp, ententemp, pasentorg, cdgpstemp, cdgtrbemp, girentemp, tlfofiemp, emlofiemp, desaliemp, candonemp, temconemp, horentemp, detentemo FROM tblentemp WHERE idnentemp = :p0';
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
            /** @var ChildTblentemp $obj */
            $obj = new ChildTblentemp();
            $obj->hydrate($row);
            TblentempTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblentemp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $keys, Criteria::IN);
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
     * @param     mixed $idnentemp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByIdnentemp($idnentemp = null, $comparison = null)
    {
        if (is_array($idnentemp)) {
            $useMinMax = false;
            if (isset($idnentemp['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $idnentemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentemp['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $idnentemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $idnentemp, $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the idnentrep column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentrep(1234); // WHERE idnentrep = 1234
     * $query->filterByIdnentrep(array(12, 34)); // WHERE idnentrep IN (12, 34)
     * $query->filterByIdnentrep(array('min' => 12)); // WHERE idnentrep > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $idnentrep The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByIdnentrep($idnentrep = null, $comparison = null)
    {
        if (is_array($idnentrep)) {
            $useMinMax = false;
            if (isset($idnentrep['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNENTREP, $idnentrep['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentrep['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNENTREP, $idnentrep['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_IDNENTREP, $idnentrep, $comparison);
    }

    /**
     * Filter the query on the namentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByNamentemp('fooValue');   // WHERE namentemp = 'fooValue'
     * $query->filterByNamentemp('%fooValue%', Criteria::LIKE); // WHERE namentemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namentemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByNamentemp($namentemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namentemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_NAMENTEMP, $namentemp, $comparison);
    }

    /**
     * Filter the query on the logentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByLogentemp('fooValue');   // WHERE logentemp = 'fooValue'
     * $query->filterByLogentemp('%fooValue%', Criteria::LIKE); // WHERE logentemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logentemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByLogentemp($logentemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logentemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_LOGENTEMP, $logentemp, $comparison);
    }

    /**
     * Filter the query on the drcentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByDrcentemp('fooValue');   // WHERE drcentemp = 'fooValue'
     * $query->filterByDrcentemp('%fooValue%', Criteria::LIKE); // WHERE drcentemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $drcentemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByDrcentemp($drcentemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($drcentemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_DRCENTEMP, $drcentemp, $comparison);
    }

    /**
     * Filter the query on the lclentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByLclentemp('fooValue');   // WHERE lclentemp = 'fooValue'
     * $query->filterByLclentemp('%fooValue%', Criteria::LIKE); // WHERE lclentemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lclentemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByLclentemp($lclentemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lclentemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_LCLENTEMP, $lclentemp, $comparison);
    }

    /**
     * Filter the query on the mncentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByMncentemp('fooValue');   // WHERE mncentemp = 'fooValue'
     * $query->filterByMncentemp('%fooValue%', Criteria::LIKE); // WHERE mncentemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mncentemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByMncentemp($mncentemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mncentemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_MNCENTEMP, $mncentemp, $comparison);
    }

    /**
     * Filter the query on the ententemp column
     *
     * Example usage:
     * <code>
     * $query->filterByEntentemp('fooValue');   // WHERE ententemp = 'fooValue'
     * $query->filterByEntentemp('%fooValue%', Criteria::LIKE); // WHERE ententemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ententemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByEntentemp($ententemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ententemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_ENTENTEMP, $ententemp, $comparison);
    }

    /**
     * Filter the query on the pasentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByPasentorg('fooValue');   // WHERE pasentorg = 'fooValue'
     * $query->filterByPasentorg('%fooValue%', Criteria::LIKE); // WHERE pasentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pasentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByPasentorg($pasentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pasentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_PASENTORG, $pasentorg, $comparison);
    }

    /**
     * Filter the query on the cdgpstemp column
     *
     * Example usage:
     * <code>
     * $query->filterByCdgpstemp(1234); // WHERE cdgpstemp = 1234
     * $query->filterByCdgpstemp(array(12, 34)); // WHERE cdgpstemp IN (12, 34)
     * $query->filterByCdgpstemp(array('min' => 12)); // WHERE cdgpstemp > 12
     * </code>
     *
     * @param     mixed $cdgpstemp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByCdgpstemp($cdgpstemp = null, $comparison = null)
    {
        if (is_array($cdgpstemp)) {
            $useMinMax = false;
            if (isset($cdgpstemp['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_CDGPSTEMP, $cdgpstemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cdgpstemp['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_CDGPSTEMP, $cdgpstemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_CDGPSTEMP, $cdgpstemp, $comparison);
    }

    /**
     * Filter the query on the cdgtrbemp column
     *
     * Example usage:
     * <code>
     * $query->filterByCdgtrbemp('fooValue');   // WHERE cdgtrbemp = 'fooValue'
     * $query->filterByCdgtrbemp('%fooValue%', Criteria::LIKE); // WHERE cdgtrbemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cdgtrbemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByCdgtrbemp($cdgtrbemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdgtrbemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_CDGTRBEMP, $cdgtrbemp, $comparison);
    }

    /**
     * Filter the query on the girentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByGirentemp('fooValue');   // WHERE girentemp = 'fooValue'
     * $query->filterByGirentemp('%fooValue%', Criteria::LIKE); // WHERE girentemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $girentemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByGirentemp($girentemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($girentemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_GIRENTEMP, $girentemp, $comparison);
    }

    /**
     * Filter the query on the tlfofiemp column
     *
     * Example usage:
     * <code>
     * $query->filterByTlfofiemp('fooValue');   // WHERE tlfofiemp = 'fooValue'
     * $query->filterByTlfofiemp('%fooValue%', Criteria::LIKE); // WHERE tlfofiemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tlfofiemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByTlfofiemp($tlfofiemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tlfofiemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_TLFOFIEMP, $tlfofiemp, $comparison);
    }

    /**
     * Filter the query on the emlofiemp column
     *
     * Example usage:
     * <code>
     * $query->filterByEmlofiemp('fooValue');   // WHERE emlofiemp = 'fooValue'
     * $query->filterByEmlofiemp('%fooValue%', Criteria::LIKE); // WHERE emlofiemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emlofiemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByEmlofiemp($emlofiemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emlofiemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_EMLOFIEMP, $emlofiemp, $comparison);
    }

    /**
     * Filter the query on the desaliemp column
     *
     * Example usage:
     * <code>
     * $query->filterByDesaliemp('fooValue');   // WHERE desaliemp = 'fooValue'
     * $query->filterByDesaliemp('%fooValue%', Criteria::LIKE); // WHERE desaliemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desaliemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByDesaliemp($desaliemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desaliemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_DESALIEMP, $desaliemp, $comparison);
    }

    /**
     * Filter the query on the candonemp column
     *
     * Example usage:
     * <code>
     * $query->filterByCandonemp('fooValue');   // WHERE candonemp = 'fooValue'
     * $query->filterByCandonemp('%fooValue%', Criteria::LIKE); // WHERE candonemp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $candonemp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByCandonemp($candonemp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($candonemp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_CANDONEMP, $candonemp, $comparison);
    }

    /**
     * Filter the query on the temconemp column
     *
     * Example usage:
     * <code>
     * $query->filterByTemconemp('2011-03-14'); // WHERE temconemp = '2011-03-14'
     * $query->filterByTemconemp('now'); // WHERE temconemp = '2011-03-14'
     * $query->filterByTemconemp(array('max' => 'yesterday')); // WHERE temconemp > '2011-03-13'
     * </code>
     *
     * @param     mixed $temconemp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByTemconemp($temconemp = null, $comparison = null)
    {
        if (is_array($temconemp)) {
            $useMinMax = false;
            if (isset($temconemp['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_TEMCONEMP, $temconemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($temconemp['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_TEMCONEMP, $temconemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_TEMCONEMP, $temconemp, $comparison);
    }

    /**
     * Filter the query on the horentemp column
     *
     * Example usage:
     * <code>
     * $query->filterByHorentemp('2011-03-14'); // WHERE horentemp = '2011-03-14'
     * $query->filterByHorentemp('now'); // WHERE horentemp = '2011-03-14'
     * $query->filterByHorentemp(array('max' => 'yesterday')); // WHERE horentemp > '2011-03-13'
     * </code>
     *
     * @param     mixed $horentemp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByHorentemp($horentemp = null, $comparison = null)
    {
        if (is_array($horentemp)) {
            $useMinMax = false;
            if (isset($horentemp['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_HORENTEMP, $horentemp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horentemp['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_HORENTEMP, $horentemp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_HORENTEMP, $horentemp, $comparison);
    }

    /**
     * Filter the query on the detentemo column
     *
     * Example usage:
     * <code>
     * $query->filterByDetentemo('fooValue');   // WHERE detentemo = 'fooValue'
     * $query->filterByDetentemo('%fooValue%', Criteria::LIKE); // WHERE detentemo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detentemo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByDetentemo($detentemo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detentemo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_DETENTEMO, $detentemo, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNENTREP, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNENTREP, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
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
     * @param   ChildTblentemp $tblentemp Object to remove from the list of results
     *
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function prune($tblentemp = null)
    {
        if ($tblentemp) {
            $this->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $tblentemp->getIdnentemp(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblentemp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblentempTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblentempTableMap::clearInstancePool();
            TblentempTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblentempTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblentempTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblentempTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblentempTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblentempQuery