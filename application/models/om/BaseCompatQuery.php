<?php


/**
 * Base class that represents a query for the 'compat' table.
 *
 *
 *
 * @method CompatQuery orderByCompatId($order = Criteria::ASC) Order by the compat_id column
 * @method CompatQuery orderByCompatProductId($order = Criteria::ASC) Order by the compat_product_id column
 * @method CompatQuery orderByCompatDeviceId($order = Criteria::ASC) Order by the compat_device_id column
 *
 * @method CompatQuery groupByCompatId() Group by the compat_id column
 * @method CompatQuery groupByCompatProductId() Group by the compat_product_id column
 * @method CompatQuery groupByCompatDeviceId() Group by the compat_device_id column
 *
 * @method CompatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CompatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CompatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CompatQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method CompatQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method CompatQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method CompatQuery leftJoinDevice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Device relation
 * @method CompatQuery rightJoinDevice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Device relation
 * @method CompatQuery innerJoinDevice($relationAlias = null) Adds a INNER JOIN clause to the query using the Device relation
 *
 * @method Compat findOne(PropelPDO $con = null) Return the first Compat matching the query
 * @method Compat findOneOrCreate(PropelPDO $con = null) Return the first Compat matching the query, or a new Compat object populated from the query conditions when no match is found
 *
 * @method Compat findOneByCompatProductId(int $compat_product_id) Return the first Compat filtered by the compat_product_id column
 * @method Compat findOneByCompatDeviceId(int $compat_device_id) Return the first Compat filtered by the compat_device_id column
 *
 * @method array findByCompatId(int $compat_id) Return Compat objects filtered by the compat_id column
 * @method array findByCompatProductId(int $compat_product_id) Return Compat objects filtered by the compat_product_id column
 * @method array findByCompatDeviceId(int $compat_device_id) Return Compat objects filtered by the compat_device_id column
 *
 * @package    propel.generator..om
 */
abstract class BaseCompatQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCompatQuery object.
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
            $modelName = 'Compat';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CompatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CompatQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CompatQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CompatQuery) {
            return $criteria;
        }
        $query = new CompatQuery(null, null, $modelAlias);

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
     * @return   Compat|Compat[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CompatPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CompatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Compat A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByCompatId($key, $con = null)
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
     * @return                 Compat A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `compat_id`, `compat_product_id`, `compat_device_id` FROM `compat` WHERE `compat_id` = :p0';
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
            $obj = new Compat();
            $obj->hydrate($row);
            CompatPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Compat|Compat[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Compat[]|mixed the list of results, formatted by the current formatter
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
     * @return CompatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CompatPeer::COMPAT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CompatPeer::COMPAT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the compat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCompatId(1234); // WHERE compat_id = 1234
     * $query->filterByCompatId(array(12, 34)); // WHERE compat_id IN (12, 34)
     * $query->filterByCompatId(array('min' => 12)); // WHERE compat_id >= 12
     * $query->filterByCompatId(array('max' => 12)); // WHERE compat_id <= 12
     * </code>
     *
     * @param     mixed $compatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function filterByCompatId($compatId = null, $comparison = null)
    {
        if (is_array($compatId)) {
            $useMinMax = false;
            if (isset($compatId['min'])) {
                $this->addUsingAlias(CompatPeer::COMPAT_ID, $compatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($compatId['max'])) {
                $this->addUsingAlias(CompatPeer::COMPAT_ID, $compatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompatPeer::COMPAT_ID, $compatId, $comparison);
    }

    /**
     * Filter the query on the compat_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCompatProductId(1234); // WHERE compat_product_id = 1234
     * $query->filterByCompatProductId(array(12, 34)); // WHERE compat_product_id IN (12, 34)
     * $query->filterByCompatProductId(array('min' => 12)); // WHERE compat_product_id >= 12
     * $query->filterByCompatProductId(array('max' => 12)); // WHERE compat_product_id <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $compatProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function filterByCompatProductId($compatProductId = null, $comparison = null)
    {
        if (is_array($compatProductId)) {
            $useMinMax = false;
            if (isset($compatProductId['min'])) {
                $this->addUsingAlias(CompatPeer::COMPAT_PRODUCT_ID, $compatProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($compatProductId['max'])) {
                $this->addUsingAlias(CompatPeer::COMPAT_PRODUCT_ID, $compatProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompatPeer::COMPAT_PRODUCT_ID, $compatProductId, $comparison);
    }

    /**
     * Filter the query on the compat_device_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCompatDeviceId(1234); // WHERE compat_device_id = 1234
     * $query->filterByCompatDeviceId(array(12, 34)); // WHERE compat_device_id IN (12, 34)
     * $query->filterByCompatDeviceId(array('min' => 12)); // WHERE compat_device_id >= 12
     * $query->filterByCompatDeviceId(array('max' => 12)); // WHERE compat_device_id <= 12
     * </code>
     *
     * @see       filterByDevice()
     *
     * @param     mixed $compatDeviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function filterByCompatDeviceId($compatDeviceId = null, $comparison = null)
    {
        if (is_array($compatDeviceId)) {
            $useMinMax = false;
            if (isset($compatDeviceId['min'])) {
                $this->addUsingAlias(CompatPeer::COMPAT_DEVICE_ID, $compatDeviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($compatDeviceId['max'])) {
                $this->addUsingAlias(CompatPeer::COMPAT_DEVICE_ID, $compatDeviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompatPeer::COMPAT_DEVICE_ID, $compatDeviceId, $comparison);
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(CompatPeer::COMPAT_PRODUCT_ID, $product->getProductId(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompatPeer::COMPAT_PRODUCT_ID, $product->toKeyValue('PrimaryKey', 'ProductId'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type Product or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
    }

    /**
     * Filter the query by a related Device object
     *
     * @param   Device|PropelObjectCollection $device The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDevice($device, $comparison = null)
    {
        if ($device instanceof Device) {
            return $this
                ->addUsingAlias(CompatPeer::COMPAT_DEVICE_ID, $device->getDeviceId(), $comparison);
        } elseif ($device instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompatPeer::COMPAT_DEVICE_ID, $device->toKeyValue('PrimaryKey', 'DeviceId'), $comparison);
        } else {
            throw new PropelException('filterByDevice() only accepts arguments of type Device or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Device relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function joinDevice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Device');

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
            $this->addJoinObject($join, 'Device');
        }

        return $this;
    }

    /**
     * Use the Device relation Device object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DeviceQuery A secondary query class using the current class as primary query
     */
    public function useDeviceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDevice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Device', 'DeviceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Compat $compat Object to remove from the list of results
     *
     * @return CompatQuery The current query, for fluid interface
     */
    public function prune($compat = null)
    {
        if ($compat) {
            $this->addUsingAlias(CompatPeer::COMPAT_ID, $compat->getCompatId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
