<?php

namespace Drupal\MODULE_NAME\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteWidget;
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
class EntityReferenceAndIntegerWidget extends EntityReferenceAutocompleteWidget
{
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {
        $widget = parent::formElement($items, $delta, $element, $form, $form_state);

        $widget['priority'] = array(
            '#title'         => $this->t('Priority'),
            '#type'          => 'number',
            '#default_value' => isset($items[$delta]) ? $items[$delta]->priority : 1, // If no value is set, we set it to 1
            '#min'           => 1,
            '#weight'        => 10,
        );

        return $widget;
    }
}
