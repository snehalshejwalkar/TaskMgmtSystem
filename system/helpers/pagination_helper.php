<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Written by Mukesh Rane	*/

if ( ! function_exists('pagination_show')){

	function pagination_show($PAGE_TOTAL_ROWS,$PAGE_LIMIT,$DISPLAY_PAGES,$PAGE_URL,$page=1,$pages=1,$class='LINK-PAGEING'){
		$working_data = '';
		$fn = '';
		if( $PAGE_LIMIT > 0 )
		{
			$numofpages = ceil($PAGE_TOTAL_ROWS / $PAGE_LIMIT);
		}
		else
		{
			$numofpages = 1;
		}
		$page = $page;
		$pages = $pages;
		$filename = $PAGE_URL;

		$displayPages = (($DISPLAY_PAGES < 1)?15:$DISPLAY_PAGES);

		if(strlen(trim($filename)) > 0){
			$file = explode("|",$filename);
			if(sizeof($file) == 1){
				$_file = $file[0]."";
			}else{
				for($m=1;$m<sizeof($file);$m++)	{	$fn.= $file[$m]."/";	}
				$_file = $file[0]."".$fn;
			}
		}

		if($numofpages > 1){
			//$working_data.="<li><a href=".$_file."pages=1 class='$class' \"> FIRST </a></li>";
		}
		if($pages > 1){
			$pageprev = ($pages-$displayPages);
			$working_data.="<a href=".$_file."1 class='textOne' \"> FIRST </a>";
			$working_data.="<a href=".$_file."".$pageprev." class='textOne' \"> PREV </a>";
		}
		if($numofpages > 1){
			for($i = $pages; $i < $pages + $displayPages; $i++){
				if($i <= $numofpages){
					$selectedPage = (($page == $i)?"active":"");
					$working_data.="<a href=".$_file."".$pages."/".$i." class='$selectedPage'\">".$i."</a>";
				}
			}
		}
		//	next page coading
		if($pages + $displayPages <= $numofpages){
			$pagenext = ($pages + $displayPages);
			$working_data.="<a href=".$_file."".$pagenext." class='textOne'\"> NEXT </a>";
			$working_data.="<a href=".$_file."".$numofpages." class='textOne'\"> LAST </a>";
		}
		if($numofpages > 1){
			//$working_data.="<li><a href=".$_file."pages=".$numofpages." class='$class'\"> LAST </a></li>";
		}
		return ((empty($working_data))?0:$working_data);
	}
}

