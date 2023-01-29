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

class LinksAndMediaElements extends FieldItemBase
{

    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['title'] = DataDefinition::create('string')
            ->setLabel(t('Title'));

        $properties['link_uri'] = DataDefinition::create('string')
            ->setLabel(t('URL'));

        $properties['link_title'] = DataDefinition::create('string')
            ->setLabel(t('TITLE'));

        $properties['image_target_id'] = DataDefinition::create('integer')
            ->setLabel(t('IMAGE'));

        $properties['description'] = DataDefinition::create('string')
            ->setLabel(t('description'));

        return $properties;
    }

    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        return [
            'columns' => [
                'title'            => [
                    'type'     => 'text',
                    'size'     => 'tiny',
                    'not null' => FALSE,
                ],
                'link_uri'        => [
                    'type'     => 'varchar',
                    'length'   => 2048,
                    'not null' => FALSE,
                ],
                'link_title'      => [
                    'type'     => 'varchar',
                    'length'   => 255,
                    'not null' => FALSE,
                ],
                'description' => [
                    'type'     => 'text',
                    'size'     => 'tiny',
                    'not null' => FALSE,
                ],
                'image_target_id'  => [
                    'type'     => 'int',
                    'size'     => 'normal',
                    'not null' => FALSE,
                    'unsigned' => TRUE,
                ],
            ],
            'indexes' => [
                'image_target_id' => ['image_target_id'],
                'link_uri'       => ['link_uri'],
            ],
        ];
    }

    public function isEmpty()
    {
        if (
            !empty($this->title)
            || !empty($this->link_uri)
            || !empty($this->link_title)
            || !empty($this->description)
            || !empty($this->image_target_id)
        ) {
            return FALSE;
        }

        return TRUE;
    }
}
