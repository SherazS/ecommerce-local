<?php



/**
 * This class defines the structure of the 'cms_category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator..map
 */
class CmsCategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.CmsCategoryTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('cms_category');
        $this->setPhpName('CmsCategory');
        $this->setClassname('CmsCategory');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('cat_id', 'CatId', 'TINYINT', true, null, null);
        $this->addColumn('cat_name', 'CatName', 'VARCHAR', true, 32, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CmsArticle', 'CmsArticle', RelationMap::ONE_TO_MANY, array('cat_id' => 'art_cat_id', ), null, null, 'CmsArticles');
    } // buildRelations()

} // CmsCategoryTableMap
