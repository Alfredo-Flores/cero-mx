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
 * @method     ChildTblentorgQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildTblentorgQuery orderByIdnentprs($order = Criteria::ASC) Order by the idnentprs column
 * @method     ChildTblentorgQuery orderBySgmentorg($order = Criteria::ASC) Order by the sgmentorg column
 * @method     ChildTblentorgQuery orderByBnfentorg($order = Criteria::ASC) Order by the bnfentorg column
 * @method     ChildTblentorgQuery orderByNmbentorg($order = Criteria::ASC) Order by the nmbentorg column
 * @method     ChildTblentorgQuery orderByLogentorg($order = Criteria::ASC) Order by the logentorg column
 * @method     ChildTblentorgQuery orderByRfcentorg($order = Criteria::ASC) Order by the rfcentorg column
 * @method     ChildTblentorgQuery orderByDmcentorg($order = Criteria::ASC) Order by the dmcentorg column
 * @method     ChildTblentorgQuery orderByLclentorg($order = Criteria::ASC) Order by the lclentorg column
 * @method     ChildTblentorgQuery orderByMncentorg($order = Criteria::ASC) Order by the mncentorg column
 * @method     ChildTblentorgQuery orderByEtdentorg($order = Criteria::ASC) Order by the etdentorg column
 * @method     ChildTblentorgQuery orderByPasentorg($order = Criteria::ASC) Order by the pasentorg column
 * @method     ChildTblentorgQuery orderByCdgpstorg($order = Criteria::ASC) Order by the cdgpstorg column
 * @method     ChildTblentorgQuery orderByTlffcnorg($order = Criteria::ASC) Order by the tlffcnorg column
 * @method     ChildTblentorgQuery orderByEmlfcnorg($order = Criteria::ASC) Order by the emlfcnorg column
 * @method     ChildTblentorgQuery orderByPlntrborg($order = Criteria::ASC) Order by the plntrborg column
 * @method     ChildTblentorgQuery orderByActcnsorg($order = Criteria::ASC) Order by the actcnsorg column
 * @method     ChildTblentorgQuery orderByCnsdntorg($order = Criteria::ASC) Order by the cnsdntorg column
 * @method     ChildTblentorgQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentorgQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildTblentorgQuery orderByHstentorg($order = Criteria::ASC) Order by the hstentorg column
 *
 * @method     ChildTblentorgQuery groupByIdnentorg() Group by the idnentorg column
 * @method     ChildTblentorgQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentorgQuery groupByIdnentprs() Group by the idnentprs column
 * @method     ChildTblentorgQuery groupBySgmentorg() Group by the sgmentorg column
 * @method     ChildTblentorgQuery groupByBnfentorg() Group by the bnfentorg column
 * @method     ChildTblentorgQuery groupByNmbentorg() Group by the nmbentorg column
 * @method     ChildTblentorgQuery groupByLogentorg() Group by the logentorg column
 * @method     ChildTblentorgQuery groupByRfcentorg() Group by the rfcentorg column
 * @method     ChildTblentorgQuery groupByDmcentorg() Group by the dmcentorg column
 * @method     ChildTblentorgQuery groupByLclentorg() Group by the lclentorg column
 * @method     ChildTblentorgQuery groupByMncentorg() Group by the mncentorg column
 * @method     ChildTblentorgQuery groupByEtdentorg() Group by the etdentorg column
 * @method     ChildTblentorgQuery groupByPasentorg() Group by the pasentorg column
 * @method     ChildTblentorgQuery groupByCdgpstorg() Group by the cdgpstorg column
 * @method     ChildTblentorgQuery groupByTlffcnorg() Group by the tlffcnorg column
 * @method     ChildTblentorgQuery groupByEmlfcnorg() Group by the emlfcnorg column
 * @method     ChildTblentorgQuery groupByPlntrborg() Group by the plntrborg column
 * @method     ChildTblentorgQuery groupByActcnsorg() Group by the actcnsorg column
 * @method     ChildTblentorgQuery groupByCnsdntorg() Group by the cnsdntorg column
 * @method     ChildTblentorgQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentorgQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildTblentorgQuery groupByHstentorg() Group by the hstentorg column
 *
 * @method     ChildTblentorgQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentorgQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentorgQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentorgQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentorgQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentorgQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentorgQuery leftJoinTblentprs($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentprs relation
 * @method     ChildTblentorgQuery rightJoinTblentprs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentprs relation
 * @method     ChildTblentorgQuery innerJoinTblentprs($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentprs relation
 *
 * @method     ChildTblentorgQuery joinWithTblentprs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentprs relation
 *
 * @method     ChildTblentorgQuery leftJoinWithTblentprs() Adds a LEFT JOIN clause and with to the query using the Tblentprs relation
 * @method     ChildTblentorgQuery rightJoinWithTblentprs() Adds a RIGHT JOIN clause and with to the query using the Tblentprs relation
 * @method     ChildTblentorgQuery innerJoinWithTblentprs() Adds a INNER JOIN clause and with to the query using the Tblentprs relation
 *
 * @method     ChildTblentorgQuery leftJoinTblentcln($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentcln relation
 * @method     ChildTblentorgQuery rightJoinTblentcln($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentcln relation
 * @method     ChildTblentorgQuery innerJoinTblentcln($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentcln relation
 *
 * @method     ChildTblentorgQuery joinWithTblentcln($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentcln relation
 *
 * @method     ChildTblentorgQuery leftJoinWithTblentcln() Adds a LEFT JOIN clause and with to the query using the Tblentcln relation
 * @method     ChildTblentorgQuery rightJoinWithTblentcln() Adds a RIGHT JOIN clause and with to the query using the Tblentcln relation
 * @method     ChildTblentorgQuery innerJoinWithTblentcln() Adds a INNER JOIN clause and with to the query using the Tblentcln relation
 *
 * @method     ChildTblentorgQuery leftJoinTblentdnc($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentdnc relation
 * @method     ChildTblentorgQuery rightJoinTblentdnc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentdnc relation
 * @method     ChildTblentorgQuery innerJoinTblentdnc($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentdnc relation
 *
 * @method     ChildTblentorgQuery joinWithTblentdnc($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentdnc relation
 *
 * @method     ChildTblentorgQuery leftJoinWithTblentdnc() Adds a LEFT JOIN clause and with to the query using the Tblentdnc relation
 * @method     ChildTblentorgQuery rightJoinWithTblentdnc() Adds a RIGHT JOIN clause and with to the query using the Tblentdnc relation
 * @method     ChildTblentorgQuery innerJoinWithTblentdnc() Adds a INNER JOIN clause and with to the query using the Tblentdnc relation
 *
 * @method     \TblentprsQuery|\TblentclnQuery|\TblentdncQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentorg findOne(ConnectionInterface $con = null) Return the first ChildTblentorg matching the query
 * @method     ChildTblentorg findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentorg matching the query, or a new ChildTblentorg object populated from the query conditions when no match is found
 *
 * @method     ChildTblentorg findOneByIdnentorg(string $idnentorg) Return the first ChildTblentorg filtered by the idnentorg column
 * @method     ChildTblentorg findOneByUuid(string $uuid) Return the first ChildTblentorg filtered by the uuid column
 * @method     ChildTblentorg findOneByIdnentprs(string $idnentprs) Return the first ChildTblentorg filtered by the idnentprs column
 * @method     ChildTblentorg findOneBySgmentorg(string $sgmentorg) Return the first ChildTblentorg filtered by the sgmentorg column
 * @method     ChildTblentorg findOneByBnfentorg(string $bnfentorg) Return the first ChildTblentorg filtered by the bnfentorg column
 * @method     ChildTblentorg findOneByNmbentorg(string $nmbentorg) Return the first ChildTblentorg filtered by the nmbentorg column
 * @method     ChildTblentorg findOneByLogentorg(string $logentorg) Return the first ChildTblentorg filtered by the logentorg column
 * @method     ChildTblentorg findOneByRfcentorg(string $rfcentorg) Return the first ChildTblentorg filtered by the rfcentorg column
 * @method     ChildTblentorg findOneByDmcentorg(string $dmcentorg) Return the first ChildTblentorg filtered by the dmcentorg column
 * @method     ChildTblentorg findOneByLclentorg(string $lclentorg) Return the first ChildTblentorg filtered by the lclentorg column
 * @method     ChildTblentorg findOneByMncentorg(string $mncentorg) Return the first ChildTblentorg filtered by the mncentorg column
 * @method     ChildTblentorg findOneByEtdentorg(string $etdentorg) Return the first ChildTblentorg filtered by the etdentorg column
 * @method     ChildTblentorg findOneByPasentorg(string $pasentorg) Return the first ChildTblentorg filtered by the pasentorg column
 * @method     ChildTblentorg findOneByCdgpstorg(string $cdgpstorg) Return the first ChildTblentorg filtered by the cdgpstorg column
 * @method     ChildTblentorg findOneByTlffcnorg(string $tlffcnorg) Return the first ChildTblentorg filtered by the tlffcnorg column
 * @method     ChildTblentorg findOneByEmlfcnorg(string $emlfcnorg) Return the first ChildTblentorg filtered by the emlfcnorg column
 * @method     ChildTblentorg findOneByPlntrborg(string $plntrborg) Return the first ChildTblentorg filtered by the plntrborg column
 * @method     ChildTblentorg findOneByActcnsorg(string $actcnsorg) Return the first ChildTblentorg filtered by the actcnsorg column
 * @method     ChildTblentorg findOneByCnsdntorg(string $cnsdntorg) Return the first ChildTblentorg filtered by the cnsdntorg column
 * @method     ChildTblentorg findOneByCreatedAt(string $created_at) Return the first ChildTblentorg filtered by the created_at column
 * @method     ChildTblentorg findOneByUpdatedAt(string $updated_at) Return the first ChildTblentorg filtered by the updated_at column
 * @method     ChildTblentorg findOneByHstentorg(string $hstentorg) Return the first ChildTblentorg filtered by the hstentorg column *

 * @method     ChildTblentorg requirePk($key, ConnectionInterface $con = null) Return the ChildTblentorg by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOne(ConnectionInterface $con = null) Return the first ChildTblentorg matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentorg requireOneByIdnentorg(string $idnentorg) Return the first ChildTblentorg filtered by the idnentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByUuid(string $uuid) Return the first ChildTblentorg filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByIdnentprs(string $idnentprs) Return the first ChildTblentorg filtered by the idnentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneBySgmentorg(string $sgmentorg) Return the first ChildTblentorg filtered by the sgmentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByBnfentorg(string $bnfentorg) Return the first ChildTblentorg filtered by the bnfentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByNmbentorg(string $nmbentorg) Return the first ChildTblentorg filtered by the nmbentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByLogentorg(string $logentorg) Return the first ChildTblentorg filtered by the logentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByRfcentorg(string $rfcentorg) Return the first ChildTblentorg filtered by the rfcentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByDmcentorg(string $dmcentorg) Return the first ChildTblentorg filtered by the dmcentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByLclentorg(string $lclentorg) Return the first ChildTblentorg filtered by the lclentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByMncentorg(string $mncentorg) Return the first ChildTblentorg filtered by the mncentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByEtdentorg(string $etdentorg) Return the first ChildTblentorg filtered by the etdentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByPasentorg(string $pasentorg) Return the first ChildTblentorg filtered by the pasentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByCdgpstorg(string $cdgpstorg) Return the first ChildTblentorg filtered by the cdgpstorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByTlffcnorg(string $tlffcnorg) Return the first ChildTblentorg filtered by the tlffcnorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByEmlfcnorg(string $emlfcnorg) Return the first ChildTblentorg filtered by the emlfcnorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByPlntrborg(string $plntrborg) Return the first ChildTblentorg filtered by the plntrborg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByActcnsorg(string $actcnsorg) Return the first ChildTblentorg filtered by the actcnsorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByCnsdntorg(string $cnsdntorg) Return the first ChildTblentorg filtered by the cnsdntorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByCreatedAt(string $created_at) Return the first ChildTblentorg filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentorg filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentorg requireOneByHstentorg(string $hstentorg) Return the first ChildTblentorg filtered by the hstentorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentorg[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentorg objects based on current ModelCriteria
 * @method     ChildTblentorg[]|ObjectCollection findByIdnentorg(string $idnentorg) Return ChildTblentorg objects filtered by the idnentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentorg objects filtered by the uuid column
 * @method     ChildTblentorg[]|ObjectCollection findByIdnentprs(string $idnentprs) Return ChildTblentorg objects filtered by the idnentprs column
 * @method     ChildTblentorg[]|ObjectCollection findBySgmentorg(string $sgmentorg) Return ChildTblentorg objects filtered by the sgmentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByBnfentorg(string $bnfentorg) Return ChildTblentorg objects filtered by the bnfentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByNmbentorg(string $nmbentorg) Return ChildTblentorg objects filtered by the nmbentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByLogentorg(string $logentorg) Return ChildTblentorg objects filtered by the logentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByRfcentorg(string $rfcentorg) Return ChildTblentorg objects filtered by the rfcentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByDmcentorg(string $dmcentorg) Return ChildTblentorg objects filtered by the dmcentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByLclentorg(string $lclentorg) Return ChildTblentorg objects filtered by the lclentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByMncentorg(string $mncentorg) Return ChildTblentorg objects filtered by the mncentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByEtdentorg(string $etdentorg) Return ChildTblentorg objects filtered by the etdentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByPasentorg(string $pasentorg) Return ChildTblentorg objects filtered by the pasentorg column
 * @method     ChildTblentorg[]|ObjectCollection findByCdgpstorg(string $cdgpstorg) Return ChildTblentorg objects filtered by the cdgpstorg column
 * @method     ChildTblentorg[]|ObjectCollection findByTlffcnorg(string $tlffcnorg) Return ChildTblentorg objects filtered by the tlffcnorg column
 * @method     ChildTblentorg[]|ObjectCollection findByEmlfcnorg(string $emlfcnorg) Return ChildTblentorg objects filtered by the emlfcnorg column
 * @method     ChildTblentorg[]|ObjectCollection findByPlntrborg(string $plntrborg) Return ChildTblentorg objects filtered by the plntrborg column
 * @method     ChildTblentorg[]|ObjectCollection findByActcnsorg(string $actcnsorg) Return ChildTblentorg objects filtered by the actcnsorg column
 * @method     ChildTblentorg[]|ObjectCollection findByCnsdntorg(string $cnsdntorg) Return ChildTblentorg objects filtered by the cnsdntorg column
 * @method     ChildTblentorg[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentorg objects filtered by the created_at column
 * @method     ChildTblentorg[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentorg objects filtered by the updated_at column
 * @method     ChildTblentorg[]|ObjectCollection findByHstentorg(string $hstentorg) Return ChildTblentorg objects filtered by the hstentorg column
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
    public function __construct($dbName = 'cerodb', $modelName = '\\Tblentorg', $modelAlias = null)
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
        $sql = 'SELECT idnentorg, uuid, idnentprs, sgmentorg, bnfentorg, nmbentorg, logentorg, rfcentorg, dmcentorg, lclentorg, mncentorg, etdentorg, pasentorg, cdgpstorg, tlffcnorg, emlfcnorg, plntrborg, actcnsorg, cnsdntorg, created_at, updated_at, hstentorg FROM tblentorg WHERE idnentorg = :p0';
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the idnentprs column
     *
     * Example usage:
     * <code>
     * $query->filterByIdnentprs(1234); // WHERE idnentprs = 1234
     * $query->filterByIdnentprs(array(12, 34)); // WHERE idnentprs IN (12, 34)
     * $query->filterByIdnentprs(array('min' => 12)); // WHERE idnentprs > 12
     * </code>
     *
     * @see       filterByTblentprs()
     *
     * @param     mixed $idnentprs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByIdnentprs($idnentprs = null, $comparison = null)
    {
        if (is_array($idnentprs)) {
            $useMinMax = false;
            if (isset($idnentprs['min'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_IDNENTPRS, $idnentprs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentprs['max'])) {
                $this->addUsingAlias(TblentorgTableMap::COL_IDNENTPRS, $idnentprs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_IDNENTPRS, $idnentprs, $comparison);
    }

    /**
     * Filter the query on the sgmentorg column
     *
     * Example usage:
     * <code>
     * $query->filterBySgmentorg('fooValue');   // WHERE sgmentorg = 'fooValue'
     * $query->filterBySgmentorg('%fooValue%', Criteria::LIKE); // WHERE sgmentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sgmentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterBySgmentorg($sgmentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sgmentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_SGMENTORG, $sgmentorg, $comparison);
    }

    /**
     * Filter the query on the bnfentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByBnfentorg('fooValue');   // WHERE bnfentorg = 'fooValue'
     * $query->filterByBnfentorg('%fooValue%', Criteria::LIKE); // WHERE bnfentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bnfentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByBnfentorg($bnfentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bnfentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_BNFENTORG, $bnfentorg, $comparison);
    }

    /**
     * Filter the query on the nmbentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByNmbentorg('fooValue');   // WHERE nmbentorg = 'fooValue'
     * $query->filterByNmbentorg('%fooValue%', Criteria::LIKE); // WHERE nmbentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmbentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByNmbentorg($nmbentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmbentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_NMBENTORG, $nmbentorg, $comparison);
    }

    /**
     * Filter the query on the logentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByLogentorg('fooValue');   // WHERE logentorg = 'fooValue'
     * $query->filterByLogentorg('%fooValue%', Criteria::LIKE); // WHERE logentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $logentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByLogentorg($logentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($logentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_LOGENTORG, $logentorg, $comparison);
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
     * Filter the query on the dmcentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByDmcentorg('fooValue');   // WHERE dmcentorg = 'fooValue'
     * $query->filterByDmcentorg('%fooValue%', Criteria::LIKE); // WHERE dmcentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dmcentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByDmcentorg($dmcentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dmcentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_DMCENTORG, $dmcentorg, $comparison);
    }

    /**
     * Filter the query on the lclentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByLclentorg('fooValue');   // WHERE lclentorg = 'fooValue'
     * $query->filterByLclentorg('%fooValue%', Criteria::LIKE); // WHERE lclentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lclentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByLclentorg($lclentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lclentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_LCLENTORG, $lclentorg, $comparison);
    }

    /**
     * Filter the query on the mncentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByMncentorg('fooValue');   // WHERE mncentorg = 'fooValue'
     * $query->filterByMncentorg('%fooValue%', Criteria::LIKE); // WHERE mncentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mncentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByMncentorg($mncentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mncentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_MNCENTORG, $mncentorg, $comparison);
    }

    /**
     * Filter the query on the etdentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByEtdentorg('fooValue');   // WHERE etdentorg = 'fooValue'
     * $query->filterByEtdentorg('%fooValue%', Criteria::LIKE); // WHERE etdentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $etdentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByEtdentorg($etdentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($etdentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_ETDENTORG, $etdentorg, $comparison);
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByPasentorg($pasentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pasentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_PASENTORG, $pasentorg, $comparison);
    }

    /**
     * Filter the query on the cdgpstorg column
     *
     * Example usage:
     * <code>
     * $query->filterByCdgpstorg('fooValue');   // WHERE cdgpstorg = 'fooValue'
     * $query->filterByCdgpstorg('%fooValue%', Criteria::LIKE); // WHERE cdgpstorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cdgpstorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByCdgpstorg($cdgpstorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdgpstorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_CDGPSTORG, $cdgpstorg, $comparison);
    }

    /**
     * Filter the query on the tlffcnorg column
     *
     * Example usage:
     * <code>
     * $query->filterByTlffcnorg('fooValue');   // WHERE tlffcnorg = 'fooValue'
     * $query->filterByTlffcnorg('%fooValue%', Criteria::LIKE); // WHERE tlffcnorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tlffcnorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByTlffcnorg($tlffcnorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tlffcnorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_TLFFCNORG, $tlffcnorg, $comparison);
    }

    /**
     * Filter the query on the emlfcnorg column
     *
     * Example usage:
     * <code>
     * $query->filterByEmlfcnorg('fooValue');   // WHERE emlfcnorg = 'fooValue'
     * $query->filterByEmlfcnorg('%fooValue%', Criteria::LIKE); // WHERE emlfcnorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emlfcnorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByEmlfcnorg($emlfcnorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emlfcnorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_EMLFCNORG, $emlfcnorg, $comparison);
    }

    /**
     * Filter the query on the plntrborg column
     *
     * Example usage:
     * <code>
     * $query->filterByPlntrborg('fooValue');   // WHERE plntrborg = 'fooValue'
     * $query->filterByPlntrborg('%fooValue%', Criteria::LIKE); // WHERE plntrborg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $plntrborg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByPlntrborg($plntrborg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($plntrborg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_PLNTRBORG, $plntrborg, $comparison);
    }

    /**
     * Filter the query on the actcnsorg column
     *
     * Example usage:
     * <code>
     * $query->filterByActcnsorg('fooValue');   // WHERE actcnsorg = 'fooValue'
     * $query->filterByActcnsorg('%fooValue%', Criteria::LIKE); // WHERE actcnsorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actcnsorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByActcnsorg($actcnsorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actcnsorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_ACTCNSORG, $actcnsorg, $comparison);
    }

    /**
     * Filter the query on the cnsdntorg column
     *
     * Example usage:
     * <code>
     * $query->filterByCnsdntorg('fooValue');   // WHERE cnsdntorg = 'fooValue'
     * $query->filterByCnsdntorg('%fooValue%', Criteria::LIKE); // WHERE cnsdntorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cnsdntorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByCnsdntorg($cnsdntorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnsdntorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_CNSDNTORG, $cnsdntorg, $comparison);
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
     * Filter the query on the hstentorg column
     *
     * Example usage:
     * <code>
     * $query->filterByHstentorg('fooValue');   // WHERE hstentorg = 'fooValue'
     * $query->filterByHstentorg('%fooValue%', Criteria::LIKE); // WHERE hstentorg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hstentorg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByHstentorg($hstentorg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hstentorg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentorgTableMap::COL_HSTENTORG, $hstentorg, $comparison);
    }

    /**
     * Filter the query by a related \Tblentprs object
     *
     * @param \Tblentprs|ObjectCollection $tblentprs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByTblentprs($tblentprs, $comparison = null)
    {
        if ($tblentprs instanceof \Tblentprs) {
            return $this
                ->addUsingAlias(TblentorgTableMap::COL_IDNENTPRS, $tblentprs->getIdnentprs(), $comparison);
        } elseif ($tblentprs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentorgTableMap::COL_IDNENTPRS, $tblentprs->toKeyValue('PrimaryKey', 'Idnentprs'), $comparison);
        } else {
            throw new PropelException('filterByTblentprs() only accepts arguments of type \Tblentprs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentprs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function joinTblentprs($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentprs');

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
            $this->addJoinObject($join, 'Tblentprs');
        }

        return $this;
    }

    /**
     * Use the Tblentprs relation Tblentprs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentprsQuery A secondary query class using the current class as primary query
     */
    public function useTblentprsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentprs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentprs', '\TblentprsQuery');
    }

    /**
     * Filter the query by a related \Tblentcln object
     *
     * @param \Tblentcln|ObjectCollection $tblentcln the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByTblentcln($tblentcln, $comparison = null)
    {
        if ($tblentcln instanceof \Tblentcln) {
            return $this
                ->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $tblentcln->getIdnentorg(), $comparison);
        } elseif ($tblentcln instanceof ObjectCollection) {
            return $this
                ->useTblentclnQuery()
                ->filterByPrimaryKeys($tblentcln->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
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
     * Filter the query by a related \Tblentdnc object
     *
     * @param \Tblentdnc|ObjectCollection $tblentdnc the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblentorgQuery The current query, for fluid interface
     */
    public function filterByTblentdnc($tblentdnc, $comparison = null)
    {
        if ($tblentdnc instanceof \Tblentdnc) {
            return $this
                ->addUsingAlias(TblentorgTableMap::COL_IDNENTORG, $tblentdnc->getIdnentorg(), $comparison);
        } elseif ($tblentdnc instanceof ObjectCollection) {
            return $this
                ->useTblentdncQuery()
                ->filterByPrimaryKeys($tblentdnc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblentdnc() only accepts arguments of type \Tblentdnc or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblentdnc relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblentorgQuery The current query, for fluid interface
     */
    public function joinTblentdnc($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblentdnc');

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
            $this->addJoinObject($join, 'Tblentdnc');
        }

        return $this;
    }

    /**
     * Use the Tblentdnc relation Tblentdnc object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TblentdncQuery A secondary query class using the current class as primary query
     */
    public function useTblentdncQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblentdnc($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblentdnc', '\TblentdncQuery');
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
