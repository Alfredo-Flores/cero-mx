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
 * @method     ChildTblentempQuery orderByIdnentprs($order = Criteria::ASC) Order by the idnentprs column
 * @method     ChildTblentempQuery orderByIdngirorg($order = Criteria::ASC) Order by the idngirorg column
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
 * @method     ChildTblentempQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildTblentempQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildTblentempQuery groupByIdnentemp() Group by the idnentemp column
 * @method     ChildTblentempQuery groupByUuid() Group by the uuid column
 * @method     ChildTblentempQuery groupByIdnentprs() Group by the idnentprs column
 * @method     ChildTblentempQuery groupByIdngirorg() Group by the idngirorg column
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
 * @method     ChildTblentempQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildTblentempQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildTblentempQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblentempQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblentempQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblentempQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblentempQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblentempQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblentempQuery leftJoinTblentprs($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentprs relation
 * @method     ChildTblentempQuery rightJoinTblentprs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentprs relation
 * @method     ChildTblentempQuery innerJoinTblentprs($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentprs relation
 *
 * @method     ChildTblentempQuery joinWithTblentprs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentprs relation
 *
 * @method     ChildTblentempQuery leftJoinWithTblentprs() Adds a LEFT JOIN clause and with to the query using the Tblentprs relation
 * @method     ChildTblentempQuery rightJoinWithTblentprs() Adds a RIGHT JOIN clause and with to the query using the Tblentprs relation
 * @method     ChildTblentempQuery innerJoinWithTblentprs() Adds a INNER JOIN clause and with to the query using the Tblentprs relation
 *
 * @method     ChildTblentempQuery leftJoinCatgirorg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Catgirorg relation
 * @method     ChildTblentempQuery rightJoinCatgirorg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Catgirorg relation
 * @method     ChildTblentempQuery innerJoinCatgirorg($relationAlias = null) Adds a INNER JOIN clause to the query using the Catgirorg relation
 *
 * @method     ChildTblentempQuery joinWithCatgirorg($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Catgirorg relation
 *
 * @method     ChildTblentempQuery leftJoinWithCatgirorg() Adds a LEFT JOIN clause and with to the query using the Catgirorg relation
 * @method     ChildTblentempQuery rightJoinWithCatgirorg() Adds a RIGHT JOIN clause and with to the query using the Catgirorg relation
 * @method     ChildTblentempQuery innerJoinWithCatgirorg() Adds a INNER JOIN clause and with to the query using the Catgirorg relation
 *
 * @method     ChildTblentempQuery leftJoinTblentcln($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentcln relation
 * @method     ChildTblentempQuery rightJoinTblentcln($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentcln relation
 * @method     ChildTblentempQuery innerJoinTblentcln($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentcln relation
 *
 * @method     ChildTblentempQuery joinWithTblentcln($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentcln relation
 *
 * @method     ChildTblentempQuery leftJoinWithTblentcln() Adds a LEFT JOIN clause and with to the query using the Tblentcln relation
 * @method     ChildTblentempQuery rightJoinWithTblentcln() Adds a RIGHT JOIN clause and with to the query using the Tblentcln relation
 * @method     ChildTblentempQuery innerJoinWithTblentcln() Adds a INNER JOIN clause and with to the query using the Tblentcln relation
 *
 * @method     ChildTblentempQuery leftJoinTblentdnc($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblentdnc relation
 * @method     ChildTblentempQuery rightJoinTblentdnc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblentdnc relation
 * @method     ChildTblentempQuery innerJoinTblentdnc($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblentdnc relation
 *
 * @method     ChildTblentempQuery joinWithTblentdnc($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblentdnc relation
 *
 * @method     ChildTblentempQuery leftJoinWithTblentdnc() Adds a LEFT JOIN clause and with to the query using the Tblentdnc relation
 * @method     ChildTblentempQuery rightJoinWithTblentdnc() Adds a RIGHT JOIN clause and with to the query using the Tblentdnc relation
 * @method     ChildTblentempQuery innerJoinWithTblentdnc() Adds a INNER JOIN clause and with to the query using the Tblentdnc relation
 *
 * @method     \TblentprsQuery|\CatgirorgQuery|\TblentclnQuery|\TblentdncQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblentemp findOne(ConnectionInterface $con = null) Return the first ChildTblentemp matching the query
 * @method     ChildTblentemp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblentemp matching the query, or a new ChildTblentemp object populated from the query conditions when no match is found
 *
 * @method     ChildTblentemp findOneByIdnentemp(string $idnentemp) Return the first ChildTblentemp filtered by the idnentemp column
 * @method     ChildTblentemp findOneByUuid(string $uuid) Return the first ChildTblentemp filtered by the uuid column
 * @method     ChildTblentemp findOneByIdnentprs(string $idnentprs) Return the first ChildTblentemp filtered by the idnentprs column
 * @method     ChildTblentemp findOneByIdngirorg(string $idngirorg) Return the first ChildTblentemp filtered by the idngirorg column
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
 * @method     ChildTblentemp findOneByDetentemo(string $detentemo) Return the first ChildTblentemp filtered by the detentemo column
 * @method     ChildTblentemp findOneByCreatedAt(string $created_at) Return the first ChildTblentemp filtered by the created_at column
 * @method     ChildTblentemp findOneByUpdatedAt(string $updated_at) Return the first ChildTblentemp filtered by the updated_at column *

 * @method     ChildTblentemp requirePk($key, ConnectionInterface $con = null) Return the ChildTblentemp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOne(ConnectionInterface $con = null) Return the first ChildTblentemp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentemp requireOneByIdnentemp(string $idnentemp) Return the first ChildTblentemp filtered by the idnentemp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByUuid(string $uuid) Return the first ChildTblentemp filtered by the uuid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByIdnentprs(string $idnentprs) Return the first ChildTblentemp filtered by the idnentprs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByIdngirorg(string $idngirorg) Return the first ChildTblentemp filtered by the idngirorg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
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
 * @method     ChildTblentemp requireOneByCreatedAt(string $created_at) Return the first ChildTblentemp filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblentemp requireOneByUpdatedAt(string $updated_at) Return the first ChildTblentemp filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblentemp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblentemp objects based on current ModelCriteria
 * @method     ChildTblentemp[]|ObjectCollection findByIdnentemp(string $idnentemp) Return ChildTblentemp objects filtered by the idnentemp column
 * @method     ChildTblentemp[]|ObjectCollection findByUuid(string $uuid) Return ChildTblentemp objects filtered by the uuid column
 * @method     ChildTblentemp[]|ObjectCollection findByIdnentprs(string $idnentprs) Return ChildTblentemp objects filtered by the idnentprs column
 * @method     ChildTblentemp[]|ObjectCollection findByIdngirorg(string $idngirorg) Return ChildTblentemp objects filtered by the idngirorg column
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
 * @method     ChildTblentemp[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildTblentemp objects filtered by the created_at column
 * @method     ChildTblentemp[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildTblentemp objects filtered by the updated_at column
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
    public function __construct($dbName = 'cerodb', $modelName = '\\Tblentemp', $modelAlias = null)
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
        $sql = 'SELECT idnentemp, uuid, idnentprs, idngirorg, namentemp, logentemp, drcentemp, lclentemp, mncentemp, ententemp, pasentorg, cdgpstemp, cdgtrbemp, girentemp, tlfofiemp, emlofiemp, desaliemp, candonemp, temconemp, horentemp, detentemo, created_at, updated_at FROM tblentemp WHERE idnentemp = :p0';
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByIdnentprs($idnentprs = null, $comparison = null)
    {
        if (is_array($idnentprs)) {
            $useMinMax = false;
            if (isset($idnentprs['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNENTPRS, $idnentprs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idnentprs['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNENTPRS, $idnentprs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_IDNENTPRS, $idnentprs, $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByIdngirorg($idngirorg = null, $comparison = null)
    {
        if (is_array($idngirorg)) {
            $useMinMax = false;
            if (isset($idngirorg['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNGIRORG, $idngirorg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idngirorg['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_IDNGIRORG, $idngirorg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_IDNGIRORG, $idngirorg, $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TblentempTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TblentempTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblentempTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Tblentprs object
     *
     * @param \Tblentprs|ObjectCollection $tblentprs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByTblentprs($tblentprs, $comparison = null)
    {
        if ($tblentprs instanceof \Tblentprs) {
            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNENTPRS, $tblentprs->getIdnentprs(), $comparison);
        } elseif ($tblentprs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNENTPRS, $tblentprs->toKeyValue('PrimaryKey', 'Idnentprs'), $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
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
     * Filter the query by a related \Catgirorg object
     *
     * @param \Catgirorg|ObjectCollection $catgirorg The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByCatgirorg($catgirorg, $comparison = null)
    {
        if ($catgirorg instanceof \Catgirorg) {
            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNGIRORG, $catgirorg->getIdngirorg(), $comparison);
        } elseif ($catgirorg instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNGIRORG, $catgirorg->toKeyValue('PrimaryKey', 'Idngirorg'), $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
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
     * Filter the query by a related \Tblentcln object
     *
     * @param \Tblentcln|ObjectCollection $tblentcln the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByTblentcln($tblentcln, $comparison = null)
    {
        if ($tblentcln instanceof \Tblentcln) {
            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $tblentcln->getIdnentemp(), $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
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
     * @return ChildTblentempQuery The current query, for fluid interface
     */
    public function filterByTblentdnc($tblentdnc, $comparison = null)
    {
        if ($tblentdnc instanceof \Tblentdnc) {
            return $this
                ->addUsingAlias(TblentempTableMap::COL_IDNENTEMP, $tblentdnc->getIdnentemp(), $comparison);
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
     * @return $this|ChildTblentempQuery The current query, for fluid interface
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
