<?php


/**
 * Base class that represents a query for the 'product' table.
 *
 *
 *
 * @method ProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method ProductQuery orderByProductCategoryId($order = Criteria::ASC) Order by the product_category_id column
 * @method ProductQuery orderByProductName($order = Criteria::ASC) Order by the product_name column
 * @method ProductQuery orderByProductImage($order = Criteria::ASC) Order by the product_image column
 * @method ProductQuery orderByProductDescription($order = Criteria::ASC) Order by the product_description column
 * @method ProductQuery orderByProductPrice($order = Criteria::ASC) Order by the product_price column
 * @method ProductQuery orderByProductQuantity($order = Criteria::ASC) Order by the product_quantity column
 *
 * @method ProductQuery groupByProductId() Group by the product_id column
 * @method ProductQuery groupByProductCategoryId() Group by the product_category_id column
 * @method ProductQuery groupByProductName() Group by the product_name column
 * @method ProductQuery groupByProductImage() Group by the product_image column
 * @method ProductQuery groupByProductDescription() Group by the product_description column
 * @method ProductQuery groupByProductPrice() Group by the product_price column
 * @method ProductQuery groupByProductQuantity() Group by the product_quantity column
 *
 * @method ProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProductQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProductQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProductQuery leftJoinCompat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Compat relation
 * @method ProductQuery rightJoinCompat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Compat relation
 * @method ProductQuery innerJoinCompat($relationAlias = null) Adds a INNER JOIN clause to the query using the Compat relation
 *
 * @method Product findOne(PropelPDO $con = null) Return the first Product matching the query
 * @method Product findOneOrCreate(PropelPDO $con = null) Return the first Product matching the query, or a new Product object populated from the query conditions when no match is found
 *
 * @method Product findOneByProductCategoryId(int $product_category_id) Return the first Product filtered by the product_category_id column
 * @method Product findOneByProductName(string $product_name) Return the first Product filtered by the product_name column
 * @method Product findOneByProductImage(string $product_image) Return the first Product filtered by the product_image column
 * @method Product findOneByProductDescription(string $product_description) Return the first Product filtered by the product_description column
 * @method Product findOneByProductPrice(int $product_price) Return the first Product filtered by the product_price column
 * @method Product findOneByProductQuantity(int $product_quantity) Return the first Product filtered by the product_quantity column
 *
 * @method array findByProductId(int $product_id) Return Product objects filtered by the product_id column
 * @method array findByProductCategoryId(int $product_category_id) Return Product objects filtered by the product_category_id column
 * @method array findByProductName(string $product_name) Return Product objects filtered by the product_name column
 * @method array findByProductImage(string $product_image) Return Product objects filtered by the product_image column
 * @method array findByProductDescription(string $product_description) Return Product objects filtered by the product_description column
 * @method array findByProductPrice(int $product_price) Return Product objects filtered by the product_price column
 * @method array findByProductQuantity(int $product_quantity) Return Product objects filtered by the product_quantity column
 *
 * @package    propel.generator..om
 */
