<?php

class Instructor_model extends CI_Model
{
    function get_instructors($cat_nums)
    {
        $instructors = $this->db
                ->select('course_instructors.cat_num, first, last')
                ->from('instructors')
                ->join('course_instructors', 'course_instructors.instructor_id = instructors.id')
                ->where_in('cat_num', $cat_nums)
                ->get()->result();

        // group instructors by cat_num
        $result = array();
        foreach ($instructors as $instructor)
        {
            $result[$instructor->cat_num][]= $instructor->first . ' ' .$instructor->last;
        }        

        return $result;
    }
}