<?php
namespace Drupal\optimized_meta\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class SettingsForm extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'optimized_meta_admin_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'optimized_meta.settings',
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('optimized_meta.settings');

    $form['page_no_index'] = array(
      '#type' => 'details',
      '#title' => $this->t('Enable meta no-index on the following pages'),
      '#open' => TRUE
    );

    $form['page_no_index']['no_index_user'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('User'),
      '#default_value' => $config->get('no_index_user')
    );
	
	$form['page_no_index']['no_index_login'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('User login'),
      '#default_value' => $config->get('no_index_login')
    );
	
	$form['page_no_index']['no_index_register'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('User register'),
      '#default_value' => $config->get('no_index_register')
    );
	
	$form['page_no_index']['no_index_password'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('User password'),
      '#default_value' => $config->get('no_index_register')
    );

    /*$form['facebook']['facebook_logo'] = [
     '#type' => 'managed_file',
     '#title' => $this->t('Logo'),
     '#upload_validators' => array(
         'file_validate_extensions' => array('gif png jpg jpeg'),
         'file_validate_size' => array(25600000),
     ),
     '#theme' => 'image_widget',
     '#preview_image_style' => 'thumbnail',
     '#upload_location' => 'public://social_logo',
     '#required' => FALSE,
     '#default_value' => $config->get('facebook_logo')
    ];*/

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    $this->config('optimized_meta.settings')
      // Set the submitted configuration setting
      ->set('facebook_app_id', $form_state->getValue('facebook_app_id'))
      
      ->save();

    parent::submitForm($form, $form_state);
  }
}