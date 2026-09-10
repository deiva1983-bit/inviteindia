<?
	// ---------------------------------------------------------------------------------------------------------------
	// function: common_pagination ( -- arguments -- )
	// ---------------------------------------------------------------------------------------------------------------
	// purpose:		To create a paging concepts
	// arguments:		$tablename,$values
	// ---------------------------------------------------------------------------------------------------------------


function pager($total_pages,$limit,$targetpage,$page,$start,$var_name)
    {
        $adjacents = 2;
        if ($page == 0) $page = 1;
            $prev = $page - 1;
            $next = $page + 1;
            $lastpage = ceil($total_pages/$limit);
            $lpm1 = $lastpage - 1;
            $pagination = "";
            $start1=($start+1);
            //$remaining=$total_pages-$start1;
            $remaining=$start1+$limit-1;

            if($total_pages < $remaining)
            {
                $remaining=$total_pages;
            }
            if($lastpage >= 1)
            {
                // first
              //$pagination1=$start1."&nbsp;-&nbsp;".$remaining."&nbsp;of&nbsp;".$total_pages."&nbsp;&nbsp;";
              $pagination1="<div class='pagination'>";
                if ($page==1)
                    $pagination.="
                    ".$pagination1.
                    "<span class='disabled'> &laquo; </span>";

                else
                    $pagination.="".$pagination1."<a href='$targetpage&$var_name=1'>&laquo;</a>";


                // previous
                 if ($page > 1)
                    $pagination.="<a href='$targetpage&$var_name=$prev'> &#8249; </a>";
                 else
                    $pagination.= "<span class='disabled'>&#8249;</span>";

                if ($lastpage < 7 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class='current'>$counter</span>";
                        else
                            $pagination.= "<a href='$targetpage&$var_name=$counter'>$counter</a>";
                    }
                }
                elseif($lastpage > 5 + ($adjacents * 2))
                {

                    if($page < 1 + ($adjacents * 2))
                    {
                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class='current'>$counter</span>";
                            else
                                $pagination.= "<a href='$targetpage&$var_name=$counter'>$counter</a>";
                        }
                        $pagination.= "...";
                        $pagination.= "<a href='$targetpage&$var_name=$lpm1'>$lpm1</a>";
                        $pagination.= "<a href='$targetpage&$var_name=$lastpage'>$lastpage</a>";
                    }

                    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                        $pagination.= "<a href='$targetpage&$var_name=1'>1</a>";
                        $pagination.= "<a href='$targetpage&$var_name=2'>2</a>";
                        $pagination.= "...";
                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class='current'>$counter</span>";
                            else
                                $pagination.= "<a href='$targetpage&$var_name=$counter'>$counter</a>";
                        }
                        $pagination.= "...";
                        $pagination.= "<a href='$targetpage&$var_name=$lpm1'>$lpm1</a>";
                        $pagination.= "<a href='$targetpage&$var_name=$lastpage'>$lastpage</a>";
                    }
                    //close to end; only hide early pages
                    else
                    {
                        $pagination.= "<a href='$targetpage&$var_name=1'>1</a>";
                        $pagination.= "<a href='$targetpage&$var_name=2'>2</a>";
                        $pagination.= "...";
                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class='current'>$counter</span>";
                            else
                                $pagination.= "<a href='$targetpage&$var_name=$counter'>$counter</a>";
                        }
                    }
                }

                //next button
                if ($page < $counter - 1)
                    $pagination.= "<a href='$targetpage&$var_name=$next'>&#8250;</a>";
                else
                    $pagination.= "<span class='disabled'>&#8250;</span>";

                if ($page==$lastpage)
                    $pagination.= "<span class='disabled'>&raquo;</span>";
                else
                    $pagination.= "<a href=$targetpage&$var_name=$lastpage>&raquo;</a>";


            $pagination=$pagination."</div>";
            }

       return $pagination;
     } 

?>