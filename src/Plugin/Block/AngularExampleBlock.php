<?php

namespace Drupal\carto_hal\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'carto_hal' block.
 *
 * @Block(
 *  id = "Carto_hal",
 *  admin_label = @Translation("Carto HAL"),
 * )
 */
class AngularExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    global $base_url;
    $build['#attached']['library'][] = 'carto_hal/carto_hal.angularjs';
    $build['#attached']['library'][] = 'carto_hal/carto_hal.carto';
   
 

    $build['#attached']['drupalSettings']['carto_hal']['url_base'] = $base_url;
    $build['#theme'] = 'angularjs_form';
    return $build;
  }

}
