<?php 

/* ========================================================================= */
/* !WORDPRESS COMMENTS HTML FUNCTION */
/* ========================================================================= */

function jhfn_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;  
    //print_r($comment);

    /* Check if post is by Author for special styling */
    $isByAuthor = false; 
    if($comment->comment_author_email == get_the_author_meta('email')) {  
      $isByAuthor = true;  
    }  
?>  

<li>
    <h4><?php echo $comment->comment_author; ?><span><?php printf(__('%1$s | %2$s'), get_comment_date('F j,Y'),  get_comment_time('g:ia')); ?> <?php edit_comment_link(__('Edit'),'  ','') ?></span></h4>
    <?php comment_text(); ?>
</li>

<?php }