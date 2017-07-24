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
 
   $render = array(
  'Display_map' => t('Display map'),
  'Display_Table' => t('Display table'), 
);
 
    $form['render'] = array(
 
      '#type' => 'checkboxes',
 
      '#title' => $this->t('Render to generate'),
 
      '#options' => $render,
 
      '#default_value' => $config->get('carto_hal.render'), 
    );
 
 


$document_types = array(
  'ART' => t('ART'),
  'COMM' => t('COMM'), 
);
 
    $form['document_types'] = array(
 
      '#type' => 'checkboxes',
 
      '#title' => $this->t('Render to generate'),
 
      '#options' => $document_types,
 
      '#default_value' => $config->get('carto_hal.document_types'),
 
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
 
    $config->set('carto_hal.render', $form_state->getValue('render'));

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
