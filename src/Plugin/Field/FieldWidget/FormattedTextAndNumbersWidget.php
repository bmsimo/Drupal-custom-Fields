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
class FormattedTextAndNumbersWidget extends WidgetBase
{

    /**
     * {@inheritdoc}
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {


        // Create form elements for each field in the field type.
        $element['FIELD_ONE'] = [
            '#type'          => 'textfield',
            '#title'         => t('FIELD_ONE'),
            '#default_value' => $items[$delta]->FIELD_ONE ?? NULL,
            '#attributes'    => [
                'style' => 'width: 100%;',
            ],
        ];

        $element['FIELD_TWO'] = [
            '#type'          => 'number',
            '#title'         => t('FIELD_TWO'),
            '#default_value' => (isset($items[$delta]->FIELD_TWO) && !empty($items[$delta]->FIELD_TWO)) ? $items[$delta]->FIELD_TWO : 0,
            '#attributes'    => [
                'style' => 'width: 120px;',
            ],
        ];


        $element['FIELD_THREE'] = [
            '#type'          => 'textfield',
            '#title'         => t('FIELD_THREE'),
            '#default_value' => $items[$delta]->FIELD_THREE ?? NULL,
            '#attributes'    => [
                'style' => 'width: 100%;',
            ],
        ];

        $element['FIELD_FOUR'] = [
            '#type'          => 'number',
            '#title'         => t('FIELD_FOUR'),
            '#default_value' => isset($items[$delta]->FIELD_FOUR) ? $items[$delta]->FIELD_FOUR : 0,
            '#attributes'    => [
                'style' => 'width: 120px;',
            ],
        ];


        $element['FIELD_FIVE'] = [
            '#type'          => 'textfield',
            '#title'         => t('FIELD_FIVE'),
            '#default_value' => $items[$delta]->FIELD_FIVE ?? NULL,
            '#attributes'    => [
                'style' => 'width: 100%;',
            ],
        ];

        $element['FIELD_SIX'] = [
            '#type'          => 'text_format',
            '#title'         => t('FIELD_SIX'),
            '#format'        => 'full_html', // Or any format you want.
            "#base_type"     => "textarea",
            '#default_value' => isset($items[$delta]->FIELD_SIX) ? $items[$delta]->FIELD_SIX : NULL,
        ];

        $element['FIELD_SEVEN'] = [
            '#type'          => 'number',
            '#title'         => t('FIELD_SEVEN'),
            '#default_value' => isset($items[$delta]->FIELD_SEVEN) ? $items[$delta]->FIELD_SEVEN : 0,
            '#attributes'    => [
                'style' => 'width: 100px;',
            ],
        ];


        return $element;
    }

    public function massageFormValues(array $values, array $form, FormStateInterface $form_state)
    {
        foreach ($values as $key => $value) {
            $values[$key]['FIELD_SIX'] = $value['FIELD_SIX']['value'];
        }
        return $values;
    }

    /**
     * {@inheritdoc}
     */
    public function errorElement(array $element, ConstraintViolationInterface $violation, array $form, FormStateInterface $form_state)
    {
        if (
            $violation->arrayPropertyPath == ['FIELD_TWO'] && !is_numeric($element['FIELD_TWO']['#value'])
            || $violation->arrayPropertyPath == ['FIELD_FOUR'] && !is_numeric($element['FIELD_FOUR']['#value'])
            || $violation->arrayPropertyPath == ['FIELD_SEVEN'] && !is_numeric($element['FIELD_SEVEN']['#value'])
        ) {
            return FALSE;
        }
        return $element;
    }
}