if ( ! function_exists('pagination_assoc')){

	function pagination_assoc($PAGE_TOTAL_ROWS,$PAGE_LIMIT,$DISPLAY_PAGES,$PAGE_URL,$page=1,$pages=1,$class='LINK-PAGEING'){

		$working_data = '';
		$fn = '';
		//$numofpages = ceil($PAGE_TOTAL_ROWS / $PAGE_LIMIT);
		if( $PAGE_LIMIT > 0 )
		{
			$numofpages = ceil($PAGE_TOTAL_ROWS / $PAGE_LIMIT);
		}
		else
		{
			$numofpages = 1;
		}
		$page = ($page?$page:1);
		$pages = $pages;
		$filename = $PAGE_URL;

		$displayPages = (($DISPLAY_PAGES < 1)?15:$DISPLAY_PAGES);

		if(strlen(trim($filename)) > 0){
			$file = explode("|",$filename);
			if(sizeof($file) == 1){
				$_file = $file[0]."";
			}else{
				for($m=1;$m<sizeof($file);$m++)	{	$fn.= $file[$m]."/";	}
				$_file = $file[0]."".$fn;
			}
		}

		if($numofpages > 1){
			//$working_data.="<li><a href=".$_file."pages=1 class='$class' \"> FIRST </a></li>";
		}
		if($pages > 1){
			$pageprev = ($pages-$displayPages);
			$working_data.="<li class='page-item'><a href=".$_file."/pages/1/page/1 class='textOne' \"> FIRST </a></li>";
			$working_data.="<li class='page-item'><a href=".$_file."/pages/".$pageprev."/page/".$pageprev." class='textOne' \"> PREV </a></li>";
		}
		if($numofpages > 1){
			for($i = $pages; $i < $pages + $displayPages; $i++){
				if($i <= $numofpages){
					$selectedPage = (($page == $i)?"active":"");
					$working_data.="<li class='page-item ".$selectedPage." '><a href=".$_file."/pages/".$pages."/page/".$i." class='$selectedPage'\">".$i."</a></li>";
				}
			}
		}
		//	next page coading
		if($pages + $displayPages <= $numofpages){
			$pagenext = ($pages + $displayPages);
			$working_data.="<li class='page-item'><a href=".$_file."/pages/".$pagenext."/page/".$pagenext." class='textOne'\"> NEXT </a></li>";
			$working_data.="<li class='page-item'><a href=".$_file."/pages/".$numofpages."/page/".$numofpages." class='textOne'\"> LAST </a></li>";
		}
		if($numofpages > 1){
			//$working_data.="<li><a href=".$_file."pages=".$numofpages." class='$class'\"> LAST </a></li>";
		}

		return ((empty($working_data))?0:$working_data);
	}
}
/*
if ( ! function_exists('ajax_pagination_assoc')){

	function ajax_pagination_assoc($PAGE_TOTAL_ROWS,$PAGE_LIMIT,$DISPLAY_PAGES,$PAGE_URL,$page=1,$pages=1,$displayDiv,$class='LINK-PAGEING'){


		$working_data = '';
		$fn = '';
		$numofpages = ceil($PAGE_TOTAL_ROWS / $PAGE_LIMIT);
		$page = ($page?$page:1);
		$pages = $pages;
		$filename = $PAGE_URL;

		$displayPages = (($DISPLAY_PAGES < 1)?15:$DISPLAY_PAGES);

		if(strlen(trim($filename)) > 0){
			$file = explode("|",$filename);
			if(sizeof($file) == 1){
				$_file = $file[0]."";
			}else{
				for($m=1;$m<sizeof($file);$m++)	{	$fn.= $file[$m]."/";	}
				$_file = $file[0]."".$fn;
			}
		}

		if($numofpages > 1){
			//$working_data.="<li><a href=".$_file."pages=1 class='$class' \"> FIRST </a></li>";
		}
		if($pages > 1){
			$pageprev = ($pages-$displayPages);
			$working_data.="<a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pagenext."/page/".$pagenext."');javascript:fadeout('".$displayDiv."');\" class='textOne' \"> FIRST </a>";
			$working_data.="<a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pageprev."/page/".$pageprev."');javascript:fadeout('".$displayDiv."');\" class='textOne' \"> PREV </a>";
		}

//        <a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pagenext."/page/".$pagenext."');\" class='textOne'\"> NEXT </a>

		if($numofpages > 1){
			for($i = $pages; $i < $pages + $displayPages; $i++){
				if($i <= $numofpages){
					$selectedPage = (($page == $i)?"active":"");
					$working_data.="<a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pages."/page/".$i."');javascript:fadeout('".$displayDiv."')\" class='$selectedPage'\">".$i."</a>";
				}
			}
		}
		//	next page coading
		if($pages + $displayPages <= $numofpages){
			$pagenext = ($pages + $displayPages);
			$working_data.="<a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pagenext."/page/".$pagenext."');javascript:fadeout('".$displayDiv."');\" class='textOne'\"> NEXT </a>";
			$working_data.="<a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$numofpages."/page/".$numofpages."');javascript:fadeout('".$displayDiv."');\" class='textOne'\"> LAST </a>";
		}

		if($numofpages > 1){
			//$working_data.="<li><a href=".$_file."pages=".$numofpages." class='$class'\"> LAST </a></li>";
		}

		return ((empty($working_data))?0:$working_data);
	}
}
*/

