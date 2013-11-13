<?php


/**
 * Base class that represents a query for the 'cms_article' table.
 *
 *
 *
 * @method CmsArticleQuery orderByArtId($order = Criteria::ASC) Order by the art_id column
 * @method CmsArticleQuery orderByArtUserId($order = Criteria::ASC) Order by the art_user_id column
 * @method CmsArticleQuery orderByArtCatId($order = Criteria::ASC) Order by the art_cat_id column
 * @method CmsArticleQuery orderByArtTitle($order = Criteria::ASC) Order by the art_title column
 * @method CmsArticleQuery orderByArtText($order = Criteria::ASC) Order by the art_text column
 *
 * @method CmsArticleQuery groupByArtId() Group by the art_id column
 * @method CmsArticleQuery groupByArtUserId() Group by the art_user_id column
 * @method CmsArticleQuery groupByArtCatId() Group by the art_cat_id column
 * @method CmsArticleQuery groupByArtTitle() Group by the art_title column
 * @method CmsArticleQuery groupByArtText() Group by the art_text column
 *
 * @method CmsArticleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CmsArticleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CmsArticleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CmsArticleQuery leftJoinCmsCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the CmsCategory relation
 * @method CmsArticleQuery rightJoinCmsCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CmsCategory relation
 * @method CmsArticleQuery innerJoinCmsCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the CmsCategory relation
 *
 * @method CmsArticleQuery leftJoinUserMain($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserMain relation
 * @method CmsArticleQuery rightJoinUserMain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserMain relation
 * @method CmsArticleQuery innerJoinUserMain($relationAlias = null) Adds a INNER JOIN clause to the query using the UserMain relation
 *
 * @method CmsArticle findOne(PropelPDO $con = null) Return the first CmsArticle matching the query
 * @method CmsArticle findOneOrCreate(PropelPDO $con = null) Return the first CmsArticle matching the query, or a new CmsArticle object populated from the query conditions when no match is found
 *
 * @method CmsArticle findOneByArtUserId(int $art_user_id) Return the first CmsArticle filtered by the art_user_id column
 * @method CmsArticle findOneByArtCatId(int $art_cat_id) Return the first CmsArticle filtered by the art_cat_id column
 * @method CmsArticle findOneByArtTitle(string $art_title) Return the first CmsArticle filtered by the art_title column
 * @method CmsArticle findOneByArtText(string $art_text) Return the first CmsArticle filtered by the art_text column
 *
 * @method array findByArtId(int $art_id) Return CmsArticle objects filtered by the art_id column
 * @method array findByArtUserId(int $art_user_id) Return CmsArticle objects filtered by the art_user_id column
 * @method array findByArtCatId(int $art_cat_id) Return CmsArticle objects filtered by the art_cat_id column
 * @method array findByArtTitle(string $art_title) Return CmsArticle objects filtered by the art_title column
 * @method array findByArtText(string $art_text) Return CmsArticle objects filtered by the art_text column
 *
 * @package    propel.generator..om
 */
