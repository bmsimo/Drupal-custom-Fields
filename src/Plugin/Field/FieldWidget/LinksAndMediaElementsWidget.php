<?php

namespace Drupal\MODULE_NAME\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @FieldWidget(
 *   id = "YOUR_DEFAULT_WIDGET",
 *   label = @Translation("THE LABEL THAT WILL BE DISPLAYED"),
 *   description = @Translation("A SIMPLE DESCRIPTION OF THE FIELD"),
 *   field_types = {
 *     "YOUR_FIELD_TYPE_ID"
 *   }
 * )
 */
class LinksAndMediaElementsWidget extends WidgetBase
{

    /**
     * {@inheritdoc}
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {

        // Get the field name and field type.
        $field_name = $this->fieldDefinition->getName();

        // Create form elements for each field in the field type.
        $element['title'] = [
            '#type'          => 'textfield',
            '#title'         => t('title'),
            '#default_value' => $items[$delta]->title ?? NULL,
            '#attributes'    => [
                'style' => 'width: 100%;',
            ],
        ];


        $element['link_uri'] = [
            '#type'             => 'url',
            '#title'            => t('URL'),
            '#default_value'    => $items[$delta]->link_uri ?? NULL,
            '#maxlength'        => 2048,
            "#link_type"        => 16,
            "#required"         => FALSE,
            '#attributes'       => [
                'style' => 'width: 100%;',
            ],
            '#element_validate' => [
                [LinkWidget::class, 'validateUriElement'],
            ],
            '#states'           => [
                'required' => [
                    ':input[name="' . $field_name . '[' . $delta . '][link_title]"]' => ['filled' => TRUE],

                ],
            ],
        ];

        $element['link_title'] = [
            '#type'          => 'textfield',
            '#title'         => t('link_title'),
            '#default_value' => $items[$delta]->link_title ?? NULL,
            "#maxlength"     => 255,
            '#attributes'    => [
                'style' => 'width: 100%;',
            ],
        ];

        // Image field
        $element['image_target_id'] = [
            '#type'            => 'media_library',
            '#title'           => t('Image'),
            '#allowed_bundles' => ['image'],
            '#default_value'   => $items[$delta]->image_target_id ?? NULL,
            '#attributes'      => [
                'style' => 'width: 100%;',
            ],
        ];


        $element['description'] = [
            '#type'          => 'textfield',
            '#title'         => t('Description'),
            '#default_value' => $items[$delta]->description ?? NULL,
            '#attributes'    => [
                'style' => 'width: 100%;',
            ],
        ];


        return $element;
    }
}
