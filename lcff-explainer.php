<?php  

	function lcff_explainer($id=null){
		$ret = '';

		/* CUSTOM FIELDS
		=================================================*/
		$navigation = get_field('lcff_navigation', 89272);
		$content = get_field('lcff_slides', 89272);

		/* META TAGS
		=================================================*/
		$ret .= slick_head('Local Control Funding Formula Guide');
		$ret .= '<link rel="stylesheet" type="text/css" href="http://edsource.org/wp-content/themes/nakatomi/styles/lcff-explainer.css">';
		$ret .= '<script type=\'text/javascript\' src=\'http://edsource.org/wp-content/themes/nakatomi/scripts/lcff-explainer.js\'></script>';

		/* HEADER TAGS
		=================================================*/
		print slick_header('LCFF', $id);

		/* CONTENT TAGS
		=================================================*/
			$ret .= '<section id="slick-body">';
				$ret .= '<div id="lcff-nav" state="show">';
					$ret .= '<div>';
						$ret .= '<h2>Explore Guide</h2>';
					$ret .= '</div>';
					$ret .= '<div>';
						$ret .= '<ul>';

							// SLIDE NAVIGATION AREA //
							$slides = 0; $subnav = 0;
							for ($i=0 ; $i < sizeof($navigation) ; $i++){
								$ret .= '<i class="fa fa-arrow-circle-right" type="'.$slides.'"></i><li><a href="#" onclick="ga(\'send\',\'event\', \'NEW LCFF GUIDE\', \'NAVIGATION\', \''.$navigation[$i]['slide_title'].'\');return false;"  type="'.$slides.'">'.$navigation[$i]['slide_title'].'</a>';

								// Add subnav if applicable //
								if($navigation[$i]['haz_subnav']){
									$ret .= '<ul class="lcff-subnav" subnav="'.$subnav.'" type="'.$slides.'">';

									for ($j = 0 ; $j < sizeof($navigation[$i]['lcff_sub_navigation']) ; $j++){
										$slides += 1;
										if ($navigation[$i]['lcff_sub_navigation'][$j]['slide_title'] == 'Compare School Districts'){
											$ret .= '<li><a target="_blank" href="http://edsource.org/local-control-funding-formula-guide/index.html" onclick="ga(\'send\',\'event\', \'NEW LCFF GUIDE\', \'NAVIGATION\', \''.$navigation[$i]['slide_title'].'\');" type="'.$slides.'">'.$navigation[$i]['lcff_sub_navigation'][$j]['slide_title'].'</a><i class="fa fa-external-link-square"></i></li>';
										}
										else if ($navigation[$i]['lcff_sub_navigation'][$j]['slide_title'] == 'States in Motion'){
											$ret .= '<li><a target="_blank" href="http://edsource.org/2015/states-in-motion-school-finance-naep-child-poverty/83303" onclick="ga(\'send\',\'event\', \'NEW LCFF GUIDE\', \'NAVIGATION\', \''.$navigation[$i]['slide_title'].'\');" type="'.$slides.'">'.$navigation[$i]['lcff_sub_navigation'][$j]['slide_title'].'</a><i class="fa fa-external-link-square"></i></li>';
										}
										else {
											$ret .= '<i class="fa fa-arrow-circle-right" type="'.$slides.'"></i><li><a href="#" onclick="ga(\'send\',\'event\', \'NEW LCFF GUIDE\', \'NAVIGATION\', \''.$navigation[$i]['lcff_sub_navigation'][$j]['slide_title'].'\');return false;" type="'.$slides.'">'.$navigation[$i]['lcff_sub_navigation'][$j]['slide_title'].'</a></li>';
										}
									}

									$ret .= '</ul></li>';
									$subnav += 1;
								}
								else {$ret .= '</li>';}

								$slides += 1;
							}
						$ret .= '</ul>';
					$ret .= '</div>';

				$ret .= '</div>';
				$ret .= '<div id="lcff-slides">';

					// SLIDE TITLE //
					$ret .= '<div id="lcff-title">';
						$ret .= '<h2>Welcome to the Guide</h2>';
					$ret .= '</div>';


					// TOP NAVIGATION //
					$ret .= '<div id="lcff-top">';
						$ret .= '<div>';
							$ret .= '<a href="#" type="0" onclick="ga(\'send\',\'event\', \'NEW LCFF GUIDE\', \'NAVIGATION\', \'Top Nav Previous\');return false;""><i class="fa fa-chevron-left"></i> previous</a>';
						$ret .= '</div>';
						$ret .= '<div>';$ret .= '</div>';						
						$ret .= '<div>';
							$ret .= '<a href="#" type="1" onclick="ga(\'send\',\'event\', \'NEW LCFF GUIDE\', \'NAVIGATION\', \'Top Nav Next\');return false;">next <i class="fa fa-chevron-right"></i></a>';
						$ret .= '</div>';
					$ret .= '</div>';

					// CONTENT //
					$ret .= '<aside class="lcff-content">';

						for($i=0 ; $i < sizeof($content) ; $i++){
							$ret .= '<div class="lcff-slide" type="'.$i.'">';$ret .= $content[$i]['slide_contents'];$ret .= '</div>';
						}

					$ret .= '</aside>';
				$ret .= '</div>';
			$ret .=  '</section>';
			$ret .= slick_footer();
		$ret .=  '</div>';

		
		return $ret;
	}