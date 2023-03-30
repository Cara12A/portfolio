<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Portfolio Banner Widget .
 *
 */
class Ambrox_Portfolio_Banner extends Widget_Base {

	public function get_name() {
		return 'ambroxportfoliobanner';
	}

	public function get_title() {
		return __( 'Portfolio Banner', 'ambrox' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'ambrox_portfolio' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'p_banner_section',
			[
				'label' 	=> __( 'Banner For Portfolio', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'shadow_text',
			[
				'label'     => __( 'Shadow Text', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Welcome', 'ambrox' )
			]
        );
        $this->add_control(
			'hello_text',
			[
				'label'     => __( 'Hello Text', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Hi', 'ambrox' ),
			]
        );
        $this->add_control(
			'name',
			[
				'label'     => __( 'Name', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( " I'm <span>Easton</span>", 'ambrox' ),
			]
        );
        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Banner Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'skill',
			[
				'label'     => __( 'Skill', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( "WordPress", 'ambrox' ),
			]
        );
		$this->add_control(

			'skills',
			[
				'label' 		=> __( 'Add Your Skill', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'skill' => __( 'WordPress','ambrox' ),
					],
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'ambrox' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'ambrox' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'ambrox' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','ambrox' ),
					],
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'ambrox' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'ambrox' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'ambrox' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);


        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="auto-height bg-fixed banner-style-one">';
	        echo '<div class="container">';
	            echo '<div class="double-items">';
	                echo '<div class="row align-center">';

	                    echo '<div class="col-lg-6 info">';
	                        echo '<h1 class="text-invisible">WELCOME</h1>';
	                        echo '<h2>'.esc_html($settings['hello_text']).' <img src="'.AMBROX_PLUGDIRURI . 'assets/img/4.png" alt="Icon"> '.wp_kses_post($settings['name']).'</h2>';

	                        echo '<h3 class="title">';
	                            echo '<span class="header-caption" id="page-top">';
	                                echo '<!-- type headline start-->';
	                                echo '<span class="cd-headline clip is-full-width">';
	                                    echo '<!-- ROTATING TEXT -->';
	                                    echo '<span class="cd-words-wrapper">';
	                                        $i = 0;
	                                    	foreach( $settings['skills'] as $data ){
	                                    		$i++;
	                                    		$class = ($i == 1 ) ? 'is-visible' : 'is-hidden';
		                                        echo '<b class="'.esc_attr($class).'">'.esc_html($data['skill']).'</b>';
		                                    }
	                                    echo '</span>';
	                                echo '</span>';
	                                echo '<!-- type headline end -->';
	                            echo '</span>';
	                        echo '</h3>';
	                        if( ! empty( $settings['button_text']  )) {
	                        	if( ! empty( $settings['button_link']['url'] ) ) {
						            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
						            $this->add_render_attribute( 'button', 'class', 'btn btn-md circle btn-dark' );
						        }

						        if( ! empty( $settings['button_link']['nofollow'] ) ) {
						            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
						        }

						        if( ! empty( $settings['button_link']['is_external'] ) ) {
						            $this->add_render_attribute( 'button', 'target', '_blank' );
						        }

		                        echo '<div class="button mt-55">';
		                            echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html($settings['button_text']).'</a>';
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                    if(!empty($settings['image']['url'])){
		                    echo '<div class="col-lg-6 thumb" data-wow-delay="900ms">';
		                        echo '<img class=" wow fadeInDown" src="'.esc_url($settings['image']['url']).'" alt="Thumb">';
		                        echo '<div class="shape-center">';
		                            echo '<img src="'.AMBROX_PLUGDIRURI . 'assets/img/7.png" alt="Thumb">';
		                        echo '</div>';
		                    echo '</div>';
		                }
	                    
	                echo '</div>';
	                echo '<div class="personal-social">';
	                    echo '<ul>';

	                        if( ! empty( $settings['social_icon_list'] ) ){

	                    		foreach( $settings['social_icon_list'] as $social_icon ){
		                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
		                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

		                            echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

		                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

		                          	echo '</a></li>';
		                      	}
	                    	}
	                        
	                    echo '</ul>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}

}