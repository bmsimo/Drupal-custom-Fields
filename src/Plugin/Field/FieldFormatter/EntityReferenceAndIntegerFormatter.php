<?php

namespace Drupal\MODULE_NAME\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;

/**
 * @FieldFormatter(
 *   id = "YOUR_DEFAULT_FORMATTER",
 *   label = @Translation("THE LABEL THAT WILL BE DISPLAYED"),
 *   description = @Translation("A SIMPLE DESCRIPTION OF THE FIELD"),
 *   field_types = {
 *     "YOUR_FIELD_TYPE_ID"
 *   }
 * )
 */
class FieldFormatterName extends EntityReferenceLabelFormatter
{

    public function viewElements(FieldItemListInterface $items, $langcode)
    {
        $elements = parent::viewElements($items, $langcode);
        $values   = $items->getValue();

        foreach ($elements as $delta => $entity) {
            $elements[$delta]['#suffix'] = ' Priority: ' . $values[$delta]['priority'];
        }


        if (\Drupal::routeMatch()->getRouteName() == 'view.MYVIEW') { // OPTIONAL
            foreach ($elements as $delta => $entity) {
                $elements[$delta]['#prefix'] = '<div class="teaser-title">';
                $elements[$delta]['#suffix'] = '</div><div class="teaser-priority">priority: ' . $values[$delta]['priority'] . '</div>';
            }
        } // OPTIONAL

        // OPTIONAL: Order by [$values[ $delta ]['priority']]
        usort($elements, function ($a, $b) {
            return $a['#suffix'] <=> $b['#suffix'];
        });

        return $elements;
    }
}
