<?php



/**
 * This class defines the structure of the 'product' table.
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
class ProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.ProductTableMap';

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
        $this->setName('product');
        $this->setPhpName('Product');
        $this->setClassname('Product');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addForeignKey('product_category_id', 'ProductCategoryId', 'TINYINT', 'category', 'category_id', true, null, null);
        $this->addColumn('product_name', 'ProductName', 'VARCHAR', true, 64, null);
        $this->addColumn('product_image', 'ProductImage', 'VARCHAR', true, 64, null);
        $this->addColumn('product_description', 'ProductDescription', 'VARCHAR', true, 256, null);
        $this->addColumn('product_price', 'ProductPrice', 'FLOAT', true, null, null);
        $this->addColumn('product_quantity', 'ProductQuantity', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', 'Category', RelationMap::MANY_TO_ONE, array('product_category_id' => 'category_id', ), null, null);
        $this->addRelation('Compat', 'Compat', RelationMap::ONE_TO_MANY, array('product_id' => 'compat_product_id', ), null, null, 'Compats');
    } // buildRelations()

} // ProductTableMap
