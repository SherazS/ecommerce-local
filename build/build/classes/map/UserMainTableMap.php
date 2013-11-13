<?php



/**
 * This class defines the structure of the 'user_main' table.
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
class UserMainTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.UserMainTableMap';

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
        $this->setName('user_main');
        $this->setPhpName('UserMain');
        $this->setClassname('UserMain');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('user_name', 'UserName', 'VARCHAR', true, 32, null);
        $this->addColumn('user_pass', 'UserPass', 'VARCHAR', true, 32, null);
        $this->addColumn('user_email', 'UserEmail', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CmsArticle', 'CmsArticle', RelationMap::ONE_TO_MANY, array('user_id' => 'art_user_id', ), null, null, 'CmsArticles');
    } // buildRelations()

} // UserMainTableMap
