<?php



/**
 * This class defines the structure of the 'compat' table.
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
class CompatTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.CompatTableMap';

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
        $this->setName('compat');
        $this->setPhpName('Compat');
        $this->setClassname('Compat');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('compat_id', 'CompatId', 'INTEGER', true, null, null);
        $this->addForeignKey('compat_product_id', 'CompatProductId', 'INTEGER', 'product', 'product_id', true, null, null);
        $this->addForeignKey('compat_device_id', 'CompatDeviceId', 'TINYINT', 'device', 'device_id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('compat_product_id' => 'product_id', ), null, null);
        $this->addRelation('Device', 'Device', RelationMap::MANY_TO_ONE, array('compat_device_id' => 'device_id', ), null, null);
    } // buildRelations()

} // CompatTableMap
