$(document).bind('pageinit', function(){
    $('#courses p.menu_head').click(function(){
        $('.menu_body').removeClass('on');
        $('#response').remove();
        $('div.menu_body').slideUp(300);
        $('#loading').remove();
        
        
        if($(this).next().is(':hidden') == true) 
        {
			
            //ADD THE ON CLASS TO THE BUTTON
            $(this).addClass('on');

            //OPEN THE SLIDE
            $(this).next().slideDown('normal');
	}         
        
        var id = $(this).next('div.menu_body').attr('id');
        var cat_num = $(this).attr('id');
        $.ajax({
            url: 'http://project0.fixturelocker.com/recent/add',
            type: 'POST',
            data: 'cat_num=' + cat_num
        });
        return false; 
    }); 
    
});

$(document).bind('pageinit', function(){
    $('#courses p.menu_head').click(function(){
        var id = $(this).next('div.menu_body').attr('id');
        var cat_num = $(this).attr('id');
        
        $('#taking'+id).click(function(){
            $('#container'+id).append('<img src="../css/images/loading.gif" alt="Currently Loading" id="loading" />');
            
            var username = $('#username'+id).val();
            
            $.ajax({
                url: 'http://project0.fixturelocker.com/taking/add',
                type: 'POST',
                data: 'cat_num=' + cat_num + '&username=' + username,
                
                success: function(results){
                    $('#response').remove();
                    $('#container'+id).append('<p id="response">' + results + '</p>');
                    $('#loading').fadeOut(500, function(){
                        $(this).remove();
                    });
                }
                
            });
            return false;
        });
    });
});

$(document).bind('pageinit', function(){
    $('#courses p.menu_head').click(function(){
        var id = $(this).next('div.menu_body').attr('id');
        var cat_num = $(this).attr('id');
        
        $('#shopping'+id).click(function(){
            $('#container'+id).append('<img src="../css/images/loading.gif" alt="Currently Loading" id="loading" />');
            
            var username = $('#username'+id).val();
            
            $.ajax({
                url: 'http://project0.fixturelocker.com/shopping/add',
                type: 'POST',
                data: 'cat_num=' + cat_num + '&username=' + username,

                success: function(results){
                    $('#response').remove();
                    $('#container'+id).append('<p id="response">' + results + '</p>');
                    $('#loading').fadeOut(500, function(){
                        $(this).remove();
                    });
                }
                
            });
            return false;
        });
    });
});