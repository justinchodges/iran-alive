<?php 
global $theme_version;

wp_enqueue_style( 'iran-alive-donate-form-css', get_template_directory_uri() . '/template-parts/blocks/donate-form/donate-form.css', null, $theme_version );
wp_enqueue_script( 'iran-alive-donate-form-js', get_template_directory_uri() . '/assets/javascripts/dist/donate-form.js', null, $theme_version, true );

$formId = get_field( 'form_id' );
$formTemplate = get_field( 'form_template' );

add_modal($formId, $formTemplate);
?>
<div class="donate-form is-one-time" data-form-id="<?= $formId; ?>">
    <div class="donate-form__controller">
        <div class="donate-form__frequencies">
            <button class="donate-form__frequency" value="Give Once" selected="selected">Give Once</button>
            <button class="donate-form__frequency" value="Give Monthly">Give Monthly</button>
        </div>
        <div class="donate-form__card">
            <div class="donate-form__card-title">Choose an amount to give<span class="donate-form__card-title-monthly"> per month</span></div>
            <div class="donate-form__card-container">
                <div class="donate-form__card-amounts donate-form__card-amounts--one-time"></div>
                <div class="donate-form__card-amounts donate-form__card-amounts--monthly"></div>
                <button class="button button-primary donate-form__card-submit">Give</button>
            </div>
        </div>
    </div>
</div>