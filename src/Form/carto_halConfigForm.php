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
 
      '#default_value' => "http://api.archives-ouvertes.fr",
 
      '#required' => TRUE,
 
    );
     $form['Collection_name'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Enter a collection'),
 
      '#default_value' => "univ-lorraine",
 
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
 
      '#default_value' => array("Display_map"), 
            
      '#required' => TRUE,

    );
 
 


$document_types = array(
  'ALL' => t('ALL ( All document type)'),
  'COMM' => t('COMM (communication in a congress)'), 
  'ART' => t('ART (article in a journal)'),
  'IMG' => t('IMG'), 
  'THESE' => t('THESE'),
  'UNDEFINED' => t('UNDEFINED (pre-publication, working paper)'), 
  'OTHER' => t('OTHER (other publication)'),
  'COUV' => t('COUV (book chapter)'), 
  'OUV' => t('OUV (Book (including critical edition and translation))'),
  'DOUV' => t('DOUV (Direction of work, Proceedings)'), 
  'REPORT' => t('REPORT'),
  'HDR' => t('HDR'), 
  'PATENT' => t('PATENT'),
  'VIDEO' => t('VIDEO'), 
  'LECTURE' => t('LECTURE'),
  'NOTE' => t('NOTE (reading note)'), 
   'MAP' => t('MAP'),
  'SON' => t('SON'), 
   'OTHERREPORT' => t('OTHERREPORT (Other report, seminar, workshop)'),
  'PRESCONF' => t('PRESCONF (Document associated with scientific events)'), 
    'POSTER' => t('POSTER')

);
 
    $form['document_types'] = array(
 
      '#type' => 'checkboxes',
 
      '#title' => $this->t('Document types'),
 
      '#options' => $document_types,
 
      '#default_value' => $config->get('carto_hal.document_types'),
      
      '#required' => TRUE,

 
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

    $config->set('carto_hal.document_types', $form_state->getValue('document_types'));

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
