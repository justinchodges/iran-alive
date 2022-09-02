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