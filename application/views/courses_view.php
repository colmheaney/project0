<div data-role="page">
    <div data-role="header">
        <h1>Courses</h1>
        <a href="<?php echo base_url(); ?>" data-direction="reverse">Home</a>
    </div>
    <div data-role="content">
        <ul id="courses" class="menu_list" data-role="listview" style="margin-top: 40px">
        <?php $i = 1; ?>
        <?php foreach ($courses as $course): ?>
            <li>
                <p class="menu_head" id="<?php echo $course->cat_num; ?>"><b><?php echo $course->title; ?></b></p>
                <div class="menu_body" id="<?php echo $i; ?>">
                    <br />


                    <!--Description-->

                    <?php if($course->description): ?>
                    
                        <p class="break-word"><b>Description: </b><?php echo $course->description; ?></p>                    
                        <hr />
                        
                    <?php endif; ?>
                        



                    <!--Cat_num-->

                    <?php if($course->cat_num): ?>

                        <p><b>Catalogue number: </b><?php echo $course->cat_num; ?></p>
                        <hr />
                    <?php endif; ?>



                    <!--Gen_ed-->

                    <?php if($course->gen_ed): ?>
                        <?php $numItems = count($course->gen_ed); ?>
                        <?php $j = 0; ?>

                        <p class="break-word"><b>Gen Ed: </b>

                        <?php foreach ($course->gen_ed as $gen_ed): ?>
                            <?php echo $gen_ed;?>

                            <?php if($j + 1 != $numItems): ?>
                                <?php echo ','; ?>
                            <?php $j++; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                        </p>
                        <hr />     
                    <?php endif; ?>

                    
                        

                    <!--Building-->


                    <?php if($course->building): ?>
                        
                        <p class="break-word"><b>Location: </b><?php echo $course->building; ?></p>
                        
                        <hr />
                    
                    <?php endif;?>
                    


                    <!--Times-->

                    <?php if($course->times): ?>
                        <?php $numItems = count($course->times); ?>
                        <?php $j = 0; ?>

                        <p class="break-word"><b>Times: </b>

                        <?php foreach ($course->times as $time): ?>
                            <?php echo $time; ?>

                            <?php if($j + 1 != $numItems): ?>
                                <?php echo ',' ;?>
                            <?php $j++; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                        </p>
                            
                        <hr />
                    
                    <?php endif; ?>

 

                   <!--Instructors-->

                   <?php if($course->instructors): ?>
                        <?php $numItems = count($course->instructors); ?>
                        <?php $j = 0; ?>

                        <p class="break-word"><b>Instructors: </b>

                        <?php foreach ($course->instructors as $instructor): ?>
                            <?php echo $instructor; ?>

                            <?php if($j + 1 != $numItems): ?>
                                <?php echo ',' ; ?>
                            <?php $j++; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                        </p>
                            
                    <?php endif; ?>
                            
                    <br />
                            

                    
                    
                    <form action="http://project0.fixturelocker.com/taking/add" method="post" accept-charset="utf-8">                		
                        <input type="hidden" name="cat_num" value="<?php echo $course->cat_num; ?>" />
                        <input type="text" placeholder="Email Address" name="username" id="username<?php echo $i; ?>" />
                        <input type="submit" name="action" value="Taking" id="taking<?php echo $i; ?>" />
                        <input type="submit" name="action" value="Shopping" id="shopping<?php echo $i; ?>" />
                    </form>
                    <?php echo validation_errors('<p class="error">'); ?>
                </div>
                <div id="container<?php echo $i; ?>"></div>
            </li>
            <?php $i++; ?>
            <?php endforeach; ?>
        </ul>
        <br />
        <p><a data-role="button" data-rel="back" data-role="button"> Back </a></a></p>
        
     </div>
</div>