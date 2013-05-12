<div data-role="page">
    <div data-role="header">
        <h1>Search by Day/Time</h1>
        <a href="../home" data-direction="reverse">Home</a>
        
    </div>
    <div data-role="content">
        
        <?php echo form_open('search/courses'); ?>
        
        <?php $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday',
            '4' => 'Thursday', '5' => 'Friday'); ?>
        
        <?php echo form_dropdown('day', $days); ?>

        <?php echo form_dropdown('time', $options = array(
            '800' => '0800', '830' => '0830', '900' => '0900', '930' => '0930',
            '1000' => '1000', '1030' => '1030', '1100' => '1100', '1130' => '1130',
            '1200' => '1200', '1230' => '1230', '1300' => '1300','1330' => '1330',
            '1400' => '1400', '1430' => '1430', '1500' => '1500','1530' => '1530',
            '1600' => '1600', '1630' => '1630', '1700' => '1700', '1730' => '1730',
            '1800' => '1800'
            )); ?>
        
        <?php echo form_submit('submit', 'submit'); ?>
            
        <?php echo form_close(); ?>
        <p><a data-role="button" data-rel="back" data-role="button"> Back </a></a></p>    
     </div>
</div>
