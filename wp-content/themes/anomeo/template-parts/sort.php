<?php
        $args = array(
            'order'    => (isset($_GET['dir']) ? $_GET['dir'] : 'ASC')
        );
        query_posts( $args );
    ?>

<a href="<?get_page_uri()?>?dir=DESC">Newest to Oldest</a>
<a href="<?get_page_uri()?>?dir=ASC">Oldest to Newest</a>