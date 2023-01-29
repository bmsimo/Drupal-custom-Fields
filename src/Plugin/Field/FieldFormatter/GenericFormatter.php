<?php

namespace Drupal\MODULE_NAME\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

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
class GenericFormatter extends FormatterBase
{

    /**
     * {@inheritdoc}
     */
    public function viewElements(FieldItemListInterface $items, $langcode)
    {
        $elements = [];

        foreach ($items as $delta => $item) {
            // The text value has no text format assigned to it, so the user input
            // should equal the output, including newlines.
            $elements[$delta] = [
                '#type' => 'inline_template',
                '#template' => '{{ value|nl2br }}',
                '#context' => ['value' => $item->value],
            ];
        }

        return $elements;
    }
}
