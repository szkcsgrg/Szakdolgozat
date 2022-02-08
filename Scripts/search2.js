$(document).ready(function(){
    $("#filter").on("keyup", function() {
        const value = $(this).val().toLowerCase();

        if(value.length > 0) {
            $(".image-view a").each(function() {
                const row = $(this);
                $(this).children().each(function() {
                    if($(this).text().toLowerCase().includes(value)){
                        row.addClass("d-block");
                        row.removeClass("d-none");
                    } else {
                        row.addClass("d-none");
                        row.removeClass("d-block");
                    }
                });
            });
        } else {
            $(".image-view a").each(function() {
                $(this).addClass("d-block");
                $(this).removeClass("d-none");
            });
        }
    });
    
});