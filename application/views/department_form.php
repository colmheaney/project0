<div data-role="page">
    <div data-role="header">
        <h1>Search by Department</h1>
        <a href="../home" data-direction="reverse">Home</a>
        
    </div>
    <div data-role="content">
        
        <?php echo form_open('search/courses'); ?>
        
        <?php echo form_input('department'); ?>
        
        <?php echo form_submit('submit', 'submit'); ?>
            
        <?php echo form_close(); ?>
        
        <p><a data-role="button" data-rel="back" data-role="button"> Back </a></a></p>
    </div>
</div>

