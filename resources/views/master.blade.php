<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Festival Selector</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" 
                src="{{ URL::asset('javascript.js') }}">
                createEditableSelect(document.forms[0].myText);
        </script>
    </head>
    <body>
        <h1 style="color:red">@yield("titel")</h1>
        @yield("inhoud")
        
        <hr style="clear:both"/>
        <p><em>Copyright-notice</em></p>
    </body>
</html>
