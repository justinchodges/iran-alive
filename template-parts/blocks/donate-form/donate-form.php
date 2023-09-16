<?php 
$formId = get_field( 'form_id' );
$formTemplate = get_field( 'form_template' );

DonateForm( array(
    'form_id'   => $formId,
    'form_template' => $formTemplate
) );