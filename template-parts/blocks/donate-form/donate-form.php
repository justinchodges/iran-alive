<?php 
$formId = get_field( 'form_id' ); 
add_modal($formId, <<<EOD
<div id="FkhAzHcKBz">
    <script type="text/javascript" src="https://default.salsalabs.org/api/widget/template/9d40cc74-69c0-4cae-b1dd-865122e92256/?tId={$formId}" ></script>
</div>
EOD);
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