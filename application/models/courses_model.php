<?php

class Courses_model extends CI_Model
{
        
    function get_cat_nums($department, $gen_ed, $title, $instructor, $day_time)
    {
        $result = array();
        
        if($department != '')
        {   
            $result = $this->db->where_in('course_group', $department)->get('courses')->result();
        }
        elseif($gen_ed != '')
        {
            $result = $this->db->where_in('category', $gen_ed)->get('gen_ed')->result();
        }
        elseif($title != '')
        { 
            $array = array('title' => $title, 'description' => $title);
            $result = $this->db->or_like($array, $array)->get('courses')->result();
        }
        elseif($instructor != '')
        {
            $field = $instructor;
            
            $result = $this->db
                ->select('course_instructors.cat_num')
                ->from('instructors')
                ->join('course_instructors', 'course_instructors.instructor_id = instructors.id')
                ->like('last', $instructor)
                ->get()->result();

        }
        elseif($day_time != '')
        {
            $result = $this->db
                    
                    ->where('day', $day_time['day'])
                    ->where('beginning', $day_time['beginning'])
                    ->distinct()
                    ->get('times')->result();
            
        }

        if ($result)
        {
            return $result;
        }
    }

    function get_courses($cat_nums)
    {   
         $courses = $this->db->select('courses.cat_num, title, building, description')
                ->from('courses')
                ->join('locations', 'courses.cat_num = locations.cat_num', 'left')
                ->where_in('courses.cat_num', $cat_nums )
                 ->distinct()
                ->get()->result();

        $this->load->model('Instructor_model');
        $this->load->model('Gen_ed_model');
        $this->load->model('Times_model');

        $instructors = $this->Instructor_model->get_instructors($cat_nums);
        $gen_ed = $this->Gen_ed_model->get_gen_ed($cat_nums);
        $times = $this->Times_model->get_times($cat_nums);
        
        // associate instructors/gen_ed/times with courses
        foreach ($courses as &$course)
        {
            $course->instructors = (isset($instructors[$course->cat_num])) ? $instructors[$course->cat_num] : array();
            $course->gen_ed = (isset($gen_ed[$course->cat_num])) ? $gen_ed[$course->cat_num] : array();
            $course->times = (isset($times[$course->cat_num])) ? $times[$course->cat_num] : array();
        }
        
        return $courses;
    }
    
 }

