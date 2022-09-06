<?php
function get_image_srcset( $image ) 
{
    if ( 
        !is_array( $image ) 
        || !isset( $image['sizes'] )
    ) return '';

    $sizes = array();

    foreach ( $image['sizes'] as $key => $value ) 
    {
        if (
            in_array( $key, array(
                'small',
                'medium',
                'medium_large',
                'large'
            ) )        
        )
        {
            $sizes[] = $value . ' ' . $image['sizes'][$key . '-width'] . 'w';
        }
    }

    return implode( ',', $sizes );
}

global $modals;
$modals = array();

function add_modal( $id, $content )
{
    global $modals;
    $modals[$id] = $content;
}

function get_modals() {
    global $modals;

    if ( empty( $modals ) ) return '';

    foreach ( $modals as $key => $value )
    {
?>
    <div class="modal donate-form__modal" data-modal="<?= $key; ?>">
        <div class="modal__container">
            <div class="modal__header">
                <button class="modal__close" title="Close the modal">X</button>
            </div>
            <div class="modal__content">
                <?= $value; ?>
            </div>
        </div>
    </div>
<?php
    }
}