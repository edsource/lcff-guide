<?php  

	function lcff_explainer($id=null){
		$ret = '';

		/* CUSTOM FIELDS
		=================================================*/
		$navigation = get_field('lcff_navigation', 89272);
		$content = get_field('lcff_slides', 89272);

		/* META TAGS
		=================================================*/
		$ret .= '<meta charset="utf-8"><title>Local Control Funding Formula Guide | EdSource</title></meta>';
		$ret .= '<meta name="description" content="A non-profit journalism website reporting on key education issues in California and beyond."></meta>';
		$ret .= '<meta name="tags" content="education news, california education, non-profit news, common core, local control funding formula, k-12 education"></meta> ';
		$ret .= '<meta name="HandheldFriendly" content="true" />';
		$ret .= '<meta name="MobileOptimized" content="320" />';

		$ret .= '<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />';
		$ret .= '<link rel="shortcut icon" href="http://edsource.org/wp-content/themes/nakatomi/styles/graphics/favicon.png">';
		$ret .= '<link href=\'http://fonts.googleapis.com/css?family=Montserrat:400,700\' rel=\'stylesheet\' type=\'text/css\'>';
		$ret .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
		$ret .= '<link href=\'http://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700\' rel=\'stylesheet\' type=\'text/css\'>';
		$ret .= '<link rel=\'stylesheet\' id=\'default_css-css\'  href=\'http://edsource.org/wp-content/themes/nakatomi/style.css?v=2015.06.19.1\' type=\'text/css\' media=\'all\' />';
		$ret .= '<link rel="stylesheet" type="text/css" href="http://edsource.org/wp-content/themes/nakatomi/styles/lcff-explainer.css">';

		$ret .= '<script type=\'text/javascript\' src=\'http://edsource.org/wp-includes/js/jquery/jquery.js\'></script>';
		//$ret .= '<script type=\'text/javascript\' src=\'http://edsource.org/wp-content/themes/nakatomi/scripts/socialite/socialite.js\'></script>';
		$ret .= '<script type=\'text/javascript\' src=\'http://edsource.org/wp-content/themes/nakatomi/scripts/lcff-explainer.js\'></script>';

		/* HEADER TAGS
		=================================================*/
		$ret .= '<div id="rs-contain" role="article">';
			$ret .= '<section id="rs-header">';
				$ret .= '<div class="rs-site">';
					$ret .= '<h2><a href="http://edsource.org">EdSource</a></h2>';
				$ret .= '</div>';
				$ret .= '<div><h2><a href="http://edsource.org/restraint-in-the-shadows">Local Control Funding Formula Guide</a></h2></div>';
				$ret .= '<div>';
					$ret .= '<a id="lcff-nav-toggle" href="#" onclick="return false;">Hide NavBar</a>';
				$ret .= '</div>';
			$ret .= '</section>';

		/* CONTENT TAGS
		=================================================*/
			$ret .= '<section id="rs-body">';
				$ret .= '<div id="lcff-nav" state="show">';
					$ret .= '<div>';
						$ret .= '<h2>Explore Guide</h2>';
					$ret .= '</div>';
					$ret .= '<div>';
						$ret .= '<ul>';

							// SLIDE NAVIGATION AREA //
							$slides = 0; $subnav = 0;
							for ($i=0 ; $i < sizeof($navigation) ; $i++){
								$ret .= '<i class="fa fa-arrow-circle-right" type="'.$slides.'"></i><li><a href="#" onclick="return false;" type="'.$slides.'">'.$navigation[$i]['slide_title'].'</a>';

								// Add subnav if applicable //
								if($navigation[$i]['haz_subnav']){
									$ret .= '<ul class="lcff-subnav" subnav="'.$subnav.'" type="'.$slides.'">';

									for ($j = 0 ; $j < sizeof($navigation[$i]['lcff_sub_navigation']) ; $j++){
										$slides += 1;
										$ret .= '<i class="fa fa-arrow-circle-right" type="'.$slides.'"></i><li><a href="#" onclick="return false;" type="'.$slides.'">'.$navigation[$i]['lcff_sub_navigation'][$j]['slide_title'].'</a></li>';
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
							$ret .= '<a href="#" type="0" onclick="return false;"><i class="fa fa-chevron-left"></i> previous</a>';
						$ret .= '</div>';
						$ret .= '<div>';$ret .= '</div>';						
						$ret .= '<div>';
							$ret .= '<a href="#" type="1" onclick="return false;">next <i class="fa fa-chevron-right"></i></a>';
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
		$ret .=  '</div>';

		
		return $ret;
	}