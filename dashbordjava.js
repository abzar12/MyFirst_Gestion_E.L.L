// function for accepte to remove
function ac_confirm(){
    if(confirm("Do you really want to delete this user?")){
        return true;
    }else return false;
}

$(document).ready(function() {
    $("#recherche").on("keyup", function() {
        var recherche = $("#recherche").val();
        
        $.ajax({
            url: "", // On reste sur la même page
            method: "POST",
            data: {query: recherche},
            success: function(data) {
                $("#mytable_list").html($(data).find("#mytable_list").html());
            }
        });
    });
});