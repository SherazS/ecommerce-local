<?php


/**
 * Base class that represents a query for the 'device' table.
 *
 *
 *
 * @method DeviceQuery orderByDeviceId($order = Criteria::ASC) Order by the device_id column
 * @method DeviceQuery orderByDeviceName($order = Criteria::ASC) Order by the device_name column
 *
 * @method DeviceQuery groupByDeviceId() Group by the device_id column
 * @method DeviceQuery groupByDeviceName() Group by the device_name column
 *
 * @method DeviceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DeviceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DeviceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DeviceQuery leftJoinCompat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Compat relation
 * @method DeviceQuery rightJoinCompat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Compat relation
 * @method DeviceQuery innerJoinCompat($relationAlias = null) Adds a INNER JOIN clause to the query using the Compat relation
 *
 * @method Device findOne(PropelPDO $con = null) Return the first Device matching the query
 * @method Device findOneOrCreate(PropelPDO $con = null) Return the first Device matching the query, or a new Device object populated from the query conditions when no match is found
 *
 * @method Device findOneByDeviceName(string $device_name) Return the first Device filtered by the device_name column
 *
 * @method array findByDeviceId(int $device_id) Return Device objects filtered by the device_id column
 * @method array findByDeviceName(string $device_name) Return Device objects filtered by the device_name column
 *
 * @package    propel.generator..om
 */
abstract class BaseDeviceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDeviceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'induction';
        }
        if (null === $modelName) {
            $modelName = 'Device';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DeviceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DeviceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DeviceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DeviceQuery) {
            return $criteria;
        }
        $query = new DeviceQuery(null, null, $modelAlias);

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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Device|Device[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DevicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DevicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Device A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDeviceId($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Device A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `device_id`, `device_name` FROM `device` WHERE `device_id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Device();
            $obj->hydrate($row);
            DevicePeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Device|Device[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Device[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DevicePeer::DEVICE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DevicePeer::DEVICE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the device_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceId(1234); // WHERE device_id = 1234
     * $query->filterByDeviceId(array(12, 34)); // WHERE device_id IN (12, 34)
     * $query->filterByDeviceId(array('min' => 12)); // WHERE device_id >= 12
     * $query->filterByDeviceId(array('max' => 12)); // WHERE device_id <= 12
     * </code>
     *
     * @param     mixed $deviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceId($deviceId = null, $comparison = null)
    {
        if (is_array($deviceId)) {
            $useMinMax = false;
            if (isset($deviceId['min'])) {
                $this->addUsingAlias(DevicePeer::DEVICE_ID, $deviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deviceId['max'])) {
                $this->addUsingAlias(DevicePeer::DEVICE_ID, $deviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DevicePeer::DEVICE_ID, $deviceId, $comparison);
    }

    /**
     * Filter the query on the device_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDeviceName('fooValue');   // WHERE device_name = 'fooValue'
     * $query->filterByDeviceName('%fooValue%'); // WHERE device_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $deviceName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function filterByDeviceName($deviceName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deviceName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $deviceName)) {
                $deviceName = str_replace('*', '%', $deviceName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DevicePeer::DEVICE_NAME, $deviceName, $comparison);
    }

    /**
     * Filter the query by a related Compat object
     *
     * @param   Compat|PropelObjectCollection $compat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DeviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompat($compat, $comparison = null)
    {
        if ($compat instanceof Compat) {
            return $this
                ->addUsingAlias(DevicePeer::DEVICE_ID, $compat->getCompatDeviceId(), $comparison);
        } elseif ($compat instanceof PropelObjectCollection) {
            return $this
                ->useCompatQuery()
                ->filterByPrimaryKeys($compat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCompat() only accepts arguments of type Compat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Compat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function joinCompat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Compat');

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
            $this->addJoinObject($join, 'Compat');
        }

        return $this;
    }

    /**
     * Use the Compat relation Compat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompatQuery A secondary query class using the current class as primary query
     */
    public function useCompatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Compat', 'CompatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Device $device Object to remove from the list of results
     *
     * @return DeviceQuery The current query, for fluid interface
     */
    public function prune($device = null)
    {
        if ($device) {
            $this->addUsingAlias(DevicePeer::DEVICE_ID, $device->getDeviceId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
