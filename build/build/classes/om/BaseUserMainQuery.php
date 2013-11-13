<?php


/**
 * Base class that represents a query for the 'user_main' table.
 *
 *
 *
 * @method UserMainQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method UserMainQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method UserMainQuery orderByUserPass($order = Criteria::ASC) Order by the user_pass column
 * @method UserMainQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 *
 * @method UserMainQuery groupByUserId() Group by the user_id column
 * @method UserMainQuery groupByUserName() Group by the user_name column
 * @method UserMainQuery groupByUserPass() Group by the user_pass column
 * @method UserMainQuery groupByUserEmail() Group by the user_email column
 *
 * @method UserMainQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserMainQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserMainQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserMainQuery leftJoinCmsArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the CmsArticle relation
 * @method UserMainQuery rightJoinCmsArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CmsArticle relation
 * @method UserMainQuery innerJoinCmsArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the CmsArticle relation
 *
 * @method UserMain findOne(PropelPDO $con = null) Return the first UserMain matching the query
 * @method UserMain findOneOrCreate(PropelPDO $con = null) Return the first UserMain matching the query, or a new UserMain object populated from the query conditions when no match is found
 *
 * @method UserMain findOneByUserName(string $user_name) Return the first UserMain filtered by the user_name column
 * @method UserMain findOneByUserPass(string $user_pass) Return the first UserMain filtered by the user_pass column
 * @method UserMain findOneByUserEmail(string $user_email) Return the first UserMain filtered by the user_email column
 *
 * @method array findByUserId(int $user_id) Return UserMain objects filtered by the user_id column
 * @method array findByUserName(string $user_name) Return UserMain objects filtered by the user_name column
 * @method array findByUserPass(string $user_pass) Return UserMain objects filtered by the user_pass column
 * @method array findByUserEmail(string $user_email) Return UserMain objects filtered by the user_email column
 *
 * @package    propel.generator..om
 */
abstract class BaseUserMainQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserMainQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'mycms';
        }
        if (null === $modelName) {
            $modelName = 'UserMain';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserMainQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UserMainQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserMainQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserMainQuery) {
            return $criteria;
        }
        $query = new UserMainQuery(null, null, $modelAlias);

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
     * @return   UserMain|UserMain[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserMainPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserMainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UserMain A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByUserId($key, $con = null)
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
     * @return                 UserMain A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `user_id`, `user_name`, `user_pass`, `user_email` FROM `user_main` WHERE `user_id` = :p0';
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
            $obj = new UserMain();
            $obj->hydrate($row);
            UserMainPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UserMain|UserMain[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UserMain[]|mixed the list of results, formatted by the current formatter
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
     * @return UserMainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserMainPeer::USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserMainPeer::USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id >= 12
     * $query->filterByUserId(array('max' => 12)); // WHERE user_id <= 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserMainPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserMainPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserMainPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the user_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUserName('fooValue');   // WHERE user_name = 'fooValue'
     * $query->filterByUserName('%fooValue%'); // WHERE user_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function filterByUserName($userName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userName)) {
                $userName = str_replace('*', '%', $userName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserMainPeer::USER_NAME, $userName, $comparison);
    }

    /**
     * Filter the query on the user_pass column
     *
     * Example usage:
     * <code>
     * $query->filterByUserPass('fooValue');   // WHERE user_pass = 'fooValue'
     * $query->filterByUserPass('%fooValue%'); // WHERE user_pass LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userPass The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function filterByUserPass($userPass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userPass)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userPass)) {
                $userPass = str_replace('*', '%', $userPass);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserMainPeer::USER_PASS, $userPass, $comparison);
    }

    /**
     * Filter the query on the user_email column
     *
     * Example usage:
     * <code>
     * $query->filterByUserEmail('fooValue');   // WHERE user_email = 'fooValue'
     * $query->filterByUserEmail('%fooValue%'); // WHERE user_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function filterByUserEmail($userEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userEmail)) {
                $userEmail = str_replace('*', '%', $userEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserMainPeer::USER_EMAIL, $userEmail, $comparison);
    }

    /**
     * Filter the query by a related CmsArticle object
     *
     * @param   CmsArticle|PropelObjectCollection $cmsArticle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserMainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCmsArticle($cmsArticle, $comparison = null)
    {
        if ($cmsArticle instanceof CmsArticle) {
            return $this
                ->addUsingAlias(UserMainPeer::USER_ID, $cmsArticle->getArtUserId(), $comparison);
        } elseif ($cmsArticle instanceof PropelObjectCollection) {
            return $this
                ->useCmsArticleQuery()
                ->filterByPrimaryKeys($cmsArticle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCmsArticle() only accepts arguments of type CmsArticle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CmsArticle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function joinCmsArticle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CmsArticle');

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
            $this->addJoinObject($join, 'CmsArticle');
        }

        return $this;
    }

    /**
     * Use the CmsArticle relation CmsArticle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CmsArticleQuery A secondary query class using the current class as primary query
     */
    public function useCmsArticleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCmsArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CmsArticle', 'CmsArticleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UserMain $userMain Object to remove from the list of results
     *
     * @return UserMainQuery The current query, for fluid interface
     */
    public function prune($userMain = null)
    {
        if ($userMain) {
            $this->addUsingAlias(UserMainPeer::USER_ID, $userMain->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
