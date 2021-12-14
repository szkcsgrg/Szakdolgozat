$(document).ready(function(){
    $("#filter").on("keyup", function() {
        const value = $(this).val().toLowerCase();

        if(value.length > 0) {
            $("table tbody tr").each(function() {
                const row = $(this);
                $(this).children().each(function() {
                    if($(this).text().toLowerCase().includes(value)){
                        row.addClass("d-table-row");
                        row.removeClass("d-none");
                        return false;
                    } else {
                        row.addClass("d-none");
                        row.removeClass("d-table-row");
                    }
                });
            });
        } else {
            $("table tbody tr").each(function() {
                $(this).addClass("d-table-row");
                $(this).removeClass("d-none");
            });
        }
    });
    
});