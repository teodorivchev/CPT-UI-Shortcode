

   function display_custom_post_type(){
        $args = array(
            'post_type' => 'news',
            'post_status' => 'publish',
			'posts_per_page' => 3
        );

        $string = '';
        $query = new WP_Query( $args );
        if( $query->have_posts() ){
            $string .= '<div>';
            while( $query->have_posts() ){
				
                $query->the_post();
                $string .= '<h3>' . get_the_title() . '</h3>';
				$string .= '<p>' .get_the_post_thumbnail().'</p>';
				$string .= '<p>'.get_the_content().'</p>';
            }
            $string .= '</div>';
        }
        wp_reset_postdata();
        return $string;
    }
add_shortcode( 'news', 'display_custom_post_type' );
