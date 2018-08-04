<?php

namespace App;

/**
* Theme customizer
*/
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
  // Add postMessage support
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->selective_refresh->add_partial('blogname', [
    'selector' => '.brand',
    'render_callback' => function () {
      bloginfo('name');
    }
  ]);

  $wp_customize->add_section( 'simple_settings' , array(
    'title'      => __( 'Simple Settings', 'simple' ),
    'priority'   => 30,
    'capability'  => 'edit_theme_options',
  ) );

  $wp_customize->add_setting( 'themecolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
    array(
      'default'    => 'bright', //Default setting/value to save
      'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
      'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    )
  );

  $wp_customize->add_control(
    'simple_themecolor', //Set a unique ID for the control
    array(
      'label'      => __( 'Color Palette', 'simple' ), //Admin-visible name of the control
      'section'    => 'simple_settings', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
      'settings'   => 'themecolor', //Which setting to load and manipulate (serialized is okay)
      'priority'   => 15, //Determines the order this control appears in for the specified section
      'type'       => 'select',
      'choices'    => array(
        'bright'    => 'Bright',
        'chrome'    => 'Chrome',
        'executive' => 'Executive',
        'grass'     => 'Grass',
        'ocean'     => 'Ocean',
        'sunrise'   => 'Sunrise',
      ),
    )
  );

  $wp_customize->add_setting( 'themefonts', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
    array(
      'default'    => '1', //Default setting/value to save
      'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
      'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    )
  );

  $wp_customize->add_control(
    'simple_themefonts', //Set a unique ID for the control
    array(
      'label'      => __( 'Font Pairing', 'simple' ), //Admin-visible name of the control
      'section'    => 'simple_settings', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
      'settings'   => 'themefonts', //Which setting to load and manipulate (serialized is okay)
      'priority'   => 10, //Determines the order this control appears in for the specified section
      'type'       => 'select',
      'choices'    => array(
        '1'     => 'Option 1 (Bitter - Source Sans Pro)',
        '2'     => 'Option 2 (Didact Gothic - Arimo)',
        '3'     => 'Option 3 (Fjalla One - Crimson Text)',
        '4'     => 'Option 4 (Dancing Script - Open Sans)',
        '5'     => 'Option 5 (Open Sans - Libre Baskerville)',
        '6'     => 'Option 6 (Ovo - Muli)',
      ),
    )
  );

});

/**
* Customizer JS
*/
add_action('customize_preview_init', function () {
  wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});
