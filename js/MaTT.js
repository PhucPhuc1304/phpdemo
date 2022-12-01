function GetTT()
{
    var x = document.getElementById("TT").value;
    $.ajax({
        url: 'getTT.php',
        method: 'POST',
        data: 
            {
                matt : x
            },
        success:function(data)
        {
            $("#MaTT").html(data);
        }
        })
}