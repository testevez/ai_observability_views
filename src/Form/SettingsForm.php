<?php

namespace Drupal\ai_observability_views\Form;

use Drupal\ai_observability\EventSubscriber\AiEventsSubscriber;
use Drupal\Core\Config\TypedConfigManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure AI Observability settings.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   */
  const CONFIG_NAME = AiEventsSubscriber::CONFIG_NAME;

  /**
   * A TypedConfigManager.
   *
   * @var \Drupal\Core\Config\TypedConfigManagerInterface
   */
  protected TypedConfigManagerInterface $configTyped;

  /**
   * The kernel service.
   *
   * @var \Drupal\Core\DrupalKernelInterface
   */
  protected $kernel;

  /**
   * The typed configuration for settings.
   *
   * @var \Drupal\Core\Config\Schema\TypedConfigInterface|null
   */
  protected $settingsTyped;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create(...func_get_args());
    $instance->kernel = $container->get('kernel');
    $instance->configTyped = $container->get('config.typed');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ai_observability_views_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      self::CONFIG_NAME,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(self::CONFIG_NAME);

    $form['description'] = [
      '#markup' => $this->t('Placeholder.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
  }

}
