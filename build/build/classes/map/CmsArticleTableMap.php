<?php



/**
 * This class defines the structure of the 'cms_article' table.
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
class CmsArticleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.CmsArticleTableMap';

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
        $this->setName('cms_article');
        $this->setPhpName('CmsArticle');
        $this->setClassname('CmsArticle');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('art_id', 'ArtId', 'INTEGER', true, null, null);
        $this->addForeignKey('art_user_id', 'ArtUserId', 'INTEGER', 'user_main', 'user_id', true, null, null);
        $this->addForeignKey('art_cat_id', 'ArtCatId', 'TINYINT', 'cms_category', 'cat_id', true, null, null);
        $this->addColumn('art_title', 'ArtTitle', 'VARCHAR', true, 64, null);
        $this->addColumn('art_text', 'ArtText', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CmsCategory', 'CmsCategory', RelationMap::MANY_TO_ONE, array('art_cat_id' => 'cat_id', ), null, null);
        $this->addRelation('UserMain', 'UserMain', RelationMap::MANY_TO_ONE, array('art_user_id' => 'user_id', ), null, null);
    } // buildRelations()

} // CmsArticleTableMap
