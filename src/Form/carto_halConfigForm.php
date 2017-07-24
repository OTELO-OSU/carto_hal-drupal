<?php
 

namespace Drupal\carto_hal\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class carto_halConfigForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'carto_hal_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('carto_hal.settings');
 
    $form['ApiUrl'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Enter ApiUrl'),
 
      '#default_value' => $config->get('carto_hal.ApiUrl'),
 
      '#required' => TRUE,
 
    );
     $form['Collection_name'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Enter a collection'),
 
      '#default_value' => $config->get('carto_hal.Collection_name'),
 
      '#required' => TRUE,
 
    );
 
    $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
 
    $node_type_titles = array();

    foreach ($node_types as $machine_name => $val) {
 
      $node_type_titles[$machine_name] = $val->label();
 
    }
 
    $form['node_types'] = array(
 
      '#type' => 'checkboxes',
 
      '#title' => $this->t('Render to generate'),
 
      '#options' => $node_type_titles,
 
      '#default_value' => $config->get('carto_hal.node_types'),
 
    );
 
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('carto_hal.settings');
 
    $config->set('carto_hal.ApiUrl', $form_state->getValue('ApiUrl'));

    $config->set('carto_hal.Collection_name', $form_state->getValue('Collection_name'));
 
    $config->set('carto_hal.node_types', $form_state->getValue('node_types'));
 
    $config->save();
 
    return parent::submitForm($form, $form_state);
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'carto_hal.settings',
 
    ];
 
  }
 
}
