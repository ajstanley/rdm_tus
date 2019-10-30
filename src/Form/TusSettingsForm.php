<?php

namespace Drupal\tus\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LCLookupSettingsForm.
 */
class TusSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'tus.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tus_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $scheme_options = ['public://' => 'public', 'private://' => 'private'];
    $form['scheme'] = [
      '#type' => 'radios',
      '#description' => $this->t('File system to store cache'),
      '#title' => t('File system'),
      '#options' => $scheme_options,
      '#default_value' => $this->config('tus.settings')->get('scheme'),
      '#required' => TRUE,
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('tus.settings')
      ->set('scheme', $form_state->getValue('scheme'))
      ->save();
  }

}