abstract class BaseCmsArticleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCmsArticleQuery object.
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
            $modelName = 'CmsArticle';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CmsArticleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CmsArticleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CmsArticleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CmsArticleQuery) {
            return $criteria;
        }
        $query = new CmsArticleQuery(null, null, $modelAlias);

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
     * @return   CmsArticle|CmsArticle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CmsArticlePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CmsArticlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 CmsArticle A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByArtId($key, $con = null)
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
     * @return                 CmsArticle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `art_id`, `art_user_id`, `art_cat_id`, `art_title`, `art_text` FROM `cms_article` WHERE `art_id` = :p0';
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
            $obj = new CmsArticle();
            $obj->hydrate($row);
            CmsArticlePeer::addInstanceToPool($obj, (string) $key);
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
     * @return CmsArticle|CmsArticle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CmsArticle[]|mixed the list of results, formatted by the current formatter
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
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CmsArticlePeer::ART_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CmsArticlePeer::ART_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the art_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtId(1234); // WHERE art_id = 1234
     * $query->filterByArtId(array(12, 34)); // WHERE art_id IN (12, 34)
     * $query->filterByArtId(array('min' => 12)); // WHERE art_id >= 12
     * $query->filterByArtId(array('max' => 12)); // WHERE art_id <= 12
     * </code>
     *
     * @param     mixed $artId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByArtId($artId = null, $comparison = null)
    {
        if (is_array($artId)) {
            $useMinMax = false;
            if (isset($artId['min'])) {
                $this->addUsingAlias(CmsArticlePeer::ART_ID, $artId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($artId['max'])) {
                $this->addUsingAlias(CmsArticlePeer::ART_ID, $artId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CmsArticlePeer::ART_ID, $artId, $comparison);
    }

    /**
     * Filter the query on the art_user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtUserId(1234); // WHERE art_user_id = 1234
     * $query->filterByArtUserId(array(12, 34)); // WHERE art_user_id IN (12, 34)
     * $query->filterByArtUserId(array('min' => 12)); // WHERE art_user_id >= 12
     * $query->filterByArtUserId(array('max' => 12)); // WHERE art_user_id <= 12
     * </code>
     *
     * @see       filterByUserMain()
     *
     * @param     mixed $artUserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByArtUserId($artUserId = null, $comparison = null)
    {
        if (is_array($artUserId)) {
            $useMinMax = false;
            if (isset($artUserId['min'])) {
                $this->addUsingAlias(CmsArticlePeer::ART_USER_ID, $artUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($artUserId['max'])) {
                $this->addUsingAlias(CmsArticlePeer::ART_USER_ID, $artUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CmsArticlePeer::ART_USER_ID, $artUserId, $comparison);
    }

    /**
     * Filter the query on the art_cat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtCatId(1234); // WHERE art_cat_id = 1234
     * $query->filterByArtCatId(array(12, 34)); // WHERE art_cat_id IN (12, 34)
     * $query->filterByArtCatId(array('min' => 12)); // WHERE art_cat_id >= 12
     * $query->filterByArtCatId(array('max' => 12)); // WHERE art_cat_id <= 12
     * </code>
     *
     * @see       filterByCmsCategory()
     *
     * @param     mixed $artCatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByArtCatId($artCatId = null, $comparison = null)
    {
        if (is_array($artCatId)) {
            $useMinMax = false;
            if (isset($artCatId['min'])) {
                $this->addUsingAlias(CmsArticlePeer::ART_CAT_ID, $artCatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($artCatId['max'])) {
                $this->addUsingAlias(CmsArticlePeer::ART_CAT_ID, $artCatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CmsArticlePeer::ART_CAT_ID, $artCatId, $comparison);
    }

    /**
     * Filter the query on the art_title column
     *
     * Example usage:
     * <code>
     * $query->filterByArtTitle('fooValue');   // WHERE art_title = 'fooValue'
     * $query->filterByArtTitle('%fooValue%'); // WHERE art_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByArtTitle($artTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artTitle)) {
                $artTitle = str_replace('*', '%', $artTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CmsArticlePeer::ART_TITLE, $artTitle, $comparison);
    }

    /**
     * Filter the query on the art_text column
     *
     * Example usage:
     * <code>
     * $query->filterByArtText('fooValue');   // WHERE art_text = 'fooValue'
     * $query->filterByArtText('%fooValue%'); // WHERE art_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artText The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function filterByArtText($artText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artText)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artText)) {
                $artText = str_replace('*', '%', $artText);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CmsArticlePeer::ART_TEXT, $artText, $comparison);
    }

    /**
     * Filter the query by a related CmsCategory object
     *
     * @param   CmsCategory|PropelObjectCollection $cmsCategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CmsArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCmsCategory($cmsCategory, $comparison = null)
    {
        if ($cmsCategory instanceof CmsCategory) {
            return $this
                ->addUsingAlias(CmsArticlePeer::ART_CAT_ID, $cmsCategory->getCatId(), $comparison);
        } elseif ($cmsCategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CmsArticlePeer::ART_CAT_ID, $cmsCategory->toKeyValue('PrimaryKey', 'CatId'), $comparison);
        } else {
            throw new PropelException('filterByCmsCategory() only accepts arguments of type CmsCategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CmsCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function joinCmsCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CmsCategory');

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
            $this->addJoinObject($join, 'CmsCategory');
        }

        return $this;
    }

    /**
     * Use the CmsCategory relation CmsCategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CmsCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCmsCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCmsCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CmsCategory', 'CmsCategoryQuery');
    }

    /**
     * Filter the query by a related UserMain object
     *
     * @param   UserMain|PropelObjectCollection $userMain The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CmsArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserMain($userMain, $comparison = null)
    {
        if ($userMain instanceof UserMain) {
            return $this
                ->addUsingAlias(CmsArticlePeer::ART_USER_ID, $userMain->getUserId(), $comparison);
        } elseif ($userMain instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CmsArticlePeer::ART_USER_ID, $userMain->toKeyValue('PrimaryKey', 'UserId'), $comparison);
        } else {
            throw new PropelException('filterByUserMain() only accepts arguments of type UserMain or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserMain relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function joinUserMain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserMain');

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
            $this->addJoinObject($join, 'UserMain');
        }

        return $this;
    }

    /**
     * Use the UserMain relation UserMain object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserMainQuery A secondary query class using the current class as primary query
     */
    public function useUserMainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserMain($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserMain', 'UserMainQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CmsArticle $cmsArticle Object to remove from the list of results
     *
     * @return CmsArticleQuery The current query, for fluid interface
     */
    public function prune($cmsArticle = null)
    {
        if ($cmsArticle) {
            $this->addUsingAlias(CmsArticlePeer::ART_ID, $cmsArticle->getArtId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
