// JavaScript Document
$(document).ready(function(e) {
    $(".category-box").each(function(e){
        $(this).hover(function(){
           $(this).find('.category-title').slideDown(500);
        },function(){
           $(this).find('.category-title').slideUp(500); 
        });
    });
    if($(".homepage").length > 0)
    {   
        $(document).ready(function(){
          $('.slider1').bxSlider({
            slideWidth: 150,
            minSlides: 2,
            maxSlides: 7,
            slideMargin: 20,
              pager: false,
              controls: false,
              auto: true,
              moveSlides: 1
          });
          $('.bxslider').bxSlider({
            pager: true,
            controls: true,
            auto: true,
            preloadImages: 'visible',
              onSliderLoad: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                $('.bxslider li a.slider-btn').hide();
                $('.bxslider li').eq(1).find('a.slider-btn').slideDown(500);
              },
              onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                $('.bxslider li a.slider-btn').hide();
                $('.bxslider li').eq(currentSlideHtmlObject+1).find('a.slider-btn').slideDown(500);
              }
          });
        });
    }
    if($(".productdetail").length > 0)
    {
        if($(window).width()>767)
        {
            $( "#tabs" ).tabs();
            $('.review-tab').click(function (event) {
                $("#tabs").tabs({ active: 1 });
                return false;
            });
        }
    }
    if($(".categorylisting").length > 0)
    {
        var parentclass = "list"+$("#parent_id").val();
        var actindex = $("#cataccordion h4").index($("#cataccordion h4."+parentclass));
        if(actindex==-1)
        {
            actindex = false;   
        }
        $("#cataccordion").accordion({
            heightStyle: "content",
            active: actindex,
            collapsible: true 
        });
    }
    if($(".contactpage").length > 0)
    {
        var styles = [{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},      {"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]}];
        var myOptions = {
            zoom: 12,
            disableDefaultUI: true,
            zoomControl: true
        }
        var map = new google.maps.Map(document.getElementById("contact-box"), myOptions);
        var pos = new google.maps.LatLng('23.036734', '72.516371');
        map.setCenter(pos);
        map.setOptions({styles: styles});
        var marker = new MarkerWithLabel({
            map: map,
            position: pos,
            icon: "http://localhost/silverline/assets/images/none.png",
            labelClass: "markerlabels"
        });
        var infoHTML="<div class='windowbox-info'>";
        infoHTML+="<div class='boxtitle'>Silverline Infocom</div>";
        infoHTML+="<div class='boxaddress'>1st Floor, Prime Plaza, Opp. DLA School, Bodakdev, Ahmedabad-380 054.</div>";
        infoHTML+="<div class='boxaddress call'>Call: <a href='tel:079-26857292-93-94'>079-26857292-93-94</a></div></div>";
        var infoboxid = new InfoBox({
             content: infoHTML,
             disableAutoPan: false,
             maxWidth: 250,
             pixelOffset: new google.maps.Size(-155, -175),
             zIndex: null,
            closeBoxMargin: "4px 4px 4px 4px",
            closeBoxURL: sitepath+"assets/images/delete.svg",
            infoBoxClearance: new google.maps.Size(1, 1)
        });
        google.maps.event.addListener(marker, 'click', function() {
            infoboxid.open(map, this);
        });
    }
    byp_init();
    if($(".productdetail").length > 0)
    {
        var dialog = $("#review-dialog").dialog({
            autoOpen: false,
            height: 442,
            width: 670,
            modal: true
        }); 
        $("#write-review").click(function(e){
            e.stopPropagation();
            dialog.dialog( "open" );
            return false;
        });
        $('html').click(function() {
            $("#review-dialog").dialog("close");
        });
        $("#review-dialog").click(function(e){
            e.stopPropagation();
        });
        $("#review-close").click(function(e){
            $("#review-dialog").dialog("close");
        });
        $("#publish-review").click(function(){
            var iserror = 0;
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if($("#txt_reviewname").val()==''){
                $("#txt_reviewname").addClass('error');
                iserror = 1;
            }else{
                $("#txt_reviewname").removeClass('error');
            }
            if($("#txt_reviewemail").val()==''){
                $("#txt_reviewemail").addClass('error');
                iserror = 1;
            }
            else if(!regex.test($("#txt_reviewemail").val())){
                $("#txt_reviewemail").addClass('error');
                iserror = 1;
            }else{
                $("#txt_reviewemail").removeClass('error');
            }
            if($("#sel_rating").val()==''){
                $("#sel_rating").parent('.dropdown').addClass('error');
                iserror = 1;
            }else{
                $("#sel_rating").parent('.dropdown').removeClass('error');
            }
            if($("#txt_captcha").val()==''){
                $("#txt_captcha").addClass('error');
                iserror = 1;
            }else if($("#txt_captcha").val()!=$("#captchaword").val())
            {
                $("#txt_captcha").addClass('error');
                $(".dialog-error").show();
                $(".dialog-success").addClass('error');
                $(".dialog-success").html('invalid captcha code');
                iserror = 1;
            }
            else{
                $("#txt_captcha").removeClass('error');
            }
            if(iserror == 0)
            {
                $.ajax({
                    type: "POST",
                    url: sitepath+"singleproduct/submitreview/",
                    data: {product_id: $("#product_id").val(), reviewname: $("#txt_reviewname").val(),reviewemail: $("#txt_reviewemail").val(),rating: $("#sel_rating").val(),review: $("#txt_review").val()},
                    success: function(reviewdata) {
                        if(reviewdata==1)
                        {
                            $(".dialog-success").show();
                            $(".dialog-success").removeClass('error');
                            $(".dialog-success").html('Thank you for submitting a review.<br/>It will be published in 1 or 2 days, once<br/>its approved by our moderators.');
                            $("#txt_reviewname").val('');
                            $("#txt_reviewemail").val('');
                            $("#sel_rating").val('');
                            $("#txt_review").val('');
                            $("#txt_captcha").val('');
                            $(".dialog-row").hide();
                            setTimeout(function(){
                                $(".dialog-row").show();
                                $(".dialog-success").hide();
                            },5000);
                        }
                    },
                    fail: function() {
                        $(".dialog-success").show();
                        $(".dialog-success").addClass('error');
                        $(".dialog-success").html('There is problem in submission !! please try later..');
                        $("#txt_reviewname").val('');
                        $("#txt_reviewemail").val('');
                        $("#sel_rating").val('');
                        $("#txt_review").val('');
                        $("#txt_captcha").val('');
                    }
                });
            }
            return false;
        });
    }
    $("#send-quote").click(function(){
        var iserror = 0;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if($("#txt_name").val()==''){
            $("#txt_name").addClass('error');
            iserror = 1;
        }else{
            $("#txt_name").removeClass('error');
        }
        if($("#txt_emailaddress").val()==''){
            $("#txt_emailaddress").addClass('error');
            iserror = 1;
        }
        else if(!regex.test($("#txt_emailaddress").val())){
            $("#txt_emailaddress").addClass('error');
            iserror = 1;
        }else{
            $("#txt_emailaddress").removeClass('error');
        }
        if($("#txt_mobile").val()==''){
            $("#txt_mobile").addClass('error');
            iserror = 1;
        }else{
            $("#txt_mobile").removeClass('error');
        }
        if($("#txt_message").val()==''){
            $("#txt_message").addClass('error');
            iserror = 1;
        }
        else{
            $("#txt_message").removeClass('error');
        }
        if(iserror == 0)
        {
            $.ajax({
                type: "POST",
                url: sitepath+"quote/submitquote/",
                data: {name: $("#txt_name").val(),company_name: $("#txt_cname").val(),email: $("#txt_emailaddress").val(),mobile: $("#txt_mobile").val(),message: $("#txt_message").val()},
                success: function(reviewdata) {
                    if(reviewdata==1)
                    {
                        $("#quote-msg").show();
                        $("#txt_name").val('');
                        $("#txt_cname").val('');
                        $("#txt_emailaddress").val('');
                        $("#txt_mobile").val('');
                        $("#txt_message").val('');
                        setTimeout(function(){
                            $("#quote-msg").hide();
                        },5000);
                    }
                },
                fail: function() {
                    // do nothing
                }
            });
        }
        return false;
    });
    $("#send-contact").click(function(){
        var iserror = 0;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if($("#txt_name").val()==''){
            $("#txt_name").addClass('error');
            iserror = 1;
        }else{
            $("#txt_name").removeClass('error');
        }
        if($("#txt_emailaddress").val()==''){
            $("#txt_emailaddress").addClass('error');
            iserror = 1;
        }
        else if(!regex.test($("#txt_emailaddress").val())){
            $("#txt_emailaddress").addClass('error');
            iserror = 1;
        }else{
            $("#txt_emailaddress").removeClass('error');
        }
        if($("#txt_message").val()==''){
            $("#txt_message").addClass('error');
            iserror = 1;
        }
        else{
            $("#txt_message").removeClass('error');
        }
        if(iserror == 0)
        {
            $.ajax({
                type: "POST",
                url: sitepath+"contact/submitcontact/",
                data: {name: $("#txt_name").val(),email: $("#txt_emailaddress").val(),message: $("#txt_message").val()},
                success: function(reviewdata) {
                    if(reviewdata==1)
                    {
                        $("#contact-msg").show();
                        $("#txt_name").val('');
                        $("#txt_emailaddress").val('');
                        $("#txt_message").val('');
                        setTimeout(function(){
                            $("#contact-msg").hide();
                        },5000);
                    }
                },
                fail: function() {
                    // do nothing
                }
            });
        }
        return false;
    });
    $("#send-byp").click(function(){
        var iserror = 0;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var response = grecaptcha.getResponse();
        if($("#txt_name").val()==''){
            $("#txt_name").addClass('error');
            iserror = 1;
        }else{
            $("#txt_name").removeClass('error');
        }
        if($("#txt_emailaddress").val()==''){
            $("#txt_emailaddress").addClass('error');
            iserror = 1;
        }
        else if(!regex.test($("#txt_emailaddress").val())){
            $("#txt_emailaddress").addClass('error');
            iserror = 1;
        }else{
            $("#txt_emailaddress").removeClass('error');
        }

        if(iserror == 0)
        {
            if(response.length == 0)
                {
                    $("#byp-msg").show();
                    $("#byp-msg").html('Please verify that you are not a robot');
                    iserror = 1;
                }
                else
                {
                    var prodlist = "";
                    $("#result-list li").each(function(){  
                        prodlist += $(this).find('.result-item').html()+'- Rs.'+$(this).find('.result-price span').html()+'<br/>';
                    });
                    prodlist += '<b>Total</b>- Rs.'+$("#tot-amount").html();
                    $.ajax({
                        type: "POST",
                        url: sitepath+"byp/submitbyp/",
                        data: {name: $("#txt_name").val(),email: $("#txt_emailaddress").val(),message: prodlist},
                        success: function(reviewdata) {
                            if(reviewdata==1)
                            {
                                $("#byp-msg").show();
                                $("#txt_name").val('');
                                $("#txt_emailaddress").val('');
                                setTimeout(function(){
                                    $("#byp-msg").hide();
                                },5000);
                            }
                        },
                        fail: function() {
                            // do nothing
                        }
                    });
            }
        }
        return false;
    });
    $("#print_data").click(function(){
        $("#result-print").print({
            prepend : "<h3 class='quote-subtitle'>Price Quotation</h3>",
            //Add this on bottom
            append : "<h3 class='quote-line'>Visit us for shopping !!!<h3>",
            title: null
        });
        return false;
    });
    $("#sel_brand").change(function(){
        if($(this).val()=='' || $(this).val()=='all')
        {
            document.location = sitepath+"vendors/";
        }
        else
        {
            document.location = sitepath+"vendors/"+$(this).val();
        }
    });
    $("#sel_cat").change(function(){
        document.location = $(this).val();
    });
    $("#select_brand").change(function(){
        document.location = $(this).val();
    })
    $("#txt_search").keyup(function(e){
        if(e.keyCode==40 || e.keyCode==39 || e.keyCode==38 || e.keyCode==37)
        {
            return false;
        }
        $(".search-result-box").show();
        $(".search-loader").show();
        $(".search-result-box-inner").hide();
        if($("#txt_search").val().length >1)
        {
             $.ajax({
                type: "GET",
                data: {searchtext: $("#txt_search").val()},
                url: sitepath+"searchresult",
                success: function(resultdata) {
                    if(resultdata=='')
                    {
                        $(".search-loader").hide();
                        $(".search-result-box").hide();
                        $(".search-result-box-inner").hide();
                    }
                    else{
                        $(".search-result-box").show();
                        $(".search-loader").hide();
                        $(".search-result-box-inner").show();
                        $(".search-result-box-inner").html(resultdata);
                    }
                },
                fail: function() {
                }
            });
        }
        else
        {
            $(".search-result-box").hide();
        }
    });
    $("#mobile-menu-cta").click(function(){
        if($(".header-menu").is(":visible")){
            $(".header-menu").slideUp(500);
        }
        else{
            $(".header-menu").slideDown(500);
        }
    });
    if($(window).width()<768)
    {
        $(".menu ul li.hassubnav a.subnavlink, .menu ul li.hassubnav i").click(function(e){
            e.stopPropagation;
            if($(this).parent("li").hasClass('open'))
            {
                $(this).parent("li").removeClass('open');    
                $(this).parent("li").find('ul').slideUp(500);
                return false;
            }
            else
            {
                $(this).parent("li").find('ul').slideDown(500);
                $(this).parent("li").addClass('open');
                return false;
            }
        });
    }
});
function load_products()
{
    $(".product-loader").show();
    $("#product-list").html('');
    var list_order = $("#sel_price option:selected").val();
    var brand_list = "";
    var taglist = "";
    $("#brand-list ul li").each(function(){
        if($(this).find("button .ui-icon").hasClass('ui-icon-check'))
        {
            brand_list += $(this).find("input").val()+",";
        }
    });
    $("#tag-list ul li").each(function(){
        if($(this).find("button .ui-icon").hasClass('ui-icon-check'))
        {
            taglist += $(this).find("input").val()+",";
        }
    });
    $.ajax({
        type: "POST",
        url: sitepath+"products/product_list/",
        data: {parent_id: $("#parent_id").val(),child_id: $("#child_id").val(),list_order: list_order,brand_list: brand_list,taglist: taglist},
        success: function(productdata) {
            $(".product-loader").hide();
            $("#product-list").html(productdata);
        },
        fail: function() {
        }
    });
}
function byp_result()
{
    var totalamt = 0;
    var finalresult = "";
    var printresult = '<table class="print_table"><tr><td width="10%"><strong>Quantity</strong></td><td width="70%"><strong>Item</strong></td><td width="20%"><strong>Price</strong></td></tr>';
    var totalqty = 0;
    $("#byp-section .dropdown").each(function(){
        var selid= $(this).find('select').attr('id');
        var selattid1 = selid.split('-');
        var selattid = selattid1[1];
        var qty = $("#qty-"+selattid).val();
        if($("#"+selid+" option:selected").val()!='')
        {
            totalqty = parseInt(totalqty) + parseInt(qty);
            var itemval = $("#"+selid+" option:selected").val();
            var itemval1 = itemval.split('-');
            var itemprice = parseFloat(itemval1[1])*parseInt(qty);
            totalamt = parseFloat(totalamt)+parseFloat(itemprice);
            totalamt = totalamt.toFixed(2);
            finalresult += '<li class="cf" id="item-'+selattid+'"><div class="result-item"><span>'+qty+'X </span>'+$("#"+selid+" option:selected").text()+'</div><div class="result-price">Rs. <span>'+itemprice+'</span></div><div class="result-delete"><a href="#" title="delete" rel="'+selattid+'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></li>';
            printresult += '<tr><td>'+qty+'</td><td>'+$("#"+selid+" option:selected").text()+'</td><td>'+itemprice+'</td></tr>';
        }
    });
    printresult += '<tr><td></td><td><strong>Total</strong></td><td id="final_amt"></td></tr></table>';
    $("#result-list").html(finalresult);
    $("#result-print").html(printresult);
    $(".byp-result-list ul li").each(function(){
        $(this).find('a').click(function(){
            var eid = $(this).attr('rel');
            $('#cat-'+eid).prop('selectedIndex',0);
            $(this).parent('div').parent('li').remove();
            $(".byp-left ul li#list-"+eid).removeClass('active');
            byp_totalamt();
            return false;
        });
    });
    $("#total-qty").html(totalqty);
    byp_totalamt();
}
function byp_totalamt(){
    var totalamt = 0;
    $(".byp-result-list ul li").each(function(){
        totalamt = parseInt(totalamt) + parseInt($(this).find('.result-price span').html());
    });
    $("#tot-amount").html(totalamt.toFixed(2));
    $("#final_amt").html(totalamt.toFixed(0));
}
function byp_init()
{
    $("#byp-section .byp-box").each(function(){
        $(this).find('select').change(function(){
            var sid = $(this).parent('.byp-box').attr('id');
            var cid1 = $(this).attr('id');
            var cidsplit = cid1.split("cat-");
            var cid = cidsplit[1];
            var newid = parseInt(sid)+1;
            var itemval = $("#"+cid1+" option:selected").val();
            var itemval1 = itemval.split('-');
            var itemid = itemval1[0];
            var qty = $("#qty-"+cid).val();
            $(".byp-left #list-"+cid).addClass('active');
            /*$(".byp-left #list-"+sid).find('.ui-icon').removeClass('ui-icon-blank').addClass('ui-icon-check');*/
            $.ajax({
                type: "POST",
                url: sitepath+"byp/getproducts/",
                data: {cat_id: cid,item_id: itemid},
                dataType: "json",
                success: function(productdata) {
                    if(productdata!='')
                    {
                        for (var i = 0; i < productdata.length; i++) {
                            var products = productdata[i];
                            var catid = products['cat_id'];
                            var catname = "cat-"+catid;
                            $("#"+catname).replaceWith(products['cat_data']);
                            $(".byp-result-list li#item-"+catid).remove();
                            $(".byp-left ul li#list-"+catid).removeClass('active');
                        }
                        byp_totalamt();
                        byp_init();
                    }
                },
                fail: function() {
                }
            });
            byp_result();
        })
    });
    $("#byp-section .byp-box").each(function(){
        $(this).find('input').change(function(){
            byp_result();
        });
    });
}
$(document).ready(function() {
    $("#brand-list ul li").each(function(){
        $(this).button().click(function(){
            load_products();
        });
    });
    $("#sel_price").change(function(){
            load_products();
    });
    $("#tag-list ul li").each(function(){
        $(this).button().click(function(){
            load_products();
        });
    });
    if($(".mainpage").length >0){
        
    var signup_dialog_height = $(document).width() > 767 ? 580 : 700;
    var signup_dialog_width = $(document).width() > 767 ? 500 : 300;
    var dialog2 = $("#signup-dialog").dialog({
        autoOpen: false,
        height: signup_dialog_height,
        width: signup_dialog_width,
        modal: true,
        resizable: false,
        draggable: false,
        dialogClass: 'signup-dialog',
        open: function(){
           $("body").addClass('nomove');
        },
        close: function(){
            $("body").removeClass('nomove');
        }
    });
    setTimeout(function(){
        dialog2.dialog("open");
    },1000);
    $('html').click(function() {
        dialog2.dialog("close");
    });
    $("#signup-dialog").click(function(e){
        e.stopPropagation();
    });
    $("#signup-close").click(function() {
        dialog2.dialog("close");
    });
     }   
});