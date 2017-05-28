
function display_news_in_page(){
	$party_id = (int)$_GET['party-id'];
		$post_info = '';
		if($party_id > 0) {
			$post_info .= '<h1>';
			$post_info .= get_post_field('post_title', $party_id);
			$post_info .= '</h1><br>';
			$post_info .= get_post_field('post_date', $party_id);
			$post_info .= '<br>';
			$post_info .= get_post_field('post_content', $party_id);
			return $post_info;
		} else {
				$args = array( 'numberposts' => '1', 'post_type' => 'party' );
				$recent_posts = wp_get_recent_posts( $args );
				$post_info = '';
				foreach( $recent_posts as $recent ){
					$post_info .= '<h1>' . $recent['post_title'] . '</h1><br>';
					$post_info .= $recent['post_date'] . '<br>';
					$post_info .= $recent['post_content'];
				return $post_info;
				}
		}
}

add_shortcode( 'display_news_in_page', 'display_news_in_page' );