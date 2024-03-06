
function showresponse2(showtype,showmessage,targetelement)
    {
        $(targetelement).fadeIn("slow");
            $(targetelement).html(showmessage);
                
                $(targetelement).addClass("alert");
                $(targetelement).removeClass("alert-success");
                $(targetelement).removeClass("alert-warning");
                $(targetelement).removeClass("alert-danger");
                
                switch(showtype)
                    {
                        case 1:
                                $(targetelement).addClass("alert-success");
                        break;
                        case 2:
                                $(targetelement).addClass("alert-warning");
                        break;
                        default:				
                                $(targetelement).addClass("alert-danger");
                        break;
                    }
        return "";
    }


    function dorequest2(url,formclass,resclass)	 
    {  alert('Hii'); 
        //$(resclass).html("<center><img src='"+BASE_RELATIVE_PATH+"loader.gif' style='max-width:32px;margin:3px auto;' /></center>");
        
            // var data = $(formclass).serializeArray();
             
             var form = $(formclass)[0];
             var formData = new FormData(form);
             
                $.ajax({
                        type: "POST",
                        async: true,
                        cache: false,
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        
                        success: function (tempdata)
                            {				
                                    if (tempdata.trim() != '') 
                                        {
                                            var values = JSON.parse(tempdata);
                                            showresponse(values.status,values.message,resclass);
                                            
                                            if ( typeof values.redurl !== 'undefined' && values.redurl !== '0' )
                                                {
                                                    setTimeout(function(){
                                                        window.location.href	= values.redurl;	
                                                    },786);
                                                }
                                            
                                        } else {
                                            showresponse(0,"Something went wrong, Please try again later.",resclass);
                                        }
                            },
                        cache: false
                    }).fail(function (jqXHR, textStatus, error) {
                        // Handle error here
                        showresponse(0,"Something went wrong, Please try again later.",resclass);
                    //	console.log(jqXHR.status);
                    });

        return false;
    }

