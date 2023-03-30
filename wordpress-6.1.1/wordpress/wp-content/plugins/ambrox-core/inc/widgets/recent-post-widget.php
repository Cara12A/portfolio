<?php
/**
* @version  1.0
* @package  Ambrox
* @author   Ambrox <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Recent Post Widget
***************************************/

class ambrox_recent_posts_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'ambrox_recent_posts_widget',

                // Widget name will appear in UI
                esc_html__( 'Ambrox :: Recent Posts', 'ambrox' ),

                // Widget description
                array(
                    'classname'                     => 'recent-post',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Recent Posts Widget', 'ambrox' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {
            $title      = apply_filters( 'widget_title', $instance['title'] );
            $show_date  = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
            //Post Count
            if ( isset( $instance[ 'post_count' ] ) ) {
                $post_count = $instance[ 'post_count' ];
            }else {
                $post_count = '2';
            }


            $query_args = array(
                "post_type"         => "post",
                "posts_per_page"    => esc_attr( $post_count ),
                "post_status"       => "publish",
                "ignore_sticky_posts"   => true
            );


            $recentposts = new WP_Query( $query_args );
            echo $args['before_widget'];
            if( !empty( $title  ) ){
                echo $args['before_title'];
                    echo esc_html( $title );
                echo $args['after_title'];
            }
            if( $recentposts->have_posts(  ) ) {
                echo '<ul>';
                     while( $recentposts->have_posts(  ) ) {
                        $recentposts->the_post();               
                        echo '<li>';
                            if( has_post_thumbnail() ){
                                echo '<div class="thumb">';
                                    the_post_thumbnail( 'ambrox_80X80' );
                                echo '</div>';
                            }
                            echo '<div class="info">';
                                if( $show_date ){
                                    echo '<span class="post-date">'.esc_html( get_the_time( 'd F, Y' ) ).'</span>';
                                }
                                echo '<a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( wp_trim_words( get_the_title(), 4, '' ) ).'</a>';
                            echo '</div>';
                        echo '</li>';
                    }
                    wp_reset_postdata();
                echo '</ul>';
            }
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            //Post Count
            if ( isset( $instance[ 'post_count' ] ) ) {
                $post_count = $instance[ 'post_count' ];
            }else {
                $post_count = '4';
            }

            // Show Date
            $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'ambrox'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php _e( 'Number of Posts to show:' ,'ambrox'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="text" value="<?php echo esc_attr( $post_count ); ?>" />
            </p>
            <p>
                <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
    		    <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
            </p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['post_count'] 	= ( ! empty( $new_instance['post_count'] ) ) ? strip_tags( $new_instance['post_count'] ) : '4';
            $instance['show_date']      = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;

            return $instance;
        }
    } // Class ambrox_recent_posts_widget ends here


    // Register and load the widget
    function ambrox_recent_posts_load_widget() {
        register_widget( 'ambrox_recent_posts_widget' );
    }
    add_action( 'widgets_init', 'ambrox_recent_posts_load_widget' );