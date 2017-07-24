<?php

namespace Drupal\carto_hal\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'carto_hal' block.
 *
 * @Block(
 *  id = "Carto_hal"
 * )
 */
class AngularExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    global $base_url;
    $config = \Drupal::config('carto_hal.settings');
    $ApiUrl = $config->get('carto_hal.ApiUrl');
    $CollectionName = $config->get('carto_hal.Collection_name');
    $build['#attached']['library'][] = 'carto_hal/carto_hal.angularjs';
    $build['#attached']['library'][] = 'carto_hal/carto_hal.carto';
    $build['#attached']['drupalSettings']['carto_hal']['url_base'] = $base_url;
    $build['#ApiUrl']=$ApiUrl;
    $build['#CollectionName']=$CollectionName;
    $build['#theme'] = 'carto_hal';
    return $build;
  }

}
