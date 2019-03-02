$(document).ready(function(){
    
    $("#sugarsave").click(function(){
        $q=$("#sfrm").serialize();
        /*alert($q);*/
        $url="ajax-sugar-record.php?"+$q;
        $.get($url,function(result){
            /*alert(result);*/
            $("#sugarresult").html(result);
            
        });        
    });
    
        $("#bpsave").click(function(){
        $q=$("#bpfrm").serialize();
        /*alert($q);*/
        $url="ajax-bp-record.php?"+$q;
        $.get($url,function(result){
            /*alert(result);*/
            $("#bpresult").html(result);
            
        });        
    });
    
/*          $("#ratingsubmit").click(function(){
        $q=$("#ratingfrm").serialize();
        alert($q);
        $url="rating-process.php?"+$q;
        $.get($url,function(result){
            alert(result);
            $("#ratingresult").html(result);
            
        });        
    });*/
    
    $("#ratingsubmit").click(function(){
        $q=$("#ratingfrm").serialize();
        alert($q);
    });
    
    
    
});