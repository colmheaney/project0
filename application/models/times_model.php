<?php

class Times_model extends CI_Model
{
    function get_times($cat_nums)
    {
        $times = $this->db
                ->select('cat_num, day, beginning, ending')
                ->from('times')
                ->where_in('cat_num', $cat_nums)
                ->get()->result();
                
        // group tags by tweet id
        $result = array();
        foreach ($times as $time)
        {
        
            switch ($time->day) 
            {
            case 1:
                $time->day = 'Monday';
                break;
            case 2:
                $time->day = 'Tuesday';
                break;
            case 3:
                $time->day = 'Wednesday';
                break;
            case 4:
                $time->day = 'Thursday';
                break;
            case 5:
                $time->day = 'Friday';
                break;
            }
            
            $result[$time->cat_num][] = $time->day . ' ' . $time->beginning . '-' . $time->ending;
       }        

        return $result;
        
    }
   
}