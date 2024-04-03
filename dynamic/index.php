<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New version</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <style>
        .section-wrapper {
            border: 1px solid blue;
            padding: 1rem;
        }
    </style>
    <script src="../jquery-3.6.3.min.js"></script>

    <script>
        $(function() {
            console.log('jquery loaded and usable!');

            var sectionLoad = 'list.php';

            switchSection(sectionLoad);

            $('.jq-link').click(function(e){
                e.preventDefault();
                switchSection($(this).attr('href'));
            });
        });

        function switchSection(sectionName) 
        {
            $('.section-wrapper').html('<h2>Loading section...</h2>');

            $.ajax({
                url: sectionName,
                //data: data,
                success: function(sectionHtml){
                    //console.log(sectionHtml);
                    $('.section-wrapper').html(sectionHtml);
                    $('.jq-link').click(function(e){
                        e.preventDefault();
                        switchSection($(this).attr('href'));
                    });
                },
                dataType: 'html'
            });
        }
    </script>

</head>
<body>
    <h2>New dynamic version on J Query</h2>
    
    <div class="section-wrapper">
        <h2>Loading section...</h2>
    </div>
</body>
</html>