if ( ! function_exists('ajax_pagination_assoc')){

        function ajax_pagination_assoc($PAGE_TOTAL_ROWS,$PAGE_LIMIT,$DISPLAY_PAGES,$PAGE_URL,$page=1,$pages=1,$displayDiv,$class='LINK-PAGEING'){
                $working_data = '';
                $fn = '';

               $numofpages = ceil($PAGE_TOTAL_ROWS / $PAGE_LIMIT);
                $page = ($page?$page:1);
                $pages = $pages;
                $filename = $PAGE_URL;

                $displayPages = (($DISPLAY_PAGES < 1)?15:$DISPLAY_PAGES);

                if(strlen(trim($filename)) > 0){
                        $file = explode("|",$filename);
                        if(sizeof($file) == 1){
                                $_file = $file[0]."";
                        }else{
                                for($m=1;$m<sizeof($file);$m++)        {        $fn.= $file[$m]."/";        }
                                $_file = $file[0]."".$fn;
                        }
                }

                if($numofpages > 1){
                       // $working_data.="<li><a href=".$_file."pages=1 class='$class' \"> FIRST </a></li>";
                }

                if($pages > 1){
						// THIS IS EDITED FOR NEXT PAGE FUNCTIONALITY....
                        $pageprev = $page - 1;//($pages-$displayPages);

                        $working_data.="<li  onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/1/page/1');javascript:fadeout('".$displayDiv."');\" ><a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/1/page/1');javascript:fadeout('".$displayDiv."');\" class='$class'  style='cursor:pointer; width:100%' title='FIRST'  > <span>|<</span></a></li>";

                        $working_data.="<li onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pageprev."/page/".$pageprev."');javascript:fadeout('".$displayDiv."');\" ><a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pageprev."/page/".$pageprev."');javascript:fadeout('".$displayDiv."');\" class='$class' style='width:100%' title='PREV' ><span><</span> </a></li>";
                }

                if($numofpages > 1)
                {

					for($i = $pages - 4 ; $i < $pages + 5 ; $i++)
					{
						if($i <= $numofpages)
						{
						   $selectedPage = (($page == $i)?"active":"$class");
						   if($i>0)
						   {
							   if($i!=-1)
							   $working_data.="<li class='li_$selectedPage' onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$i."/page/".$i."');javascript:fadeout('".$displayDiv."')\" ><a href=\"javascript:void(0);\" style='cursor:pointer' onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$i."/page/".$i."');javascript:fadeout('".$displayDiv."')\" class='$selectedPage'><span>".$i."</span></a></li>";
						   }
						}
					}
                }
                //        next page coading


                if($pages < $numofpages)
                {

						// THIS IS EDITED FOR NEXT PAGE FUNCTIONALITY....
                        $pagenext =  $page + 1;//($pages + $displayPages);//2;//pagination activepagination
				//echo   $pagenext;
                        $working_data.="<li  onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pagenext."/page/".$pagenext."');javascript:fadeout('".$displayDiv."');\" ><a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$pagenext."/page/".$pagenext."');javascript:fadeout('".$displayDiv."');\" class='$class' style='width:100%' title='NEXT'><span> > </span></a></li>";

                        $working_data.="<li  onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$numofpages."/page/".$numofpages."');javascript:fadeout('".$displayDiv."');\" ><a href=\"javascript:void(0);\" onclick=\"javascript:$('#".$displayDiv."').load('".$_file."/pages/".$numofpages."/page/".$numofpages."');javascript:fadeout('".$displayDiv."');\" class='$class' title='LAST' style='width:100%' ><span>>|</span> </a></li>";
                }

                if($numofpages > 1){
                        //$working_data.="<li><a href=".$_file."pages=".$numofpages." class='$class'\"> LAST </a></li>";
                }

                return ((empty($working_data))?0:$working_data);
        }
}/**/

/*
 * Pagination
 * @return array
 * @Param{
 *  		$sql = QUERY String
 *			$perpageitem= Item Per Page
 *			$activepage = active page
 *			$url = URL
 			$pageprefix = $_GET
			$sign_prev = PREVIOUS SIGN	['&lt;&lt;']
			$sign_next = NEXT SIGN	['&gt;&gt;']

 *		}
*/
if ( ! function_exists('paging'))
{
	function paging($totalrows, $perpageitem, $activepage = 1, $url, $pageprefix='page', $sign_prev = '&laquo; BACK',$sign_next = 'NEXT &raquo;'){
		$url = base_url.$url.$pageprefix."/";

		$totalpages = ceil($totalrows / $perpageitem);

		// Is there only one page? Hm... nothing more to do here then.
		if($totalpages===1)
		{
			return FALSE;
		}
		//if the active page is greater than the page redirect to first page
		if(($activepage > $totalpages) && ($totalpages>0))
			redirect($url.'1');

		//Prev str
			if($activepage<=1){
				$prevdis = '';
			}else{
				$prevpgc = (int)$activepage-1;
				$prevdis ='<a href="'.$url.$prevpgc.'"><strong>'.$sign_prev.'</strong></a> ';
			}

		//Next str
			if($activepage>=$totalpages){
				$nextdis = '';
			}else{
				$nextpgc = (int)$activepage+1;
				$nextdis ='<a href="'.$url.$nextpgc.'"><strong>'.$sign_next.'</strong></a> ';
			}

		//
		$pagenum = '';

		$firststr = (int)$activepage - 3;
		$laststr = (int)$activepage + 3;

		if($firststr > 2){
				$pagenum .='<a href="'.$url.'1">1</a>... ';
				$startfrom = $firststr;
		}else
				$startfrom = 1;

		if($laststr<((int)$totalpages-1)){
				$lastdis = '...<a href="'.$url.$totalpages.'">'.$totalpages.'</a> ';
				$endto = $laststr;
		}else
				$endto = $totalpages;
		for($startcount=$startfrom;$startcount<=$endto;$startcount++)
		{
				$pagenum .='<a href="'.$url.$startcount.'">'.$startcount.'</a> ';
		}
		if(isset($lastdis))
			$pagenum .= $lastdis;
		if($totalpages===1)
			$pagenum = '';
		return array('prev'=>$prevdis, 'pagenum'=>$pagenum, 'next'=>$nextdis,'totpages'=>$totalpages);
	}
}
/**
 * Page Limit to be pass use in query
 * Return int
 */
if ( ! function_exists('paginglimit'))
{
	function paginglimit($active,$limit)
	{

		return ($active*$limit)-$limit;
	}
}

/* End of file pagination_helper.php */
/* Location: ./system/helpers/pagination_helper.php */
