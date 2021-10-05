<?php
/**
 * @file
 * Contains Drupal\slack_update\Form\SlackSettingsForm.
 */
namespace Drupal\slack_update\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SlackSettingsForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'slack_update.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'slack_update_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('slack_update.adminsettings');

    $form['hook_url'] = [
      '#type' => 'textfield',
      '#title' => 'Hook URL',
      '#description' => 'This is the Slack "Webook URL".  This should have been set up by an administrator of your slack channel.',
      '#default_value' => $config->get('hook_url'),
    ];
    $form['contactform_machine_name'] = [
      '#type' => 'textfield',
      '#title' => 'Contact Form Machine Name',
      '#description' => 'Machine Name of the Contact Form to Hook (for example, contact_us)',
      '#default_value' => $config->get('contactform_machine_name'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('slack_update.adminsettings')
      ->set('hook_url', $form_state->getValue('hook_url'))
      ->set('contactform_machine_name', $form_state->getValue('contactform_machine_name'))
      ->save();
  }
}
