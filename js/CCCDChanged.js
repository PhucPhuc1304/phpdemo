function CCCDChanged()
{
    var x = document.getElementById("SoCCCD").value;
    $.ajax({
        url: 'getthongtin.php',
        method: 'POST',
        data: 
            {
                id : x
            },
        success:function(data)
        {
            $("#test").html(data);
        }
        })
}