abstract class BaseProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductQuery object.
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
            $modelName = 'Product';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductQuery) {
            return $criteria;
        }
        $query = new ProductQuery(null, null, $modelAlias);

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
     * @return   Product|Product[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Product A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByProductId($key, $con = null)
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
     * @return                 Product A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `product_id`, `product_category_id`, `product_name`, `product_image`, `product_description`, `product_price`, `product_quantity` FROM `product` WHERE `product_id` = :p0';
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
            $obj = new Product();
            $obj->hydrate($row);
            ProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Product|Product[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Product[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductPeer::PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductPeer::PRODUCT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id >= 12
     * $query->filterByProductId(array('max' => 12)); // WHERE product_id <= 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the product_category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductCategoryId(1234); // WHERE product_category_id = 1234
     * $query->filterByProductCategoryId(array(12, 34)); // WHERE product_category_id IN (12, 34)
     * $query->filterByProductCategoryId(array('min' => 12)); // WHERE product_category_id >= 12
     * $query->filterByProductCategoryId(array('max' => 12)); // WHERE product_category_id <= 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $productCategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductCategoryId($productCategoryId = null, $comparison = null)
    {
        if (is_array($productCategoryId)) {
            $useMinMax = false;
            if (isset($productCategoryId['min'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_CATEGORY_ID, $productCategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productCategoryId['max'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_CATEGORY_ID, $productCategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_CATEGORY_ID, $productCategoryId, $comparison);
    }

    /**
     * Filter the query on the product_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductName('fooValue');   // WHERE product_name = 'fooValue'
     * $query->filterByProductName('%fooValue%'); // WHERE product_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductName($productName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productName)) {
                $productName = str_replace('*', '%', $productName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_NAME, $productName, $comparison);
    }

    /**
     * Filter the query on the product_image column
     *
     * Example usage:
     * <code>
     * $query->filterByProductImage('fooValue');   // WHERE product_image = 'fooValue'
     * $query->filterByProductImage('%fooValue%'); // WHERE product_image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productImage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductImage($productImage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productImage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productImage)) {
                $productImage = str_replace('*', '%', $productImage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_IMAGE, $productImage, $comparison);
    }

    /**
     * Filter the query on the product_description column
     *
     * Example usage:
     * <code>
     * $query->filterByProductDescription('fooValue');   // WHERE product_description = 'fooValue'
     * $query->filterByProductDescription('%fooValue%'); // WHERE product_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductDescription($productDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productDescription)) {
                $productDescription = str_replace('*', '%', $productDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_DESCRIPTION, $productDescription, $comparison);
    }

    /**
     * Filter the query on the product_price column
     *
     * Example usage:
     * <code>
     * $query->filterByProductPrice(1234); // WHERE product_price = 1234
     * $query->filterByProductPrice(array(12, 34)); // WHERE product_price IN (12, 34)
     * $query->filterByProductPrice(array('min' => 12)); // WHERE product_price >= 12
     * $query->filterByProductPrice(array('max' => 12)); // WHERE product_price <= 12
     * </code>
     *
     * @param     mixed $productPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductPrice($productPrice = null, $comparison = null)
    {
        if (is_array($productPrice)) {
            $useMinMax = false;
            if (isset($productPrice['min'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_PRICE, $productPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productPrice['max'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_PRICE, $productPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_PRICE, $productPrice, $comparison);
    }

    /**
     * Filter the query on the product_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByProductQuantity(1234); // WHERE product_quantity = 1234
     * $query->filterByProductQuantity(array(12, 34)); // WHERE product_quantity IN (12, 34)
     * $query->filterByProductQuantity(array('min' => 12)); // WHERE product_quantity >= 12
     * $query->filterByProductQuantity(array('max' => 12)); // WHERE product_quantity <= 12
     * </code>
     *
     * @param     mixed $productQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductQuantity($productQuantity = null, $comparison = null)
    {
        if (is_array($productQuantity)) {
            $useMinMax = false;
            if (isset($productQuantity['min'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_QUANTITY, $productQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productQuantity['max'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_QUANTITY, $productQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_QUANTITY, $productQuantity, $comparison);
    }

    /**
     * Filter the query by a related Category object
     *
     * @param   Category|PropelObjectCollection $category The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($category, $comparison = null)
    {
        if ($category instanceof Category) {
            return $this
                ->addUsingAlias(ProductPeer::PRODUCT_CATEGORY_ID, $category->getCategoryId(), $comparison);
        } elseif ($category instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductPeer::PRODUCT_CATEGORY_ID, $category->toKeyValue('PrimaryKey', 'CategoryId'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type Category or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation Category object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'CategoryQuery');
    }

    /**
     * Filter the query by a related Compat object
     *
     * @param   Compat|PropelObjectCollection $compat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompat($compat, $comparison = null)
    {
        if ($compat instanceof Compat) {
            return $this
                ->addUsingAlias(ProductPeer::PRODUCT_ID, $compat->getCompatProductId(), $comparison);
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
     * @return ProductQuery The current query, for fluid interface
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
     * @param   Product $product Object to remove from the list of results
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function prune($product = null)
    {
        if ($product) {
            $this->addUsingAlias(ProductPeer::PRODUCT_ID, $product->getProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
