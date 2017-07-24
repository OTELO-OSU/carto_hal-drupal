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
    $DisplayMap = $config->get('carto_hal.render');
    $DocumentType = $config->get('carto_hal.document_types');
    $type="";
    foreach ($DocumentType as $key => $value) {
      if ($value!==0) {
        if ($value=="ALL") {
          break;
        }
        $type=$type.','.$value;
      }
      }
      $type=preg_replace('/,/','', $type, 1);
    
    if($DisplayMap['Display_map']!==0){
    	$Displaymap="true";
    	}
    	else{
    	$Displaymap="false";
    }
      if($DisplayMap['Display_Table']!==0){
    	$DisplayTable="true";
    	}
    	else{
    	$DisplayTable="false";
    }

    $build['#attached']['library'][] = 'carto_hal/carto_hal.angularjs';
    $build['#attached']['library'][] = 'carto_hal/carto_hal.carto';
    $build['#attached']['drupalSettings']['carto_hal']['url_base'] = $base_url;
    $build['#ApiUrl']=$ApiUrl;
    $build['#CollectionName']=$CollectionName;
    $build['#DisplayMap']=$Displaymap;
    $build['#DisplayTable']=$DisplayTable;
    $build['#document_types']=$type;
    $build['#theme'] = 'carto_hal';
    return $build;
  }

}
