<?php



/**
 * This class defines the structure of the 'device' table.
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
class DeviceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.DeviceTableMap';

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
        $this->setName('device');
        $this->setPhpName('Device');
        $this->setClassname('Device');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('device_id', 'DeviceId', 'TINYINT', true, null, null);
        $this->addColumn('device_name', 'DeviceName', 'VARCHAR', true, 64, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Compat', 'Compat', RelationMap::ONE_TO_MANY, array('device_id' => 'compat_device_id', ), null, null, 'Compats');
    } // buildRelations()

} // DeviceTableMap
