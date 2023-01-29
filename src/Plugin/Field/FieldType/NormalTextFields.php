<?php

namespace Drupal\MODULE_NAME\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
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
// Simple example of a custom field type of two text fields
class NormalTextFields extends FieldItemBase
{

    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['FIELD_ONE'] = DataDefinition::create('string')
            ->setLabel(t('NAME OF THE FIELD'));

        $properties['FIELD_TWO'] = DataDefinition::create('string')
            ->setLabel(t('NAME OF THE FIELD'));

        return $properties;
    }

    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        return [
            'columns' => [
                // Schema for a normal text field
                'FIELD_ONE'        => [
                    'type'     => 'text',
                    'size'     => 'tiny',
                    'not null' => FALSE,
                ],
                // Schema for a normal text field
                'FIELD_TWO' => [
                    'type'     => 'text',
                    'size'     => 'tiny',
                    'not null' => FALSE,
                ],
            ],
        ];
    }

    public function isEmpty()
    {
        if (!empty($this->FIELD_ONE) || !empty($this->FIELD_TWO)) {
            return FALSE;
        }

        return TRUE;
    }
}
