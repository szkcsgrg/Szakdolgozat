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

    $(".order").on("click", function(){
        const orderBy = $(this).data("order-by");
        const orderType = $(this).data("order-type");

        $.ajax({
            method: "POST",
            url: "order.php",
            data: {
                orderBy: orderBy,
                orderType: orderType
            }
        })
        .done(function(data) {
            $("table tbody").html("");

            JSON.parse(data).forEach(function(item) {
                $("table tbody").append("<tr></tr>");

                Object.values(item).forEach(function(value) {
                    $("table tbody tr").last().append("<td>"+value+"</td>");
                })
            })
        })
    });

    $(".editButton").on('click', function(){
    		const row = $(this).parent().parent();

    		row.find("td").each(function(){
    			const name = $(this).data("name");

    			if(name){
    				$("#editModal").find("input[name*='"+name+"']").val($(this).text());
    			}
    		});
    });
});