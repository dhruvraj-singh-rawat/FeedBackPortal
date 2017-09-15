$(document).ready(function(){
              console.log("Reply your feedback 3");
        $(".feedback_reply").click(function(){
          console.log("Reply your feedback");
            if($(".feedback_reply:checked").length === 1){
                $('#response1').css("visibility","visibile");
            }
            else
            {
                $('#response1').css("visibility","hidden");
            }
        });
    });