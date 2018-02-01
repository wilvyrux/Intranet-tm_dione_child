<?php 

function video_function( $atts ) {

	global $wpdb;

	$post_id = get_the_ID();

    $count =  get_field( "total_video_display", $post_id );

    $featured = get_field( "featured_videos", $post_id );
     

	echo '<div class="main-wrapper-video" id="'.$featured->ID.'">';


         if($featured->ID==""){ }else{
			    
			    $video_type = get_field("video_type",$featured->ID);

			    if($video_type=="Url"){
			    $urlmain =get_field("url",$featured->ID);	
			    $urlextract = explode("v=",$urlmain);

			        echo "<div class='featured-videos'>";
		   		    echo '<div class="col-md-12" style="padding-bottom:20px"><iframe style="width:100%" height="100%" src="https://www.youtube.com/embed/'.$urlextract[1].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen  ></iframe></div>';
		   		    echo "</div>";
	   		    }
	   		    if($video_type=="Upload"){
	   		       
	   		       $attachment_ids = get_field('upload',$featured->ID);
			       $urlmain = wp_get_attachment_url( $attachment_ids ); 

	   		    	echo '<video width="100%" height="100%" controls>
						  <source src="'.$urlmain.'" type="video/mp4">
						 Your browser does not support the video tag.
						</video>';
	   		    }


	   		}
 
	   	 
    $args = array( 'post_type' => 'videos', 'posts_per_page' => $count  );
	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) : $loop->the_post();
		$filesize="";
		$title= get_the_title();
		$vID = get_the_ID();

		if ( has_post_thumbnail() ) {
  			  $featured_image = get_the_post_thumbnail_url($vID,'medium'); 
			}
		$video_type =get_field("video_type",$vID);
		if($video_type=="Url"){ 
			
			$fancy="videolink"; 

			$urlmain =get_field("url",$vID);	
		    $urlextract = explode("v=",$urlmain);
		    $url ="https://www.youtube.com/embed/$urlextract[1]";
		}
		if($video_type=="Upload"){ 
			$upload =get_field("upload",$vID); 
			 
		 	$fancy="videolink2"; 

			$attachment_id = get_field('upload',$vID);
			$urlvid = wp_get_attachment_url( $attachment_id); 
			$filesize = filesize( get_attached_file( $attachment_id ) );
			$filesize = size_format($filesize, 2);
			$url = "#content-vid$vID"; 
			$urlid = "content-vid$vID"; 
		}
		
		
	   		if($featured->ID!=$vID) { 

				echo "<div class='video-list' id='".$vID ."'>";
				echo '<div class="col-md-2">
						<div class="video-thumbnail">
			                <a  href="'.$url.'" class="'.$fancy.'" data-fancybox-type="iframe">
			                    <img src="'.$featured_image.'" >
			                </a>
		            	</div>
					</div>
					<div class="col-md-10">
            			<label class="vtitle">'.$title.'</label>
            			<label class="vsubtitle">'.$filesize.'</label>
        			</div>
        			<div class="clear clearfix"></div>';
				echo "</div>"; 
				if($video_type=="Upload"){ 
	   			echo '<div style="display:none"><div id="'.$urlid.'"  ><video width="100%" height="480" controls>
						  <source src="'.$urlvid.'" type="video/mp4">
						 Your browser does not support the video tag.
					   </video></div></div>';
				}
				 
			}
	    
 	
	endwhile;
 
echo "</div>"; 
}
add_shortcode( 'video_list', 'video_function' );
