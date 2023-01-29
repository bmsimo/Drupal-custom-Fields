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
class NormalTextFieldsWidget extends WidgetBase
{

    /**
     * {@inheritdoc}
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {

        $element['FIELD_ONE'] = [
            '#title'  => $this->t('FIELD ONE'),
            '#type'   => 'textfield',
            '#default_value' => isset($items[$delta]) ? $items[$delta]->FIELD_ONE : NULL,
            '#weight' => 10,
        ];

        $element['FIELD_TWO'] = [
            '#title'  => $this->t('FIELD TWO'),
            '#type'   => 'textfield',
            '#default_value' => isset($items[$delta]) ? $items[$delta]->FIELD_TWO : NULL,
            '#weight' => 10,
        ];

        return $element;
    }
}
