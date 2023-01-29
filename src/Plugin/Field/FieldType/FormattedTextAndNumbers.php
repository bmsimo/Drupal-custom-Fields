
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
class FormattedTextAndNumbers extends FieldItemBase
{

    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['FIELD_ONE'] = DataDefinition::create('string')
            ->setLabel(t('FIELD_ONE'));

        $properties['FIELD_TWO'] = DataDefinition::create('integer')
            ->setLabel(t('FIELD_TWO'));

        $properties['FIELD_THREE']        = DataDefinition::create('string')
            ->setLabel(t('FIELD_THREE'));
        $properties['FIELD_FOUR'] = DataDefinition::create('integer')
            ->setLabel(t('FIELD_FOUR'));
        $properties['FIELD_FIVE']        = DataDefinition::create('string')
            ->setLabel(t('FIELD_FIVE'));

        $properties['FIELD_SIX'] = DataDefinition::create('string')
            ->setLabel(t('FIELD_SIX'));

        $properties['FIELD_SEVEN'] = DataDefinition::create('integer')
            ->setLabel(t('FIELD_SEVEN'));

        return $properties;
    }

    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        // Create a table with three columns. one for a text field, one for a number
        // field, and one for a long text field.
        return [
            'columns' => [
                'FIELD_ONE'        => [
                    'type'     => 'text',
                    'size'   => 'tiny',
                    'not null' => FALSE,
                ],
                'FIELD_TWO' => [
                    'type'     => 'int',
                    'size'     => 'normal',
                    'not null' => FALSE,
                ],
                'FIELD_THREE'         => [
                    'type'     => 'text',
                    'size'   => 'tiny',
                    'not null' => FALSE,
                ],
                'FIELD_FOUR'  => [
                    'type'     => 'int',
                    'size'     => 'normal',
                    'not null' => FALSE,
                ],
                'FIELD_FIVE'         => [
                    'type'     => 'text',
                    'size'   => 'tiny',
                    'not null' => FALSE,
                ],
                'FIELD_SIX'         => [
                    'type'     => 'text',
                    'size'     => 'big',
                    'not null' => FALSE,
                ],
                'FIELD_SEVEN'          => [
                    'type'     => 'int',
                    'size'     => 'normal',
                    'not null' => FALSE,
                ],
            ],
        ];
    }

    public function isEmpty()
    {
        $FIELD_ONE = $this->get('FIELD_ONE')->getValue();
        $FIELD_THREE  = $this->get('FIELD_THREE')->getValue();
        $FIELD_SIX  = $this->get('FIELD_SIX')->getValue();


        if (empty($FIELD_ONE) && empty($FIELD_THREE) && empty($FIELD_SIX)) {
            return TRUE;
        }
        return FALSE;
    }
}
