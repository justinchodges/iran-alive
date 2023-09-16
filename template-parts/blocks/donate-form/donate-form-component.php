<?php 
class DonateFormProps {
    public  string  $form_id;
    public  string  $form_template;

    public function __construct( $props = array() ) {
        foreach ( $props as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }
    }

    public function to_array() {
        return array(
            'form_id' => $this->form_id,
            'form_template' => $this->form_template,
        );
    }
}

function DonateForm( $props = array() ) {
    global $theme_version;
    
    if ( !$props instanceof DonateFormProps ) {
        $props = new DonateFormProps( $props );
    }

    $donateForm = array(
        'form_id' => $props->form_id,
        'form_template' => $props->form_template,
    );

    foreach ( $props as $key => $value ) {
        if ( array_key_exists( $donateForm, $key ) ) {
            $donateForm[$key] = $value;
        }
    }

    wp_enqueue_script( 'iran-alive-donate-form-js', get_template_directory_uri() . '/assets/javascripts/dist/donate-form.js', null, $theme_version, true );

    add_modal( $donateForm['form_id'], $donateForm['form_template'] );
?>
<div class="donate-form is-one-time" data-form-id="<?= $donateForm['form_id']; ?>">
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
<?php
}