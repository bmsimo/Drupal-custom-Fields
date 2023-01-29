<?php

namespace Drupal\MODULE_NAME\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "YOUR_FIELD_TYPE_ID",
 *   label = @Translation("THE LABEL THAT WILL BE DISPLAYED"),
 *   description = @Translation("A SIMPLE DESCRIPTION OF THE FIELD"),
 *   category = @Translation("THE CATEGORY WHERE IT WILL BE DISPLAYED"),
 *   default_widget = "YOUR_DEFAULT_WIDGET",
 *   default_formatter = "YOUR_DEFAULT_FORMATTER",
 * )
 */
class EntityReferenceAndInteger extends EntityReferenceItem
{
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {

        $properties              = parent::propertyDefinitions($field_definition);

        $priority_definition     = DataDefinition::create('integer')
            ->setLabel(t('Priority'))
            ->setRequired(true); // If we want the field to be required
        $properties['priority'] = $priority_definition;

        return $properties;
    }

    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        $schema                         = parent::schema($field_definition);

        // The schema normally used in Drupal for integer fields
        $schema['columns']['priority'] = array(
            'type'     => 'int',
            'size'     => 'normal',
            'unsigned' => true,
        );

        return $schema;
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        if (!empty($this->priority)) {
            // If the field is not empty, we return false and the information is saved
            return false;
        }
        return true;
    }
}
