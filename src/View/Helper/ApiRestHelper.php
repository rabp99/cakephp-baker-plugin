<?php
declare(strict_types=1);

namespace Rabp99\Bake\View\Helper;

use Cake\Core\ConventionsTrait;
use Cake\ORM\Table;
use Bake\View\Helper\BakeHelper;
use Cake\Utility\Inflector;

/**
 * Bake helper
 */
class ApiRestHelper extends BakeHelper
{
    use ConventionsTrait;

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * AssociationFilter utility
     *
     * @var \Bake\Utility\Model\AssociationFilter|null
     */
    protected $_associationFilter = null;
    
    public function getFieldsForFilter(Table $table) {
        $fields = $table->getSchema()->columns();
        
        $createdIndex = array_search('created', $fields);
        unset($fields[$createdIndex]);
        
        $modifiedIndex = array_search('modified', $fields);
        unset($fields[$modifiedIndex]);
        
        return array_values($fields);
    }
    
    public function getPrimaryKey(Table $table) {
        return $table->getPrimaryKey();
    }
    
    public function getPrimaryKeyVars(array $primaryKey) {
        $primaryKey = array_map(function($key) {
            return Inflector::variable($key);
        }, $primaryKey);
        return '$' . implode(', $', $primaryKey);
    }
}
