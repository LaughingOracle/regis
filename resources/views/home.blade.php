<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Include jQuery + jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>x

    <input type="text" class="autocomplete">
 
    <form action="{{ route('test') }}" method="get">
        
        <input type="text" name="text" id="text" class="autocomplete">
        <button type="submit">submit</button>

    </form>

    <script>
        $(function() {
            const $auto = $(".autocomplete").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/autocomplete",
                        dataType: "json",
                        data: {
                            q: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },

                minLength: 1,
                
                focus: function(event, ui) {
                    // Prevent value from being replaced while navigating suggestions
                    return false;
                },

                select: function(event, ui) {
                    let current = this.value;
                    let lastSpacePos = current.lastIndexOf(" ");
                    
                    if (lastSpacePos !== -1) {
                        // Replace only the last word
                        current = current.substring(0, lastSpacePos + 1) + ui.item.value;
                    } else {
                        // No spaces → just replace the whole thing
                        current = ui.item.value;
                    }
                    
                    this.value = current;
                    return false; // prevent default replacement
                }
            });

            $auto.data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li>")
                    .append("<div><strong>" + item.label + "</strong><br><small>" + item.desc + "</small></div>")
                    .appendTo(ul);
            };
        });
    </script>


</body>
</html>