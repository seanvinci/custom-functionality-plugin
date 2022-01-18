<?php

/***************************/
/**** REGISTER WIDGETS *****/
/***************************/

function register_widget_areas() {

  // Homepage (Top)
  register_sidebar(array(
    'name'          => 'Homepage (Top)',
    'id'            => 'homepage-top',
    'description'   => 'Widgets added here will appear near the top of the Homepage.',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

} add_action( 'widgets_init', 'register_widget_areas' );


/***************************/
/***** CREATE WIDGETS ******/
/***************************/


// Text with CTA

class text_with_cta extends WP_Widget {
  function __construct() {
    parent::__construct(
      'text_with_cta',
      __('Text with CTA'),
      array(
        'description' => __( 'Display text and a call to action.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $title = get_field('title', 'widget_' . $widget_id);
    $description = get_field('description', 'widget_' . $widget_id);
    $cta_text = get_field('cta_text', 'widget_' . $widget_id);
    $cta_url = get_field('cta_url', 'widget_' . $widget_id); ?>
    <section class="content-block-small gray-bg" id="feattext">
      <div class="row">
        <div class="medium-10 medium-push-1 columns tac">
          <?php if ($title) echo '<h4 class="mb15px">'.$title.'</h4>'; ?>
          <?php if ($description) echo '<p>'.$description.'</p>'; ?>
          <?php if ($cta_url && $cta_text) echo '<a class="button white-button outline-button mt25px" href="'.$cta_url.'">'.$cta_text.'</a>'; ?>
        </div>
      </div>
    </section>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'text_with_cta' );
});

?>