<html>
    <head>
        <title>Print Test Page</title>
        <script>
            printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
            function printDiv(divId) {
                window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            }
        </script>
    </head>

    <body>
        <h1><b><center>This is a test page for printing</center></b><hr color=#00cc00 width=95%></h1>
        <b>Div 1:</b> <a href="javascript:printDiv('div1')">Print</a><br>
        <div id="div1">This is the div1's print output</div>
        <br><br>
        <b>Div 2:</b> <a href="javascript:printDiv('div2')">Print</a><br>
        <div id="div2">This is the div2's print output</div>
        <br><br>
        <b>Div 3:</b> <a href="javascript:printDiv('div3')">Print</a><br>
        <div id="div3">This is the div3's print output</div>
        <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
    </body>
</html>